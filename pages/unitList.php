<?php
    // include('session.php');
    include('../config.php');

    $facultyData = $_GET['facultyData'];
    $facultyInfo = json_decode($facultyData);

    $facultyID = $facultyInfo->facultyID;
    $facultyName = $facultyInfo->facultyName;

    $sql = "select * from unit where facultyID=$facultyID order by unitCode";

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
						<h1><a href="../pages/faculties.php" class="btn btn-grey btn-sm event-more">Back</a>&nbsp;&nbsp;&nbsp;<?php echo $facultyName?> Faculty</h1>
					</div>
				</div>
			</div>
		</div>

        <div class="section">
	    	<div class="container">
	    		<div class="row">
	    		<!-- <div class="row" style="margin-left:200px; margin-right:200px;"> -->
	    			<div class="col-md-12">
	    				<table class="events-list">
		    				<?php
		                        while ($row = mysqli_fetch_array($result))
		                        {
		                        	$unitData = json_encode($row);

		                        	// Seperate Unitcode ('FIT5122' -> 'FIT' and '5122')
		                        	$pre = substr($row['unitCode'], 0, 3);
		                        	$code = substr($row['unitCode'], 3, 6);

	    							echo "<tr>";
	    							echo "<td>";
	    							echo "<div class='event-date'>";
	    							echo "<div class='event-day'>$code</div>";
	    							echo "<div class='event-month'>$pre</div>";
	    							echo "</div>";
	    							echo "</td>";
	    							echo "<td>";
                                    echo "<a href='../pages/postList.php?facultyData=".$facultyData."&unitData=".$unitData."'>";
	    							echo $row['unitName'];
                                    echo "</a>";
                                    echo "&nbsp;&nbsp;&nbsp;(";
                                    echo "<a href='".$row['url']."' target='_blank'>";
                                    echo "Unit Guide";
                                    echo "</a>)";
	    							echo "</td>";
	    							echo "<td class='event-venue hidden-xs'>";
                                    echo "<div>";
	    							echo "<div class='event-day'>".$row['totalPost']." Discussions</div>";
	    							echo "</div>";
                                	echo "</td>";
	    							echo "<td class='event-price hidden-xs'>";
                                    echo "<div>";
	    							echo "<div class='event-day'>".$row['followers']." Followers</div>";
	    							echo "</div>";
                                	echo "</td>";
	    							echo "<td><a href='#' class='btn btn-grey btn-sm event-more'>Follow</a></td>";
			    					echo "</tr>";
			    				}
	    					?>
	    				</table>
	    			</div>
	    		</div>
			</div>
		</div>

	    <!-- Footer -->
	    <div class="footer">
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2016. All rights reserved.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
