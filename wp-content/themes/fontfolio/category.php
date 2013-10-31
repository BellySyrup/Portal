<?php get_header(); ?>
        
        <?php        
/*        $args = array(
//                     'category_name' => 'featured-medium',
                     'post_type' => 'post',
                     'posts_per_page' => 8,
//                     'showposts' => 8,
                     'offset' => $myOffset,
                     'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                     );
        query_posts($args);
        $x = 0;
        while (have_posts()) : the_post(); */?>
        <?php $x = 0; ?>
        <?php while (have_posts()) : the_post(); ?>
                
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
        <?php wp_reset_query(); ?>                
        

        
        <div class="clear"></div>
        
        <?php if(get_next_posts_link() != '') { ?>
            <div class="load_more_cont">
                <div align="center"><div class="load_more_text"><?php next_posts_link('Load More') ?></div></div>
            </div><!--//load_more_cont-->
        <?php } ?>
        
        <div class="clear"></div>
        
<script type="text/javascript">
// Ajax-fetching "Load more posts"
$('.load_more_cont a').live('click', function(e) {
	e.preventDefault();
	//$(this).addClass('loading').text('Loading...');
	$.ajax({
		type: "GET",
		url: $(this).attr('href') + '#content',
		dataType: "html",
		success: function(out) {
			result = $(out).find('#content .post_box');
			nextlink = $(out).find('.load_more_cont a').attr('href');
			//$('#boxes').append(result).masonry('appended', result);
                    $('#content').append(result);
			//$('.fetch a').removeClass('loading').text('Load more posts');
			if (nextlink != undefined) {
				$('.load_more_cont a').attr('href', nextlink);
			} else {
				$('.load_more_cont').remove();
                                $('#content').append('<div class="clear"></div>');
                              //  $('.load_more_cont').css('visibilty','hidden');
			}

                    if (nextlink != undefined) {
                        $.get(nextlink, function(data) {
                          if($(data + ":contains('post_box')") != '') {
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