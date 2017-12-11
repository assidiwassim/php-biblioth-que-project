<?php
session_start();
$host="localhost";
$username="root";
$password="";
$database="chat";
$message="";
try{
    $con = new PDO('mysql:host=localhost;port=3306;dbname=bib', 'root', '');
    if(isset($_POST["Username"])){
        if(empty($_POST["Username"] )||(empty($_POST["Password"]))){
            $message="<label> tous les champs sont obligatoires </label> ";
        }
        else{
            $query="select * from auth where user=:username And passwd=:password";
            $statement=$con->prepare($query);
            $statement->execute(
                array(
                    'username'=> $_POST["Username"] ,
                    'password'=> $_POST["Password"]
                )
            );
            $count=$statement->rowCount();
            if($count>0){
                $_SESSION["username"]=$_POST["Username"];
                header("location: ./application");
                exit();
            }
            else{
                session_destroy();

                $message='<label> votre nom d\'utitlisateur ou/et le mot de passe est incorrect </label>';
            }
        }
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
<html>

<head>
    <title>
        Login
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Style/login.css">


    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="Style/font-awesome/css/font-awesome.min.css">

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="Style/bootstrap/bootstrap.min.css">

    <!-- animate CSS -->
    <link rel="stylesheet" href="Style/animate/animate.css">

    <!-- magnific-popup CSS -->
    <link rel="stylesheet" href="Style/magnific-popup/magnific-popup.css">

    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="Style/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" href="Style/owl-carousel/owl.theme.default.min.css">


</head>

<body>


    <section id="Login">
        <div class="cover animated fadeIn">
            <div class="effects">
                <div class="content">
                    <div class="loginmodal-container animated zoomIn">
                        <h1>Login </h1><br>
                        <form method="post">
                            <input type="text" name="Username" placeholder="Username">
                            <input type="password" name="Password" placeholder="Password">
                            <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/javascript.js"></script>

    <!-- bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- WOW JS -->
    <script src="js/wow/wow.min.js"></script>

    <!-- magnific-popup JS -->
    <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- owl carousel JS -->
    <script src="js/owl-carousel/owl.carousel.min.js"></script>

    <!-- counter -->
    <script src="js/counter/jquery.waypoints.min.js"></script>
    <script src="js/counter/jquery.counterup.min.js"></script>

    <!-- easing -->
    <script src="js/easing/jquery.easing.1.3.js"></script>

</body>

</html>