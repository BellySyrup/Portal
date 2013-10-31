<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head> 
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>          
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <?php wp_head(); ?>
</head>
<body>

    <?php $shortname = "font_folio"; ?>
    
    <?php if(get_option($shortname.'_custom_background_color','') != "") { ?>
    <style type="text/css">
      body { background-color: <?php echo get_option($shortname.'_custom_background_color',''); ?>; }
    </style>
    <?php } ?>

<div id="main_container">

    <div id="header_top">
        <div class="header_top_border"></div>
        <div class="social">
            <?php if(get_option($shortname.'_facebook_link','') != "") { ?>
              <a href="<?php echo get_option($shortname.'_facebook_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/header-social-icon1.png" /></a>
            <?php } ?>
            
            <?php if(get_option($shortname.'_twitter_link','') != "") { ?>
              <a href="<?php echo get_option($shortname.'_twitter_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/header-social-icon2.png" /></a>
            <?php } ?>
            
            <?php if(get_option($shortname.'_dribbble_link','') != "") { ?>
              <a href="<?php echo get_option($shortname.'_dribbble_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/header-social-icon3.png" /></a>
            <?php } ?>
            
            <?php if(get_option($shortname.'_google_plus_link','') != "") { ?>
              <a href="<?php echo get_option($shortname.'_google_plus_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/header-social-icon4.png" /></a>
            <?php } ?>
            <div class="clear"></div>
        </div><!--//social-->
        
        <div class="search">
          <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
          <input type="text" value="Search" name="s" id="s" onclick="if(this.value == 'Search') this.value='';" onblur="if(this.value == '') this.value='Search';" /> 
          <INPUT TYPE="image" SRC="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.png" class="search_icon" BORDER="0" ALT="Submit Form">
          </form>
        </div>
        
        <div class="menu_cont">
<!--            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>-->
            <?php wp_nav_menu('menu=header_menu&container=false&menu_id=menu'); ?>
        </div><!--//menu_cont-->        
        <div class="clear"></div>
    </div><!--//header_top-->
    
    <div id="header">
        <?php if(get_option($shortname.'_custom_logo_url','') != "") { ?>
          <a href="<?php bloginfo('url'); ?>"><img src="<?php echo stripslashes(stripslashes(get_option($shortname.'_custom_logo_url',''))); ?>" class="logo" /></a>
        <?php } else { ?>
          <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" class="logo" /></a>
        <?php } ?>
        
        <div id="header_menu">
        <!--
            <ul>
              <li><a href="#">Graphic Design</a></li>
              <li><a href="#">Photography</a></li>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Architecture</a></li>
              <li><a href="#">Animations</a></li>
              <li><a href="#">Brochures</a></li>
              <li><a href="#">Print Design</a></li>
              <li><a href="#">UI/UX Design</a></li>
            </ul>-->
            <?php wp_nav_menu('menu=category_menu&container=false&menu_id=menu'); ?>
            <div class="clear"></div>
        </div><!--//header_menu-->
        <div class="clear"></div>
    </div><!--//header-->
    
    <div id="content">