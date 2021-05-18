<!DOCTYPE html>
<?php
include "server/konekcija.php";
include "server/domain/vrste.php";
include "server/domain/porudzbine.php";

$id = $_GET['id'];

$porudzbina = Porudzbina::vratiSve($mysqli," where p.id_porudzbine=".$id);
$vrsta = Vrsta::vratiSve($mysqli);
$poruka = '';

if (isset($_POST['update'])) {
    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    $tip_porudzbine = $_POST['tip_porudzbine'];
    $datum_porucivanja = $_POST['datum_porucivanja'];
    $vrsta = $_POST['vrsta'];       

    $mysqli->query("UPDATE porudzbine SET naziv = '$naziv', cena = '$cena', tip_porudzbine = '$tip_porudzbine', datum_porucivanja = '$datum_porucivanja',id_vrste = '$vrsta' WHERE id_porudzbine = $id");
    header('location: katalog.php');
}
 ?>

<html>

<head>
    <?php
        include('head.php');
    ?>

    <title>Izmena porudžbina balona</title>

</head>

<body>
    <div id="background-img">
    </div>

    <?php
        include('header.php');
    ?>

    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
        </div>
    </div>
    <div id="insert-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="baloni-img" class="col-md-4"></div>
        <div class="col-md-4">

            <form style="padding: 15px;" class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label for="naziv">Naziv porudžbine:</label>
                    <input type="text" class="form-control" name="naziv" id="naziv"
                        value="<?php echo $porudzbina[0]->naziv; ?>">
                </div>
                <div class="form-group">
                    <label for="cena">Cena porudžbine:</label>
                    <input type="text" class="form-control" name="cena" id="cena"
                        value="<?php echo $porudzbina[0]->cena; ?>">
                </div>
                <div class="form-group">
                    <label for="tip_porudzbine">Tip porudžbine:</label>
                    <input type="text" class="form-control" name="tip_porudzbine" id="tip_porudzbine"
                        value="<?php echo $porudzbina[0]->tip_porudzbine; ?>">
                </div>
                <div class="form-group">
                    <label for="datum_porucivanja">Datum poručivanja:</label>
                    <input type="datetime-local" class="form-control" min="2000-01-01" max = "2050-12-31" name="datum_porucivanja" id="datum_porucivanja" placeholder="Unesite datum poručivanja"
                        value="<?php echo $porudzbina[0]->datum_porucivanja; ?>">
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
                    <button type="submit" id="update" name="update" class="btn-round-custom">Sačuvaj izmene</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>