<?php  
 //sort.php  
 include "konekcija.php";
 include "domain/porudzbine.php";
 include "domain/vrste.php";

 $output = '';  
 $order = $_POST["order"];

 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  

 $uslov = " ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $porudzbina = Porudzbina::vratiSve($mysqli, $uslov);
 $output .= '  
 <table class="table"> <tbody> 
      <tr>  
        <th><a class="column_sort" id="naziv" data-order="'.$order.'" href="#">Naziv</a></th>
        <th><a class="column_sort" id="cena" data-order="'.$order.'" href="#">Cena</a></th>
        <th><a class="column_sort" id="tip_porudzbine" data-order="'.$order.'" href="#">Tip porudžbine</a></th>
        <th><a class="column_sort" id="datum_porucivanja" data-order="'.$order.'" href="#">Datum poručivanja</a></th>
        <th>Vrsta predstave</th>
        <th>Opcije</th>     
      </tr>  
 ';  
 foreach($porudzbina as $por){
    $output = $output.'<tr>';
    $output = $output.'<td>'.$por->naziv.'</td>';
    $output = $output.'<td>'.$por->cena.'</td>';
    $output = $output.'<td>'.$por->tip_porudzbine.'</td>';
    $output = $output.'<td>'.$por->datum_porucivanja.'</td>';
    $output = $output.'<td>'.$por->vrsta->naziv_vrste.'</td>';
    $output = $output.'<td><a href="izmenaporudzbine.php?id='.$por->id_porudzbine.'">
    <img class="icon-images" src="img/refresh.png" width="20px" height="20px"/></a>
    <a href="brisanjeporudzbine.php?id='.$por->id_porudzbine.'"> 
    <img class="icon-images" src="img/trash.png" width="20px" height="20px" />
    </a></td>';
    $output = $output.'</tr>';
 }

 $output .= '</tbody></table>';  
 echo $output;  
 ?>  