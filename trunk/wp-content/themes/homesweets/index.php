<?php get_header(); ?>
<?php <?php get_template_part('/includes/featured_2.php'); ?>
	<div id='homesweets_avali'>
        <?php 
        <?php get_template_part('/includes/home_sweets.php');
        <?php get_template_part('/includes/home_sweets_adv.php');
        ?>
    </div><!-- id='homesweets_avali' -->

    <div id='homesweets_avali'>
        <div id='float_left_se'>
            <?php 
             get_template_part('/includes/home_sweets_catalogue.php');
             get_template_part('/includes/can_ho_tieu_chaun.php');
             get_template_part('/includes/tinh_nang_noi_bat.php');
             get_template_part('/includes/thi_truong_dia_phuong_buoi_sang.php');
             get_template_part('/includes/Ho_tay_cuoi_tuan.php');
            ?>
        </div><!-- id='float_left_se' -->
        <?php
        // quang cao ben phai thu 2
         get_template_part('/includes/homesweets_dathang.php');
        ?>
    </div><!-- id='homesweets_avali' -->
</div><!-- page-info-->


<?php 
/*
get_template_part('includes/breadcrumbs'); ?>

<?php get_template_part('/includes/top_info'); ?>

<div id="content" class="clearfix">
	<div id="left-area">
		<?php get_template_part('includes/entry'); ?>
	</div> 	<!-- end #left-area -->

	<?php get_sidebar(); ?>
</div> <!-- end #content -->
*/
<?php get_footer(); ?>