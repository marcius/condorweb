<?php
$this->breadcrumbs=array(
    'Bilancios',
);

$this->menu=array(
    array('label'=>'Bilancio 2009', 'url'=>array('viewYear')),
    array('label'=>'Create Bilancio', 'url'=>array('create')),
    array('label'=>'Manage Bilancio', 'url'=>array('admin')),
);
?>

<h1>Bilancio</h1>

<div class="wide form">

<?php echo CHtml::beginForm(); ?>

    <?php echo CHtml::errorSummary($searchModel); ?>
    <div class="row">
        <div class="column">
            <?php echo CHtml::activeLabelEx($searchModel,'anno'); ?>
            <?php echo CHtml::activeDropDownList($searchModel,'anno', 
                array('2007'=>'2007', '2008'=>'2008', '2009'=>'2009', '2010'=>'2010'),
                array('prompt'=>' ')
                ); ?>
            <?php echo CHtml::error($searchModel,'anno'); ?>
        </div>
    </div>

<?php echo CHtml::endForm(); ?>

    <div class="row">
        <div class="column">
            <button onclick="ShowBilancio();">Elabora bilancio</button>
        </div>
    </div>


    <div class="row">

<br/>  

<?php $this->widget('ext.jqgrid.CJuiJqGrid', array(
         'htmlOptions'=>array(
             'id'=>'riepilogopatrimoniale',
         ),
         'navbar'=>false,
         'options'=>array(
             //'hiddengrid'=>true,
             'height'=>'auto',
             'datatype'=>'json',
             'colNames'=>array('tipo_transazione','id_cassa', 'sum_importo'), 
             'colModel'=>array( 
                array('index'=>'tipo_transazione', 'name'=>'tipo_transazione', 'width'=>'40'),
                array('index'=>'id_cassa', 'name'=>'id_cassa', 'width'=>'80'),
                array('index'=>'sum_importo', 'name'=>'sum_importo', 'align'=>'right', 'width'=>'60', 'formatter'=>'number'),
             ),
             'rowNum'=>-1,
             'sortname'=>'tipo_transazione',
             'sortorder'=>'desc',
             'caption'=>"Riepilogo patrimoniale",
            // 'viewrecords'=>false,
            // 'footerrow' => true,
            // 'userDataOnFooter' => true,
             'jsonReader'=>array('repeatitems'=>false, 'id' => "0"),
         )
     )
 );
 ?>     

    </div>
 </div>


 
<?php 

    
Yii::app()->getClientScript()->registerScript("1",
    "jQuery('#accounttotals_grid').jqGrid('setGridParam',{
        onSelectRow : function(id) {
            doSearchT(id);
        }
    });");
    
Yii::app()->getClientScript()->registerScript("2",
    "jQuery('#transactionlist_grid').jqGrid('setGridParam',{
        jsonReader : {repeatitems: false, id: \"0\" }
    });");    

Yii::app()->getClientScript()->registerScript("3",
    "jQuery('#transactionlist_grid').jqGrid('setGridParam',{
        onSelectRow : function(id) {
            doSearchP(id);
        }
    });");
?>      
    
<script type="text/javascript"> 

function searchTransactions() {
    toggleGridState('#accounttotals_grid', 'visible');
    doSearchT(jQuery('#PaymentSearch_account_id').val());
}

function ShowBilancio() {
    doSearchB();
}

function doSearchB(){
    var search_url = "/index.php?r=bilancio/jsonRiepilogoPatrimoniale"
        + "&anno=2009&" + jQuery('#Search_anno').val()
        ;
//    alert(search_url);
    jQuery('#riepilogopatrimoniale_grid').jqGrid('setGridParam', {url:search_url, page:1}).trigger('reloadGrid');
} 

function doSearchT(sel_account_id){
    //alert(sel_account_id);
    var search_url = "/index.php?r=statistics/jsonTransactionList"
        + "&date_from=" + jQuery('#PaymentSearch_date_from').val()
        + "&date_to=" + jQuery('#PaymentSearch_date_to').val()
        + "&account_id=" + sel_account_id
        + "&sign=" + jQuery('#PaymentSearch_sign').val()
        + "&recipient_subject_id=" + jQuery('#PaymentSearch_recipient_subject_id').val()
        + "&ref_period_date_to=" + jQuery('#PaymentSearch_ref_period_date_to').val()
        + "&ref_period_date_from=" + jQuery('#PaymentSearch_ref_period_date_from').val()
        + "&actual_payer_subject_id=" + jQuery('#PaymentSearch_actual_payer_subject_id').val()
        + "&expected_payer_subject_id=" + jQuery('#PaymentSearch_expected_payer_subject_id').val()
        + "&amount_min=" + jQuery('#PaymentSearch_amount_min').val()
        + "&amount_max=" + jQuery('#PaymentSearch_amount_max').val()
        + "&counterparty=" + jQuery('#PaymentSearch_counterparty').val()
        + "&description=" + jQuery('#PaymentSearch_description').val()
        + "&include_accounts=" + jQuery('#PaymentSearch_include_accounts').val()
        + "&payment_type_id=" + jQuery('#PaymentSearch_payment_type_id').val()
        + "&diff_payers=" + jQuery('#PaymentSearch_diff_payers').is(':checked')
        + "&statement=" + jQuery('#PaymentSearch_statement').val()
        ;
//    alert(search_url);
    jQuery('#transactionlist_grid').jqGrid('setGridParam', {url:search_url, page:1}).trigger('reloadGrid');
    toggleGridState('#transactionlist_grid', 'hidden');
    toggleGridState('#paymentlist_grid', 'visible');
} 

function doSearchP(sel_transaction_id){
    //alert(sel_account_id);
    var search_url = "/index.php?r=statistics/jsonPaymentList"
        + "&transaction_id=" + sel_transaction_id
        ;
//    alert(search_url);
    jQuery('#paymentlist_grid').jqGrid('setGridParam', {url:search_url, page:1}).trigger('reloadGrid');
    toggleGridState('#paymentlist_grid', 'hidden');
//    if ($("#paymentlist_grid").jqGrid('getGridParam', 'gridstate') == "hidden") {
//        $(".HeaderButton", $('#paymentlist_grid')[0].grid.cDiv).trigger("click");
//    }
} 

function toggleGridState(grid, state){
    if ($(grid).jqGrid('getGridParam', 'gridstate') == state) {
        $(".HeaderButton", $(grid)[0].grid.cDiv).trigger("click");
    }
}

</script> 

