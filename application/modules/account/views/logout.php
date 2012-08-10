<?php $page_title = lang('sign_out_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>

    <div id="content">
        <div class="container_12">
            
            <!-- MESSAGE -->
            <div class="grid_12">
                <h2><?php echo lang('sign_out_successful'); ?></h2>
                <p><?php echo anchor('', lang('sign_out_go_to_home'), array('class' => 'button')); ?></p>
            </div><!-- END message -->
            <div class="clear"></div>
            
        </div>
    </div>

<?php echo $this -> load -> view('inc/footer'); ?>