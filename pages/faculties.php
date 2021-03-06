<?php
    // include('session.php');
    include('../config.php');

    $sql = "select * from faculty";

	$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Forums</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="../css/main.css">

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->


        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="../index.html"><img src="../img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                        <li>
							<a href="../pages/faculties.php">Faculties</a>
						</li>
                        <li>
							<a href="../pages/followersPage.html">FollowersPage</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Faculties</h1>
					</div>
				</div>
			</div>
		</div>

        <div class="section">
	    	<div class="container" style="width: 100%">
				<div class="row">

					<?php
                        while ($row = mysqli_fetch_array($result))
                        {
                        	$facultyData = json_encode($row);

                        	// The css of 1&6 are different with other
                        	if ($row['facultyID'] == 1 || $row['facultyID'] == 6){
                        		echo "<div class='col-md-offset-1 col-sm-2'>";
                        	}
                        	else {
                        		echo "<div class='col-md-2 col-sm-2'>";
                        	}

							echo "<div class='portfolio-item' style='height: 200px'>";
							echo "<div class='portfolio-image'>";
							echo "<a href='page-portfolio-item.html'><img src='../img/portfolio1.jpg' alt='Project Name' style='height: 180px'></a>";
							echo "</div>";
							echo "<div class='portfolio-info-fade'>";
							echo "<ul style='margin-top: 30%;'>";
							echo "<li class='portfolio-project-name' style='font-size: 2em'>".$row['facultyName']."</li>";
							echo "<li class='read-more' style='font-size:25px'><a href='unitList.php?facultyData=".$facultyData."' class='btn' style='font-size: 0.7em'>Learn more</a></li>";
							echo "</ul>";
							echo "</div>";
							echo "</div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
		</div>

	    <!-- Footer -->
	    <div class="footer" style="margin-top: 5.33%;">
		    <div class="row">
		   		<div class="col-md-12">
		   			<div class="footer-copyright">&copy; 2016. All rights reserved.
		   			</div>
		   		</div>
		   	</div>
		</div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
