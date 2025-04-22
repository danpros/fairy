<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!doctype html>
<html lang="<?php echo blog_language();?>">
<head>
    <?php echo head_contents();?>
    <?php echo $metatags;?>
	<link rel="stylesheet" id="fairy-style-css" href="<?php echo theme_path();?>assets/css/style.css" media="all" />
	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel="stylesheet" id="Muli-400-300italic-300-css"  href="//fonts.googleapis.com/css?family=Muli%3A400%2C300italic%2C300" media="all" />
	<link rel="stylesheet" id="Poppins-400-500-600-700-css"  href="//fonts.googleapis.com/css?family=Poppins%3A400%2C500%2C600%2C700" media="all" />
	<link rel="stylesheet" id="font-awesome" href="<?php echo theme_path();?>framework/font-awesome/css/font-awesome.min.css" media="all" />
	<link rel="stylesheet" id="slick-css" href="<?php echo theme_path();?>framework/slick/slick.css" media="all" />
	<link rel="stylesheet" id="slick-theme-css" href="<?php echo theme_path();?>framework/slick/slick-theme.css" media="all" />
	<script src="<?php echo theme_path();?>assets/js/jquery.min.js" id="jquery-core-js"></script>
</head>
<body class="home blog hfeed ct-sticky-sidebar <?php echo $bodyclass;?>">
<?php if (facebook()) { echo facebook(); } ?>
<?php if (login()) { toolbar(); } ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
		
	<section class="search-section">
		<div class="container">
			<button class="close-btn"><i class="fa fa-times"></i></button>
			<form class="search-form">
				<label>
				<span class="screen-reader-text"><?php echo i18n("Search_for");?></span>
				<input type="search" class="search-field" placeholder="Search &hellip;" value="" name="search" />
				</label>
				<input type="submit" class="search-submit" value="<?php echo i18n("Search");?>" />
			</form>           
		</div>
	</section>
				
	<header id="masthead" class="site-header text-center site-header-v2">

		<section class="site-header-topbar">
			<a href="#" class="top-header-toggle-btn"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
			<div class="container">
				<div class="row">
					<div class="col col-sm-2-3 col-md-2-3 col-lg-2-4 top-menu">
					<nav class="site-header-top-nav">
						<button class="search-toggle rss-icon"><i class="fa fa-search"></i></button>
					</nav>
					</div>
					<div class="col col-sm-1-3 col-md-1-3 col-lg-1-4">
						<div class="topbar-flex-grid">
							<?php echo social();?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="site-navigation" class="site-header-top header-main-bar" >
			<div class="container">
				<div class="row">
					<div class="col-1-1">
						<div class="site-branding">
							<h1 class="site-title"><a href="<?php echo site_url();?>" rel="home"><?php echo blog_title();?></a></h1>
							<p class="site-description"><?php echo blog_tagline();?></p>
						</div><!-- .site-branding -->

						<button id="menu-toggle-button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="line"></span>
							<span class="line"></span>
							<span class="line"></span>
						</button>
					</div>
				</div>
			</div>
		</section>

		<section class="site-header-bottom">
			<div class="container">
				<nav class="main-navigation">
					<?php echo menu('primary-menu nav-menu justify-content-center');?>
				</nav><!-- #site-navigation -->
			</div>
		</section>
		
	</header><!-- #masthead -->
				
				
	<div id="content" class="site-content">
		<?php if (isset($is_front)):?>
		<?php $featured = recent_tag('featured', config('recent.count'), true);?>
		<?php if (!empty($featured)):?>
		<section class="hero hero-slider-section">
			<div class="container">

				<div class="hero-style-carousel" data-slick='[]'>
				<?php foreach ($featured as $f):?>
					<div class="card card-bg-image">
						<div class="post-thumb">
							<figure class="card_media">
								<a href="<?php echo $f->url;?>">
									<?php if (!empty($f->image)) {?>
									<img src="<?php echo $f->image;?>"/>
									<?php } else { ?>
									<img src="<?php echo get_image($f->body);?>"/>
									<?php } ?>
								</a>
							</figure>
						</div>
						<article class="card_body">
							<div class="category-label-group bg-label"><span class="cat-links"><?php echo $f->category;?> </span></div>
							<h3 class="card_title"><a href="<?php echo $f->url;?>"><?php echo $f->title;?></a></h3>

							<div class="entry-meta">
							<span class="posted-on"><i class="fa fa-calendar"></i><a href="<?php echo $f->url;?>" rel="bookmark"><time class="entry-date published"><?php echo format_date($f->date);?></time></a></span>
							<span class="byline"> <span class="author"><i class="fa fa-user"></i><a class="ur" href="<?php echo $f->authorUrl;?>"><?php echo $f->authorName;?></a></span></span>
							</div>
						</article>
					</div>
				<?php endforeach;?>
				</div>

			</div>
		</section><!-- .hero -->
		<?php endif;?>
		<?php endif;?>
	
		<main class="site-main">
			<section class="blog-list-section sec-spacing">
				<div class="container">
					<div class="row ">
						<div id="primary" class="col-12 col-md-2-3 col-lg-2-3">
							<div class="fairy-content-area ">
								<?php echo content();?>                                
							</div>
						</div>					
						<div id="secondary" class="col-12 col-md-1-3 col-lg-1-3">					
							<aside class="widget-area">

								<section id="search-widget" class="widget widget_search">
									<form class="search-form">
									<label>
										<span class="screen-reader-text"><?php echo i18n("Search_for");?></span>
										<input type="search" class="search-field" placeholder="<?php echo i18n("Search");?> …" value="" name="search">
									</label>
									<input type="submit" class="search-submit" value="<?php echo i18n("Search");?>">
									</form>
								</section>
								
								<section id="recent-posts-widget" class="widget widget_recent_entries">
									<h2 class="widget-title"><?php echo i18n("Recent_posts");?></h2>
									<?php echo recent_posts();?>
								</section>
									
								<?php if (config('views.counter') === 'true') :?>		
								<section id="popular-widget" class="widget widget_popular_entries">
									<h2 class="widget-title"><?php echo i18n("Popular_posts");?></h2>
									<?php echo popular_posts();?>
								</section>
								<?php endif;?>
								
								<?php if (disqus()): ?>
								<section id="comments_widget" class="widget widget_comments">
									<h2 class="widget-title"><?php echo i18n("Comments");?></h2>
									<script src="//<?php echo config('disqus.shortname');?>.disqus.com/recent_comments_widget.js?num_items=5&amp;hide_avatars=0&amp;avatar_size=48&amp;excerpt_length=200&amp;hide_mods=0" type="text/javascript"></script><style>li.dsq-widget-item {padding-top:15px;} img.dsq-widget-avatar {margin-right:5px;}</style>
								</section>
								<?php endif;?>
								
								<section id="categories-widget" class="widget widget_categories">
									<h2 class="widget-title"><?php echo i18n('Category');?></h2>
									<?php echo category_list();?>
								</section>
									
								<section id="archives-widget" class="widget archives">
								<style>.widget_archives ul.archivegroup li:before {content:'';}</style>
									<h2 class="widget-title"><?php echo i18n("Archives");?></h2>
									<?php echo archive_list();?>
								</section>
									
								<section id="tags-widget" class="widget widget_tags">
									<h2 class="widget-title"><?php echo i18n("Tags");?></h2>
									<div class="tag-cloud"><?php echo tag_cloud();?></div>
								</section>
									
							</aside><!-- #secondary -->
						</div>			
					</div>
				</div>
			</section>
		</main><!-- #main -->
	</div> <!-- #content -->
	
	<footer id="colophon" class="site-footer">
		<section class="site-footer-bottom">
			<div class="container">
				<div class="fairy-menu-social"></div>
				<div class="site-reserved text-center"><?php echo copyright();?><br><span>Designed by <a href="http://www.candidthemes.com/" target="_blank" rel="nofollow">Candid Themes</a></span></div><!-- .site-info -->
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<a href="javascript:void(0);" class="footer-go-to-top go-to-top"><i class="fa fa-long-arrow-up"></i></a>
<script src="<?php echo theme_path();?>assets/js/ResizeSensor.min.js"></script>
<script src="<?php echo theme_path();?>assets/js/theia-sticky-sidebar.min.js"></script>
<script src="<?php echo theme_path();?>framework/slick/slick.js"></script>
<script src="<?php echo theme_path();?>assets/js/custom.js"></script>
<?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>
</html>
