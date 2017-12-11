<html>

<head>
    <title>
        Bibliothèque
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Style/Style.css">


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

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="65">

    <header>

        <nav class="navbar navbar-fixed-top ">

            <div class="container-fluid">

                <div class="wass-nav-wrapper">

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#wass-menu">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="wass-menu">
                        <ul class="nav navbar-nav">
                            <li><a class="smooth-scroll" href="#home">Bibliothèque</a></li>
                        </ul>
						
						 <ul class="nav navbar-nav navbar-right">
						 <li><a class="smooth-scroll" href="#home">ACCEUIL</a></li>
                            <li><a class="smooth-scroll" href="#cours">Cours</a></li>
                            <li><a class="smooth-scroll" href="#apropos">A PROPOS</a></li>
						</ul>
						
                    </div>

                </div>

            </div>
        </nav>

    </header>
    <section id="home">
        <div class="cover animated fadeIn">
            <div class="effects">
                <div class="content">
                    <div class="title animated zoomIn">
                        <h1>Bienvenue</h1>
                    </div>
                    <div class="paragraph animated zoomIn">
                        <p> Vous trouvez ici tout les cours</p>
                    </div>
                    <div class="buttons text-center animated zoomIn">
                        <a class="smooth-scroll stylebutton" href="#cours"> Consulter nos cours</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="cours">
        <div class="cover animated fadeIn">
            <div class="effects">
                <div class="content">
                    <div class="box">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'tab1')" id="defaultOpen">Premiere</button>
                            <button class="tablinks" onclick="openCity(event, 'tab2')">Deuxiemme</button>
                            <button class="tablinks" onclick="openCity(event, 'tab3')">Troisiemme</button>
                        </div>

                        <div id="tab1" class="tabcontent">
                            <div class="help-block"></div>

                            
								<?php
    try{
        $con = new PDO('mysql:host=localhost;port=3306;dbname=bib', 'root', '');
        foreach ($con->query("select nom,disc,sfile from storedf where classe=1") as $res){?>

<div class="panel panel-default">
                                <div class="panel-body">



                
					<div class="NomFichier"><?php echo $res["nom"] ?></div>
                    <input type="text" name="dfile" value="<?php echo $res["sfile"]; ?>" class="hidden">
                    <div class="Desc"><?php echo $res['disc']?></div>
                    <a href="<?php print_r("./admin/application/" . $res["sfile"]) ?>" type="submit" value="supprimer"  style="float: right;background:transparent;border:0;" download>
					<i style="color:royalblue;float:right;cursor:pointer" class="fa fa-download fa-2x" aria-hidden="true"></i>
					</a>
                

                </div>
                            </div>
         


        <?php    }
    }
    catch (PDOException $e){
        $message2= $e->getMessage();
    }
    ?>


                            <div class="help-block"></div>
                            </div>
							
							
							
						<div id="tab2" class="tabcontent">
                            <div class="help-block"></div>

                            
								<?php
    try{
        $con = new PDO('mysql:host=localhost;port=3306;dbname=bib', 'root', '');
        foreach ($con->query("select nom,disc,sfile from storedf where classe=2") as $res){?>

         


				<div class="panel panel-default">
                                <div class="panel-body">
                
					<div class="NomFichier"><?php echo $res["nom"] ?></div>
                    <input type="text" name="dfile" value="<?php echo $res["sfile"]; ?>" class="hidden">
                    <div class="Desc"><?php echo $res['disc']?></div>
                    <a href="<?php print_r("./admin/application/" . $res["sfile"]) ?>" type="submit" value="supprimer"  style="float: right;background:transparent;border:0;" download>
					<i style="color:royalblue;float:right;cursor:pointer" class="fa fa-download fa-2x" aria-hidden="true"></i>
					</a>
                

                            </div>
                            </div>
         


        <?php    }
    }
    catch (PDOException $e){
        $message2= $e->getMessage();
    }
    ?>

                           

                            <div class="help-block"></div>
                        </div>
						<div id="tab3" class="tabcontent">
                            <div class="help-block"></div>

                            
								<?php
    try{
        $con = new PDO('mysql:host=localhost;port=3306;dbname=bib', 'root', '');
        foreach ($con->query("select nom,disc,sfile from storedf where classe=3") as $res){?>

					<div class="panel panel-default">
                                <div class="panel-body">



               
					<div class="NomFichier"><?php echo $res["nom"] ?></div>
                    <input type="text" name="dfile" value="<?php echo $res["sfile"]; ?>" class="hidden">
                    <div class="Desc"><?php echo $res['disc']?></div>
                    <a href="<?php print_r("./admin/application/" . $res["sfile"]) ?>" type="submit" value="supprimer"  style="float: right;background:transparent;border:0;" download>
					<i style="color:royalblue;float:right;cursor:pointer" class="fa fa-download fa-2x" aria-hidden="true"></i>
					</a>
              

         
                </div>
                            </div>


        <?php    }
    }
    catch (PDOException $e){
        $message2= $e->getMessage();
    }
    ?>

                           

                            <div class="help-block"></div></div></div>
                        
                        <div id="Tokyo" class="tabcontent">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="NomFichier">Nom fichier</div>
                                    <div class="Desc">Disc</div>
                                    <div><i style="color:royalblue;float:right;cursor:pointer" class="fa fa-download  fa-2x" aria-hidden="true"></i></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="apropos">
        <div class="cover animated fadeIn">
            <div class="effects">
                <div class="content">
                    <div class="title">

                    </div>
                    <div class="box">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="footer">
        <div class="container-fluid">
            <div class="help-block"></div>
            <p>copyright 2017</p>
            <div class="help-block"></div>
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