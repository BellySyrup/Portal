<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
 ?>
<?php get_header(); ?>
<!--Start Contetn wrapper-->
<div class="grid_24 content_wrapper">
     <div class="grid_15 alpha">
          <!--Start side content-->
          <div class="side_content">
               <?php
				/* Queue the first post, that way we know
				 * what date we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				if ( have_posts() )
					the_post();
				?>
               <h1>
                    <?php if ( is_day() ) : ?>
                    <?php printf( __( 'Daily Archives: %s', 'themia' ), get_the_date() ); ?>
                    <?php elseif ( is_month() ) : ?>
                    <?php printf( __( 'Monthly Archives: %s', 'themia' ), get_the_date('F Y') ); ?>
                    <?php elseif ( is_year() ) : ?>
                    <?php printf( __( 'Yearly Archives: %s', 'themia' ), get_the_date('Y') ); ?>
                    <?php else : ?>
                    <?php _e( 'Blog Archives', 'themia' ); ?>
                    <?php endif; ?>
               </h1>
               <?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
					/* Run the loop for the archives page to output the posts.
					 * If you want to overload this in a child theme then include a file
					 * called loop-archives.php and that will be used instead.
					 */
					 get_template_part( 'loop', 'archive' );
					?>
              <div class="clear"></div>
      <nav id="nav-single"> <span class="nav-previous">
        <?php next_posts_link( __( '&larr; Older posts', 'themia' ) ); ?>
        </span> <span class="nav-next">
        <?php previous_posts_link( __( 'Newer posts &rarr;', 'themia' ) ); ?>
        </span> </nav>
          </div>
          <!--End side content-->
     </div>
     <?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>