        <div id="footer">
            <div class="container_12">
                
                <div class="grid_12">
                    
                    <div class="grid_6 alpha">
                        Copyright &copy; <?php echo date('Y'); ?> <?php echo lang('website_title'); ?>
                    </div><!-- END copyright -->
                    
                    <div class="grid_6 omega textright">
                        <?php echo sprintf(lang('website_page_rendered_in_x_seconds'), $this->benchmark->elapsed_time()); ?>
                    </div><!-- END benchmark -->
                    
                </div>
                <div class="clear"></div>                
            </div>
        </div>
    </body>
</html>