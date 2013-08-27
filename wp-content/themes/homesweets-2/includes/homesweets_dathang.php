 <div id='home_sweets_dathang'>
                                      
         <?php 
           // đặt hàng thực phẩm trực tuyến từ sweethome id = 9 
            global $lo_post;
            $args = array('numberposts'=>1,'category'=>9, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
           // var_dump($custom_posts);
            foreach($custom_posts as $lo_post) : setup_postdata($lo_post); ?>
             <div id='khung_dathang'>
                    <div id='tit_name_home_sweets'><?php the_title(); ?></div><!-- id='tit_name_home_sweets' -->
                    <div id='name_avali'>
                        <div id='images_dathang'>
                           <?php the_content();?>
                         </div>
                        
                    </div><!-- id='name_avali' -->
  <!--    <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- id='edit_post' -->
            </div><!--id='khung_avli' -->   
           
            
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>

   <?php        include (TEMPLATEPATH . '/includes/khach_hang_than_thiet.php'); ?>

</div><!-- id='home_sweets_dathang'-->
