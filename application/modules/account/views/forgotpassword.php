<?php $page_title = lang('forgot_password_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>
    <div id="content">
        <div class="container_12">
            
            <!-- HEADING -->
            <div class="grid_12">
                <h2><?php echo lang('forgot_password_page_name'); ?></h2>
            </div><!-- END heading -->
            <div class="clear"></div>
            
            <!-- CONTENT -->
            <div class="grid_12">
                <?php echo form_open(uri_string()); ?>
                
                    <p><?php echo lang('forgot_password_instructions'); ?></p>
                    
                   <!-- EMAIL FIELD -->
                    <div class="grid_2 alpha">
                        <?php echo form_label(lang('forgot_password_username_email'), 'forgot_password_username_email'); ?>
                    </div>
                    <div class="grid_6 omega">
                        <?php echo form_input(array('name' => 'forgot_password_username_email', 'id' => 'forgot_password_username_email', 'value' => set_value('forgot_password_username_email') ? set_value('forgot_password_username_email') : (isset($account) ? $account -> username : ''), 'maxlength' => '80')); ?>
                        <?php echo form_error('forgot_password_username_email'); ?>
                        <?php if (isset($forgot_password_username_email_error)) : ?>
                        <span class="field_error"><?php echo $forgot_password_username_email_error; ?></span>
                        <?php endif; ?>
                    </div><!-- END email-field -->
                    <div class="clear"></div>
                    
                    <!-- RECAPTCHA -->
                    <?php if (isset($recaptcha)) : ?>
                        <div class="prefix_2 grid_8 alpha">
                            <?php echo $recaptcha; ?>
                        </div>
                        
                        <?php if (isset($forgot_password_recaptcha_error)) : ?>
                            <div class="prefix_2 grid_6 alpha">
                                <span class="field_error"><?php echo $forgot_password_recaptcha_error; ?></span>
                            </div>
                        <?php endif; ?><!-- END captcha -->
                        <div class="clear"></div>
                    <?php endif; ?>
                    
                    <!-- SUBMIT BUTTON -->
                    <div class="prefix_2 grid_6 alpha">
                        <?php echo form_button(array('type' => 'submit', 'class' => 'button', 'content' => lang('forgot_password_send_instructions'))); ?>
                    </div><!-- END submit-button -->
                    
                <?php echo form_close(); ?>
            </div><!-- END content -->
            <div class="clear"></div>
            
        </div>
    </div>
    
<?php echo $this -> load -> view('inc/footer'); ?>