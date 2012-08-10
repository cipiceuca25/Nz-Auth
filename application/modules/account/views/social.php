<?php $page_title = lang('linked_page_name'); ?>

<?php echo $this -> load -> view('inc/header'); ?>
<?php echo $this -> load -> view('account/account_menu', array('current' => 'account_linked')); ?>

    <div id="content">
        <div class="container_12">
            
            <!-- HEADING -->
            <div class="grid_12">
                <h2><?php echo lang('linked_page_name'); ?></h2>
            </div><!-- END heading -->
            <div class="clear"></div>
            
            <!-- CONTENT -->
            <div class="grid_6">
                <h3><?php echo lang('linked_currently_linked_accounts'); ?></h3>
                
                <?php if ($this->session->flashdata('linked_info')) : ?>
                    <div class="form_info"><?php echo $this -> session -> flashdata('linked_info'); ?></div>
                <?php endif; ?>
                
                <?php if ($num_of_linked_accounts == 0) : ?>
                    <div class="grid_5 alpha omega">
                        <p><?php echo lang('linked_no_linked_accounts'); ?></p>
                    </div>
                <?php else : ?>
                    
                    <!-- FACEBOOK LINK -->
                    <?php if ($facebook_links) : ?>
                        <?php foreach ($facebook_links as $facebook_link) : ?>
                            
                            <div class="grid_1 alpha">
                                <img src="resource/img/auth_icons/facebook.png" alt="<?php echo lang('facebook'); ?>" title="<?php echo lang('connect_facebook'); ?>" width="40" />
                            </div><!-- end fb-icon -->
                            
                            <div class="grid_3">
                                <?php echo lang('connect_facebook'); ?><br />
                                <?php echo anchor('http://facebook.com/profile.php?id=' . $facebook_link -> facebook_id, substr('http://facebook.com/profile.php?id=' . $facebook_link -> facebook_id, 0, 30) . (strlen('http://facebook.com/profile.php?id=' . $facebook_link -> facebook_id) > 30 ? '...' : ''), array('target' => '_blank', 'title' => 'http://facebook.com/profile.php?id=' . $facebook_link -> facebook_id)); ?>
                            </div><!-- END profile-link -->
                            
                            <div class="grid_1 omega">
                                <?php if ($num_of_linked_accounts != 1) : ?>
                                    <?php echo form_open(uri_string()); ?>
                                        <?php echo form_fieldset(); ?>
                                            <?php echo form_hidden('facebook_id', $facebook_link -> facebook_id); ?>
                                            <?php echo form_button(array('type' => 'submit', 'class' => 'button', 'content' => lang('linked_remove'))); ?>
                                        <?php echo form_fieldset_close(); ?>
                                    <?php echo form_close(); ?>
                                <?php endif; ?>
                            </div><!-- END remove-button -->
                            <div class="clear"></div>
                            
                       <?php endforeach; ?>
                    <?php endif; ?>
                    
                    
                    <!-- TWITTER LINK -->
                    <?php if ($twitter_links) : ?>
                        <?php foreach ($twitter_links as $twitter_link) : ?>
                            
                            <div class="grid_1 alpha">
                                <img src="resource/img/auth_icons/twitter.png" alt="<?php echo lang('connect_twitter'); ?>" title="<?php echo lang('twitter'); ?>" width="40" />
                            </div><!-- end twt-icon -->
                            
                            <div class="grid_3">
                                <?php echo lang('connect_twitter'); ?><br />
                                <?php echo anchor('http://twitter.com/' . $twitter_link -> twitter -> screen_name, substr('http://twitter.com/' . $twitter_link -> twitter -> screen_name, 0, 30) . (strlen('http://twitter.com/' . $twitter_link -> twitter -> screen_name) > 30 ? '...' : ''), array('target' => '_blank', 'title' => 'http://twitter.com/' . $twitter_link -> twitter -> screen_name)); ?>
                            </div><!-- END profile-link -->
                            
                            <div class="grid_1 omega">
                                <?php if ($num_of_linked_accounts != 1) : ?>
                                    <?php echo form_open(uri_string()); ?>
                                        <?php echo form_fieldset(); ?>
                                            <?php echo form_hidden('twitter_id', $twitter_link -> twitter_id); ?>
                                            <?php echo form_button(array('type' => 'submit', 'class' => 'button', 'content' => lang('linked_remove'))); ?>
                                        <?php echo form_fieldset_close(); ?>
                                    <?php echo form_close(); ?>
                                <?php endif; ?>
                            </div><!-- END remove-button -->
                            <div class="clear"></div>
                            
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                <?php endif; ?>
                
            </div><!-- END content -->
            
            <!-- LINK ACCOUNTS -->
            <?php if ($num_of_linked_accounts < 2) : ?>
                <div class="grid_6 alpha">
                    
                    <h3><?php echo lang('linked_link_with_your_account_from'); ?></h3>
                    
                    <?php if ($this->session->flashdata('linked_error')) : ?>
                        <div class="form_error"><?php echo $this->session->flashdata('linked_error'); ?></div>
                    <?php endif; ?>
                    
                    <ul class="third_party">
                        <?php if (!$twitter_links) : ?>
                            <li class="third_party"><?php echo anchor('account/twitter', lang('connect_twitter'), 
                                array('title'=>sprintf(lang('connect_with_x'), lang('connect_twitter')))); ?></li>
                        <?php endif; ?>
                        
                        <?php if (!$facebook_links) : ?>
                            <li class="third_party"><?php echo anchor('account/facebook', lang('connect_facebook'), 
                                array('title'=>sprintf(lang('connect_with_x'), lang('connect_facebook')))); ?></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- END link-accounts -->
                <div class="clear"></div>
            <?php endif; ?>
            
        </div>
    </div>

<?php echo $this -> load -> view('inc/footer'); ?>