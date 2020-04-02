<div class="navbar navbar-default navbar-static-top <?php if($_GET['page'] == 'home') echo 'navbar-no-margin'; ?>" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand hidden-sm" href="<?= $settings->url ?>"><img src="<?= $settings->url ?>/template/images/logo.png" alt="<?= $settings->title; ?>"></a>
		</div>
		<div class="navbar-collapse collapse pull-right">
			<ul class="nav navbar-nav">
				<li><a href="servers"><?= $language['menu']['home']; ?></a></li>
				<li><a href="purchase-highlight"><?= $language['menu']['purchase_highlight']; ?></a></li>

				<?php if(User::logged_in() == false) { ?>
				<li><a href="login"><?= $language['menu']['login']; ?></a></li>
				<li><a href="register"><?= $language['menu']['register']; ?></a></li>
				<?php } else { ?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $language['menu']['account']; ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="submit"><?= $language['menu']['submit']; ?></a></li>
						<li><a href="my-servers"><?= $language['menu']['my_servers']; ?></a></li>
						<li><a href="my-favorites"><?= $language['menu']['my_favorites']; ?></a></li>
						<li><a href="profile/<?= $account->username; ?>"><?= $language['menu']['my_profile']; ?></a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $language['menu']['settings']; ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="settings/profile"><?= $language['menu']['profile_settings']; ?></a></li>
						<li><a href="settings/design"><?= $language['menu']['design_settings']; ?></a></li>
						<li><a href="settings/password"><?= $language['menu']['change_password']; ?></a></li>
					</ul>
				</li>

				<?php if(User::is_admin($account_user_id)) { ?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $language['menu']['admin']; ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="admin/users-management"><?= $language['menu']['users_management']; ?></a></li>
						<li><a href="admin/servers-management"><?= $language['menu']['servers_management']; ?></a></li>
						<li><a href="admin/categories-management"><?= $language['menu']['categories_management']; ?></a></li>
						<li><a href="admin/reports-management"><?= $language['menu']['reports_management']; ?></a></li>
						<?php if(User::get_type($account_user_id) > 1) { ?>
						<li><a href="admin/website-settings"><?= $language['menu']['website_settings']; ?></a></li>
						<li><a data-confirm="<?= $language['messages']['reset_votes']; ?>" href="admin/reset"><?= $language['menu']['reset_votes']; ?></a></li>
						<li><a href="admin/payments-management"><?= $language['menu']['payments_management']; ?></a></li>
						<?php } ?>
						<li><a href="admin/website-statistics"><?= $language['menu']['website_statistics']; ?></a></li>
					</ul>
				</li>
				<?php } ?>

				<li><a href="logout"><?= $language['menu']['logout']; ?></a></li>
				<?php } ?>
			</ul>

			<p class="navbar-social pull-right hidden-sm">
				<?php
				if(!empty($settings->facebook))
					echo '<a href="http://facebook.com/' . $settings->facebook . '"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a>';

				if(!empty($settings->twitter))
					echo '<a href="http://twitter.com/' . $settings->twitter . '"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></a>';

				if(!empty($settings->googleplus))
					echo '<a href="http://plus.google.com/' . $settings->googleplus . '"><span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-google-plus fa-stack-1x fa-inverse"></i></span></a>';

				?>
			</p>

		</div>
	</div>
</div>
