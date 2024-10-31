<form action='admin.php?page=travelinsurance' method="post">
  <!-- Flash Messages -->
	<?php if(isset($status)) : ?>
		<div id="message" class="<?php echo $class_message ?> notice is-dismissible below-h2">
			<p><?php echo $message; ?></p>
			<button type="button" class="notice-dismiss"></button>
		</div>
	<?php endif; ?>
  
  <!-- SIGN UP -->
	<h3>1 - <?php _e('Not yet an affiliate?', 'travel-insurance'); ?></h3>
  <p>
    <?php _e('Real Travel Insurance Affiliate Program is focused on people who wish', 'travel-insurance') ?>
    <strong><?php _e('to raise their profits', 'travel-insurance') ?></strong>
    <?php _e('quickly, through their', 'travel-insurance'); ?>
    <strong><?php _e('contacts network', 'travel-insurance'); ?></strong>.
  </p>
  <p>
    <?php _e('Sign up on our Affiliate Program', 'travel-insurance') ?>.<br />

    <?php _e('Register in', 'travel-insurance'); ?>:
    <a href='https://www.seguroviagem.srv.br/afiliados' target="_blank">
      https://www.seguroviagem.srv.br/afiliados
    </a>
  </p>


  <!-- FILL UP -->
  <h3>2 - <?php _e('Inform your affiliate key', 'travel-insurance'); ?></h3>
  <p><?php _e('Once an affiliate, you can copy your affiliate key and paste it on this field', 'travel-insurance') ?></p>
  <p>
    <label><?php _e('Affiliate key', 'travel-insurance'); ?>:</label><br/>
    <input size="40" type="text" name="wp-travel-insurance-metas[travel-insurance-token]" value="<?php echo $token; ?>"/>
    <input type="submit" value="<?php _e('Save', 'travel-insurance'); ?>" class="button-primary" name="submit"/>  
  </p>


  <!-- USE -->
  <h3>3 - <?php _e('Use your shortcode', 'travel-insurance'); ?></h3>
  <p>
    <?php _e('Copy this shortcode and paste it on a post', 'travel-insurance') ?>.<br/>
    <?php _e('After that, you should save your post and publish it', 'travel-insurance') ?>.<br/>
    <?php _e('There you go! Now you have your own travel insurance comparison site.', 'travel-insurance') ?><br/>
  </p>
  <div class="updated notice-info notice below-h2">
    [travelinsurance]
  </div>
</form>
