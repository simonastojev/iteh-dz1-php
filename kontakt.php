<!DOCTYPE html>
<html>
<head>

    <?php
        include('head.php');
    ?>
     <title>Kontakt</title>
</head>

<body> 
    <?php
        include('header.php');
    ?>
    <div id="background-img">
    </div>
  
    <div id="welcome-div" class="row">
      <div>

        <br></br>
        <br></br>
        

        <a href="http://www.instagram.com/balonibeograd" class="btn-round-custom">Posetite našu Instagram stranicu!</a>
        <div class="col-md-5"></div>
        <h1>Kako doći do nas?</h1>
        <div id="map"> </div>
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBODkbePCNXqkoTPBXBVayTFnTTCG4PTdY&callback=initMap">
    </script>
    </div>

    <div class="row">
    <br></br>

        <div id="ukras" class="col-20">
            <img id="uni-logos-img" src="img/ukras.jpg" alt="">
        </div>
    </div>

<script>
        function initMap() {
            var dumbo = {lat: 40.700802, lng:73.987602};
            var mapOptions = {
                center: dumbo,
                zoom: 10
            };
            var googlemap = new google.maps.Map(document.getElementById("map"), mapOptions);
        }
    </script>
</body>

</html>