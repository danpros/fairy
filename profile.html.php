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
				<h1 class="card_title"><?php echo $name;?></h1>                            
			</div>
			<div>
				<div class="entry-content">
					<?php echo $about ?>
				</div>
				<h3 class="post-index"><?php echo i18n('Post_by_author');?></h3>
				<?php if (!empty($posts)) { ?>
					<ul class="post-list">
						<?php foreach ($posts as $p): ?>
							<li class="item">
								<span><a href="<?php echo $p->url ?>"><?php echo $p->title ?></a></span> -
								<span><?php echo format_date($p->date) ?></span>. <?php echo i18n('Posted_in');?> <span class="tags-p"><?php echo $p->category;?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php } else {
					echo i18n('No_posts_found') . '!';
				} ?>
			</div>
		</div>
	</div>
	
</article>

<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<nav class="navigation pagination pagination-box" role="navigation" aria-label="Posts">
	<h2 class="screen-reader-text">Posts navigation</h2>
	<div class="nav-links"><?php echo $pagination['html'];?></div>
</nav>
<?php endif;?>