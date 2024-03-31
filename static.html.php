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
				<h1 class="card_title"><?php echo $p->title;?></h1>
				<p><?php if (authorized($p)) { echo '<span><i class="fa fa-pencil" aria-hidden="true"></i> <a href="'. $p->url .'/edit?destination=post">Edit</a></span>'; } ?></p>			
			</div>
			<div>
				<div class="entry-content">
					<?php echo $p->body; ?>
				</div>
			</div>
		</div>
	</div>
	
</article>

<?php if (!empty($next) || !empty($prev)): ?>
<nav class="navigation post-navigation" role="navigation" aria-label="Posts">
	<h2 class="screen-reader-text">Post navigation</h2>
	<div class="nav-links">
		<?php if (!empty($next)): ?>	
		<div class="nav-previous"><a href="<?php echo($next['url']); ?>" rel="next"><span class="nav-subtitle"><?php echo i18n("Prev");?>:</span> <span class="nav-title"><?php echo($next['title']); ?></span></a></div>
		<?php endif;?>
		<?php if (!empty($prev)): ?>
		<div class="nav-next"><a href="<?php echo($prev['url']); ?>" rel="prev"><span class="nav-subtitle"><?php echo i18n("Next");?>:</span> <span class="nav-title"><?php echo($prev['title']); ?></span></a></div>
		<?php endif;?>
	</div>
</nav>
<?php endif; ?>