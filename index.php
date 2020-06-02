<?php 
	$header='Home';
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	include 'inc/header.php';
 ?>

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- Featured First : 2 post in a row -->
					<!-- post -->
					<?php 
						$Blog = new blog();
						$featuredBlog=$Blog->getAllFeaturedBlogWithLimit(0,2);
						if (isset($featuredBlog[0]) && !empty($featuredBlog[0])) {
					?>
					<div class="col-md-6">
						<div class="post post-thumb">
							<?php 
								if (isset($featuredBlog[0]->image) && !empty($featuredBlog[0]->image) && file_exists(UPLOAD_PATH.'blog/'.$featuredBlog[0]->image)) {
									$thumbnail = UPLOAD_URL.'blog/'.$featuredBlog[0]->image;
								}else{
									$thumbnail = UPLOAD_URL.'noimg.jpg';
								}
							?>
							<a class="post-img" href="blog-post?id=<?php echo($featuredBlog[0]->id) ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>					
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$featuredBlog[0]->categoryid%4] ?>" href="<?php echo('category?id='.$featuredBlog[0]->categoryid);?>"><?php echo $featuredBlog[0]->category; ?></a>
									<span class="post-date"><?php echo date("M d, Y",strtotime($featuredBlog[0]->created_date)); ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo($featuredBlog[0]->id) ?>"><?php echo $featuredBlog[0]->title; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php
						}
						if (isset($featuredBlog[1]) && !empty($featuredBlog[1])) {
					?>
					<div class="col-md-6">
						<div class="post post-thumb">
							<?php 
								if (isset($featuredBlog[1]->image) && !empty($featuredBlog[1]->image) && file_exists(UPLOAD_PATH.'blog/'.$featuredBlog[1]->image)) {
									$thumbnail = UPLOAD_URL.'blog/'.$featuredBlog[1]->image;
								}else{
									$thumbnail = UPLOAD_URL.'noimg.jpg';
								}
							?>
							<a class="post-img" href="blog-post?id=<?php echo($featuredBlog[1]->id) ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>					
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$featuredBlog[1]->categoryid%4] ?>" href="<?php echo('category?id='.$featuredBlog[0]->categoryid);?>"><?php echo $featuredBlog[1]->category; ?></a>
									<span class="post-date"><?php echo date("M d, Y",strtotime($featuredBlog[1]->created_date)); ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo($featuredBlog[1]->id) ?>"><?php echo $featuredBlog[1]->title; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php
						}
		
					?>
				</div>
				<!-- /row -->

				<!-- row -->
				<!-- First Recent : 6 post with 3 in a row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>
					<?php 
						$recentBlog = $Blog->getAllRecentBlogWithLimit(0,3);
						if ($recentBlog) {
							foreach ($recentBlog as $key => $blog) {
								if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
									$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
								}else{
									$thumbnail = UPLOAD_URL.'noimg.jpg';
								}
					?>
					<!-- post -->
					<div class="col-md-4">
						<div class="post">

							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
									<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php
							}
						}
					?>
					
					<div class="clearfix visible-md visible-lg"></div>

					<?php 
						$recentBlog = $Blog->getAllRecentBlogWithLimit(3,3);
						if ($recentBlog) {
							foreach ($recentBlog as $key => $blog) {
								if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
									$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
								}else{
									$thumbnail = UPLOAD_URL.'noimg.jpg';
								}
					?>
					<!-- post -->
					<div class="col-md-4">
						<div class="post">

							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
									<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php
							}
						}
					?>
				</div>
				<!-- /row -->
				<!-- Recent Post Finished -->

				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<!-- Featured Second: 1 post -->
							<?php 
								$Blog = new blog();
								$featuredBlog=$Blog->getAllFeaturedBlogWithLimit(2,1);
								if (isset($featuredBlog[0]) && !empty($featuredBlog[0])) {
							?>
							<div class="col-md-12">
								<div class="post post-thumb">
									<?php 
										if (isset($featuredBlog[0]->image) && !empty($featuredBlog[0]->image) && file_exists(UPLOAD_PATH.'blog/'.$featuredBlog[0]->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$featuredBlog[0]->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
									?>
									<a class="post-img" href="blog-post?id=<?php echo($featuredBlog[0]->id) ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>					
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$featuredBlog[0]->categoryid%4] ?>" href="<?php echo('category?id='.$featuredBlog[0]->categoryid);?>"><?php echo $featuredBlog[0]->category; ?></a>
											<span class="post-date"><?php echo date("M d, Y",strtotime($featuredBlog[0]->created_date)); ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo($featuredBlog[0]->id) ?>"><?php echo $featuredBlog[0]->title; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php
								}
							?>
							
							<!-- /post -->
							<!-- /Featured Second: 1 post -->

							<!-- Recent 2 : 6 posts with two in each row -->
							<!-- post -->
							<?php 
								$recentBlog = $Blog->getAllRecentBlogWithLimit(6,2);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
							<!-- post -->
							<div class="col-md-6">
								<div class="post">

									<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
											<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php
									}
								}
							?>
							
							<div class="clearfix visible-md visible-lg"></div>

							<!-- post -->
							<?php 
								$recentBlog = $Blog->getAllRecentBlogWithLimit(8,2);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
							<!-- post -->
							<div class="col-md-6">
								<div class="post">

									<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
											<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php
									}
								}
							?>				

							<div class="clearfix visible-md visible-lg"></div>

							<?php 
								$recentBlog = $Blog->getAllRecentBlogWithLimit(10,2);
								if ($recentBlog) {
									foreach ($recentBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
							<!-- post -->
							<div class="col-md-6">
								<div class="post">

									<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
											<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
							<?php
									}
								}
							?>
							<!-- /Recent 2 -->
						</div>
					</div>

					<div class="col-md-4">
						<!-- post widget -->
						<!-- Most Read First: 4 posts in list  -->
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
						<!-- /Most Read First: 4 posts in list  -->
						<!-- /post widget -->
						

						<!-- Featured Third: 2 posts -->
						<!-- post widget -->
						
						<div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<?php 
								$Blog = new blog();
								$featuredBlog=$Blog->getAllFeaturedBlogWithLimit(3,2);
								if($featuredBlog){
									foreach ($featuredBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}								
							?>
							<div class="post post-thumb">								
								<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
										<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
								</div>
							</div>
							<!-- /post -->
							<?php
									}
								}
							?>						
						</div>
						<!-- /post widget -->
						<!-- /Featured Third: 2 posts -->
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
							<a href="<?php echo ("advertisement->url"); ?>" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="<?php echo "$thumbnail"; ?>" alt="">
							</a>
						</div>
						<?php 
								}
							}
						?>
						<!-- /ad -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		
		<!-- section -->
		<div class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<!-- Featured Post fourth : 3 in a row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Featured Posts</h2>
						</div>
					</div>
					<?php 
						$Blog = new blog();
						$featuredBlog=$Blog->getAllFeaturedBlogWithLimit(5,3);
						if($featuredBlog){
							foreach ($featuredBlog as $key => $blog) {
								if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
									$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
								}else{
									$thumbnail = UPLOAD_URL.'noimg.jpg';
								}								
					?>
					
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
									<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
					<?php
							}
						}
					?>		
					
				</div>
				<!-- /Featured Post fourth : 3 in a row -->
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							<!-- post -->
							<?php 
								$popularBlog = $Blog->getAllPopularBlogWithLimit(4,4);
								if ($popularBlog) {
									foreach ($popularBlog as $key => $blog) {
										if (isset($blog->image) && !empty($blog->image) && file_exists(UPLOAD_PATH.'blog/'.$blog->image)) {
											$thumbnail = UPLOAD_URL.'blog/'.$blog->image;
										}else{
											$thumbnail = UPLOAD_URL.'noimg.jpg';
										}
							?>
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post?id=<?php echo $blog->id ?>"><img src="<?php echo($thumbnail); ?>" alt=""></a>
									<div class="post-body">										
										<div class="post-meta">
											<a class="post-category <?php echo CAT_COLOR[$blog->categoryid%4] ?>" href="<?php echo('category?id='.$blog->categoryid);?>"><?php echo $blog->category; ?></a>
											<span class="post-date"><?php echo date("M d, Y",strtotime($blog->created_date)); ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post?id=<?php echo $blog->id ?>"><?php echo $blog->title; ?></a></h3>
										<p><?php echo substr(html_entity_decode($blog->content), 0,100)."...<br>"; ?></p>
									</div>
								</div>
							</div>
							<?php
									}
								}
							?>
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
					<?php 
					$Advertisement = new advertisement();
					$advertisements=$Advertisement->getAllAdvertisementWithLimitByType('Wide',0,1);
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
						<a href="<?php echo ("advertisement->url"); ?>" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="<?php echo "$thumbnail"; ?>" alt="">
						</a>
					</div>					
					<?php 
							}
						}
					?>
						<!-- /ad -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<?php 
										if ($categories) {
											foreach ($categories as $key => $category) {
									?>
									<li><a href="<?php echo('category?id='.$category->id);?>" class="<?php echo CAT_COLOR[$category->id%4] ?>"><?php echo($category->categoryname) ?><span>
										<?php 
											$Count = $Blog->getNumberBlogByCategory($category->id);
											echo $Count[0]->total;
										?>
									</span></a></li>
									<?php
											}
										}
									?>
									
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<?php 
										if ($categories) {
											foreach ($categories as $key => $category) {
									?>
									<li><a href="<?php echo('category?id='.$category->id);?>"><?php echo($category->categoryname) ?></a></li>
									<?php
											}
										}
									?>
								</ul>
							</div>
						</div>
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
	<?php include 'inc/footer.php'; ?>