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
  <?php if (!empty($content['links'])): ?>
    <div class="links admin" style="background-color:#CCC; margin-bottom:20px;">
      <?php print render($content['links']); ?>  <!--add if campaign only on campaign page<br /><br />-->
    </div>
 <?php endif; ?>
<?php endif; ?>


<!-- START hero -->
<?php if (isset($node->field_hero_toggle['und'][0]['value']) && $node->field_hero_toggle['und'][0]['value'] == 1 ) : ?>   

<div class="hero" style="background-attachment:fixed; background-image:url(
<?php
// field_video_image is the name of the image field

// using field_get_items() you can get the field values (respecting multilingual setup)
$field_hero_image = field_get_items('node', $node, 'field_hero_image');

// after you have the values, you can get the image URL (you can use foreach here)
$hero1 = file_create_url($field_hero_image[0]['uri']);
print render($hero1); 
?> )">

<!-- START rowhero this is for content that is on the page and restricted to the page width-->       
<div class="rowhero">
<?php  if (isset($content['field_top_image_grouped_deals'])): ?>    
<div class="rowhero" style="background-image:url(<?php print render ($content['field_top_image_grouped_deals']); ?>); background-repeat:no-repeat;  height:300px;">
<?php else: ?> 
<div class="rowhero" style="height:auto;">
<?php print render ($node->field_hero_paragraph['und'][0]['value']); ?>
<br /><h2 class="hero_title"><?php print render ($node->field_hero_headline['und'][0]['value']); ?><?php print render ($node->field_campaign_headline['und'][0]['value']); ?></h2> 
<br /><h2 class="hero_subtitle"><?php print render ($node->field_hero_headline_2['und'][0]['value']); ?><?php print render ($node->field_campaign_headline_2['und'][0]['value']); ?></h2>

<?php endif; ?> 
</div> 
</div> 
<!-- END rowhero -->

</div>        
<?php endif; ?> 
<!-- END hero -->

  <div class="row content"<?php print $content_attributes; ?>> <!-- content_attribute don't render-->
	
<h2 class="title"></h2> <?php //print $title ?> <!-- title removed for HN as in header -->

<?php
      // Hide comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
?>

<div class="row">
<!--<h2>What our current owners say</h2>-->
<div class="fourcol" >
<em>“It's pleasing to see a return from our property after some poor years” </em>with the past manager<br />
</div>
<div class="fourcol" >
<em>“This first year with you has gone a long way to restoring our faith in investing in Japan”</em><br />
</div>
<div class="fourcol last" >
<em>“Fantastic, keep up the good work!” </em>After informing the owner of their cash return for the winter.<br />
</div>
</div>

<div class="row">
<div class="fourcol" >
<strong>71</strong>Properties under our management<br />
</div>
<div class="fourcol" >
<strong>30000+</strong>Bed Nights<br />
</div>
<div class="fourcol last" >
<strong>6000+</strong>Guest Served<br />
</div>
</div>



	<?php
      print render($content);
    ?>

<div class="clearfix"></div>    

 
  <?php print render($content['comments']); ?>

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>