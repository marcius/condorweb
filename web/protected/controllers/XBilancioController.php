<?php

  // 1 - riepilogo cassa
  // riga 1
  // saldi da anno precedente
  // riga 2-4
  // select tipo_transazione, id_cassa, sum (importo) from  transazioni where  year(data_pagam) = 2009 group by tipo_transazione, id_cassa
  // insert into bilanci (anno, voce, valore)
//select 2009 anno, concat('tot_tipo_cassa_', tipo_transazione, '_', id_cassa) voce, sum_importo valore from (
//select tipo_transazione, id_cassa, sum(importo) sum_importo
//from  transazioni where year(data_pagam) = 2009 group by tipo_transazione, id_cassa
//) s
//;
  
  // 2 - calcoli per riepilogo patrimoniale
  // riga 1
  // select tipo_transazione, sum(importo) from  transazioni where anno_registrazione < 2009 and (year(data_pagam) >= 2009 or year(data_pagam) is null) group by tipo_transazione;
  // riga 2-3
  // select tipo_transazione, id_cassa, sum(importo) from  transazioni where anno_registrazione < 2009 and year(data_pagam) = 2009 group by tipo_transazione, id_cassa
  // riga 4
  // somma righe 1-2-3
  // riga 5
  // select tipo_transazione, sum(importo) from  transazioni where anno_registrazione = 2009 group by tipo_transazione;
  // riga 6-7
  // select tipo_transazione, id_cassa, sum(importo) from  transazioni where anno_registrazione = 2009 and year(data_pagam) = 2009 group by tipo_transazione, id_cassa;
  // riga 8
  // somma righe 5-6-7
  // riga 9
  // somma righe 2+3+6+7
  // riga 10
  // somma righe 4+8

  // 3 - riepilogo patrimoniale
  // select tipo_transazione, id_cassa, sum (importo) from  transazioni where  year(data_pagam) = 2009 group by tipo_transazione, id_cassa
  //

    public function actionAnno()
    {
        if(isset($_GET['anno']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $headers="From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact',array('model'=>$model));
    }
  
?>
