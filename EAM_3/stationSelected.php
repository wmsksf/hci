<?php
    session_start();
    if (isset($_POST['select_station'])){
        $station = $_POST['select_station'];
    }
    else if (isset($_GET['go'])) {
        $station = $_GET['go'];
    }
    else{
        $station = "1";
    }
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>ΟΑΣΑ Λεωφορεία</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="css/colors.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.1/moment-with-locales.js"></script>
    <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>

    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

</head>
<body class="realestate_version">

    <!-- LOADER -->
    <div id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <!-- HEADER -->
    <?php include 'utils/header.php'; ?>

    <div class="all-title-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Λεωφορεία</h2>
				</div>
			</div>
		</div>
    </div>

    <!--SECOND SECTION-->
	<div class="about-box">
		<div class="container">
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index.php"><i class="fa fa-home global-radius fa-lg"></i></a></li>
                        <li>Λεωφορεία</li>
                    </ul>
                </nav>

            <div class="row">
                <div class="col-md-4 wow hidden-xs hidden-sm">

                    <ul class="nav nav-pills" id="mynav">
                        <li><a data-toggle="pill" href="#lines">Γραμμές</a></li>
                        <li class="active"><a data-toggle="pill" href="#stops">Στάσεις</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="lines" class="tab-pane fade">
                            <div class="contact_form">
                                <h2>Πληροφορίες Γραμμής</h2>
                                <form id="contactform1" class="row" name="contactform1" method="post" action="busSelected.php">
                                    <fieldset class="row-fluid">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                            <br/><h4>Επιλέξτε γραμμή:</h4>
                                            <select name="select_bus" id="select_bus" class="form-control" data-style="btn-white" data-live-search="true">
                                                <?php  

                                                    require('php_utils/db_connect.php');
                                                    $sql = mysqli_query($connection, "SELECT * FROM `buses`");
                                                    while ($row = $sql->fetch_assoc()){
                                                        echo "<option value=\"" . $row['id'] . "\">" . $row['id'] . " : " . $row['start'] . " - " . $row['end'] . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                            <h4>ή διεύθυνση:</h4>
                                            <input type="text" name="address1" id="address1" class="form-control" style="margin-top:5px;" placeholder="">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-8 text-center">
                                            <input type="submit" value=">>" name="submit1" id="submit1" class="btn btn-light btn-radius btn-brd grd1 btn-block">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                        <div id="stops" class="tab-pane fade in active">
                            <div class="contact_form">
                                <h2>Πληροφορίες Στάσης</h2>
                                <form id="contactform2" class="row" name="contactform2" method="post" action="stationSelected.php">
                                    <fieldset class="row-fluid">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                            <br/><h4>Επιλέξτε στάση:</h4>
                                            <select name="select_station" id="select_station" class="form-control" data-style="btn-white" data-live-search="true">
                                                <?php  

                                                require('php_utils/db_connect.php');
                                                $sql = mysqli_query($connection, "SELECT * FROM `stations`");
                                                while ($row = $sql->fetch_assoc()){
                                                    echo "<option ";
                                                    if($row['station'] == $station) echo "selected=\"selected\"";
                                                    echo " value=\"" . $row['station'] . "\">" . $row['station'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                            <h4>ή διεύθυνση:</h4>
                                            <input type="text" name="address2" id="address2" class="form-control" style="margin-top:5px;" placeholder="">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-lg-offset-8 text-center">
                                            <input type="submit" value=">>" name="submit2" id="submit2" class="btn btn-light btn-radius btn-brd grd1 btn-block">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div id="stationInfo">
                    <div class="col-md-8">
                        <h3 style="text-align: left; border-bottom:solid 1px #e1e1e1;">
                        <?php
                            echo "Πληροφορίες στάσης: " . $station . " " . "<i class=\"fa fa-heart\" style=\"float:right; line-height:25px\"></i>";
                        ?>
                        </h3>

                        <div id="map"></div>
                        </br>
                        <h4 style="float: left">Βρες διαδρομή: </h4></br>
                        <ul class="nav nav-pills nav-fill" id="direction_nav">
                            <li style="width:50%; margin-left:-16% !important"><a href="routePlanner.php#Από:<?php echo $station?>">Από τη στάση</a></li>
                            <li style="width:50%"><a href="routePlanner.php#Προς:<?php echo $station?>">Προς τη στάση</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--END OF SECOND SECTION-->

    <!--FOOTER-->
    <?php include 'utils/footer.php'; ?>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxGFJJ5M8-O_JCjSR-Ib5U_53P4Hpj2uk&libraries=places&language=el&callback=displayStation"></script>
    <script>
        function displayStation() {
            initMap();
            <?php
                if($station != "1")
                echo "var request = {
                    query: '".$station."',
                    fields: ['name', 'geometry'],
                };"
            ?>
            
            var infowindow = new google.maps.InfoWindow();
            var service = new google.maps.places.PlacesService(map);
                    
            service.findPlaceFromQuery(request, function(results, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                    map.setCenter(results[0].geometry.location);
                    map.setZoom(16);

                    google.maps.event.addListener(marker, 'click', function() {
                        var content = '<h4>' + results[0].name + '</h4>';
                        <?php
                            require('php_utils/db_connect.php');
                            $sql = mysqli_query($connection, "SELECT * FROM `stations` where station = '$station'");
                            $row = $sql->fetch_assoc();
                            if ($row['is_accessible'] == 0)
                                echo "content += 'Όχι προσβάσιμη στάση';";
                            else
                                echo "content += 'Προσβάσιμη στάση';";
                        ?>
                        
                        infowindow.setContent(content);
                        infowindow.open(map, marker);
                    });
                }
            });
        }
    </script>

</body>
</html>