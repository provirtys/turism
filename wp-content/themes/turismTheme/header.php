<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Школа Туризма</title>
	<?php wp_head(); ?>
</head>


<body>

	<div class="wrapper">
		<section class="header">
			<div class="header__container container">
				<a href="<?php the_permalink(47) ?>" class="header__logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="" class="header__logo-img">
				</a>
				<div class="header__menu menu">
					<div class="menu__icon">
						<span></span>
					</div>
					<nav class="menu__body">
						<?php
						if (is_user_logged_in()) {
							$userInfo = get_user_meta(get_current_user_id());
							if (array_key_exists("myID", $userInfo)) {
								$userID = $userInfo["myID"][0];
								$userRole = $userInfo["myRole"][0];
								$id_school = $userID;
							}
							if ($userRole == "school") {
								wp_nav_menu([
									'theme_location'  => 'menu_school',
									'container'       => null,
									'menu_class'      => 'menu__list',
								]);
							} else if ($userRole == "mkk") {
								wp_nav_menu([
									'theme_location'  => 'menu_mkk',
									'container'       => null,
									'menu_class'      => 'menu__list',
								]);
							}
							else if ($userRole == "admin") {
								wp_nav_menu([
									'theme_location'  => 'menu_admin',
									'container'       => null,
									'menu_class'      => 'menu__list',
								]);
							}
							else if ($userRole == "kpk") {
								wp_nav_menu([
									'theme_location'  => 'menu_kpk',
									'container'       => null,
									'menu_class'      => 'menu__list',
								]);
							}
						}
						

						?>
					</nav>
				</div>
			</div>
		</section>

</body>