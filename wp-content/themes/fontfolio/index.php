<?php get_header(); ?>

        <div id="content_inside">
        
        <?php if(!is_paged()) { ?>
            <?php
            $args = array(
    //                     'category_name' => 'featured-medium',
                         'post_type' => 'post',
                         'posts_per_page' => 5
                         //'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                         );
            query_posts($args);
            $x = 0;
            while (have_posts()) : the_post(); ?>
            
            <?php if($x == 0) { ?>
            
            <div class="big_post_box">
                <?php if($x % 2 == 0) { ?>
                    <h3 class="gray">
                <?php } else { ?>
                    <h3>
                <?php } ?>
                <a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,35); ?></h3>
                <?php if(has_post_thumbnail()) { ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-home-big'); ?></a>
                <?php } else { ?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-big-image.png" /></a>
                <?php } ?>
            </div><!--//big_post_box-->
            
            <?php } else { ?>
            
            <div class="post_box">
                <?php if($x % 2 == 0) { ?>
                    <h3 class="gray">
                <?php } else { ?>
                    <h3>
                <?php } ?>        
                <a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,35); ?></a></h3>
                <?php if(has_post_thumbnail()) { ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-home-small'); ?></a>
                <?php } else { ?>
                  <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-small-image.png" /></a>
                <?php } ?>            
            </div><!--//big_post_box-->        
    
            <?php } ?>
            
            <?php $x++; ?>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>        
            
        <?php } ?>
        
        
        <?php
if(is_paged()) {
        add_filter('post_limits', 'my_post_limit');
        global $myOffset;
        $myOffset = 5;
}

        $myOffset = 5;
        
        $args = array(
//                     'category_name' => 'featured-medium',
                     'post_type' => 'post',
                     'posts_per_page' => 8,
                     'showposts' => 8,
                     'offset' => $myOffset,
                     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                     );
        query_posts($args);
        $x = 0;
        while (have_posts()) : the_post(); ?>
                
        <div class="post_box">
            <?php if($x % 2 == 0) { ?>
                <h3>
            <?php } else { ?>
                <h3 class="gray">
            <?php } ?>        
            <a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,35); ?></a></h3>
            <?php if(has_post_thumbnail()) { ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-home-small'); ?></a>
            <?php } else { ?>
              <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/home-small-image.png" /></a>
            <?php } ?>            
        </div><!--//big_post_box-->        
        
        <?php $x++; ?>
        <?php endwhile; ?>
        
        <div class="clear"></div>
        
        </div><!--//#content_inside-->
        <div class="clear"></div>
        
        <div class="load_more_cont">
            <div align="center"><div class="load_more_text"><?php next_posts_link('Load More') ?></div></div>
        </div><!--//load_more_cont-->
        
        <?php wp_reset_query(); ?>                
        
        <?php if(is_page()) { ?>
        <?php $wp_query = null; $wp_query = $temp;?>
        <?php remove_filter('post_limits', 'my_post_limit'); ?>
        <?php } ?>        
        
        <div class="clear"></div>
        
<script type="text/javascript">
// Ajax-fetching "Load more posts"
$('.load_more_cont a').live('click', function(e) {
	e.preventDefault();
	//$(this).addClass('loading').text('Loading...');
        $('.load_more_text a').html('Loading...');
	$.ajax({
		type: "GET",
		url: $(this).attr('href') + '#content',
		dataType: "html",
		success: function(out) {
			result = $(out).find('#content_inside .post_box');
			nextlink = $(out).find('.load_more_cont a').attr('href');
                        //alert(nextlink);
			//$('#boxes').append(result).masonry('appended', result);
                    $('#content_inside').append(result);
			//$('.fetch a').removeClass('loading').text('Load more posts');
                        $('.load_more_text a').html('Load More');
                        
                        
			if (nextlink != undefined) {
				$('.load_more_cont a').attr('href', nextlink);
			} else {
				$('.load_more_cont').remove();
                                $('#content_inside').append('<div class="clear"></div>');
                              //  $('.load_more_cont').css('visibilty','hidden');
			}

                    if (nextlink != undefined) {
                        $.get(nextlink, function(data) {
                          //if($(data + ":contains('post_box')") != '') {
                          if($(data + ":contains('post_box')") == '') {
                            //alert('not found');
                                                    $('.load_more_cont').remove();
                                                    $('#content_inside').append('<div class="clear"></div>');        
                          }
                        });                        
                    }
                        
		}
	});
});
</script>
        
        
<?php get_footer(); ?>        