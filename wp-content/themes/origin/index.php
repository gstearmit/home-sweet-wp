<?php get_header();
include (TEMPLATEPATH . '/inc/featured.php');
?>
<div id='homesweets_avali'>
    <?php 
    include (TEMPLATEPATH . '/inc/home_sweets.php');
    include (TEMPLATEPATH . '/inc/home_sweets_adv.php');
    
    ?>
</div><!-- id='homesweets_avali' -->

<div id='homesweets_avali'>
    <div id='float_left_se'>
        <?php 
        include (TEMPLATEPATH . '/inc/home_sweets_catalogue.php');
       // include (TEMPLATEPATH . '/inc/home_sweets_ban_do.php');
       // include (TEMPLATEPATH . '/inc/can_ho_tieu_chaun.php');
       // include (TEMPLATEPATH . '/inc/tinh_nang_noi_bat.php');
       // include (TEMPLATEPATH . '/inc/thi_truong_dia_phuong_buoi_sang.php');
       // include (TEMPLATEPATH . '/inc/Ho_tay_cuoi_tuan.php');

        ?>

    </div><!-- id='float_left_se' -->
    <?php
    // quang cao ben phai thu 2
    include (TEMPLATEPATH . '/inc/homesweets_dathang.php');
    ?>
</div><!-- id='homesweets_avali' -->


<?php get_sidebar(); ?>
<div id="main-content">
    <div class="post">
        <ul class="links">
            <?php $home_cat = get_option('origin-home-cat'); 
                    $sing_cat = explode(',', $home_cat);
                    is_numeric(trim($sing_cat[0])) ? $cat1= trim($sing_cat[0]) : $cat1 = 9;
                    is_numeric(trim($sing_cat[1])) ? $cat2= trim($sing_cat[1]) : $cat1 = 11;
                    is_numeric(trim($sing_cat[2])) ? $cat3= trim($sing_cat[2]) : $cat1 = 8;
            ?>
            <?php $videos_links = new WP_Query('showposts=3&cat='.$cat1.'&offset=1');
                while($videos_links->have_posts()) : $videos_links->the_post();?>
            <li>
                <a href="<?php the_permalink(); ?>" data-tooltip="<?php the_content_rss('',true,'',30); ?>" ><?php the_title(); ?></a>
                
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <?php $videos = new WP_Query('showposts=1&cat='.$cat1);
        while($videos->have_posts()) : $videos->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></h2>
            
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <p class="meta-data">By: <strong><?php the_author(); ?></strong> | On: <?php the_time('F j, Y'); ?></p>
                <?php comments_popup_link('0', '1', '%','comment-link'); ?>
                
        <?php endwhile; wp_reset_postdata();?>
    </div><!--end post-->
    <div class="post">
        <ul class="links">
            <?php $text_links = new WP_Query('showposts=3&cat='.$cat2.'&offset=1');
                while($text_links->have_posts()) : $text_links->the_post();?>
            <li>
            <a href="<?php the_permalink();?>" data-tooltip="<?php the_content_rss('',true,'',30); ?>"><?php the_title(); ?></a>
            
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <?php $text = new WP_Query('showposts=1&cat='.$cat2);
        while($text->have_posts()) : $text->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_category(', '); ?></a></h2>
            
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <p class="meta-data">By: <strong><?php the_author(); ?></strong> | On: <?php the_time('F j, Y'); ?></p>
                <?php comments_popup_link('0', '1', '%','comment-link'); ?>
                
        <?php endwhile; wp_reset_postdata();?>
     </div><!--end post-->
    <div class="post">
        <ul class="links">
            <?php $jquery_links = new WP_Query('showposts=3&cat='.$cat3.'&offset=1');
                while($jquery_links->have_posts()) : $jquery_links->the_post();?>
            <li><a href="<?php the_permalink(); ?>" data-tooltip="<?php the_content_rss('',true,'',30); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <?php $jquery = new WP_Query('showposts=1&cat='.$cat3);
        while($jquery->have_posts()) : $jquery->the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"> <?php the_category(', '); ?></a></h2>
            
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <p class="meta-data">By: <strong><?php the_author(); ?></strong> | On: <?php the_time('F j, Y'); ?></p>
                <?php comments_popup_link('0', '1', '%','comment-link'); ?>
                
        <?php endwhile; wp_reset_postdata();?>
    </div><!--end post-->
</div><!--end main-content-->
<?php // get_sidebar('second'); ?>
<?php get_footer(); ?>