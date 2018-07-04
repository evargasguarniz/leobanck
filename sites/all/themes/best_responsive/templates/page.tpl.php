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
<div id="wrap" class="clearfix">
  <div id="header-wrap">
    <header id="header" class="clearfix">
      <?php if ($page['header']): ?>
        <?php print render($page['header']); ?>
      <?php endif ?>
    </header>
  </div>

  <div id="main-content" class="clearfix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 ">
          <div class="backgroun-color-64c4b8 padding-bottom-15 padding-top-15 position-absolute hidden-menu" id="custom-menu-totaggle">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 
                      'attributes' => array('id' => 'main-menu', 'class' => array('links',
                      'inline', 'clearfix','list-style-none','pull-float-right')))); ?>
          </div>
        </div>
      </div>
      <?php if ($is_front): ?>
      <?php if ($site_slogan): ?><h2 id="site-slogan"><?php print $site_slogan; ?></h2><?php endif; ?>
        <div class="row">
          <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 margin-bottom-30 margin-top-15">
           <?php
              $block = module_invoke('graph_general','block_view','graph_general_grid_home');
              print render($block['content']);
            ?>
          </div>
          <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 margin-top-15 padding-top-15 text-center">
            <?php
              $block = module_invoke('graph_general','block_view','graph_general_block_outstanding');
              print render($block['content']);
            ?>
          </div>
        </div>
      <!--slider-->
      <?php endif; ?>
    </div>

    <?php $sidebarclass=" "; if($page['sidebar_first']) { $sidebarclass="sidebar-bg"; } ?>
    <div id="primary" class="container <?php print $sidebarclass; ?> clearfix">
      <section  role="main" class="clearfix">
        <?php print $messages; ?>
        <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
        <div id="content-wrap">
          <div class="row">
            <div class="col-lg-12">
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="page-title"><?php // print $title; ?></h1><?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
              <?php print render($page['content']); ?>
              
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <?php print render($page['side-lef']); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <?php print render($page['pre-content']); ?>
            </div>
          </div> 
        </div>
      </section>
      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar" role="complementary">
         <?php print render($page['sidebar_first']); ?>
        </aside> 
      <?php endif; ?>
    </div>
    <div class="clear"></div>
  </div>

  <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']  || $page['footer']): ?>
  <footer id="footer-bottom">
    <div id="footer-area" class="clearfix">
      <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
        <div id="footer-block-wrap" class="clearfix">
          <?php if($page['footer_first']): ?><div class="footer-block">
            <?php print render ($page['footer_first']); ?>
          </div><?php endif; ?>
          <?php if($page['footer_second']): ?><div class="footer-block">
            <?php print render ($page['footer_second']); ?>
          </div><?php endif; ?>
          <?php if($page['footer_third']): ?><div class="footer-block remove-margin">
            <?php print render ($page['footer_third']); ?>
          </div><?php endif; ?>
        </div>
        <div class="clear"></div>
      <?php endif; ?>
      
      <?php print render($page['footer']); ?>
    </div>
  </footer>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 background-color-ff9000 padding-top-15 padding-bottom-15 text-center">
        <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>. <?php print t('Echo por'); ?> <span class="text-white">Elmer Vargas G.</span>
      </div>    
    </div>
  </div>
</div>