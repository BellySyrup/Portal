<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
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
               <!--Start Post-->
               <?php get_template_part( 'loop', 'index' ); ?>
               <!--End Post-->
               <div class='wp-pagenavi'>
                    <?php inkthemes_pagination(); ?>
               </div>
          </div>
          <!--End side content-->
     </div>
     <?php get_sidebar(); ?>
</div>
<!--End Content wrapper-->
<div class="clear"></div>
</div>
<?php get_footer(); ?>
