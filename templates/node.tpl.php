<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
?>
<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

<!-- need to add container for when in taxonomy pages -->
  <?php if (!$page): ?>
      <header>
	<?php endif; ?>
      
	  <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
      <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  
      <?php if ($display_submitted): ?>
		<div class="meta submitted">
      	<?php print $user_picture; ?>
      	<?php print $submitted; ?>
		</div>
      <?php endif; ?>

    <?php if (!$page): ?>
      </header>
  <?php endif; ?>


<?php if ($page): ?>
  <?php if ($content_links = render($content['links'])): ?> <!-- this solution for hiding regions in theme is dicusssed @ #953034 -->
    <div class="links admin" style="background-color:#CCC; margin-bottom:20px;"> <!--this still shows see issue on hiding above <br /><br />-->
      <?php print $content_links; ?><!--add if campaign only on campaign page<br /><br />-->
    </div>
 <?php endif; ?>
<?php endif; ?>


<!-- START hero -->
<?php if (isset($node->field_hero_toggle['und'][0]['value']) && $node->field_hero_toggle['und'][0]['value'] == 1 ) : ?>   
<div class="hero-wrapper" >
<div class="hero bg-holder-parallax" style="background-image:url(
<?php
// field_video_image is the name of the image field
// using field_get_items() you can get the field values (respecting multilingual setup)
$field_hero_image = field_get_items('node', $node, 'field_hero_image');

// after you have the values, you can get the image URL (you can use foreach here)
$hero1 = file_create_url($field_hero_image[0]['uri']);
print render($hero1); 
?> )">

<!-- START rowhero this is for content that is on the page and restricted to the page width-->       
<!--<div class="clearfix"></div>-->
 
<!-- END rowhero -->

<div class="hero_inner_" style="z-index:5;"> </div>

<div class="rowhero para_hero" style="z-index:6;">
<?php print render ($node->field_hero_paragraph['und'][0]['value']); ?>
</div>

</div>
</div> 
<?php endif; ?> 
<!-- END hero -->

<div class="clearfix"></div> 

<div class="row content"<?php print $content_attributes; ?>> <!-- content_attribute don't render-->

<?php if (!$page): ?>	
<h2 class="title"><?php print $title ?></h2>
<?php endif; ?>

<?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
?>
</div>

<div class="container">
<div class="row">

<!----- remove / move to node.tpl -->
  	<?php if ($region['sidebar_second']): ?>
      <aside id="sidebar" role="complementary" class="fourcol clearfix">
       <?php print render($region['sidebar_second']); ?>
      </aside>
      
    <?php endif; ?>
	
    <?php if ($region['sidebar_first']): ?>
    <aside id="sidebar" role="complementary" class="fourcol clearfix">
    <?php print render($region['sidebar_first']); ?>
    </aside>
    
     <?php endif; ?>
<!----- remove / move to node.tpl -->




<?php if ($region['sidebar_first']): ?>
<section id="content" role="main" class="eightcol last clearfix"> <!----- opening to section for sidebar pages -->
<?php elseif ($region['sidebar_second']): ?>
<section id="content" role="main" class="eightcol last clearfix"> <!----- opening to section for sidebar pages -->
<?php else: ?>
<section id="content" role="main" class="twelvecol clearfix">
<?php endif; ?>
<?php
print render($content);
?>

<?php 
print render($content['comments']); 
?>
</section>





</div>
</div>







<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>