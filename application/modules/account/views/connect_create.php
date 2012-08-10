<?php $page_title = lang('connect_create_account'); ?>

<?php echo $this -> load -> view('inc/header'); ?>
    <div id="content">
        <div class="container_12">
            
            <!-- HEADING -->
            <div class="grid_12">
                <h2><?php echo lang('connect_create_account'); ?></h2>
            </div><!-- END heading -->
            <div class="clear"></div>
            
            <!-- CONTENT -->
            <div class="grid_6">
                <?php echo form_open(uri_string()); ?>
                    <h3><?php echo lang('connect_create_heading'); ?></h3>
                    
                    <?php if (isset($connect_create_error)) : ?>
                        <div class="grid_6 alpha">
                            <div class="form_error"><?php echo $connect_create_error; ?></div>
                        </div>
                        <div class="clear"></div>
                    <?php endif; ?>
                    
                    <!-- USERNAME FIELD -->
                    <div class="grid_2 alpha">
                        <?php echo form_label(lang('connect_create_username'), 'connect_create_username'); ?>
                    </div>
                    <div class="grid_4 omega">
                        <?php echo form_input(array('name' => 'connect_create_username', 'id' => 'connect_create_username', 'value' => set_value('connect_create_username') ? set_value('connect_create_username') : (isset($connect_create[0]['username']) ? $connect_create[0]['username'] : ''), 'maxlength' => '16')); ?>
                        <?php echo form_error('connect_create_username'); ?>
                        <?php if (isset($connect_create_username_error)) : ?>
                        <span class="field_error"><?php echo $connect_create_username_error; ?></span>
                        <?php endif; ?>
                    </div><!-- END username-field -->
                    <div class="clear"></div>
                    
                    <!-- EMAIL FIELD -->
                    <div class="grid_2 alpha">
                        <?php echo form_label(lang('connect_create_email'), 'connect_create_email'); ?>
                    </div>
                    <div class="grid_4 omega">
                        <?php echo form_input(array('name' => 'connect_create_email', 'id' => 'connect_create_email', 'value' => set_value('connect_create_email') ? set_value('connect_create_email') : (isset($connect_create[0]['email']) ? $connect_create[0]['email'] : ''), 'maxlength' => '160')); ?>
                        <?php echo form_error('connect_create_email'); ?>
                        <?php if (isset($connect_create_email_error)) : ?>
                        <span class="field_error"><?php echo $connect_create_email_error; ?></span>
                        <?php endif; ?>
                    </div><!-- END email-field -->
                    <div class="clear"></div>
                    
                    <!-- SUBMIT BUTTON -->
                    <div class="prefix_2 grid_4 alpha">
                        <?php echo form_button(array('type' => 'submit', 'class' => 'button', 'content' => lang('connect_create_button'))); ?>
                    </div><!-- END submit-button -->
                    <div class="clear"></div>
                    
                <?php echo form_close(); ?>
            </div><!-- END content -->
            <div class="clear"></div>
            
        </div>
    </div>

<?php echo $this -> load -> view('inc/footer'); ?>