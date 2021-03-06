<?php
    // include('session.php');
    include('../config.php');

    $facultyData = $_GET['facultyData'];
    $unitData = $_GET['unitData'];
    $postData = $_GET['postData'];
    $postInfo = json_decode($postData);

    $postID = $postInfo->postID;
    $subject = $postInfo->subject;
    $userName = $postInfo->userName;
    $timeStamp = $postInfo->timeStamp;

    $sql = "select * from post where postID=$postID";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result);

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
						<h1><a href='<?php echo "../pages/postList.php?facultyData=".$facultyData."&unitData=".$unitData; ?>' class="btn btn-grey btn-sm event-more">Back</a>&nbsp;&nbsp;&nbsp; <?php echo $subject."&nbsp;&nbsp;&nbsp;- post by ".$userName; ?></h1>
					</div>
				</div>
			</div>
		</div>

        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="blog-post blog-single-post">
							<div class="single-post-title">
								<h3><?php echo $subject; ?></h3>
							</div>
							<div class="single-post-info">
								<i class="glyphicon glyphicon-time"></i><?php echo $row['timeStamp']; ?> <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
							</div>
							<div class="single-post-image">
								<img src="../img/blog-large.jpg" alt="Post Title">
							</div>
							<div class="single-post-content">
								<h3>Lorem ipsum dolor sit amet</h3>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse mattis, nulla id pretium malesuada, dui est laoreet risus, ac rhoncus eros diam id odio. Duis elementum ligula eu ipsum condimentum accumsan.
								</p>
								<p>
									Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna. Integer rhoncus sem quis ultrices lobortis. Maecenas tempus nulla quis dolor vulputate egestas. Phasellus cursus tortor quis massa faucibus fermentum vel sit amet tortor. Phasellus vehicula lorem et tortor luctus, a dignissim lacus tempor. Aliquam volutpat molestie metus sit amet aliquam. Duis vestibulum quam tortor, sed ultrices orci sagittis nec.
								</p>
								<h3>Sed sit amet metus sit</h3>
								<p>
									Proin fermentum, purus id eleifend molestie, nisl arcu rutrum tellus, a luctus erat tortor ut augue. Vivamus feugiat nisi sit amet dignissim fermentum. Duis elementum mattis lacinia. Sed sit amet metus sit amet leo semper feugiat. Nulla vel orci nec neque interdum facilisis egestas vitae lorem. Phasellus elit ante, posuere at augue quis, porta vestibulum magna. Nullam non mattis odio. Donec eget velit leo. Nunc et diam volutpat tellus ultrices fringilla eu a neque. Integer lectus nunc, vestibulum a turpis vitae, malesuada lacinia nibh. In sit amet leo ut turpis convallis bibendum. Nullam nec purus sapien. Quisque sollicitudin cursus felis sit amet aliquam.
								</p>
							</div>
							<!-- Comments -->
							<div class="post-coments">
								<h4>Comments (53)</h4>
								<ul class="post-comments">
									<li>
										<div class="comment-wrapper">
											<div class="comment-author"><img src="../img/user1.jpg" alt="User Name"> User Name</div>
											<p>
												Morbi eleifend congue elit nec sagittis. Praesent aliquam lobortis tellus, nec consequat massa ornare vitae. Ut fermentum justo vel venenatis eleifend. Fusce id magna eros. Interdum et malesuada fames ac ante ipsum primis in faucibus.
											</p>
											<!-- Comment Controls -->
											<div class="comment-actions">
												<span class="comment-date">June 10th, 2013 3:16 pm</span>
												<a href="#" data-toggle="tooltip" data-original-title="Vote Up" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a>
												<a href="#" data-toggle="tooltip" data-original-title="Vote Down" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
												<span class="label label-success">+8</span>
												<a href="#" class="btn btn-micro btn-grey comment-reply-btn"><i class="glyphicon glyphicon-share-alt"></i> Reply</a>
											</div>
										</div>
									</li>
									<li>
										<ul>
											<li>
												<div class="comment-wrapper">
													<div class="comment-author"><img src="../img/user2.jpg" alt="User Name"> User Name</div>
													<p>
														Vivamus euismod elit ac libero facilisis tristique. Duis mollis non ligula vel tincidunt. Nulla consectetur libero id nunc ornare, vel vulputate tellus mollis. Sed quis nulla magna.
													</p>
													<!-- Comment Controls -->
													<div class="comment-actions">
														<span class="comment-date">June 10th, 2013 3:16 pm</span>
														<a href="#" data-toggle="tooltip" data-original-title="Vote Up" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a>
														<a href="#" data-toggle="tooltip" data-original-title="Vote Down" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
														<span class="label label-danger">-2</span>
														<a href="#" class="btn btn-micro btn-grey comment-reply-btn"><i class="glyphicon glyphicon-share-alt"></i> Reply</a>
													</div>
												</div>
											</li>
										</ul>
									</li>
									<li>
										<div class="comment-wrapper">
											<div class="comment-author"><img src="../img/user5.jpg" alt="User Name"> User Name</div>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel magna lectus.
											</p>
											<!-- Comment Controls -->
											<div class="comment-actions">
												<span class="comment-date">June 10th, 2013 3:16 pm</span>
												<a href="#" data-toggle="tooltip" data-original-title="Vote Up" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-up"></i></a>
												<a href="#" data-toggle="tooltip" data-original-title="Vote Down" class="show-tooltip"><i class="glyphicon glyphicon-thumbs-down"></i></a>
												<span class="label label-success">+8</span>
												<a href="#" class="btn btn-micro btn-grey comment-reply-btn"><i class="glyphicon glyphicon-share-alt"></i> Reply</a>
											</div>
										</div>
									</li>
								</ul>
								<!-- Pagination -->
								<div class="pagination-wrapper ">
									<ul class="pagination pagination-sm">
										<li class="disabled"><a href="#">Previous</a></li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">Next</a></li>
									</ul>
								</div>
								<!-- Comments Form -->
								<div class="comment-form-wrapper">
									<form class="">
											<label for="comment-message"><i class="glyphicon glyphicon-comment"></i> <b>Your Comment</b></label>
											<textarea class="form-control" rows="5" id="comment-message"></textarea>
										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-large pull-right">Send</button>
										</div>
										<div class="clearfix"></div>
				        			</form>
								</div>
								<!-- End Comment Form -->
							</div>
							<!-- End Comments -->
						</div>
					</div>
					<!-- End Blog Post -->
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
