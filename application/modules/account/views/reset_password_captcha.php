<?php $page_title = lang('reset_password_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>
    <div id="content">
        <div class="container_12">
            
            <div class="grid_12">
                <?php echo form_open(uri_string() . (empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING'])); ?>
                
                    <!-- HEADING -->
                    <div class="grid_12 alpha omega">
                        <h2><?php echo lang('reset_password_page_name'); ?></h2>
                        <p><?php echo lang('reset_password_captcha'); ?></p>
                    </div><!-- END heading -->
                    <div class="clear"></div>
                    
                    <!-- RECAPTCHA -->
                    <?php if (isset($recaptcha)) : ?>
                        <div class="grid_6 alpha omega">
                            <?php echo $recaptcha; ?>
                        </div>
                        <div class="clear"></div>
                    
                        <?php if (isset($reset_password_recaptcha_error)) : ?>
                            <div class="grid_6 alpha omega">
                                <span class="field_error"><?php echo $reset_password_recaptcha_error; ?></span>
                            </div>
                            <div class="clear"></div>
                        <?php endif; ?><!-- END recaptcha -->
                    <?php endif; ?>
                    
                    <!-- SUBMIT BUTTON -->
                    <div class="grid_6 alpha omega">
                        <?php echo form_button(array('type' => 'submit', 'class' => 'button', 'content' => lang('reset_password_captcha_submit'))); ?>
                    </div><!-- END submit-button -->
                
                <?php echo form_close(); ?>
            </div><!-- END content-->
            <div class="clear"></div>
            
        </div>
    </div>

<?php echo $this -> load -> view('inc/footer'); ?>