<div id="main_menu">
    <div class="container_12">
        <div class="grid_12">
            <ul>
                <li<?php if ($current == 'settings') echo ' class="active"'; ?>><?php echo anchor('account/settings', lang('website_account')); ?></li>
                <li<?php if ($current == 'password') echo ' class="active"'; ?>><?php echo anchor('account/password', lang('website_password')); ?></li>
				
				<?php if (count($this->config->item('third_party_auth_providers')) > 0) : ?>
					<li<?php if ($current == 'social') echo ' class="active"'; ?>><?php echo anchor('account/social', lang('website_linked')); ?></li>
				<?php endif; ?>
				
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>