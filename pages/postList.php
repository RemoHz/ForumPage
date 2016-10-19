<?php
    // include('session.php');
    include('../config.php');

    $facultyData = $_GET['facultyData'];
    $unitData = $_GET['unitData'];
    $unitInfo = json_decode($unitData);

    $unitID = $unitInfo->unitID;
    $unitName = $unitInfo->unitName;
    $unitCode = $unitInfo->unitCode;

    $sql = "select postID, subject, timeStamp, userName from post, user where post.userID=user.userID and unitID=$unitID order by postID";
    $count = 0;

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
						<h1><a href='<?php echo "../pages/unitList.php?facultyData=".$facultyData;?>' class="btn btn-grey btn-sm event-more">Back</a>&nbsp;&nbsp;&nbsp;<?php echo $unitCode.' - '.$unitName;?></h1>
					</div>
				</div>
			</div>
		</div>

        <div class="section">
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-md-12">
	    				<table class="events-list">
		    				<?php
		                        while ($row = mysqli_fetch_array($result))
		                        {
		                        	$postData = json_encode($row);

	    							echo "<tr>";
	    							echo "<td>";
	    							echo "<div class='event-date'>";
	    							echo "<div class='event-day'>".date("j", strtotime($row['timeStamp']))."</div>";
	    							echo "<div class='event-month'>".date("M", strtotime($row['timeStamp']))."</div>";
	    							echo "</div>";
	    							echo "</td>";
	    							echo "<td>";
                                    echo "<a href='../pages/post.php?facultyData=".$facultyData."&unitData=".$unitData."&postData=".$postData."'>";
	    							echo $row['subject'];
                                    echo "</a>";
	    							echo "</td>";
	    							echo "<td class='event-venue hidden-xs'><i class='icon-map-marker'></i>".$row['userName']."</td>";
	    							echo "<td class='event-price hidden-xs'>0 Comments</td>";
	    							echo "<td><a href='../pages/post.php?facultyData=".$facultyData."&unitData=".$unitData."&postData=".$postData."' class='btn btn-grey btn-sm event-more'>Read More</a></td>";
	    							echo "</tr>";
	    							$count++;
	    						}
	    						if ($count === 0)
	    							echo "<div style='text-align: center;'>No Post</div>";
	    					?>

	    				</table>
	    			</div>
	    		</div>
			</div>
		</div>

	    <!-- Footer -->
	    <div class="footer" style="margin-top: 34.1%;">
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
