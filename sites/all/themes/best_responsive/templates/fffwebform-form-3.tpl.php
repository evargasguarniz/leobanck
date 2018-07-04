<?php
/**
* @file
* webform-form-16.tpl
* Formulario de sugerencias
* Available variables:
* - $form: The complete form array.
* - $nid: The node ID of the Webform.
*
* The $form array contains two main pieces:
* - $form['submitted']: The main content of the user-created form.
* - $form['details']: Internal information stored by Webform.
* 
* div.created { display: none !important; }
* 
*/
?>
<?php
// If editing or viewing submissions, display the navigation at the top.
if (isset($form['submission_info']) || isset($form['navigation'])) {
 print drupal_render($form['navigation']);
 print drupal_render($form['submission_info']);
}
unset($form['submitted']['neme']['#title']);
unset($form['submitted']['email']['#title']);
unset($form['submitted']['phone']['#title']);
unset($form['submitted']['queery_client']['#title']);
?>

 <div class="formcontant">
   <div class="glr-module-title">¿Tienes sugerencas y comentarios?</div>
   <div class="module form comment">
     <div class="fieldbox">
       <fieldset class="section">
         <div class="cell contact-name">
           <label>Tu nombre o alias</label>
           <div class="input-box"><?php print drupal_render($form['submitted']['neme']); ?></div>
         </div>
         <div class="cell contact-email">
           <label>Tu correo electrónico</label>
           <div class="input-box"><?php print drupal_render($form['submitted']['email']); ?></div>
         </div>
         <div class="cell comment-message">
           <label>Tu comentario</label>
           <div class="input-box"><?php print drupal_render($form['submitted']['phone']); ?></div>
         </div>
         <div class="cell comment-query">
           <label>Tu comentario</label>
           <div class="input-box"><?php print drupal_render($form['submitted']['queery_client']); ?></div>
         </div>
       </fieldset>
       <fieldset class="section">
         <div class="cell">
           <!--
           <button class="command-button ml-230">ACEPTAR</button>
           -->
           <?php
           print drupal_render($form['submitted']);
           print drupal_render_children($form);
           if (isset($form['submission_info']) || isset($form['navigation'])) {
             unset($form['navigation']['#printed']);
             print drupal_render($form['navigation']);
           }
           ?>
         </div>
       </fieldset>  
     </div>
   </div>
 </div>