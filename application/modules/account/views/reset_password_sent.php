<?php $page_title = lang('forgot_password_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>

    <div id="content">
        <div class="container_12">
            
            <!-- INSTRUCTIONS -->
            <div class="grid_12">
                <?php echo sprintf(lang('reset_password_sent_instructions'), anchor('account/forgot_password', lang('reset_password_resend_the_instructions'))); ?>
            </div><!-- END instructions -->
            <div class="clear"></div>
            
        </div>
    </div>

<?php echo $this -> load -> view('inc/footer'); ?>