<?php
class BilCalcSQLHelper
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

    public static function createStmt_GetRiepCausali($anno, $tipo = null){
        $where_p = ""; $where_ca = "";
        $where_p .= U::addwhere("anno", "=", $anno);
        $where_ca .= U::addwhere("ca.tipo", "=", $tipo, "string");
        $stmt = <<<EOD
        SELECT ca.id_causale id, ca.tipo, ca.descrizione, ifnull(p.valore, 0) preventivo, ifnull(c.valore, 0) consuntivo, (ifnull(p.valore, 0) - ifnull(c.valore, 0))*ca.segno*-1 saldo
        from causali ca
        left join (select * from riep_causali where sezione = "cons" $where_p) c on ca.id_causale = c.id_causale
        left join (select * from riep_causali where sezione = "prev" $where_p) p on ca.id_causale = p.id_causale
        where ca.tipo <> "G" $where_ca order by ca.tipo, ca.descrizione;
EOD;
        return $stmt;
    }

    public static function createStmt_GetLastYear(){
        $where_p = "";
        $stmt = "SELECT max(anno_registrazione) anno from transazioni";
        return $stmt;
    }

    public static function createStmt_GetFornitoriQuadroAC($anno){
        $where_p = "";
        $where_p .= U::addwhere("anno_registrazione", "=", $anno);
        $stmt = <<<EOD
        SELECT c.nome nome, sum(t.importo) importo FROM transazioni t
        join controparti c on c.id_controparte = t.id_controparte
        where  t.tipo_transazione = 'U' $where_p
        group by t.id_controparte having sum(t.importo) > 258.23;
EOD;
        return $stmt;
    }

    public static function createStmt_GetRiepTransazioniPerCausale($anno, $tipo = null){
        $where_p = "";
        $where_p .= U::addwhere("anno_registrazione", "=", $anno);
        $where_p .= U::addwhere("tipo_transazione", "=", $tipo);
        $stmt = <<<EOD
        select * from (SELECT anno_registrazione, tipo_transazione, id_causale, id_cassa, id_controparte, descrizione, importo, data_doc, riferim_doc, data_pagam, des_pagam FROM cond.transazioni tr
        union
        SELECT anno_registrazione, tipo_transazione, id_causale, null id_cassa, null id_controparte, concat(' TOTALE PER ', id_causale) descrizione, sum(importo) importo, null data_doc, null riferim_doc, null data_pagam, null des_pagam FROM cond.transazioni tot group by anno_registrazione, tipo_transazione, id_causale
        ) x
        where 1=1 $where_p
        order by tipo_transazione, id_causale, descrizione;
EOD;
        return $stmt;
    }

public static function createStmt_GetRiepQuote($anno){
        $stmt = <<<EOD
        select t.anno_registrazione, t.id_controparte, c.nome,
          -- ifnull(tp.quote,0) tot_quote_prec, ifnull(pp.versamenti,0) tot_versamenti_prec,
          (ifnull(tp.quote,0)-ifnull(pp.versamenti,0)) saldo_prec,
          ifnull(t.quote,0) tot_quote_corr, ifnull(p.versamenti,0) tot_versamenti_corr,
          -- (ifnull(t.quote,0)-ifnull(p.versamenti,0)) saldo_corr,
          (ifnull(t.quote,0)-ifnull(p.versamenti,0)+ifnull(tp.quote,0)-ifnull(pp.versamenti,0)) saldo_tot
        from controparti c

        left join (
          select t1.anno_registrazione, t1.id_controparte, sum(t1.importo) quote from transazioni t1
          where t1.id_causale = 'q' and t1.anno_registrazione < $anno
          group by t1.id_controparte
        ) tp on c.id_controparte = tp.id_controparte

        left join (
          select t2.anno_registrazione, t2.id_controparte, sum(p1.importo) versamenti from
          transazioni t2 left join pagamenti p1 on t2.id_transazione = p1.id_transazione
          where t2.id_causale = 'q' and year(p1.data_pagam) < $anno
          group by t2.id_controparte
        ) pp on c.id_controparte = pp.id_controparte

        left join (
          select t1.anno_registrazione, t1.id_controparte, sum(t1.importo) quote from transazioni t1
          where t1.id_causale = 'q' and t1.anno_registrazione = $anno
          group by t1.id_controparte
        ) t on c.id_controparte = t.id_controparte

        left join (
          select t2.anno_registrazione, t2.id_controparte, sum(p1.importo) versamenti from
          transazioni t2 left join pagamenti p1 on t2.id_transazione = p1.id_transazione
          where t2.id_causale = 'q' and year(p1.data_pagam) = $anno
          group by t2.id_controparte
        ) p on c.id_controparte = p.id_controparte
        where c.tipo = 'c'
        ;
EOD;
        return $stmt;
    }

public static function createStmt_GetRiepSpese($anno){
        $stmt = <<<EOD
        select c.id_causale, c.descrizione,
          ifnull(pr.valore,0) preventivo,
          ifnull(co.sum_importo,0) consuntivo,
          (ifnull(co.sum_importo,0)-ifnull(pr.valore,0)) saldo
        from causali c

        left join (
          SELECT id_causale, valore
          FROM riep_causali r
          where anno = $anno and sezione = 'prev' and tipo_transazione = 'U'
        ) pr on c.id_causale = pr.id_causale

        left join (
          select t2.anno_registrazione, t2.id_causale, sum(p1.importo) sum_importo from
          transazioni t2 left join pagamenti p1 on t2.id_transazione = p1.id_transazione
          where year(p1.data_pagam) = $anno
          group by t2.id_causale
        ) co on c.id_causale = co.id_causale
        where c.tipo = 'U' order by c.descrizione
        ;
EOD;
        return $stmt;
    }

    public static function createStmt_GetRiepCassa($data_da, $data_a){
      $where_ini =  U::addwhere("p.data_pagam", "<", $data_da, "string");
      $where_cor =  U::addwhere("p.data_pagam", ">=", $data_da, "string");
      $where_cor .= U::addwhere("p.data_pagam", "<=", $data_a, "string");
      $where_fin =  U::addwhere("p.data_pagam", "<=", $data_a, "string");
      $stmt = <<<EOD
        select b1.descrizione, b1.importo banca, c1.importo contanti, t1.importo totale
        from (
        select 'Saldo iniziale' descrizione, sum(p.importo*if(t.id_causale = 'q' or t.id_causale = 'g', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'b' $where_ini
        ) b1
        left join (
        select 'Saldo iniziale' descrizione, sum(p.importo*if(t.id_causale = 'q' or t.id_causale = 'g', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'c' $where_ini
        ) c1 using (descrizione)
        left join (
        select 'Saldo iniziale' descrizione, sum(p.importo*if(t.id_causale = 'q' or t.id_causale = 'g', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where 1=1 $where_ini
        ) t1 using (descrizione)
        union all
        select b1.descrizione, b1.importo b, c1.importo c, t1.importo t from (
        select 'Entrate' descrizione, sum(p.importo*if(t.id_causale = 'q', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'b' and tipo_transazione = 'E' $where_cor
        ) b1
        left join (
        select 'Entrate' descrizione, sum(p.importo*if(t.id_causale = 'q', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'c' and tipo_transazione = 'E' $where_cor
        ) c1 using (descrizione)
        left join (
        select 'Entrate' descrizione, sum(p.importo*if(t.id_causale = 'q', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where tipo_transazione = 'E' $where_cor
        ) t1 using(descrizione)
        union all
        select b1.descrizione, b1.importo b, c1.importo c, t1.importo t from (
        select 'Uscite' descrizione, sum(p.importo*if(t.id_causale = 'q', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'b' and tipo_transazione = 'U' $where_cor
        ) b1
        left join (
        select 'Uscite' descrizione, sum(p.importo*if(t.id_causale = 'q', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'c' and tipo_transazione = 'U' $where_cor
        ) c1 using (descrizione)
        left join (
        select 'Uscite' descrizione, sum(p.importo*if(t.id_causale = 'q', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where tipo_transazione = 'U' $where_cor
        ) t1 using(descrizione)
        union all
        select b1.descrizione, b1.importo b, c1.importo c, t1.importo t from (
        select 'Giroconti' descrizione, sum(p.importo) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'b' and tipo_transazione = 'G' $where_cor
        ) b1
        left join (
        select 'Giroconti' descrizione, sum(p.importo) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'c' and tipo_transazione = 'G' $where_cor
        ) c1 using (descrizione)
        left join (
        select 'Giroconti' descrizione, sum(p.importo) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where tipo_transazione = 'G' $where_cor
        ) t1 using(descrizione)
        union all
        select b1.descrizione, b1.importo b, c1.importo c, t1.importo t from (
        select 'Saldo finale' descrizione, sum(p.importo*if((t.id_causale = 'q' or t.id_causale = 'g'), 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'b' $where_fin
        ) b1
        left join (
        select 'Saldo finale' descrizione, sum(p.importo*if(t.id_causale = 'q' or t.id_causale = 'g', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where id_cassa = 'c' $where_fin
        ) c1 using (descrizione)
        left join (
        select 'Saldo finale' descrizione, sum(p.importo*if(t.id_causale = 'q' or t.id_causale = 'g', 1, -1)) importo
        from  transazioni t left join pagamenti p on t.id_transazione = p.id_transazione
        where 1=1 $where_fin
        ) t1 using(descrizione)
EOD;
        return $stmt;
    }

}
?>