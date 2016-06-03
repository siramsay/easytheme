<?php
/** D7 */
/**
* Sets the body tag class and id attributes.
*
* From the Theme Developer's Guide, http://drupal.org/node/32077
*
* @param $is_front
*   boolean Whether or not the current page is the front page.
* @param $layout
*   string Which sidebars are being displayed.
* @return
*   string The rendered id and class attributes.
*/


/**
 * define page templates for content types
 */
// https://www.drupal.org/node/249726 Page templates depending on node type define a page--node-story.tpl.php (for D7 page--node--story.tpl.php) template which would apply to every page that uses the 'story' content type.
function hn_employ_preprocess_page(&$variables, $hook) {
  if (!empty($variables['node']) && !empty($variables['node']->type)) {
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
  }
  
  /*if ((!empty($variables['node']) && arg(1) == 'add')) { // 
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type .'__add';
  }*/
  
  $variables['print_extra_header'] = false;
  if (isset($variables['node']) && $variables['node']->type == 'deals_page') {
    $variables['print_extra_header'] = true;
  }	
  
  $variables['print_extra_footer'] = false;
  if (isset($variables['node']) && $variables['node']->type == 'campaigns_grouped') {
    $variables['print_extra_footer'] = true;
  }
  
}

function easytheme_preprocess_node(&$variables) {

  // Get a list of all the regions for this theme
  foreach (system_region_list($GLOBALS['theme']) as $region_key => $region_name) {

    // Get the content for each region and add it to the $region variable
    if ($blocks = block_get_blocks_by_region($region_key)) {
      $variables['region'][$region_key] = $blocks;
    }
    else {
      $variables['region'][$region_key] = array();
    }
  }
  
  /* 
   * region to work with context
   *
   * http://www.raisedeyebrow.com/blog/2012/07/displaying-drupal-context-regions-node-templates
   */  
  //$reaction = context_get_plugin('reaction', 'block');
  //$var = $variables['region']['sidebar_first'];
  //$variables['region']['sidebar_first'] = ($reaction->block_get_blocks_by_region('sidebar_first')); //

}

/* Change the Submitted by author and date display option for better styling 
function hnresponsived7_preprocess_node(&$vars) {
  if (variable_get('node_submitted_' . $vars['node']->type, TRUE)) {
    $date = format_date($vars['node']->created, 'date_type');
    $vars['submitted'] = t('Posted by !username on !datetime', array('!username' => $vars['name'], '!datetime' => $date));
  }
}
*/

/**
 * add node template theming http://stackoverflow.com/questions/1538600/how-can-i-theme-the-template-for-edit-or-add-a-node-for-a-specific-content-type 
 
function themeName_preprocess_page(&$vars, $hook) {
  if ((arg(0) == 'node') && (arg(1) == 'add' && arg(2) == 'product')) {
    $vars['template_files'][] =  'page-node-add-product';
  }
  // MINE BELOW / didn't work
  if ((arg(0) == 'node') && (arg(1) == 'add' && arg(2) == 'reviews')) {
    $variables['template_files'][] =  'page__node_add__reviews';
  }
  
}

//// https://www.drupal.org/node/983864#comment-6097732
 if  ((arg(0) == 'node') && arg(1) == 'add') { // (!empty($variables['node'])
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type .'__add';
  }
   
   
   

*/

/**
 * thisworks at node template level  https://www.drupal.org/node/983864#comment-6232270
function hnresponsived7_theme() {
  return array(
    'reviews_node_form' => array(
      'arguments' => array(
          'form' => NULL,
      ),
      'template' => 'templates/reviews-node-form', // set the path here if not in root theme directory 
      'render element' => 'form',
    ),
  );
}
*/

/**
 * Override the search box
 */
//function hnresponsive_search_block_form($form) { d6
function hn_employ_form_search_block_form_alter(&$form, &$form_state) {
  $form['actions']['submit']['#type'] = 'image_button';
  $form['actions']['submit']['#src'] = drupal_get_path('theme', 'hnresponsive51') . '/img/search_mag_sml.png';
  $form['actions']['submit']['#attributes']['class'][]= 'btn';
  //return '<div id="search" class="container-inline">' . drupal_render($form) . '</div>';
}


/**
 * Override Reviews Button
 */

// <form id="reviews-node-form" class="node-form node-reviews-form" accept-charset="UTF-8" method="post" action="
// <input id="edit-submit" class="form-submit" type="submit" value="Save" name="op">
function hn_employ_form_reviews_node_form_alter(&$form, &$form_state) {
	$form['actions']['submit']['#value'] ='Submit Review';
}

//http://drupal.stackexchange.com/questions/126132/better-exposed-filters-override-any-only-working-on-one-filter-at-a-time
function hn_employ_views_exposed_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'views-exposed-form-all-niskeo-accommodation-page-1') { // && $form_state['view']->name == 'all_niskeo_accommodation') {
    $form['bedrooms']['#options']['All'] = t('Bedrooms');
    $form['tid']['#options']['All'] = t('Type');
    // and so on.        
  }
}

//render menu tree in template
//http://stackoverflow.com/questions/27038401/drupal-7-custom-menu-rendering 
function render_menu_tree($menu_tree) {
    print '<ul>';
    foreach ($menu_tree as $link) {
        print '<li>';
        $link_path = '#';
        $link_title = $link['link']['link_title'];
        if($link['link']['link_path']) {
            $link_path = drupal_get_path_alias($link['link']['link_path']);
        }
        print '<a href="/' . $link_path . '">' . $link_title . '</a>';
        if(count($link['below']) > 0) {
            render_menu_tree($link['below']);
        }
        print '</li>';
    }
    print '</ul>';
}