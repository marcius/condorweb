<?php
class BilancioHelper
{ 
      public static function creaArraySezionidaDB(&$array, $anno, $sezione)
    {
        $connection = Yii::app()->db;
        $stmt = BilancioSQLHelper::createStmt_GetBilancio($anno, $sezione);
        $rows = $connection->createCommand($stmt)->queryAll();
        foreach($rows as $row) {
            $array["$sezione"][$row["voce"]] = $row["valore"];
        }
        return $array;
    }
    
    public static function creaArrayPerView($anno)
    {
        $result = array();
        BilancioHelper::creaArraySezionidaDB($result, $anno, "cassa");
        BilancioHelper::creaArraySezionidaDB($result, $anno, "pagam");
        BilancioHelper::creaArraySezionidaDB($result, $anno, "patrim");
        return $result;
    }
    
    public static function creaBilancio ($anno = 2009){
                     
        $connection = Yii::app()->db;

        $stmt = "delete from bilanci where anno = $anno";
        $connection->createCommand($stmt)->execute();

  // 1 - riepilogo cassa
        

  // riga 1
  // saldi da anno precedente
        $stmt = "insert into bilanci (anno, sezione, voce, valore) values (:anno, :sezione, :voce, :valore)";
        $inscmd = $connection->createCommand($stmt);
        
        $voce = "prec_conto_b"; $sezione = "cassa";
        $stmt = BilancioSQLHelper::createStmt_GetValore($anno-1, $sezione, "tot_conto_b");
        $valore = $connection->createCommand($stmt)->queryScalar();
        $prec_conto_b = (empty($valore) ? 0 : $valore);
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>$prec_conto_b));
        
        $voce = "prec_conto_c"; $sezione = "cassa";
        $stmt = BilancioSQLHelper::createStmt_GetValore($anno-1, $sezione, "tot_conto_c");
        $valore = $connection->createCommand($stmt)->queryScalar();
        $prec_conto_c = (empty($valore) ? 0 : $valore);
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>$prec_conto_c));

        $voce = "prec"; $sezione = "cassa";
        $stmt = BilancioSQLHelper::createStmt_GetValore($anno-1, $sezione, "tot");
        $valore = $connection->createCommand($stmt)->queryScalar();
        $prec = (empty($valore) ? 0 : $valore);
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>$prec));
        
        $array_tipo_cassa = array(array("E", "b"), array("E", "c"), array("U", "b"), array("U", "c"));
        $array_tipo = array("E", "U");
        $array_cassa = array("b", "c");
        $array_cassa_ex = array("b", "c", "");

  // riga 2-3 - colonna 1-2
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipoCassa($anno, $sezione, "tot_tipo_cassa_");
        //$connection->createCommand($stmt)->execute();
        $voce = "tot_tipo_conto"; $sezione = "cassa";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipoConto($anno, $sezione, $voce);
        foreach ($array_tipo_cassa as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem[0], "id_cassa"=>$elem[1]));
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem[0], $elem[1])), "valore"=>(empty($valore) ? 0 : $valore)));
        }

  // riga 2-3 - colonna 3
  // select tipo_transazione, id_cassa, sum (importo) from  transazioni where  year(data_pagam) = 2009 group by tipo_transazione, id_cassa
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipo($anno, $sezione, "tot_tipo_");
        //$connection->createCommand($stmt)->execute();                        
        $voce = "tot_tipo"; $sezione = "cassa";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipo($anno, $sezione, $voce);
        foreach ($array_tipo as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem));
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>(empty($valore) ? 0 : $valore)));
        } 

  // riga 4 - colonna 1
        //$stmt = BilancioSQLHelper::createStmt_InsTotCassa($anno, $sezione, "tot_cassa_b", "b", $prec_conto_b);
        //$connection->createCommand($stmt)->execute();
  // riga 4 - colonna 2
        //$stmt = BilancioSQLHelper::createStmt_InsTotCassa($anno, $sezione, "tot_cassa_c", "c", $prec_conto_c);
        //$connection->createCommand($stmt)->execute();
  // riga 4 - colonna 3
        //$stmt = BilancioSQLHelper::createStmt_InsTotCassa($anno, $sezione, "tot", "", $prec);
        //$connection->createCommand($stmt)->execute();
        $voce = "tot_conto"; $sezione = "cassa";
        $elem = "b";
        $stmt = BilancioSQLHelper::createStmt_GetTotConto($anno, $sezione, $voce, $elem);
        $valore = $connection->createCommand($stmt)->queryScalar();
        $valore = (empty($valore) ? 0 : $valore) + $prec_conto_b;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>$valore));

        $elem = "c";
        $stmt = BilancioSQLHelper::createStmt_GetTotConto($anno, $sezione, $voce, $elem);
        $valore = $connection->createCommand($stmt)->queryScalar();
        $valore = (empty($valore) ? 0 : $valore) + $prec_conto_c;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>$valore));

        $voce = "tot"; 
        $elem = "";
        $stmt = BilancioSQLHelper::createStmt_GetTotConto($anno, $sezione, $voce, $elem);
        $valore = $connection->createCommand($stmt)->queryScalar();
        $valore = (empty($valore) ? 0 : $valore) + $prec;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>$valore));
        
        $voce = "saldocassa"; $sezione = "patrim"; 
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>(empty($valore) ? 0 : $valore)));
        

  // 2 - calcoli pagamenti per riepilogo patrimoniale

  // riga 1
  // select tipo_transazione, sum(importo) from  transazioni where anno_registrazione < 2009 and (year(data_pagam) >= 2009 or year(data_pagam) is null) group by tipo_transazione;
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipo($anno, $sezione, "precnonpag_tipo_");
        //$connection->createCommand($stmt)->execute();
        $voce = "precnonpag_tipo"; $sezione = "pagam";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipo($anno, $sezione, $voce);
        foreach ($array_tipo as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem));
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>(empty($valore) ? 0 : $valore)));
        } 

  // riga 2-3
  // select tipo_transazione, id_cassa, sum(importo) from  transazioni where anno_registrazione < 2009 and year(data_pagam) = 2009 group by tipo_transazione, id_cassa
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipoCassa($anno, $sezione, "pag_precnonpag_tipo_cassa_");
        //$connection->createCommand($stmt)->execute();
        $voce = "pag_precnonpag_tipo_conto"; $sezione = "pagam";
        foreach ($array_cassa as $elem) {
            $stmt = BilancioSQLHelper::createStmt_GetTotConto($anno, $sezione, $voce, $elem);
            $valore = $connection->createCommand($stmt)->queryScalar();
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>(empty($valore) ? 0 : $valore)));
        }

  // riga 4
  // somma righe 1-2-3
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipo($anno, $sezione, "nonpag_precnonpag_tipo_");
        //$connection->createCommand($stmt)->execute();
        $voce = "nonpag_precnonpag_tipo"; $sezione = "pagam";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipo($anno, $sezione, $voce);
        foreach ($array_tipo as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem));
            $valore = (empty($valore) ? 0 : $valore);
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>$valore));
            if ($elem == "E") $sit_vcond_prec = $valore;
            if ($elem == "U") $sit_vforn_prec = $valore;
        } 

  // riga 5
  // select tipo_transazione, sum(importo) from  transazioni where anno_registrazione = 2009 group by tipo_transazione;
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipo($anno, $sezione, "corr_tipo_");
        //$connection->createCommand($stmt)->execute();
        $voce = "corr_tipo"; $sezione = "pagam";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipo($anno, $sezione, $voce);
        $risgestione = 0;
        foreach ($array_tipo as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem));
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>(empty($valore) ? 0 : $valore)));
            $risgestione += $valore;
        } 

  // riga 6-7
  // select tipo_transazione, id_cassa, sum(importo) from  transazioni where anno_registrazione = 2009 and year(data_pagam) = 2009 group by tipo_transazione, id_cassa;
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipoCassa($anno, $sezione, "pag_corr_tipo_cassa_");
        //$connection->createCommand($stmt)->execute();
        $voce = "pag_corr_tipo_conto"; $sezione = "pagam";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipoConto($anno, $sezione, $voce);
        foreach ($array_tipo_cassa as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem[0], "id_cassa"=>$elem[1]));
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem[0], $elem[1])), "valore"=>(empty($valore) ? 0 : $valore)));
        }

  // riga 8
  // somma righe 5-6-7
        //$stmt = BilancioSQLHelper::createStmt_InsTotTipo($anno, $sezione, "nonpag_corr_tipo_");
        //$connection->createCommand($stmt)->execute();
        $voce = "nonpag_corr_tipo"; $sezione = "pagam";
        $stmt = BilancioSQLHelper::createStmt_GetTotTipo($anno, $sezione, $voce);
        foreach ($array_tipo as $elem) {
            $valore = $connection->createCommand($stmt)->queryScalar(array("tipo_transazione"=>$elem));
            $valore = (empty($valore) ? 0 : $valore);
            $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>U::cat(array($voce, $elem)), "valore"=>$valore));
            if ($elem == "E") $sit_vcond_corr = $valore;
            if ($elem == "U") $sit_vforn_corr = $valore;
        } 

  // riga 9
  // somma righe 2+3+6+7
  // riga 10
  // somma righe 4+8

  // 3 - riepilogo patrimoniale
        $voce = "risgestione_corr"; $sezione = "patrim";
        $valore = $risgestione;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>(empty($valore) ? 0 : $valore)));

        $voce = "risgestione_prec"; $sezione = "patrim";
        $stmt = BilancioSQLHelper::createStmt_GetValore($anno-1, $sezione, "risgestione_corr");
        $valore = $connection->createCommand($stmt)->queryScalar();
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>(empty($valore) ? 0 : $valore)));
        
        $voce = "sit_vcond_corr"; $sezione = "patrim"; $valore = $sit_vcond_corr;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>(empty($valore) ? 0 : $valore)));

        $voce = "sit_vforn_corr"; $sezione = "patrim"; $valore = $sit_vforn_corr;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>(empty($valore) ? 0 : $valore)));

        $voce = "sit_vcond_prec"; $sezione = "patrim"; $valore = $sit_vcond_prec;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>(empty($valore) ? 0 : $valore)));

        $voce = "sit_vforn_prec"; $sezione = "patrim"; $valore = $sit_vforn_prec;
        $inscmd->execute(array("anno"=>$anno, "sezione"=>$sezione, "voce"=>$voce, "valore"=>(empty($valore) ? 0 : $valore)));
       
}
    
    
}
?>
