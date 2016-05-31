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
<div class="header-wrapper">
<header id="header" class="clearfix">
    
<div class="row rowheader" >   
    
<hgroup id="logo" class="threecol">

<!-- HNPM Specific Converted NEEDS WORK  -->  
<h2 class="logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"> Holiday Niseko <span>Ski Japan Niseko accommodation and snowboard packages</span></a></h2>

<!-- logo || sitename || slogan Code Missing --> 

</hgroup>
        
<nav id="navigation" class="ninecol last">

<div class="phone">
<!--
<ul id="lang">
<li id="lang_jap"><a href="http://holidayniseko.jp">日本語</a></li>
</ul>
--> 
+81 123 45 6789 /main phone/ &nbsp; &nbsp; &nbsp; 
<a class="headeremail" href="mailto:sitemail">sitemail@</a>
</div>
<!-- From Bartik /#main-menu -->
<?php if ($main_menu): ?>
      <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#main-menu -->
<?php endif; ?>

<div id="menu-icon">&nbsp<?php //print $site_name; ?> &#x2261; </div>

</nav>
        
</div> <!--END ROW -->

<div style="visibility:hidden">
<!-- From Bartik /#secondary-menu -->
<?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
<?php endif; ?>
</div> <!-- /div wrapper vis: hidden for Bartik resources  -->

 	   
</header>
</div>

<!-- start mob menu -->
<div class="clearfix navigation">
<div id="mob-menu">
<!-- test ul -->
<ul class="links the-icons ">
<li class="phone-icon" > +81 123 45 6789 /main phone/</li>
</ul>
<?php if ($main_menu): ?>
      <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#main-menu -->
<?php endif; ?>
<?php 
$main_menu_tree = menu_tree(variable_get('top_links_source', 'menu-top'));
print drupal_render($main_menu_tree);
?>
</div>
</div>
<!-- end mob menu -->

<!--
<div id="" class="container clearfix">  content wrapper -->






<!-- remove row if not a page -->     
<?php if (!$page): ?>
<div id="" class="row clearfix">
<?php endif; ?>



<div style="background-color:grey">
<?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
</div>
<div style="background-color:grey">
<?php print render($page['help']); ?>  <!--- help  -->
<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
</div>


<?php if ($page['sidebar_first']): ?>
<section id="content" role="main" class="eightcol clearfix"> <!----- opening to section for sidebar pages -->
<?php elseif ($page['sidebar_second']): ?>
<section id="content" role="main" class="eightcol clearfix"> <!----- opening to section for sidebar pages -->
<?php else: ?>
<section id="content" role="main" class="clearfix">
<?php endif; ?>
 
<?php print $messages; ?> <!----- system messages -->

<!-- $show_title need to find out why this is used 
https://www.drupal.org/node/997148 Suppressing node titles on specific pages.
http://drupal.stackexchange.com/questions/62468/how-to-hide-title-of-any-content-type-without-using-a-module
if ($title && $show_title): ?><h1><php print $title; ?></h1><php endif; ?>
-->

<?php print render($title_prefix); ?>
<?php if (!$is_front): ?>
<?php if ($title): ?><h1><?php //print $title; ?></h1><?php endif; // MAYBE REMOVE THIS ?>
<?php endif; ?>
<?php print render($title_suffix); ?>
      
<!--<strong> THIS IS ABOVE THE CONTENT $page render in the page tpl</strong>-->
<?php print render($page['content']); ?>
<!--<strong> THIS IS BELOW THE CONTENT $page render in the page tpl</strong>-->
      
</section>
<!-- /#main -->

<!----- remove / move to node.tpl -->
  	<?php if ($page['sidebar_second']): ?>
      <aside id="sidebar" role="complementary" class="fourcol last clearfix">
       <?php print render($page['sidebar_second']); ?>
      </aside> 
    <?php endif; ?>
	
    <?php if ($page['sidebar_first']): ?>
    <aside id="sidebar" role="complementary" class="fourcol last clearfix">
    <?php print render($page['sidebar_first']); ?>
    </aside> 
     <?php endif; ?>
<!----- remove / move to node.tpl -->

<?php if (!$page): ?>
</div> <!-- temp row -->
<?php endif; ?>

    
<div class="clear"></div>
	
<div class="row clearfix" style="padding-top:10px; margin-bottom: 40px; background-color:#f1f1f1;">
<div class="eightcol">
         	 	<?php print render($page['footer']); ?>
</div>
<div class="fourcol last">
            	<?php print render($page['footer_right']); ?>
</div>
</div><!--END ROW -->
 
 
<div class="row contact">
<div class="fourcol" >Get in <a href="http://">contact</a> with us today!</div>
<div class="fourcol" ><i class="demo-icon icon-mail"></i> <a href="mailto:">asitemail@</a></div>
<div class="fourcol last the-icons" ><i class="demo-icon icon-phone-1"></i> +81(0)123-45-6789</div>
</div> 
 
 
<div id="" class="row clearfix" style="margin-bottom: 40px;">
        
            <!-- <div id="back-to-top" class="clearfix" style="float:right;">
              back up ↑
            </div>-->
           
            <div id="copyright" class="clearfix"><span style="font-size:70%; color:#666;">
              <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>    
              <?php //print t('Theme by'); <a href="http://www.designkojo.net">DK</a> //?></span>  
            </div>
        
        
        
</div> <!--END ROW -->