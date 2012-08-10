<?php $page_title = lang('sign_up_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>
    <div id="content">
        <div class="container_12">
            
            <!-- HEADING -->
            <div class="grid_12">
                <h2><?php echo lang('sign_up_page_name'); ?></h2>
            </div><!-- END heading -->
            <div class="clear"></div>
            
            <!-- CONTENT -->
            <div class="grid_6">
                <?php echo form_open(uri_string()); ?>
                
                    <h3><?php echo lang('sign_up_heading'); ?></h3>
                    
                    <!-- USERNAME FIELD -->
                    <div class="grid_2 alpha">
                        <?php echo form_label(lang('sign_up_username'), 'sign_up_username'); ?>
                    </div>
                    <div class="grid_4 omega">
                        <?php echo form_input(array('name' => 'sign_up_username', 'id' => 'sign_up_username', 'value' => set_value('sign_up_username'), 'maxlength' => '24')); ?>
                        <?php echo form_error('sign_up_username'); ?>
                        
                        <?php if (isset($sign_up_username_error)) : ?>
                            <span class="field_error"><?php echo $sign_up_username_error; ?></span>
                        <?php endif; ?>
                    </div><!-- END username-field -->
                    <div class="clear"></div>
                    
                    <!-- PASSWORD FIELD -->
                    <div class="grid_2 alpha">
                        <?php echo form_label(lang('sign_up_password'), 'sign_up_password'); ?>
                    </div>
                    <div class="grid_4 omega">
                        <?php echo form_password(array('name' => 'sign_up_password', 'id' => 'sign_up_password', 'value' => set_value('sign_up_password'))); ?>
                        <?php echo form_error('sign_up_password'); ?>
                    </div><!-- END password-field -->
                    <div class="clear"></div>
                    
                    <!-- EMAIL FIELD -->
                    <div class="grid_2 alpha">
                        <?php echo form_label(lang('sign_up_email'), 'sign_up_email'); ?>
                    </div>
                    <div class="grid_4 omega">
                        <?php echo form_input(array('name' => 'sign_up_email', 'id' => 'sign_up_email', 'value' => set_value('sign_up_email'), 'maxlength' => '160')); ?>
                        <?php echo form_error('sign_up_email'); ?>
                        
                        <?php if (isset($sign_up_email_error)) : ?>
                            <span class="field_error"><?php echo $sign_up_email_error; ?></span>
                        <?php endif; ?>
                    </div><!-- END email-field -->
                    <div class="clear"></div>
                    
                    <!-- RECAPTCHA -->
                    <?php if (isset($recaptcha)) : ?>
                        <div class="prefix_2 grid_4 alpha omega">
                            <?php echo $recaptcha; ?>
                        </div>
                        
                        <?php if (isset($sign_up_recaptcha_error)) : ?>
                            <div class="prefix_2 grid_4 alpha omega">
                                <span class="field_error"><?php echo $sign_up_recaptcha_error; ?></span>
                            </div>
                        <?php endif; ?><!-- END recaptcha -->
                        <div class="clear"></div>
                    <?php endif; ?>
                    
                    <!-- SUBMIT BUTTON -->
                    <div class="prefix_2 grid_4 alpha omega">
                        <?php echo form_button(array('type' => 'submit', 'class' => 'button', 'content' => lang('sign_up_create_my_account'))); ?>
                    </div>
                    <div class="prefix_2 grid_4 alpha omega">
                        <p><?php echo lang('sign_up_already_have_account'); ?> <?php echo anchor('account/login', lang('sign_up_sign_in_now')); ?></p>
                    </div><!-- END submit-button -->
                    <div class="clear"></div>
                
                <?php echo form_close(); ?>
            </div>
            
            <!-- SOCIAL LOGIN -->
            <?php if (count($this->config->item('third_party_auth_providers')) > 0) : ?>
                <div class="grid_6">
                    <h3><?php echo sprintf(lang('sign_up_third_party_heading')); ?></h3>
            
                    <ul>
                        <?php foreach($this->config->item('third_party_auth_providers') as $provider) : ?>
                            <li class="third_party <?php echo $provider; ?>"><?php echo anchor('account/' . $provider, lang('connect_' . $provider), array('title' => sprintf(lang('sign_up_with'), lang('connect_' . $provider)))); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <div class="clear"></div>
                </div><!-- END social-login -->
            <?php endif; ?>
            <div class="clear"></div>
            
        </div>
    </div>
    
<?php echo $this -> load -> view('inc/footer'); ?>