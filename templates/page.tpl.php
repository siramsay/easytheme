<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<header id="header" class="clearfix">
    
<div class="rowheader" >   
    
<hgroup id="logo">
<!-- HNPM Specific -->        
<h2 class="logo"><a href="#" title="Property management"> Holiday Niseko <span>Ski Japan Niseko accommodation and snowboard packages</span></a></h2>


<!-- HNPM Specific END-->
             
<?php if ($logo): ?>
<div id="logoimg"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"/></a></div>
<?php endif; ?>
          
<div id="sitename"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
</div>
          
</hgroup>
        
<nav id="navigation">        
<div id="menu-icon">&nbsp<?php print $site_name; ?> &#x2261; </div>
<?php print render($page['header']); ?>
</nav>
        
</div>
 	   
</header>
<!--END ROW -->

<!-- start mob menu -->
<div class="clearfix navigation">
<div id="mob-menu">
<!-- test ul -->
<ul class="links">
<li class="last">test links - to be remove</li>
</ul>

<?php 
$main_menu_tree = menu_tree(variable_get('top_links_source', 'menu-top'));
print drupal_render($main_menu_tree);
?>
</div>
</div>
<!-- end mob menu -->

<!--
<div id="" class="container clearfix">  content wrapper -->

<!-- remove row    
 <div id="" class="row clearfix">
-->
<!----- remove -->
								<?php if ($page['sidebar_first']): ?>
                                  <aside id="sidebar" role="complementary" class="clearfix">
                                   THIS IS WHERE THE CAMPAIGN LINK ARE RENDERING<?php print render($page['sidebar_first']); ?>
                                  </aside> 
                                <?php endif; ?>


    <div style="background-color:grey">
     <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
    </div>
	
	<?php if ($page['sidebar_second']): ?>
    <section id="content" role="main" class="eightcol clearfix"> <!----- opening to section for sidebar pages -->
    <?php else: ?>
    <section id="content" role="main" class="clearfix">
    <?php endif; ?> 
     
      
      <?php print $messages; ?> <!----- system messages -->
      
      
      <?php print render($title_prefix); ?>
      <?php if (!$is_front): ?>
	  <?php if ($title && $show_title): ?><h1><?php print $title; ?></h1><?php endif; ?>
      <?php endif; ?>
	  <?php print render($title_suffix); ?>
      
      <div style="background-color:grey">
	  

      <?php print render($page['help']); ?>  <!--- help  -->
      
	  <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul> links<?php endif; ?>
      </div>
      
      <!--<strong> THIS IS ABOVE THE CONTENT $page rneder in the page tpl</strong>-->
	  <?php print render($page['content']); ?>
      <!--<strong> THIS IS BELOW THE CONTENT $page rneder in the page tpl</strong>-->
      
    </section> <!-- /#main -->

<!----- remove / move to node.tpl -->
  	<?php if ($page['sidebar_second']): ?>
      <aside id="sidebar" role="complementary" class="fourcol last clearfix">
       <?php print render($page['sidebar_second']); ?>
      </aside> 
    <?php endif; ?>

    <div class="clear"></div>
    
   
<!-- remove row  
 </div><!--END ROW -->

  		
 <div class="row clearfix" style="padding-top:10px; margin-bottom: 40px; background-color:#f1f1f1;">
        	
            <div class="eightcol">
         	 	<?php print render($page['footer']); ?>
        	</div>
            
            
            <div class="fourcol last">
            	<?php print render($page['footer_right']); ?>
           
 			</div>          
 </div><!--END ROW -->
        
        
 <div id="footer-menu" class="row clearfix"  style="padding-top:10px; margin-bottom: 40px; background-color:#f1f1f1;">
        <?php 
			 // https://www.drupal.org/node/1043018 How to print a menu in Drupal 7?
		   	$menu = menu_navigation_links('secondary-menu');
			print theme('links__secondary_menu', array('links' => $menu));
		
           	//$tree = menu_tree_all_data('secondary-menu');
			//menu_tree_add_active_path($tree);
			//$tree = add_active_trail($tree); // add this line 
			//print drupal_render(menu_tree_output($tree));
		   
		   
		    //$main_menu_tree2 = menu_tree(variable_get('secondary_links_source', 'secondary-menu'));
          	//print drupal_render($main_menu_tree2);
        ?>
 </div><!--END ROW -->
        
 <div id="" class="row clearfix" style="margin-bottom: 40px;">
        
            <div id="back-to-top" class="clearfix" style="float:right;">
              <a href="#" class"top">back up ↑</a>
            </div>
            
            <div id="copyright" class="clearfix"><span style="font-size:70%; color:#666;">
              <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>    
              <?php //print t('Theme by'); <a href="http://www.designkojo.net">DK</a> //?></span>  
            </div>
        
        
        
  </div> <!--END ROW --> 
  
 
<!-- container
</div-->