<?php
class CondominiHelper
{ 

    public static function getDpRiepQuote($anno)
  {
      $connection = Yii::app()->db;
      $stmt = CondominiSQLHelper::createStmt_GetRiepQuote($anno);
      $rows = $connection->createCommand($stmt)->queryAll();
      return new ArrayDataProviderEx($rows, ArrayDataProviderEx::ARRAY_ORDER);
  }


}
?>
