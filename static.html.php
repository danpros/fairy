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
				<p><?php if (login()) { echo '<span><i class="fa fa-pencil" aria-hidden="true"></i> <a href="'. $p->url .'/edit?destination=post">Edit</a></span>'; } ?></p>			
			</div>
			<div>
				<div class="entry-content">
					<?php echo $p->body; ?>
				</div>
			</div>
		</div>
	</div>
	
</article>