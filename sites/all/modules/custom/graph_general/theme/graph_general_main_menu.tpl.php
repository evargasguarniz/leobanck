<div class="container">
  <div class="row">
    <div class="col-lg-12 ">
      <div class="hidden-lg hidden-md text-white hidden-sm backgroun-color-64c4b8 font-size-20">
        <span id="custom-menu-movil" class="glyphicon glyphicon-align-justify"></span>
      </div>
      <div class="backgroun-color-64c4b8 padding-bottom-15 padding-top-15 position-absolute hidden-menu" id="custom-menu-totaggle">
        <a class="menu-custom-home text-white font-size-20" href="/">
          <span class="glyphicon glyphicon-home" >
        </a>
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 
                      'attributes' => array('id' => 'main-menu', 'class' => array('links',
                      'inline', 'clearfix')))); ?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>