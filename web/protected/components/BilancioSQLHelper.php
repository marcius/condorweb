<?php
class BilancioSQLHelper
{                    
    public static function createStmt_GetBilanci()
    {
        $where_p = "";
        $stmt = "SELECT distinct (anno_registrazione), count(*) num_transazioni"
        . " FROM transazioni group by anno_registrazione order by anno_registrazione desc";
        return $stmt;
    }


    public static function createStmt_GetBilancio($anno, $sezione)
    {
        $where_p = "";                               
        $where_p .= U::addwhere("anno", "=", $anno);
        $where_p .= U::addwhere("sezione", "=", $sezione, "string");   
        $stmt = "select voce, valore from bilanci where 1=1" . $where_p;
        return $stmt;
    }

    public static function createStmt_RiepilogoPatrimoniale($mode)
    {
        $where_p = "";
        $where_p .= U::addwhere("year(data_pagam)", "=", U::q("anno"));
        $where_p .= U::addwhere("tipo_transazione", "=", ":tipo_transazione");
        $where_p .= U::addwhere("id_cassa", "=", ":id_cassa");
        $where_p .= U::addwhere("anno_registrazione", "<", ":anno_registrazione");
        $stmt = "select sum(importo) sum_importo, tipo_transazione, id_cassa from transazioni
            where 1=1" . $where_p .
            " group by tipo_transazione, id_cassa";
        return $stmt;
    }

    public static function createStmt_GetValore($anno, $sezione, $voce)
    {        
        $where_p = "";
        $where_p .= U::addwhere("anno", "=", $anno);
        $where_p .= U::addwhere("sezione", "=", $sezione, "string");
        $where_p .= U::addwhere("voce", "=", $voce, "string");
        $stmt = "select valore from bilanci where 1=1" . $where_p;
        return $stmt;
    }

    public static function createStmt_GetTotTipoConto($anno, $sezione, $voce)
    {
        $where_p = "";
        if ($voce == "tot_tipo_conto"){
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else if ($voce == "pag_precnonpag_tipo_conto"){//sezione = "riep_pagam"       
            $where_p .= U::addwhere("anno_registrazione", "<", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else if ($voce == "pag_corr_tipo_conto"){ //sezione = "riep_pagam"       
            $where_p .= U::addwhere("anno_registrazione", "=", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else {
            return "";
        }
        $stmt = <<<EOD
        select sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
        from  transazioni where tipo_transazione = :tipo_transazione and id_cassa = :id_cassa $where_p 
EOD;
        return $stmt;
    }
 
 
    public static function createStmt_GetTotTipo($anno, $sezione, $voce){
        $where_p = "";
        if ($voce == "tot_tipo"){ //sezione = "riep_cassa"
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else if ($voce == "precnonpag_tipo"){ //sezione = "riep_pagam"
            $where_p .= U::addwhere("anno_registrazione", "<", $anno);
            $where_p .= " and (1=1 ";
            $where_p .= U::addwhere("year(data_pagam)", ">=", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "is", "null", "", "or");
            $where_p .= ")";
        } else if ($voce == "nonpag_precnonpag_tipo"){ //sezione = "riep_pagam"
            $where_p .= U::addwhere("anno_registrazione", "<", $anno);
            $where_p .= " and (1=1 ";
            $where_p .= U::addwhere("year(data_pagam)", ">", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "is", "null", "", "or");
            $where_p .= ")";
        } else if ($voce == "corr_tipo"){ //sezione = "riep_pagam"
            $where_p .= U::addwhere("anno_registrazione", "=", $anno);
        } else if ($voce == "nonpag_corr_tipo"){ //sezione = "riep_pagam"
            $where_p .= U::addwhere("anno_registrazione", "=", $anno);
            $where_p .= " and (1=1 ";
            $where_p .= U::addwhere("year(data_pagam)", ">", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "is", "null", "", "or");
            $where_p .= ")";
        } else {
            return "";
        }
        $stmt = <<<EOD
        select sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
        from  transazioni where tipo_transazione = :tipo_transazione $where_p
EOD;
        return $stmt;
    }    


  
    public static function createStmt_GetTotConto($anno, $sezione, $voce, $idcassa){
        $where_p = "";
        $where_p .= U::addwhere("id_cassa", "=", $idcassa, "string");
        $stmt = <<<EOD
        select sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
        from transazioni where year(data_pagam) = $anno $where_p
EOD;
        return $stmt;
    }

    public static function createStmt_GetTot($anno, $sezione, $voce){
        $where_p = "";
        if ($voce == "saldogestioni_prec"){
            $where_p .= U::addwhere("anno_registrazione", "<", $anno);
        } else {
            return "";
        }
        $stmt = <<<EOD
        select sum(importo * case tipo_transazione when 'U' then -1 when 'E' then 1 else 0 end) sum_importo
        from transazioni where 1=1 $where_p
EOD;
        return $stmt;
    }

    public static function createStmt_InsRiepCausaliCons($anno){
        $where_p = "";
        $where_p .= U::addwhere("anno_registrazione", "=", $anno);
        $stmt = <<<EOD
        insert into riep_causali (anno, sezione, tipo_transazione, id_causale, valore)
        select $anno, "cons", tipo_transazione, id_causale, sum_importo from (
            select id_causale, tipo_transazione, sum(importo) sum_importo
            from transazioni where 1=1 $where_p  group by tipo_transazione, id_causale) s ;
EOD;
        return $stmt;
    }

    public static function createStmt_GetRiepCausali($anno){
        $where_p = "";
        $where_p .= U::addwhere("anno", "=", $anno);
        $stmt = <<<EOD
        SELECT ca.tipo, ca.descrizione, ifnull(p.valore, 0) preventivo, ifnull(c.valore, 0) consuntivo, (ifnull(p.valore, 0) - ifnull(c.valore, 0))*ca.segno*-1 saldo
        from causali ca
        left join (select * from riep_causali where sezione = "cons" $where_p) c on ca.id_causale = c.id_causale
        left join (select * from riep_causali where sezione = "prev" $where_p) p on ca.id_causale = p.id_causale
        where ca.tipo <> "G" order by ca.tipo, ca.descrizione;
EOD;
        return $stmt;
    }

        public static function createStmt_GetLastYear(){
        $where_p = "";
        $stmt = "SELECT max(anno_registrazione) anno from transazioni";
        return $stmt;
    }
    
}
?>
