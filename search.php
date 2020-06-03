<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	$header=$_POST['search'];
	include 'inc/header.php';
	// debugger($_POST,true);
	if($_POST['search']){
		$key=$_POST['search'];
	}else{
		redirect('index');
	}
?>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row"> 
					<div class="col-md-8">
						<?php 
							$Blog = new blog();
							$blogs = $Blog->getBlogbyKey($key);
							if ($blogs) {
								foreach ($blogs as $key => $blog) {
									if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
										$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
									}else{
										$thumbnail = UPLOAD_URL.'noimg.jpg';
									}
						?>
						<div class="post post-widget">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo $thumbnail; ?>" alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
							</div>
						</div>

						<?php
								}
							}
						?>
					</div>
					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<?php 
						$Advertisement = new advertisement();
						$advertisements=$Advertisement->getAllAdvertisementWithLimitByType('Simple',0,1);
						if($advertisements){
							foreach ($advertisements as $key => $advertisement) {
								if (isset($advertisement->image) && !empty($advertisement->image) && file_exists(UPLOAD_PATH.'advertisement/'.$advertisement->image)) {
									$thumbnail = UPLOAD_URL.'advertisement/'.$advertisement->image;
								}else{
									$thumbnail = UPLOAD_URL.'noimg.jpg';
								}	
							// debugger($advertisements,true);							
						?>
										
						<div class="aside-widget text-center">
							<a href="<?php echo ("$advertisement->url"); ?>" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php echo "$thumbnail"; ?>" alt="">
							</a>
						</div>
						<?php 
								}
							}
						?>
						<!-- /ad -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
							<?php 
								$popularBlog = $Blog->getAllPopularBlogWithLimit(0,4);
								if ($popularBlog) {
									foreach ($popularBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
								</div>
							</div>
							<?php
									}
								}
							?>
						</div>
						<!-- /post widget -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<?php include 'inc/footer.php'; ?>
