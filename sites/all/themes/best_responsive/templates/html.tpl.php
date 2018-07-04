<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3
        &key=AIzaSyCoHvTZB0mzfr-w-RaJEJOlsgnpsWMwp80"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="https://fonts.googleapis.com/css?family=Lora|Open+Sans+Condensed:300|Roboto+Slab:300,400,700|Slabo+27px" rel="stylesheet">
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if lt IE 9]><script src="<?php print base_path() . drupal_get_path('theme', 'best_responsive') . '/js/html5.js'; ?>"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>