<!DOCTYPE html>
<html>
    <head>
        <title><?php echo (isset($page_title)) ? $page_title : lang('website_title'); ?></title>
    
        <meta charset=utf-8">
        
        <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"  />
        
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/normalize.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/960.css"       />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css"     />
        
        <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery-1.8.0.min.js"></script>
    
    </head>
    
    <body>
    
        <div id="header">
        	<div class="container_12">
                <div class="grid_8">
                    <h1><?php echo anchor('', lang('website_title')); ?></h1>
                </div><!-- END logo -->
                
                <div class="grid_4">
                    <ul id="top_menu">
                        
                        <?php if ($this->authentication->is_signed_in()) : ?>
                            <li><?php echo sprintf(lang('website_welcome_username'), '<strong>' . $account -> username . '</strong>'); ?></li>
                            <li><?php echo anchor('account/settings', lang('website_account')); ?></li>
                            <li><?php echo anchor('account/logout', lang('website_sign_out')); ?></li>
                        <?php else : ?>
                            <li><?php echo anchor('account/signup', lang('website_sign_up')); ?></li>
                            <li><?php echo anchor('account/login', lang('website_sign_in')); ?></li>
                        <?php endif; ?>
                        
                    </ul>
                </div><!-- END login-data -->
                <div class="clear"></div>
            </div>
        </div>