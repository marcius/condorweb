<?php
$this->breadcrumbs=array(
    'Bilancio',
);

$this->menu=SubMenu::bilancio();

?>

<h1>Bilancio <?php echo $searchModel->anno; ?></h1>

<h2>Riepilogo per causale</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'placeholders-values',
        'dataProvider'=>$dpRiepCausali,
        'columns'=>array(
            'descrizione:text:Causale',
            'preventivo:number:Preventivo',
            'consuntivo:number:Consuntivo',
            'saldo:number:Saldo',
    ),
)); ?>

<h2>Riepilogo cassa</h2>

<!--p><?php print_r($bilancio["cassa"]); ?></p-->

<div id="cassa-grid" class="grid-view">
<table class='items'>
    <tr><th>Descrizione</th><th>Contanti</th><th>Banca</th><th>Totale</th></tr>
    <tr>
        <td>Saldo cassa iniziale</td>
        <td><?php echo $bilancio["cassa"]["prec_conto_c"]; ?></td>
        <td><?php echo $bilancio["cassa"]["prec_conto_b"]; ?></td>
        <td><?php echo $bilancio["cassa"]["prec"]; ?></td>
    </tr>
    <tr>
        <td>Entrate</td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_conto_E_c"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_conto_E_b"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_E"]; ?></td>
    </tr>
    <tr>
        <td>Uscite</td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_conto_U_c"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_conto_U_b"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_U"]; ?></td>
    </tr>
    <tr>
        <td>Giroconti</td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_conto_G_c"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_conto_G_b"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_tipo_G"]; ?></td>
    </tr>
    <tr class='summary'>
        <td>Saldo</td>
        <td><?php echo $bilancio["cassa"]["tot_conto_c"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot_conto_b"]; ?></td>
        <td><?php echo $bilancio["cassa"]["tot"]; ?></td>
    </tr>
</table>
</div>

<h2>Riepilogo pagamenti</h2>

<!--p><?php print_r($bilancio["pagam"]); ?></p-->

<div id="pagam-grid" class="grid-view">
<table class='items'>
<tr><th>Descrizione</th><th>Entrate</th><th>Uscite</th><th>Saldo</th></tr>
    <tr>
        <td>Totale anni prec.</td>
        <td><?php echo $bilancio["pagam"]["precnonpag_tipo_E"]; ?></td>
        <td><?php echo $bilancio["pagam"]["precnonpag_tipo_U"]; ?></td>
        <td><?php echo $bilancio["pagam"]["precnonpag_tipo_E"]+$bilancio["pagam"]["precnonpag_tipo_U"]; ?></td>
    </tr>
    <tr>
        <td>Pagato anni prec. (c)</td>
        <td><?php echo $bilancio["pagam"]["pag_precnonpag_tipo_conto_E_c"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_precnonpag_tipo_conto_U_c"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_precnonpag_tipo_conto_E_c"]+$bilancio["pagam"]["pag_precnonpag_tipo_conto_U_c"]; ?></td>
    </tr>
    <tr>
        <td>Pagato anni prec. (b)</td>
        <td><?php echo $bilancio["pagam"]["pag_precnonpag_tipo_conto_E_b"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_precnonpag_tipo_conto_U_b"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_precnonpag_tipo_conto_E_b"]+$bilancio["pagam"]["pag_precnonpag_tipo_conto_U_b"]; ?></td>
    </tr>
    <tr>
        <td>Non pagato anni prec.</td>
        <td><?php echo $bilancio["pagam"]["nonpag_precnonpag_tipo_E"]; ?></td>
        <td><?php echo $bilancio["pagam"]["nonpag_precnonpag_tipo_U"]; ?></td>
        <td><?php echo $bilancio["pagam"]["nonpag_precnonpag_tipo_E"]+$bilancio["pagam"]["nonpag_precnonpag_tipo_U"]; ?></td>
    </tr>
    <tr><td></td></tr>
    <tr>
        <td>Totale anno corr.</td>
        <td><?php echo $bilancio["pagam"]["corr_tipo_E"]; ?></td>
        <td><?php echo $bilancio["pagam"]["corr_tipo_U"]; ?></td>
        <td><?php echo $bilancio["pagam"]["corr_tipo_E"]+$bilancio["pagam"]["corr_tipo_U"]; ?></td>
    </tr>
    <tr>
        <td>Pagato anno corr. (b)</td>
        <td><?php echo $bilancio["pagam"]["pag_corr_tipo_conto_E_b"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_corr_tipo_conto_U_b"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_corr_tipo_conto_E_b"]+$bilancio["pagam"]["pag_corr_tipo_conto_U_b"]; ?></td>
    </tr>
    <tr>
        <td>Pagato anno corr. (c)</td>
        <td><?php echo $bilancio["pagam"]["pag_corr_tipo_conto_E_c"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_corr_tipo_conto_U_c"]; ?></td>
        <td><?php echo $bilancio["pagam"]["pag_corr_tipo_conto_E_c"]+$bilancio["pagam"]["pag_corr_tipo_conto_U_c"]; ?></td>
    </tr>
    <tr>
        <td>Non pagato anno corr.</td>
        <td><?php echo $bilancio["pagam"]["nonpag_corr_tipo_E"]; ?></td>
        <td><?php echo $bilancio["pagam"]["nonpag_corr_tipo_U"]; ?></td>
        <td><?php echo $bilancio["pagam"]["nonpag_corr_tipo_E"]+$bilancio["pagam"]["nonpag_corr_tipo_U"]; ?></td>
    </tr>
    <tr><td></td></tr>
    <tr class='summary'>
        <td>Totale pagato</td>
        <td><?php echo $bilancio["pagam"]["tot_conto_c"]; ?></td>
        <td><?php echo $bilancio["pagam"]["tot_conto_b"]; ?></td>
        <td><?php echo $bilancio["pagam"]["tot"]; ?></td>
    </tr>
    <tr class='summary'>
        <td>Totale non pagato</td>
        <td><?php echo $bilancio["pagam"]["tot_conto_c"]; ?></td>
        <td><?php echo $bilancio["pagam"]["tot_conto_b"]; ?></td>
        <td><?php echo $bilancio["pagam"]["tot"]; ?></td>
    </tr>
</table>

</div>

<h2>Riepilogo patrimoniale</h2>

<!--p><?php print_r($bilancio["patrim"]); ?></p-->

<div id="patrim-grid" class="grid-view">
<table class='items'>
        <tr><th>Descrizione</th><th>Attivo</th><th>Passivo</th></tr>
    <tr>
        <td>Saldo cassa a fine anno</td>
        <td><?php echo (($bilancio["patrim"]["saldocassa"] > 0) ? $bilancio["patrim"]["saldocassa"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["saldocassa"] < 0) ? -1*$bilancio["patrim"]["saldocassa"] : "") ?></td>
    </tr>
    <tr>
        <td>Saldo cumulativo gestioni prec.</td>
        <td><?php echo (($bilancio["patrim"]["saldogestioni_prec"] < 0) ? -1*$bilancio["patrim"]["saldogestioni_prec"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["saldogestioni_prec"] > 0) ? $bilancio["patrim"]["saldogestioni_prec"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/condomini prec.</td>
        <td><?php echo (($bilancio["patrim"]["sit_vcond_prec"] > 0) ? $bilancio["patrim"]["sit_vcond_prec"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["sit_vcond_prec"] < 0) ? -1*$bilancio["patrim"]["sit_vcond_prec"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/condomini corr.</td>
        <td><?php echo (($bilancio["patrim"]["sit_vcond_corr"] > 0) ? $bilancio["patrim"]["sit_vcond_corr"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["sit_vcond_corr"] < 0) ? -1*$bilancio["patrim"]["sit_vcond_corr"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/fornitori prec.</td>
        <td><?php echo (($bilancio["patrim"]["sit_vforn_prec"] > 0) ? $bilancio["patrim"]["sit_vforn_prec"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["sit_vforn_prec"] < 0) ? -1*$bilancio["patrim"]["sit_vforn_prec"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/fornitori corr.</td>
        <td><?php echo (($bilancio["patrim"]["sit_vforn_corr"] > 0) ? $bilancio["patrim"]["sit_vforn_corr"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["sit_vforn_corr"] < 0) ? -1*$bilancio["patrim"]["sit_vforn_corr"] : "") ?></td>
    </tr>
    <tr>
        <td>Risultato di gestione corr.</td>
        <td><?php echo (($bilancio["patrim"]["risgestione_corr"] < 0) ? -1*$bilancio["patrim"]["risgestione_corr"] : "") ?></td>
        <td><?php echo (($bilancio["patrim"]["risgestione_corr"] > 0) ? $bilancio["patrim"]["risgestione_corr"] : "") ?></td>
    </tr>
    <tr><td></td></tr>
    <tr class='summary'>
        <td>Totale a pareggio</td>
        <td><?php echo $bilancio["patrim"]["tot_pareggio_att"]; ?></td>
        <td><?php echo $bilancio["patrim"]["tot_pareggio_pas"]; ?></td>
    </tr>
</table>

</div>