<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (isset($is_category)):?>
    <header class="page-header"><h1 class="page-title"><?php echo i18n('Category');?>: <?php echo $category->title;?></h1><div class="taxonomy-description"><?php echo $category->body;?></div></header>
<?php endif;?>
<?php if (isset($is_tag)):?>
    <header class="page-header"><h1 class="page-title"><?php echo i18n("Tags");?>: <?php echo $tag->title;?></h1></header>
<?php endif;?>
<?php if (isset($is_archive)):?>
    <header class="page-header"><h1 class="page-title"><?php echo i18n("Archives");?>: <?php echo $archive->title;?></h1></header>
<?php endif;?>
<?php if (isset($is_search)):?>
    <header class="page-header"><h1 class="page-title"><?php echo i18n("Search");?>: <?php echo $search->title;?></h1></header>
<?php endif;?>
<?php if (isset($is_type)):?>
    <header class="page-header"><h1 class="page-title">Type: <?php echo ucfirst($type->title);?></h1></header>
<?php endif;?>
<?php if (isset($is_blog)):?>
	<header class="page-header"><h1 class="page-title">Blog</h1></header>
<?php endif;?>
<?php if (!empty($breadcrumb)): ?>
<div class="fairy-breadcrumb-wrapper">
	<div class="breadcrumbs init-animate clearfix">
		<div id="fairy-breadcrumbs" class="clearfix">
			<div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb"><?php echo $breadcrumb ?></div>
		</div>
	</div>
</div>
<?php endif;?>

<?php foreach ($posts as $p):?>
<article class="post format-standard hentry">
	<div class="card card-blog-post <?php if (config('teaser.type') === 'full'):?>card-full-width<?php endif;?>">
	
		<?php if (!empty($p->image)):?>
		<figure class="post-thumbnail card_media">
			<a href="<?php echo $p->url; ?>">
				<img src="<?php echo $p->image; ?>"/>                
			</a>
		</figure>
		<?php endif;?>
		
		<?php if (!empty($p->audio)):?>
		<div class="post-thumbnail card_media" <?php if (config('teaser.type') === 'full'):?>style="height:300px;"<?php endif;?>>
			<iframe width="100%" height="100%" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
		</div>
		<?php endif; ?>
		
		<?php if (!empty($p->video)):?>
		<div class="post-thumbnail card_media" <?php if (config('teaser.type') === 'full'):?>style="height:315px;"<?php endif;?>>
			<iframe width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php endif; ?>
		

		<div class="card_body">
			<div>
				<div class="category-label-group"><span class="cat-links"><?php echo $p->category;?> </span></div>
				<?php if (!empty($p->quote)) {?>
				<h2 class="card_title"><a href="<?php echo $p->url;?>" rel="bookmark"><blockquote><?php echo $p->quote;?></blockquote></a></h2>
				<?php } elseif(!empty($p->link)){ ?>
				<h2 class="card_title"><a href="<?php echo $p->link;?>" target="_blank" rel="bookmark"><?php echo $p->title;?></a> <i class="fa fa-external-link" aria-hidden="true"></i></h2>
				<?php } else { ?>
				<h2 class="card_title"><a href="<?php echo $p->url;?>" rel="bookmark"><?php echo $p->title;?></a></h2>
				<?php } ?>
				<div class="entry-meta">
					<span class="posted-on"><i class="fa fa-calendar"></i><a href="<?php echo $p->url;?>" rel="bookmark"><time class="entry-date published"><?php echo format_date($p->date);?></time></a></span>
					<span class="byline"> <span class="author"><i class="fa fa-user"></i><a class="url" href="<?php echo $p->authorUrl;?>"><?php echo $p->authorName;?></a></span></span>
					<?php if (disqus_count()) { ?> 
						<span><i class="fa fa-comments"></i> <a href="<?php echo $p->url ?>#disqus_thread"> <?php echo i18n("Comments");?></a></span>
					<?php } elseif (facebook()) { ?> 
						<span><i class="fa fa-comments"></i> <a href="<?php echo $p->url ?>#comments"><span><fb:comments-count href=<?php echo $p->url ?>></fb:comments-count> <?php echo i18n("Comments");?></span></a></span>
					<?php } ?>
					<?php if (authorized($p)) { echo '<span><i class="fa fa-pencil" aria-hidden="true"></i> <a href="'. $p->url .'/edit?destination=post">Edit</a></span>'; } ?>
				</div><!-- .entry-meta -->
			</div>
			<div>
				<div class="entry-content">
					<?php echo get_teaser($p->body, $p->url); ?>
				</div>
				<?php if (config('teaser.type') === 'trimmed'):?><a style="margin-top:1.5em;" class="btn btn-primary" href="<?php echo $p->url; ?>"><?php echo config('read.more'); ?> <span class="screen-reader-text"><?php echo $p->title; ?></span></a><?php endif;?> 
			</div>
		</div>
	</div>
</article>
<?php endforeach;?>

<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<nav class="navigation pagination pagination-box" role="navigation" aria-label="Posts">
	<h2 class="screen-reader-text">Posts navigation</h2>
	<div class="nav-links"><?php echo $pagination['html'];?></div>
</nav>
<?php endif;?>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>