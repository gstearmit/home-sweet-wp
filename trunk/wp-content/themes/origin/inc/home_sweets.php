 <div id='conten_left'>

         <?php 
            global $post;
            $args = array('category'=>7, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             <div id='khung_avli'>
                    <div id='name_avali'>
                        <div id='AvailableNOW'>
                            <?php echo $cfs->get('AvailableNOW');?>
                        </div>
                        <div id='tit_name_gt'>
                            <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                        </div>
                        <div id='images_Available'>
                           <a href="<?php the_permalink(); ?>">
                                <?php 
                                //  lay anh hien thi 
                                the_post_thumbnail( array(313,215) );
                                 ?>
                            </a>
                         </div>
                    </div><!-- id='name_avali' -->
            </div><!--id='khung_avli' -->   
                
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>
</div><!-- id='conten_left'-->
