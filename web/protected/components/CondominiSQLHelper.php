<?php
class CondominiSQLHelper
{                    
    
    public static function createStmt_GetRiepQuote($anno){
        $where_nonpag = "";
        $where_nonpag .= U::addwhere("anno_registrazione", "<", $anno);
        $where_nonpag .= " and (1=1 ";
        $where_nonpag .= U::addwhere("year(data_pagam)", ">=", $anno);
        $where_nonpag .= U::addwhere("year(data_pagam)", "is", "null", "", "or");
        $where_nonpag .= ")";
        $where_dapag = "";
        $where_dapag .= U::addwhere("anno_registrazione", "=", $anno);
        $where_pag = "";
        $where_pag .= U::addwhere("anno_registrazione", "<=", $anno);
        $where_pag .= U::addwhere("year(data_pagam)", "=", $anno);
        $stmt = <<<EOD
        select
          c.id_controparte, c.nome,
          ifnull(nonpag.sum_importo,0) arretrati,
          ifnull(dapag.sum_importo,0) correnti,
          ifnull(pag.sum_importo, 0) pagati,
          (ifnull(nonpag.sum_importo,0) + ifnull(dapag.sum_importo,0) - ifnull(pag.sum_importo, 0) ) da_pagare
        from controparti c
        left join (
        select id_controparte, sum(importo) sum_importo from transazioni
        where tipo_transazione = "E" $where_nonpag
        group by id_controparte ) nonpag
        on c.id_controparte = nonpag.id_controparte
        left join (
        select id_controparte, sum(importo) sum_importo from transazioni
        where tipo_transazione = "E" $where_dapag
        group by id_controparte ) dapag
        on c.id_controparte = dapag.id_controparte
        left join (
        select id_controparte, sum(importo) sum_importo from transazioni
        where tipo_transazione = "E" $where_pag
        group by id_controparte ) pag
        on c.id_controparte = pag.id_controparte
        where c.tipo = 'c';
EOD;
        return $stmt;
    }

}
?>

  
  
  
