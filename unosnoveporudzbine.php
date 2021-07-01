<!DOCTYPE html>

<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/porudzbine.php";


$vrsta = Vrsta::vratiSve($mysqli);

if(isset( $_POST['dodaj'] )){
	
	$naziv = trim($_POST['naziv']);
	$cena = trim($_POST['cena']);
    $tip_porudzbine = trim($_POST['tip_porudzbine']);
    $datum_porucivanja = trim($_POST['datum_porucivanja']);
    $vrsta = $_POST['vrsta'];
	
	$data = Array (
				"naziv" => $naziv, 
				"cena" => $cena,
				"tip_porudzbine" => $tip_porudzbine,					
				"datum_porucivanja" => $datum_porucivanja,					
                "id_vrste" => $vrsta,    
        );	
        
	$porudzbina = new Porudzbina (null, $naziv, $cena, $tip_porudzbine, $datum_porucivanja, $vrsta);
		
		$porudzbina->ubaciPorudzbinu ($data, $mysqli);
		
        $porudzbina = $porudzbina->getPoruka();
        header("Location:unosnoveporudzbine.php");
        
}
?>

<html>

<head>
    <?php
        include('head.php');
    ?>
    <title>Unos nove porudžbine</title>
</head>

<body>
    <div id = "background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class = "row">
        <div id = "uni-logos-wrapper" class = "col-12">
            
        </div>
    </div>
    <div id = "insert-form" class="row form-container">
        <div class = "col-md-2"></div>
        <div id = "baloni-img" class = "col-md-4"></div>
        <div class = "col-md-4">
            <form name = "unosPorudzbine" action="" onsubmit = "return validateForm()" method = "POST" role = "form">
                <div class = "form-group">
                    <label for="naziv">Naziv porudžbine:</label>
                    <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Unesite naziv porudžbine">
                </div>
                <div class="form-group">
                    <label for="cena">Cena porudžbine:</label>
                    <input type="text" class="form-control" name="cena" id="cena" placeholder="Unesite cenu porudžbine">

                </div>
                <div class="form-group">
                    <label for="tip_porudzbine">Tip porudžbine:</label>
                    <input type="text" class="form-control" name="tip_porudzbine" id="tip_porudzbine" placeholder="Unesite tip porudžbine">
                </div>

                <div class="form-group">
                    <label for="datum_porucivanja">Datum poručivanja:</label>
                    <input type="datetime-local" class="form-control" min="2000-01-01" max = "2050-12-31" name="datum_porucivanja" id="datum_porucivanja" placeholder="Unesite datum poručivanja">
                </div>

                <div class="form-group">
                    <label for="vrsta">Vrsta porudžbine:</label>

                    <select class="form-control" name="vrsta" id="vrsta">
                        <?php foreach($vrsta as $v): ?>
                        <option value="<?php echo $v->id_vrste;?>">
                            <?php echo $v->naziv_vrste;?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Dodaj porudžbinu</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>