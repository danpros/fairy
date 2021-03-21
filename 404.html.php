<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (!empty($breadcrumb)): ?>
<div class="fairy-breadcrumb-wrapper">
	<div class="breadcrumbs init-animate clearfix">
		<div id="fairy-breadcrumbs" class="clearfix">
			<div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><?php echo $breadcrumb ?></div>
		</div>
	</div>
</div>
<?php endif;?>

<article class="post format-standard hentry">

	<div class="card card-blog-post">
		<div class="card_body">
			<div>
				<h1 class="card_title">Page not found!</h1>                            
			</div>
			<div>
				<div class="entry-content">
				<p>Please search to find what you're looking for or visit our <a href="<?php echo site_url() ?>">homepage</a> instead.</p>
				<?php echo search() ?>	
				</div>
			</div>
		</div>
	</div>
	
</article>