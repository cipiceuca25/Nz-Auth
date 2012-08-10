<?php $page_title = lang('reset_password_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>
    
    <div id="content">
        <div class="container_12">
            
            <!-- INSTRUCTIONS -->
            <div class="grid_12">
                <h2><?php echo lang('reset_password_page_name'); ?></h2>
                
                <p><?php echo lang('reset_password_unsuccessful'); ?></p>
                <p><?php echo anchor('account/forgot_password', lang('reset_password_resend'), array('class' => 'button')); ?></p>
            </div><!-- END instructions -->
            <div class="clear"></div>
            
        </div>
    </div>

<?php echo $this -> load -> view('inc/footer'); ?>