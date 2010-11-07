<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css" />

<?php
$this->breadcrumbs=array(
    'Bilancio',
);

//$this->menu=SubMenu::bilancio();

?>

<h1>Rendiconto <?php echo $searchModel->anno; ?></h1>

<h2>Riepilogo cassa</h2>

<!--p><?php print_r($bilancio["cassa"]); ?></p-->

<div id="cassa-grid" class="grid-view">
<table class='items'>
    <tr><th>Descrizione</th><th>Contanti</th><th>Banca</th><th>Totale</th></tr>
    <tr>
        <td>Saldo cassa iniziale</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["prec_conto_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["prec_conto_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["prec"]); ?></td>
    </tr>
    <tr>
        <td>Entrate</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_conto_E_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_conto_E_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_E"]); ?></td>
    </tr>
    <tr>
        <td>Uscite</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_conto_U_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_conto_U_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_U"]); ?></td>
    </tr>
    <tr>
        <td>Giroconti</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_conto_G_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_conto_G_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_tipo_G"]); ?></td>
    </tr>
    <tr class='summary'>
        <td>Saldo</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_conto_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot_conto_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["cassa"]["tot"]); ?></td>
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
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["precnonpag_tipo_E"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["precnonpag_tipo_U"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["precnonpag_tipo_E"]+$bilancio["pagam"]["precnonpag_tipo_U"]); ?></td>
    </tr>
    <tr>
        <td>Pagato anni prec. (c)</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_precnonpag_tipo_conto_E_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_precnonpag_tipo_conto_U_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_precnonpag_tipo_conto_E_c"]+$bilancio["pagam"]["pag_precnonpag_tipo_conto_U_c"]); ?></td>
    </tr>
    <tr>
        <td>Pagato anni prec. (b)</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_precnonpag_tipo_conto_E_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_precnonpag_tipo_conto_U_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_precnonpag_tipo_conto_E_b"]+$bilancio["pagam"]["pag_precnonpag_tipo_conto_U_b"]); ?></td>
    </tr>
    <tr>
        <td>Non pagato anni prec.</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["nonpag_precnonpag_tipo_E"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["nonpag_precnonpag_tipo_U"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["nonpag_precnonpag_tipo_E"]+$bilancio["pagam"]["nonpag_precnonpag_tipo_U"]); ?></td>
    </tr>
    <tr><td colspan="4"></td></tr>
    <tr>
        <td>Totale anno corr.</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["corr_tipo_E"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["corr_tipo_U"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["corr_tipo_E"]+$bilancio["pagam"]["corr_tipo_U"]); ?></td>
    </tr>
    <tr>
        <td>Pagato anno corr. (b)</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_corr_tipo_conto_E_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_corr_tipo_conto_U_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_corr_tipo_conto_E_b"]+$bilancio["pagam"]["pag_corr_tipo_conto_U_b"]); ?></td>
    </tr>
    <tr>
        <td>Pagato anno corr. (c)</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_corr_tipo_conto_E_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_corr_tipo_conto_U_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["pag_corr_tipo_conto_E_c"]+$bilancio["pagam"]["pag_corr_tipo_conto_U_c"]); ?></td>
    </tr>
    <tr>
        <td>Non pagato anno corr.</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["nonpag_corr_tipo_E"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["nonpag_corr_tipo_U"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["nonpag_corr_tipo_E"]+$bilancio["pagam"]["nonpag_corr_tipo_U"]); ?></td>
    </tr>
    <tr><td colspan="4"></td></tr>
    <tr class='summary'>
        <td>Totale pagato</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["tot_conto_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["tot_conto_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["tot"]); ?></td>
    </tr>
    <tr class='summary'>
        <td>Totale non pagato</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["tot_conto_c"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["tot_conto_b"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["pagam"]["tot"]); ?></td>
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
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["saldocassa"] > 0) ? $bilancio["patrim"]["saldocassa"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["saldocassa"] < 0) ? -1*$bilancio["patrim"]["saldocassa"] : "") ?></td>
    </tr>
    <tr>
        <td>Saldo cumulativo gestioni prec.</td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["saldogestioni_prec"] < 0) ? -1*$bilancio["patrim"]["saldogestioni_prec"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["saldogestioni_prec"] > 0) ? $bilancio["patrim"]["saldogestioni_prec"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/condomini prec.</td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vcond_prec"] > 0) ? $bilancio["patrim"]["sit_vcond_prec"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vcond_prec"] < 0) ? -1*$bilancio["patrim"]["sit_vcond_prec"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/condomini corr.</td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vcond_corr"] > 0) ? $bilancio["patrim"]["sit_vcond_corr"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vcond_corr"] < 0) ? -1*$bilancio["patrim"]["sit_vcond_corr"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/fornitori prec.</td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vforn_prec"] > 0) ? $bilancio["patrim"]["sit_vforn_prec"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vforn_prec"] < 0) ? -1*$bilancio["patrim"]["sit_vforn_prec"] : "") ?></td>
    </tr>
    <tr>
        <td>Crediti/debiti v/fornitori corr.</td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vforn_corr"] > 0) ? $bilancio["patrim"]["sit_vforn_corr"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["sit_vforn_corr"] < 0) ? -1*$bilancio["patrim"]["sit_vforn_corr"] : "") ?></td>
    </tr>
    <tr>
        <td>Risultato di gestione corr.</td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["risgestione_corr"] < 0) ? -1*$bilancio["patrim"]["risgestione_corr"] : "") ?></td>
        <td class="al-right"><?php echo U::num_d2(($bilancio["patrim"]["risgestione_corr"] > 0) ? $bilancio["patrim"]["risgestione_corr"] : "") ?></td>
    </tr>
    <tr><td colspan="3"></td></tr>
    <tr class='summary'>
        <td>Totale a pareggio</td>
        <td class="al-right"><?php echo U::num_d2($bilancio["patrim"]["tot_pareggio_att"]); ?></td>
        <td class="al-right"><?php echo U::num_d2($bilancio["patrim"]["tot_pareggio_pas"]); ?></td>
    </tr>
</table>

</div>