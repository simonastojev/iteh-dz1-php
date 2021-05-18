<?php

$id = $_GET['id_vrste'];

include "konekcija.php";
include "domain/porudzbine.php";
include "domain/vrste.php";

$result = Porudzbina::vratiSve($mysqli, ' where p.id_vrste ='.$id);

 $nalepi = '<table class="table "><thead><tr><th>Naziv porudžbine</th><th>Cena</th><th>Tip porudžbine</th><th>Datum poručivanja</th><th>Status porudžbine</th></thead><tbody>';

 foreach($result as $por){
    $nalepi = $nalepi.'<tr>';
    $nalepi = $nalepi.'<td>'.$por->naziv.'</td>';
    $nalepi = $nalepi.'<td>'.$por->cena.'</td>';
    $nalepi = $nalepi.'<td>'.$por->tip_porudzbine.'</td>';
    $nalepi = $nalepi.'<td>'.$por->datum_porucivanja.'</td>';
    $nalepi = $nalepi.'<td>'.$por->vrsta->naziv_vrste.'</td>';
    $nalepi = $nalepi.'</tr>';
 }
 
$nalepi = $nalepi.'</tbody></table>';          


echo($nalepi);


 ?>