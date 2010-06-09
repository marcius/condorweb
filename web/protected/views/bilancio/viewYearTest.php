<?php
$this->breadcrumbs=array(
    'Bilancio',
);

$this->menu=array(
    array('label'=>'Bilancio 2009', 'url'=>array('viewYear')),
    array('label'=>'Create Bilancio', 'url'=>array('create')),
    array('label'=>'Manage Bilancio', 'url'=>array('admin')),
);
?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>


<p>You may change the content of this page by modifying the file <tt><?php echo __FILE__; ?></tt>.</p>

<h1>Riepilogo cassa</h1>

<p><?php print_r($bilancio["cassa"]); ?></p>

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
<td>Contanti</td>
<td><? echo $riepPatr["Ec"] ?></td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr class='summary'>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
</table>
</div>

<h1>Riepilogo pagamenti</h1>

<p><?php print_r($bilancio["pagam"]); ?></p>

<div id="pagam-grid" class="grid-view">
<table class='items'>
<tr><th>Descrizione</th><th>Contanti</th><th>Banca</th><th>Totale</th></tr>
<tr>
<td>Saldo cassa iniziale</td>
<td><? echo $bilancio["cassa"]["prec_conto_c"] ?></td>
<td><? echo $bilancio["cassa"]["prec_conto_b"] ?></td>
<td><? echo $bilancio["cassa"]["prec"] ?></td>
</tr>
<tr>
<td>Entrate</td>
<td>Contanti</td>
<td><? echo $riepPatr["Ec"] ?></td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr class='summary'>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
</table>

</div>

<h1>Riepilogo patrimoniale</h1>

<p><?php print_r($bilancio["patrim"]); ?></p>

<div id="patrim-grid" class="grid-view">
<table class='items'>
<tr><th>Descrizione</th><th>Contanti</th><th>Banca</th><th>Totale</th></tr>
<tr>
<td>Saldo cassa iniziale</td>
<td><? echo $bilancio["cassa"]["prec_conto_c"] ?></td>
<td><? echo $bilancio["cassa"]["prec_conto_b"] ?></td>
<td><? echo $bilancio["cassa"]["prec"] ?></td>
</tr>
<tr>
<td>Entrate</td>
<td>Contanti</td>
<td><? echo $riepPatr["Ec"] ?></td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
<tr class='summary'>
<td>bbbbbbb</td>
<td>bbbbbbb</td>
<td>aaaaaaa</td>
<td>bbbbbbb</td>
</tr>
</table>

</div>