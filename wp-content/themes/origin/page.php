<?php get_header();?>
	<div id='page-info-wapper'>
		<?php get_sidebar(); ?>
		<?php get_sidebar('second'); ?>
		<div id="main-content">
			<div id=''></div>
			<div id='cac_can_ho'>
				<div class="post">
			        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<div class="entry">
							<?php the_content(); ?>
						</div>
					</div><!-- class="entry" -->
				<?php endwhile; endif; ?>
                </div><!--end post-->
			</div><!-- id='cac_can_ho -->
			
		</div><!--end main-content-->
	</div><!-- id='page-info-wapper' -->
	<?php get_footer(); ?>
</div><!-- id="page-wrap" -->

