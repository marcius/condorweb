<?php
class BilancioSQLHelper
{                    
    
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

/*



      public static function createStmt_InsTotCassa($anno, $sezione, $voce, $idcassa, $totannoprec){
        $where_p = "";
        $where_p .= U::addwhere("id_cassa", "=", $idcassa, "string");
        $stmt = <<<EOD
        insert into bilanci (anno, sezione, voce, valore)
        select $anno anno, '$sezione' sezione, '$voce' voce, sum_importo + ifnull($totannoprec, 0) valore from (
        select id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
        from  transazioni where year(data_pagam) = $anno $where_p
        ) s
EOD;
        return $stmt;
    }

    public static function createStmt_InsTotTipo($anno, $sezione, $voce){
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
        insert into bilanci (anno, sezione, voce, valore)
        select $anno anno, '$sezione' sezione, concat('$voce', tipo_transazione) voce, sum_importo valore from (
        select tipo_transazione, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
        from  transazioni where 1=1 $where_p group by tipo_transazione
        ) s
EOD;
        return $stmt;
    }
    
        public static function createStmt_InsTotTipoCassa($anno, $sezione, $voce)
    {
        $where_p = "";
        if ($voce == "tot_tipo_cassa"){
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else if ($voce == "pag_precnonpag_tipo_cassa_"){//sezione = "riep_pagam"       
            $where_p .= U::addwhere("anno_registrazione", "<", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else if ($voce == "pag_corr_tipo_cassa_"){ //sezione = "riep_pagam"       
            $where_p .= U::addwhere("anno_registrazione", "=", $anno);
            $where_p .= U::addwhere("year(data_pagam)", "=", $anno);
        } else {
            return "";
        }
        $stmt = <<<EOD
        insert into bilanci (anno, sezione, voce, valore)
        select $anno anno, '$sezione' sezione, concat('$voce', tipo_transazione, '_', id_cassa) voce, sum_importo valore from (
        select tipo_transazione, id_cassa, sum(importo * case tipo_transazione when 'U' then -1 else 1 end) sum_importo
        from  transazioni where 1=1 $where_p group by tipo_transazione, id_cassa
        ) s
EOD;
        return $stmt;
    }
    */

    
}
?>

  
  
  
