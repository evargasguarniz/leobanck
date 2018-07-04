<div id="wrap" class="clearfix">
  <div id="header-wrap">

    <header id="header" class="clearfix">
      <?php if ($page['header']): ?>
        <?php print render($page['header']); ?>
      <?php endif ?>
    </header>
  </div>

  <div id="main-content" class="clearfix">
    <?php $sidebarclass=" "; if($page['sidebar_first']) { $sidebarclass="sidebar-bg"; } ?>
    <div id="primary" class="container <?php print $sidebarclass; ?> clearfix">
      <section  role="main" class="clearfix">
        <?php print $messages; ?>
        <div class="row">
          <div class="col-lg-12 ">
            <div class="backgroun-color-64c4b8 padding-bottom-15 padding-top-15 position-absolute hidden-menu" id="custom-menu-totaggle">
                  <?php print theme('links__system_main_menu', array('links' => $main_menu, 
                      'attributes' => array('id' => 'main-menu', 'class' => array('links',
                      'inline', 'clearfix','list-style-none','pull-float-right')))); ?>
            </div>
          </div>
        </div>
        <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
        <div id="content-wrap">
          <div class="row">
            <div class="col-lg-12">
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-offset-3  col-lg-6 col-lg-offset-3  col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
              <?php print render($page['content']); ?>
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