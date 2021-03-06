<?php
    session_start();
    if ( isset( $_SESSION['user_id']))
    {
        header('Location: userProfile.php');
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
    <title>ΟΑΣΑ Είσοδος/Εγγραφή</title>  
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

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body class="realestate_version">

    <!-- LOADER -->
    <div id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div><!-- end loader -->
    <!-- END LOADER -->
   
    <!-- HEADER -->
    <?php include 'utils/uheader.php'; ?>
	
    <!-- SECTION -->
	<div id="support" class="section wb">
        <div class="container" style="padding-top: 5%;">
            <div class="row">
            <?php
                if (isset($_GET['error'])) 
                {
                    if ($_GET['error'] == 'invalidcredentials') 
                        { echo "</br><div class='section-title text-center'> <h4><b>Ανεπιτυχής είσοδος! Δοκιμάστε ξανά.</b></h4></br>"; }
                    else if ($_GET['error'] == 'emailinuse')  
                        { echo "</br><div class='section-title text-center'> <h4><b>Ανεπιτυχής εγγραφή! Το email που εισήχθει χρησιμοποιείται ήδη.</b></h4></br>"; }
                    else if ($_GET['error'] == 'err')  
                    { echo "</br><div class='section-title text-center'> <h4><b>Κάτι πήγε λάθος κατά την εγγραφή!</b></h4></br>"; }
                    else if ($_GET['error'] == 'passwordMatch')  
                    { echo "</br><div class='section-title text-center'> <h4><b>Οι κωδικοί δεν ταιριάζουν.</b></h4></br>"; }
                }
            //     if (isset($_GET['reg']))
            //         { echo "</br><div class='section-title text-center'> <h4><b>Επιτυχής εγγραφή! Μπορείτε πλέον να συνδεθείτε με τον νέο σας λογαριασμό.</b></h4></br>"; }
            ?>
                <!-- in order to center nav-pills  -->
                <div class="col-md-4 wow hidden-xs hidden-sm"></div>

                <div class="col-md-4 wow hidden-xs hidden-sm">

                <ul class="nav nav-pills" id="mynav" style="position: center;">
                    <li id="loginli"><a data-toggle="pill" href="#login">Είσοδος</a></li>
                    <li id="signinli"><a data-toggle="pill" href="#signin">Εγγραφή</a></li>
                    <script>
                        if (location.hash == '#signin')
                            document.getElementById("signinli").classList.add('active');
                        else
                            document.getElementById("loginli").classList.add('active');

                        window.onload = function Scrolldown() {
                            window.scroll(0,0); 
                        };     
                    </script>
                </ul>
    
                <div class="tab-content">
                    <div id="login" class="tab-pane fade in">
                        <div class="contact_form" style="margin-bottom:50px;">
                            <form id="login-form" method="post" action="php_utils/authen_login.php">
                                <input type="email" style="margin-bottom: 5px;" name="user_id" class="username form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required oninvalid="setCustomValidity('Άδειο πεδίο ή μη έγκυρο email! Προσθέστε έγκυρο email.')" oninput="setCustomValidity('')"/>
                                <a href="" style="color: #00599C; float:right; font-size:14px;"> Ξέχασα email</a>
                                
                                <input type="password" style="margin-bottom: 5px;" name="user_pass" class="password form-control" placeholder="Συνθηματικό" pattern=".{6,}"  required oninvalid="setCustomValidity('Άδειο πεδίο ή συνθηματικό με λιγότερο από 6 χαρακτήρες! Προσθέστε έγκυρο συνθηματικό.')" oninput="setCustomValidity('')"/>
                                <a href="" style="color: #00599C; float:right; font-size:14px;"> Ξέχασα συνθηματικό</a>
                                
                                <button id="submit" class="btn login" type="submit" value="SEND" style="background-color:#00599C;">Είσοδος</button>
                            </form>
                        </div>
                    </div>
    
                    
                    <div id="signin" class="tab-pane fade in">
                        <div class="contact_form" style="margin-bottom:50px;">
                            <form id="register-form" method="post" action="php_utils/register.php">
                                <input type="text" name="username" class="username form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required oninvalid="setCustomValidity('Άδειο πεδίο ή μη έγκυρο email! Προσθέστε έγκυρο email.')" oninput="setCustomValidity('')"/>
                                <input name="password1" class="password form-control" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Άδειο πεδίο ή συνθηματικό με λιγότερο από 6 χαρακτήρες! Προσθέστε έγκυρο συνθηματικό.' : ''); if(this.checkValidity()) form.password2.pattern = this.value;" placeholder="Συνθηματικό" required>
                                <input name="password2" type="password" class="password form-control" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Τα συνθηματικά πρέπει να ταιριάζουν.' : '');" placeholder="Επιβεβαίωση συνθηματικού" required>
                                <input type="text" name="name" class="username form-control" placeholder="Όνομα" required oninvalid="setCustomValidity('Άδειο πεδίο! Προσθέστε όνομα.')" oninput="setCustomValidity('')"/>
                                <input type="text" name="surname" class="username form-control" placeholder="Επώνυμο" required oninvalid="setCustomValidity('Άδειο πεδίο! Προσθέστε επώνυμο.')" oninput="setCustomValidity('')"/>
                                <input type="text" name="address" class="username form-control" placeholder="Διεύθυνση" required oninvalid="setCustomValidity('Άδειο πεδίο! Προσθέστε διεύθυνση.')" oninput="setCustomValidity('')"/>
                                
                                <p style="margin-bottom: 0px;"> Δικαιούστε εισιτήριο μειωμένης τιμής;</p>
                                <input type="radio" class="option-input radio" name="choose" value='yes' style="margin-right: 5px;">Ναι, δικαιούμαι.
                                <br>
                                <input type="radio" class="option-input radio" name="choose" value='no' style="margin-right: 5px;">Όχι, δεν δικαιούμαι.
                                <select id="optional" name="optiοnal" class="form-control">
                                    <option hidden value=""> Επιλέξτε κατηγορία</option>
                                    <option value="Φοιτητής/τρια">Φοιτητής/τρια</option>
                                    <option value="Μαθήτης/τρια Γυμνασίου/Λυκείου">Μαθήτης/τρια Γυμνασίου/Λυκείου</option>
                                    <option value="Νέος/α ηλικίας 13 έως 18 ετών">Νέος/α ηλικίας 13 έως 18 ετών </option>
                                    <option value="Άτομo ηλικίας άνω των 65 ετών">Άτομo ηλικίας άνω των 65 ετών</option>
                                    <option value="Άνεργος/η">Άνεργος/η</option>
                                </select>
                                <script>
                                    $('input[name="choose"]').click(function(e) {
                                    if(e.target.value === 'yes') {
                                        $('#optional').show();
                                    } else {
                                        $('#optional').hide();
                                    }
                                    })

                                    $('#optional').hide();                                
                                </script>

                                <button id="submit" class="btn login" type="submit" value="SEND" style="background-color:#00599C; margin-right:65px;margin-top:25px;">Εγγραφή</button>
                                <button id="reset" class="btn login" type="reset" style="background-color:#00599C;margin-top:25px;">Εκκαθάριση</button>
                            </form>
                        </div>
                    </div>

                    <script>
                        if (location.hash == '#signin')
                            document.getElementById("signin").classList.add('active');
                        else
                            document.getElementById("login").classList.add('active');
                    </script>
                </div>
                
                </div>
            </div>    
        </div>
    </div>
    <!-- end of SECTION -->

    <!--FOOTER-->
    <?php include 'utils/footer.php'; ?>

</body>
</html>