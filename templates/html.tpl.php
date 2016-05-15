<!DOCTYPE html>
<html>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2"  />
<!--
  - TO BE REMOVE OR DOCUMENTED maybe use SEO module 
  - <meta name="google-site-verification" content="HwgKmHyMxsPmP1lRDnCzZaJPduluMDKXAKT3pnqdKp8" /> 
  -->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
<a href="#" class="back-to-top"> back up ↑ </a> 
</body>
</html>