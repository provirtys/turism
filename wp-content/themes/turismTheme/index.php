<?php

if (is_user_logged_in()) {
	$userInfo = get_user_meta(get_current_user_id());
	if (array_key_exists("myID", $userInfo)) {
		$userID = $userInfo["myID"][0];
		$userRole = $userInfo["myRole"][0];
		$id_school = $userID;
	}
}
if ($userRole == 'mkk') {
	wp_redirect(get_permalink(135), 301);
	exit;
} else if ($userRole == 'kpk') {
	wp_redirect(get_permalink(159), 301);
	exit;
} else if ($userRole == 'school') {
	wp_redirect(get_permalink(141), 301);
	exit;
}
get_header(); ?>

<body>
	<section class="main">
		<!-- <div class="main__container container"> -->

		<?php

		?>
		<!-- </div> -->
	</section>

</body>


<?php get_footer(); ?>


</html>