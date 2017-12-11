<?php
//auth
session_start();

if(isset($_SESSION["username"])) {
	if (isset($_POST['nom']) || isset($_POST['disc']) ||isset($_POST['annee']) ) {
        if (empty($_POST['nom']) || empty($_POST['disc'])||empty($_POST['annee'])) {
            $message = "<label class='fade in text-danger text-center' style='width:100%'>Tous les champs sont obligatoires</label>";
        }
        else {
            $fnom= $_FILES['file']['name'];


            $temp_name = $_FILES['file']['tmp_name'];
                $urlp= getcwd() . '/upload/' ;
                $url =  $urlp .$fnom;

            (chmod($urlp,777) and( $m="ok ok" ))or ($m = "error");
                $url = str_replace('\\','/', $url);
                $url = str_replace(' ','0', $url);
                $urlp = str_replace('\\','/', $urlp);
                if(move_uploaded_file($temp_name, $url)){

                    try{
                    $con = new PDO('mysql:host=localhost;port=3306;dbname=bib', 'root', '');
                    $sql = "INSERT INTO storedf(nom,disc,sfile,classe) VALUES('" . $_POST['nom'] . "','" . $_POST['disc'] . "','" . "./upload/". $fnom . "','". $_POST["annee"] ."')";
                    $con->exec($sql);
					$message = "<label class='fade in text-success text-center' style='width:100%'>Fichier ajoué avec succes</label>";
                  
                    }
                    catch (PDOException $e){
                        $message= $e->getMessage();
                    }


             }
         }
        }
		 if(isset($_POST["dfile"]))
        {
            $con = new PDO('mysql:host=localhost;port=3306;dbname=bib', 'root', '');
            $con->exec('delete from storedf where sfile="'. $_POST["dfile"] .'";');
            $urls=str_replace('/','/', $_POST["dfile"]);
            unlink($urls);
					$message = "<label class='fade in text-success text-center' style='width:100%'>Fichier supprimer avec succes</label>";
        }
		
?>

<html>

<head>
    <title>
        Admin
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
	<?php
    if (isset($message2)){
        echo $message2;
    }
    if (isset($message)){
        echo $message;
    }
    ?>

    <section id="admin">
        <div class="cover animated fadeIn">
            <div class="effects">
                <div class="content animated zoomIn">
                    <div class="box  animated zoomIn">
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



                <form method="post">
					<div class="NomFichier"><?php echo $res["nom"] ?></div>
                    <input type="text" name="dfile" value="<?php echo $res["sfile"]; ?>" class="hidden">
                    <div class="Desc"><?php echo $res['disc']?></div>
                    <button type="submit" value="supprimer" class="" style="float: right;background:transparent;border:0;">
					<i style="color:royalblue;float:right;cursor:pointer" class="fa fa-trash-o   fa-2x" aria-hidden="true"></i>
					</button>
                </form>

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
                <form method="post">
					<div class="NomFichier"><?php echo $res["nom"] ?></div>
                    <input type="text" name="dfile" value="<?php echo $res["sfile"]; ?>" class="hidden">
                    <div class="Desc"><?php echo $res['disc']?></div>
                    <button type="submit" value="supprimer" class="" style="float: right;background:transparent;border:0;">
					<i style="color:royalblue;float:right;cursor:pointer" class="fa fa-trash-o   fa-2x" aria-hidden="true"></i>
					</button>
                </form>

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



                <form method="post">
					<div class="NomFichier"><?php echo $res["nom"] ?></div>
                    <input type="text" name="dfile" value="<?php echo $res["sfile"]; ?>" class="hidden">
                    <div class="Desc"><?php echo $res['disc']?></div>
                    <button type="submit" value="supprimer" class="" style="float: right;background:transparent;border:0;">
					<i style="color:royalblue;float:right;cursor:pointer" class="fa fa-trash-o   fa-2x" aria-hidden="true"></i>
					</button>
                </form>

         
                </div>
                            </div>


        <?php    }
    }
    catch (PDOException $e){
        $message2= $e->getMessage();
    }
    ?>

                           

                            <div class="help-block"></div></div></div>
                        

                       
                    
                     <button class="btn btn-md btn-default fa-pull-right" data-toggle="modal" data-target="#myModal" style="margin-top:20px;">
                          Ajouter un nouveau document
                     </button>
					 </div>
										 <div class="modal fade" id="myModal" role="dialog" >
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							  <h4 class="modal-title">Ajouter un nouveau document</h4>
							</div>
							<div class="modal-body">
							  <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nom">Nom du fichier</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="le nom du fichier" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="nom">année</label>
                        <div class="col-sm-7">
                            <select name="annee" class="form-control">
                                <option value="1">1ere</option>
                                <option value="2">2eme</option>
                                <option value="3">3eme</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="disc">Description</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="disc" name="disc" placeholder="Description" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="file">SELECT</label>
                        <div class="col-sm-7 form-control-static">
                            <input type="file" id="file" name="file">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Ajouter">
                        </div>
                    </div>
                </form>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
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
<?php
}else{
    header("location:/bibliotheque/admin");
}