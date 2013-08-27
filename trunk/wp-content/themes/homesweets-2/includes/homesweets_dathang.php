 <div id='home_sweets_dathang'>
                        <div id='tit_name_home_sweets'>
                            <!-- đặt hàng thực phẩm trực tuyến từ sweethome-->
                            <?php
                            global $id;
                            $id = 9;  // 9 la id catalogue 
                            $category = get_the_category_by_ID($id); 
                           // var_dump($category);
                            echo $category;
                            ?>
                        </div><!-- id='tit_name_home_sweets' -->
                        
                        
         <?php 
           // đặt hàng thực phẩm trực tuyến từ sweethome
            global $post;
            $args = array('numberposts'=>1,'category'=>9, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             <div id='khung_dathang'>
                    <div id='name_avali'>
                        <div id='images_dathang'>
                           <?php the_content();?>
                         </div>
                         <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- id='edit_post' -->
                    </div><!-- id='name_avali' -->
            </div><!--id='khung_avli' -->   
           
             
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>

   <?php        include (TEMPLATEPATH . '/includes/khach_hang_than_thiet.php'); ?>

</div><!-- id='home_sweets_dathang'-->
