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

	<div class="card card-blog-post card-full-width">
	
		<?php if (!empty($p->image)):?>
		<figure class="post-thumbnail card_media">
			<img src="<?php echo $p->image; ?>"/>                
		</figure>
		<?php endif;?>
		
		<?php if (!empty($p->audio)):?>
		<div class="post-thumbnail card_media">
			<iframe width="100%" height="300px" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
		</div>
		<?php endif; ?>
		
		<?php if (!empty($p->video)):?>
		<div class="post-thumbnail card_media">
			<iframe width="100%" height="315px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php endif; ?>		
	
		<div class="card_body">
			<div>
				<div class="category-label-group"><span class="cat-links"><?php echo $p->category;?> </span></div>
					<?php if (!empty($p->quote)) {?>
					<h1 class="card_title"><blockquote><?php echo $p->quote;?></blockquote></h1>
					<?php } elseif(!empty($p->link)){ ?>
					<h1 class="card_title"><a href="<?php echo $p->link;?>" target="_blank" rel="bookmark"><?php echo $p->title;?></a> <i class="fa fa-external-link" aria-hidden="true"></i></h1>
					<?php } else { ?>
					<h1 class="card_title"><?php echo $p->title;?></h1>
					<?php } ?>                            
				<div class="entry-meta">
					<span class="posted-on"><i class="fa fa-calendar"></i><a href="<?php echo $p->url;?>" rel="bookmark"><time class="entry-date published"><?php echo format_date($p->date);?></time></a></span>
					<span class="byline"> <span class="author "><i class="fa fa-user"></i><a class="url" href="<?php echo $p->authorUrl;?>"><?php echo $p->authorName;?></a></span></span>
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
					<?php echo $p->body; ?>
				</div>
				<footer class="entry-footer">
					<span class="tags"><i class="fa fa-tags" aria-hidden="true"></i> <?php echo $p->tag;?></span>
				</footer>
			</div>
		</div>
	</div>
	
	<?php $related = get_related($p->related, true, 2);?>
	<?php if (!empty($related)): ?>
	<div class="related-post">
		<h2 class="post-title"><?php echo i18n("Related_posts");?></h2>
		<div class="row">
			<?php foreach ($related as $r):?>
			<div class="col-1-1 col-sm-1-2 col-md-1-2">
				<div class="card card-blog-post card-full-width" style="height:100%;">
					<div class="card_body">
					<div class="category-label-group"><span class="cat-links"><?php echo $r->category;?></span></div>                                        
					<h4 class="card_title"><a href="<?php echo $r->url;?>"><?php echo $r->title;?></a></h4>
					<div class="entry-meta">
						<span class="posted-on"><i class="fa fa-calendar"></i><a href="<?php echo $r->url;?>" rel="bookmark"><time class="entry-date published"><?php echo format_date($r->date);?></time></a></span><span class="byline"> <span class="author"><i class="fa fa-user"></i><a class="url" href="<?php echo $r->authorUrl;?>"><?php echo $r->author;?></a></span></span>                                        
					</div>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>	
	<?php endif; ?>
</article>

<?php if (!empty($next) || !empty($prev)): ?>
<nav class="navigation post-navigation" role="navigation" aria-label="Posts">
	<h2 class="screen-reader-text">Post navigation</h2>
	<div class="nav-links">
		<?php if (!empty($next)): ?>	
		<div class="nav-previous"><a href="<?php echo($next['url']); ?>" rel="next"><span class="nav-subtitle"><?php echo i18n("Next");?>:</span> <span class="nav-title"><?php echo($next['title']); ?></span></a></div>
		<?php endif;?>
		<?php if (!empty($prev)): ?>
		<div class="nav-next"><a href="<?php echo($prev['url']); ?>" rel="prev"><span class="nav-subtitle"><?php echo i18n("Prev");?>:</span> <span class="nav-title"><?php echo($prev['title']); ?></span></a></div>
		<?php endif;?>
	</div>
</nav>
<?php endif; ?>

<?php if (disqus()): ?>
    <?php echo disqus($p->title, $p->url) ?>
<?php endif; ?>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>
<?php if (facebook() || disqus()): ?>
<section class="comments comment-box" id="comments">
    <div class="comments-number">
        <h3><?php echo i18n("Comments");?></h3>
    </div>
    <?php if (facebook()): ?>
        <div class="fb-comments" data-href="<?php echo $p->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
    <?php endif; ?>
    <?php if (disqus()): ?>
        <div id="disqus_thread"></div>
    <?php endif; ?>
</section>
<?php endif; ?>
