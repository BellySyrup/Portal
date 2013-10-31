        <div id="sidebar">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
            <div class="side_box">
                <h3>Sample Text Box Widget</h3>
                
                <p>Copyright 2011. All Rights Reserved. Powered by Wordpress Copyright 2011. All Rights Reserved. Powered by Wordpress Copyright 2011. All Rights Reserved. Powered by Wordpress Copyright 2011. All Rights Reserved. Powered by Wordpress Copyright 2011. All Rights Reserved. Powered by Wordpress</p>
            </div><!--//side_box-->
            
            <div class="side_box">
                <h3>Latest Posts</h3>
                
                <ul>
                  <li><a href="#">My Latest Post Title</a></li>
                  <li><a href="#">My New Post</a></li>
                  <li><a href="#">My Latest Post Title</a></li>
                  <li><a href="#">My New Post</a></li>
                  <li><a href="#">My Latest Post Title</a></li>
                  <li><a href="#">My New Post</a></li>                  
                </ul>
            </div><!--//side_box-->            
            <?php endif; ?>
        </div><!--//sidebar-->