<?php

// правильный способ подключить стили и скрипты
add_action('wp_enqueue_scripts', 'turism_scripts');

// wp_mail(
// 			"jopava1043@giftcv.com",
// // 			"provirtys@gmail.com",
// 			"Школа Туризма",
// 			"Данные от аккаунта Школы:\nСайт: " .  get_site_url() .
// 				"\nЛогин: " . "jopava1043@giftcv.com" . "\nПароль: " . "123",
// 			"From: ШколаТуризма <schoolTurism123@gmail.com>"
// 		);

// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function turism_scripts()
{
	wp_enqueue_style('style-turism', get_stylesheet_uri());
	wp_enqueue_style('reset-style', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style('my-style', get_template_directory_uri() . '/css/main.css');

	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js');
	wp_enqueue_script('jquery');


	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
	if (is_page(11)) {
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
		wp_enqueue_script('editPeople', get_template_directory_uri() . '/js/editPeople.js', array(), '1.0.0', true);
		wp_enqueue_script('deletePeople', get_template_directory_uri() . '/js/deletePeople.js', array(), '1.0.0', true);
	} else if (is_page(13)) {
		wp_enqueue_script('editIPS', get_template_directory_uri() . '/js/editIPS.js', array(), '1.0.0', true);
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
	} else if (is_page(27)) {
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
		wp_enqueue_script('infoSchool', get_template_directory_uri() . '/js/infoSchool.js', array(), '1.0.0', true);
	} else if (is_page(15)) {
		wp_enqueue_script('editStudents', get_template_directory_uri() . '/js/editStudents.js', array(), '1.0.0', true);
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
	} else if (is_page(23)) {
		wp_enqueue_script('composeRanks', get_template_directory_uri() . '/js/composeRanks.js', array(), '1.0.0', true);
	} else if (is_page(60)) {
		wp_enqueue_script('insertPeople', get_template_directory_uri() . '/js/insertPeople.js', array(), '1.0.0', true);
	} else if (is_page(72)) {
		wp_enqueue_script('insertTypeOfOrders', get_template_directory_uri() . '/js/insertTypeOfOrders.js', array(), '1.0.0', true);
	} else if (is_page(78)) {
		wp_enqueue_script('insertPosition', get_template_directory_uri() . '/js/insertPosition.js', array(), '1.0.0', true);
	} else if (is_page(83)) {
		wp_enqueue_script('insertSchool', get_template_directory_uri() . '/js/insertSchool.js', array(), '1.0.0', true);
	} else if (is_page(29) or is_page(32) or is_page(34) or is_page(36) or is_page(38)) {
		wp_enqueue_script('changeIps', get_template_directory_uri() . '/js/changeIps.js', array(), '1.0.0', true);
	} else if (is_page(89)) {
		wp_enqueue_script('insertSubject', get_template_directory_uri() . '/js/insertSubject.js', array(), '1.0.0', true);
	} else if (is_page(19)) {
		wp_enqueue_script('deleteSubject', get_template_directory_uri() . '/js/deleteSubject.js', array(), '1.0.0', true);
	} else if (is_page(93)) {
		wp_enqueue_script('insertRank', get_template_directory_uri() . '/js/insertRank.js', array(), '1.0.0', true);
	} else if (is_page(104)) {
		wp_enqueue_script('insertClass', get_template_directory_uri() . '/js/insertClass.js', array(), '1.0.0', true);
	} else if (is_page(21)) {
		wp_enqueue_script('composeShedule', get_template_directory_uri() . '/js/composeShedule.js', array(), '1.0.0', true);
	} else if (is_page(109)) {
		wp_enqueue_script('insertTypeOfUtp', get_template_directory_uri() . '/js/insertTypeOfUtp.js', array(), '1.0.0', true);
	} else if (is_page(115)) {
		wp_enqueue_script('insertUtp', get_template_directory_uri() . '/js/insertUtp.js', array(), '1.0.0', true);
	} else if (is_page(96)) {
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
		wp_enqueue_script('editUtp', get_template_directory_uri() . '/js/editUtp.js', array(), '1.0.0', true);
	} else if (is_page(118)) {
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
		wp_enqueue_script('composeExperience', get_template_directory_uri() . '/js/composeExperience.js', array(), '1.0.0', true);
	} else if (is_page(125)) {
		wp_enqueue_script('insertRegisterRequest', get_template_directory_uri() . '/js/insertRegisterRequest.js', array(), '1.0.0', true);
	} else if (is_page(127)) {
		wp_enqueue_script('registerRequests', get_template_directory_uri() . '/js/registerRequests.js', array(), '1.0.0', true);
	} else if (is_page(135)) {
		wp_enqueue_script('editMKKProfile', get_template_directory_uri() . '/js/editMKKProfile.js', array(), '1.0.0', true);
	} else if (is_page(130)) {
		wp_enqueue_script('utpRequests', get_template_directory_uri() . '/js/utpRequests.js', array(), '1.0.0', true);
	} else if (is_page(141)) {
		wp_enqueue_script('editSchool', get_template_directory_uri() . '/js/editSchool.js', array(), '1.0.0', true);
	} else if (is_page(145) or is_page(199)) {
		wp_enqueue_script('composeDiplomas', get_template_directory_uri() . '/js/composeDiplomas.js', array(), '1.0.0', true);
	} else if (is_page(147)) {
		wp_enqueue_script('insertDiploma', get_template_directory_uri() . '/js/insertDiploma.js', array(), '1.0.0', true);
	} else if (is_page(159)) {
		wp_enqueue_script('editKPKProfile', get_template_directory_uri() . '/js/editKPKProfile.js', array(), '1.0.0', true);
	} else if (is_page(164)) {
		wp_enqueue_script('insertKPK', get_template_directory_uri() . '/js/insertKPK.js', array(), '1.0.0', true);
	} else if (is_page(167)) {
		wp_enqueue_script('editKPK', get_template_directory_uri() . '/js/editKPK.js', array(), '1.0.0', true);
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
	} else if (is_page(170)) {
		wp_enqueue_script('editMKK', get_template_directory_uri() . '/js/editMKK.js', array(), '1.0.0', true);
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
	} else if (is_page(173)) {
		wp_enqueue_script('insertMKK', get_template_directory_uri() . '/js/insertMKK.js', array(), '1.0.0', true);
	} else if (is_page(177)) {
		wp_enqueue_script('editCommissionMembers', get_template_directory_uri() . '/js/editCommissionMembers.js', array(), '1.0.0', true);
		wp_enqueue_script('sortAndSearch', get_template_directory_uri() . '/js/sortAndSearch.js', array(), '1.0.0', true);
	} else if (is_page(183)) {
		wp_enqueue_script('visits', get_template_directory_uri() . '/js/visits.js', array(), '1.0.0', true);
	} else if (is_page(201)) {
		wp_enqueue_script('insertCertificate', get_template_directory_uri() . '/js/insertCertificate.js', array(), '1.0.0', true);
	} else if (is_page(217)) {
		wp_enqueue_script('phpword', get_template_directory_uri() . '/js/phpword.js', array(), '1.0.0', true);
	}

	if (is_user_logged_in() || is_page(125)) {
	} else {
		auth_redirect();
	}



	//Добавление ajaxurl во фронтэнде через переменную majaxurl.ajaxurl
	wp_localize_script(
		'insertPeople',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertTypeOfOrders',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertPosition',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertSchool',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'deletePeople',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'sortAndSearch',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editPeople',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'changeIps',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'saveIps',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertSubject',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'deleteSubject',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertRank',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertClass',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'composeShedule',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertTypeOfUtp',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertUtp',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editUtp',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertRegisterRequest',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'registerRequests',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editMKKProfile',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editSchool',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'utpRequests',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'composeExperience',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertDiploma',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertKPK',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editKPK',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editMKK',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertMKK',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editCommissionMembers',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editKPKProfile',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editStudents',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'editIPS',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'visits',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'composeRanks',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'insertCertificate',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'composeDiplomas',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'infoSchool',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
	wp_localize_script(
		'phpword',
		'myajaxurl',
		array(
			'ajaxurl' => admin_url('admin-ajax.php')

		)
	);
}

if (is_user_logged_in()) {
	$userInfo = get_user_meta(get_current_user_id());
	if (array_key_exists("myID", $userInfo)) {
		$userID = $userInfo["myID"][0];
		$userRole = $userInfo["myRole"][0];
		$id_school = $userID;
	}
}



//Перенаправление после авторизации
add_filter('login_redirect', 'my_login_redirect', 10, 3);

function my_login_redirect($redirect_to, $request, $user)
{

	//is there a user to check?
	if (isset($user->roles) && is_array($user->roles)) {

		// check for admins
		if (in_array('administrator', $user->roles)) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}

//Отключение верхней панели для всех, кроме суперадмина
add_action('after_setup_theme', function () {
	if (!is_admin() && !current_user_can('manage_options'))
		show_admin_bar(false);
});

add_action('after_setup_theme', 'theme_support');
function theme_support()
{
	register_nav_menu('menu_school', 'Меню для школы');
	register_nav_menu('menu_mkk', ' Меню для МКК');
	register_nav_menu('menu_admin', ' Меню для администратора');
	register_nav_menu('menu_kpk', ' Меню для КПК');
}



//Добавить человека
add_action('wp_ajax_insertPeople_action', 'insertPeople_action');
// add_action('wp_ajax_nopriv_insertPeople_action', 'insertPeople_action');
function insertPeople_action()
{
	if (isset($_POST['lastName'])) {
		global $wpdb;
		$inserted = $wpdb->insert('people',	[
			'Last_name' => $_POST['lastName'],
			'First_name' => $_POST['firstName'],
			'Patronymic' => $_POST['patronymic'],
			'Gender' => $_POST['gender'],
			'Date_of_birth' => $_POST['dateOfBirth'],
			'Address' => $_POST['address'],
			'Place_of_work' => $_POST['placeOfWork'],
			'Telephone' => $_POST['telephone'],
			'Email' => $_POST['email'],
		]);
	}
	if ($inserted) {
		$id_people = $wpdb->get_var("select * from people order by id_people desc");
		echo ($id_people);
	}
	// var_dump($inserted);
	echo get_permalink(11);
	wp_die();
}

//Добавить студента OLD
// add_action('wp_ajax_insertStudent_action', 'insertStudent_action');
// add_action('wp_ajax_nopriv_insertStudent_action', 'insertStudent_action');

// function insertStudent_action()
// {
// 	if (is_user_logged_in()) {
// 		$userInfo = get_user_meta(get_current_user_id());
// 		if (array_key_exists("myID", $userInfo)) {
// 			$userID = $userInfo["myID"][0];
// 			$userRole = $userInfo["myRole"][0];
// 			$id_school = $userID;
// 		}
// 	}
// 	if (isset($_POST['id_people'])) {
// 		global $wpdb;
// 		$inserted = $wpdb->insert('students',	[
// 			'ID_people' => $_POST['id_people'],
// 			'ID_order' => $_POST['id_order'],
// 			'ID_school' => $id_school,
// 			'Relevance_date' => $_POST['relevanceDate'],
// 		]);
// 	}
// 	if ($inserted) {
// 		echo true;
// 	} else {
// 		echo false;
// 	}

// 	wp_die();
// }

//Добавить работника Old
// add_action('wp_ajax_insertIps_action', 'insertIps_action');
// // add_action('wp_ajax_nopriv_insertIps_action', 'insertIps_action');

// function insertIps_action()
// {

// 	if (isset($_POST['id_people'])) {
// 		global $wpdb;
// 		$wpdb->show_errors();
// 		if (is_user_logged_in()) {
// 			$userInfo = get_user_meta(get_current_user_id());
// 			if (array_key_exists("myID", $userInfo)) {
// 				$userID = $userInfo["myID"][0];
// 				$userRole = $userInfo["myRole"][0];
// 				$id_school = $userID;
// 			}
// 		}
// 		$id_position = $wpdb->get_var("select * 
// 		from positions
// 		where Name ='" .
// 			$_POST['posName'] . "'");

// 		$insertedIps = $wpdb->insert('ips',	[
// 			'ID_people' => $_POST['id_people'],
// 			'ID_order' => $_POST['id_order'],
// 			'ID_position' => $id_position,
// 			'ID_school' => $id_school,
// 			'Relevance_date' => $_POST['relevanceDate']
// 		]);
// 	}
// 	$subjectsId = [];
// 	$i = 0;
// 	foreach ($_POST['subjectsName'] as $subjectName) {

// 		$subjectsId[$i] = $wpdb->get_var("select id_subject from subjects 
// 		where name ='" . $subjectName . "'");
// 		$i++;
// 	}
// 	foreach ($subjectsId as $id_subject) {
// 		$wpdb->show_errors();
// 		$wpdb->insert('leads', [
// 			'ID_people' => $_POST['id_people'],
// 			'ID_subject' => $id_subject,
// 		]);
// 	}

// 	wp_die();
// }

//Добавить тип приказа
add_action('wp_ajax_insertTypeOfOrders_action', 'insertTypeOfOrders_action');
// add_action('wp_ajax_nopriv_insertTypeOfOrders_action', 'insertTypeOfOrders_action');

function insertTypeOfOrders_action()
{
	var_dump($_POST);
	if (isset($_POST['orderName'])) {
		global $wpdb;
		$inserted = $wpdb->insert('type_of_orders',	[
			'Name' => $_POST['orderName'],
		]);
	}
	var_dump($inserted);

	wp_die();
}

//Добавить тип похода
add_action('wp_ajax_insertTypeOfUtp_action', 'insertTypeOfUtp_action');
// add_action('wp_ajax_nopriv_insertTypeOfUtp_action', 'insertTypeOfUtp_action');

function insertTypeOfUtp_action()
{
	var_dump($_POST);
	if (isset($_POST['utpName'])) {
		global $wpdb;
		$inserted = $wpdb->insert('type_of_utp',	[
			'Name' => $_POST['utpName'],
		]);
	}
	var_dump($inserted);

	wp_die();
}

//Добавить приказ
add_action('wp_ajax_insertOrder_action', 'insertOrder_action');
// add_action('wp_ajax_nopriv_insertOrder_action', 'insertOrder_action');

function insertOrder_action()
{
	global $wpdb;
	$wpdb->show_errors();
	$inserted = $wpdb->insert('orders',	[
		'ID_type_of_order' => $_POST['id_typeOfOrder'],
		'Date' => $_POST['date']

	]);


	if ($inserted) {
		$id_order = $wpdb->get_var("select * from orders order by id_order desc");
		echo ($id_order);
	}
	wp_die();
}

//Добавить должность
add_action('wp_ajax_insertPosition_action', 'insertPosition_action');
// add_action('wp_ajax_nopriv_insertPosition_action', 'insertPosition_action');

function insertPosition_action()
{
	var_dump($_POST);
	if (isset($_POST['posName'])) {
		global $wpdb;
		$inserted = $wpdb->insert('positions',	[
			'Name' => $_POST['posName'],
		]);
	}
	var_dump($inserted);

	wp_die();
}

//Добавить школу
add_action('wp_ajax_insertSchool_action', 'insertSchool_action');

function insertSchool_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$email = $wpdb->get_var("select user_email from wp_users where user_email ='" . $_POST['email'] . "'");
	if ($email == null) {
		$password = wp_generate_password(15, false);
		$userdata = [
			'user_login'           => $_POST['email'],      // (string) Имя пользователя для входа в систему.
			'user_url'             => $_POST['email'],      // (string) URL пользователя.
			'user_email'           => $_POST['email'],      // (string) Адрес электронной почты пользователя.
			'user_pass'			   => $password,
			'meta_input'			   => ['myRole' => "school",]
		];
		wp_insert_user($userdata);
		$userIDOld = $userID;
		$userID = $wpdb->get_var("select ID from wp_users order by ID desc");
		update_user_meta($userID, 'myID', $userID);
		$submitted = wp_mail(
			$_POST['email'],
// 			"provirtys@gmail.com",
			"Школа Туризма",
			"Данные от аккаунта Школы:\nСайт: " .  get_site_url() .
				"\nЛогин: " . $_POST['email'] . "\nПароль: " . $password,
			"From: ШколаТуризма <schoolTurism123@gmail.com>"
		);

		$inserted = $wpdb->insert('schools',	[
			'ID_school' => $userID,
			'Name' => $_POST['schoolName'],
			'ID_type_of_school' => $_POST['schoolType'],
			'Start_date' => $_POST['dateFrom'],
			'End_date' => $_POST['dateTo'],
			'Director_school' => $_POST['directorSchool'],
			'Director_education' => $_POST['directorEducation'],
			'ID_kpk' => $userIDOld,
			'Email' => $_POST['email'],
			'Type_turism' => $_POST['typeTurism'],
		]);
		$wpdb->insert('ips', [
			'ID_school' => $userID,
			'ID_position' => 9,
			'ID_people' => $_POST['directorSchool'],

		]);
		if ($_POST['directorEducation'] != null) {
			$wpdb->insert('ips', [
				'ID_school' => $userID,
				'ID_position' => 10,
				'ID_people' => $_POST['directorEducation'],
			]);
		}
		$ips = $_POST['ips'];
		$intern = $_POST['intern'];
		if ($ips != null) {
			foreach ($ips as $i => $man) {
				//Внести как стажера
				if ($intern[$i] == '1') {
					$wpdb->insert('ips', [
						'ID_school' => $userID,
						'ID_position' => 11,
						'ID_people' => $man,
					]);
				}
				//Внести как инструктора школы
				else if ($intern[$i] == '0') {
					$wpdb->insert('ips', [
						'ID_school' => $userID,
						'ID_position' => 14,
						'ID_people' => $man,
					]);
				}
			}
		}



		wp_die(1);
	} else {
		wp_die(0);
	}





	wp_die();
}

//Удалить человека
add_action('wp_ajax_deletePeople_action', 'deletePeople_action');
function deletePeople_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$wpdb->show_errors();
	$deleted = $wpdb->update(
		'people',
		['Delete_mark' => 1],
		[
			'ID_people' => $_POST['id_people'],
		]
	);

	if ($_POST['type_people'] == "Люди" && $userRole == 'school') {
		$result  = $wpdb->get_results("select  people.*
		from ips
		inner join people on ips.ID_people = people.ID_people
		where ID_ips in(
		select max(id_ips)
			 from ips 
			group by ips.id_people)
		and ID_school = '" . $id_school . "' and delete_mark = 0
		union 
		select  people.*
		from students
		inner join people on students.ID_people = people.ID_people
		where ID_student in(
		select max(id_student)
			 from students
			group by students.id_people)
		and ID_school ='" . $id_school . "' and delete_mark = 0");
	} else if ($_POST['type_people'] == "Работники") {
		$result  = $wpdb->get_results("select  people.*
		from ips
		inner join people on ips.ID_people = people.ID_people
		where ID_ips in(
		select max(id_ips)
			 from ips 
			group by ips.id_people)
		and ID_school = '" . $id_school . "' and delete_mark = 0");
	} else if ($_POST['type_people'] == "Ученики") {
		$result  = $wpdb->get_results("select  people.*
		from students
		inner join people on students.ID_people = people.ID_people
		where ID_student in(
		select max(id_student)
			 from students
			group by students.id_people)
		and ID_school ='" . $id_school . "' and delete_mark = 0");
	} else if ($userRole == 'mkk') {
		$result = $wpdb->get_results("select people.* from people
				inner join commission_members cm on cm.id_people = people.id_people
				where id_mkk = '" . $userID . "' and delete_mark = 0");
	}

	echo json_encode($result);
	wp_die();
}

//Изменить человека Old
// add_action('wp_ajax_editPeople_action', 'editPeople_action');
// add_action('wp_ajax_nopriv_editPeople_action', 'editPeople_action');

// function editPeople_action()
// {

// 	global $wpdb;
// 	$wpdb->show_errors();
// 	$people = $wpdb->get_row(
// 		"select * from people where id_people ='" .
// 			$_POST['id_people'] . "'"
// 	);

// 	if (is_user_logged_in()) {
// 		$userInfo = get_user_meta(get_current_user_id());
// 		if (array_key_exists("myID", $userInfo)) {
// 			$userID = $userInfo["myID"][0];
// 			$userRole = $userInfo["myRole"][0];
// 			$id_school = $userID;
// 		}
// 	}

// 	$subjects = $wpdb->get_results("select * from subjects where delete_mark = 0 order by name ");

// 	$leads = $wpdb->get_results("select leads.ID_subject, name, ID_people from leads 
// 	inner join subjects on leads.id_subject = subjects.id_subject 
// 	where id_people ='" . $people->ID_people . "' ");

// 	$isStaff = $wpdb->get_var("select * from ips
// 	where id_people = '" . $people->ID_people . "'");

// 	$isStudent = $wpdb->get_var("select * from students
// 	where id_people = '" . $people->ID_people . "' order by id_student desc");

// 	$schoolsAll = $wpdb->get_results("select * from schools order by id_type_of_school");
// 	$schoolAll = "";

// 	$positionsAll = $wpdb->get_results("select * from positions order by name");
// 	if ($isStudent) {
// 		$school = $wpdb->get_var("select schools.Name from schools
// 		inner join students on schools.id_school = students.id_school
// 		where id_people = '" . $people->ID_people . "' order by id_student desc");
// 	}
// 	if ($isStaff) {
// 		$schoolAndPosition = $wpdb->get_row("select schools.name as school, positions.name as position from ips
// 		inner join schools on ips.id_school = schools.id_school
// 		inner join positions on ips.id_position = positions.id_position
// 		where id_people = '" . $people->ID_people . "' order by id_ips desc limit 1");
// 	}
// 	if ($userRole = "mkk") {
// 		$chairman = $wpdb->get_var("select chairman from mkk where id_mkk = '" . $userID . "'");
// 	} else if ($userRole = "kpk") {
// 		$chairman = $wpdb->get_var("select chairman from kpk where id_kpk = '" . $userID . "'");
// 	}
// 	$isChairman = false;
// 	if ($chairman == $_POST['id_people']) {
// 		$isChairman = true;
// 	}
// 	$response = [
// 		$people, $subjects, $leads, $isStaff, $schoolAndPosition, $schoolsAll, $positionsAll, $isStudent, $school, $isChairman,
// 	];
// 	echo json_encode($response);
// 	wp_die();
// }

//Сохранить человека Old
// add_action('wp_ajax_savePeople_action', 'savePeople_action');
// // add_action('wp_ajax_nopriv_savePeople_action', 'savePeople_action');

// function savePeople_action()
// {

// 	global $wpdb;
// 	$wpdb->show_errors();
// 	$people = $wpdb->update(
// 		'people',
// 		[
// 			'Last_name' => $_POST['lastName'],
// 			'First_name' => $_POST['firstName'],
// 			'Patronymic' => $_POST['patronymic'],
// 			'Gender' => $_POST['gender'],
// 			'Date_of_birth' => $_POST['dateOfBirth'],
// 			'Address' => $_POST['address'],
// 			'Place_of_work' => $_POST['placeOfWork'],
// 			'Telephone' => $_POST['telephone'],
// 			'Email' => $_POST['email']
// 		],
// 		['id_people' => $_POST['id_people']]
// 	);

// 	if (is_user_logged_in()) {
// 		$userInfo = get_user_meta(get_current_user_id());
// 		if (array_key_exists("myID", $userInfo)) {
// 			$userID = $userInfo["myID"][0];
// 			$userRole = $userInfo["myRole"][0];
// 			$id_school = $userID;
// 		}
// 	}
// 	if ($userRole == "school") {


// 		$id_position = $wpdb->get_var("select * 
// 		from positions
// 		where Name ='" .
// 			$_POST['posName'] . "'");


// 		$subjectsId = [];
// 		$i = 0;
// 		foreach ($_POST['subjectsName'] as $subjectName) {
// 			$subjectsId[$i] = $wpdb->get_var("select id_subject from subjects 
// 			where name ='" . $subjectName . "'");
// 			$i++;
// 		}
// 		//Если новый приказ, то вставка ИПС
// 		if (array_key_exists("id_order", $_POST)) {
// 			if ($_POST['isStudent'] == "true") {
// 				$insertedStudent = $wpdb->insert(
// 					'students',
// 					[
// 						'ID_people' => $_POST['id_people'],
// 						'ID_order' => $_POST['id_order'],
// 						'ID_school' => $id_school,
// 						'Relevance_date' => $_POST['relevanceDate']
// 					],
// 				);
// 			} else if ($_POST['isStaff'] == "true") {
// 				$insertedIps = $wpdb->insert(
// 					'ips',
// 					[
// 						'ID_people' => $_POST['id_people'],
// 						'ID_order' => $_POST['id_order'],
// 						'ID_position' => $id_position,
// 						'ID_school' => $id_school,
// 						'Relevance_date' => $_POST['relevanceDate']
// 					],
// 				);
// 			}
// 		}
// 		$newIdIps = $wpdb->get_var("select id_ips from ips where id_people = '" . $_POST['id_people']  . "' order by id_ips desc");
// 		$wpdb->delete(
// 			"leads",
// 			['ID_people' => $_POST['id_people']]
// 		);
// 		foreach ($subjectsId as $subject) {
// 			// echo($_POST['id_people']);
// 			$wpdb->insert('leads', [
// 				'ID_people' => $_POST['id_people'],
// 				'ID_subject' => $subject,
// 			]);
// 		}
// 	} else if ($_POST['currentChairman'] >= 0) {
// 		if ($userRole == "mkk") {
// 			$wpdb->update('mkk', [
// 				'Chairman' => $_POST['id_people']
// 			], [
// 				'ID_mkk' => $userID,
// 			]);
// 		}
// 		if ($userRole == "kpk") {
// 			$wpdb->update('kpk', [
// 				'Chairman' => $_POST['id_people']
// 			], [
// 				'ID_kpk' => $userID,
// 			]);
// 		}
// 	} else if ($_POST['currentChairman'] == null) {
// 		if ($userRole == "mkk") {
// 			$wpdb->update('mkk', [
// 				'Chairman' => NULL
// 			], [
// 				'ID_mkk' => $userID,
// 			]);
// 		}
// 		if ($userRole == "kpk") {
// 			$wpdb->update('kpk', [
// 				'Chairman' => NULL
// 			], [
// 				'ID_kpk' => $userID,
// 			]);
// 		}
// 	}



// 	echo get_permalink(11);
// 	wp_die();
// }

// //Изменить ИПС
// add_action('wp_ajax_changeIps_action', 'changeIps_action');
// // add_action('wp_ajax_nopriv_changeIps_action', 'changeIps_action');
// function changeIps_action()
// {

// 	global $wpdb;
// 	$positions = $wpdb->get_results("select id_position, Name from positions");
// 	$positionsCountArr = [];

// if (is_user_logged_in()) {
// 	$userInfo = get_user_meta(get_current_user_id());
// 	if (array_key_exists("myID", $userInfo)) {
// 		$userID = $userInfo["myID"][0];
// 		$userRole = $userInfo["myRole"][0];
// 		$id_school = $userID;
// 	}
// }

// 	foreach ($positions as $i => $position) {
// 		$positionCount = $wpdb->get_var(
// 			"select Max_Count
// 				from ips
// 				where id_position = $position->id_position and id_school = $id_school"
// 		);
// 		if ($positionCount == null) {
// 			$positionCount = 0;
// 		}
// 		$positionsCountArr[$i] = $positionCount;
// 	}

// 	$response = [
// 		$positions,
// 		$positionsCountArr
// 	];
// 	echo json_encode($response);

// 	wp_die();
// }


//Добавить тему занятий
add_action('wp_ajax_insertSubject_action', 'insertSubject_action');
// add_action('wp_ajax_nopriv_insertSubject_action', 'insertSubject_action');
function insertSubject_action()
{

	if (isset($_POST['subjName'])) {
		global $wpdb;
		$inserted = $wpdb->insert('subjects',	[
			'Name' => $_POST['subjName'],
		]);
	}

	wp_die();
}

//Удалить тему занятий
add_action('wp_ajax_deleteSubject_action', 'deleteSubject_action');
// add_action('wp_ajax_nopriv_deleteSubject_action', 'deleteSubject_action');
function deleteSubject_action()
{
	global $wpdb;
	$updated = $wpdb->update(
		'subjects',
		['delete_mark' => 1],
		['id_subject' => $_POST['id_subject']]
	);

	$result  = $wpdb->get_results('select * from subjects where delete_mark = 0');

	echo json_encode($result);
	wp_die();
}

//Присвоить разряд или звание
add_action('wp_ajax_insertRank_action', 'insertRank_action');

function insertRank_action()
{

	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$typesArr = $_POST['types'];
	$types = implode(',', $typesArr);
	$inserted = $wpdb->insert('declares',	[
		'id_people' => $_POST['people'],
		'ID_kpk' => $userID,
		'Date' => $_POST['date'],
		'ID_rank' => $_POST['rank'],
		'ID_types_of_utp' => $types,
		'doc' => $_POST['doc'],
	]);
	wp_die();
}

//Выборка преподавателей по школе и теме занятия
add_action('wp_ajax_changeSubjectInsertClass_action', 'changeSubjectInsertClass_action');
// add_action('wp_ajax_nopriv_changeSubjectInsertClass_action', 'changeSubjectInsertClass_action');
function changeSubjectInsertClass_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$staff = $wpdb->get_results("select people.ID_people, concat(people.Last_name, ' ', people.First_name) as Name 
	from people
	inner join leads on people.ID_people = leads.ID_people
	inner join (select id_school ,people.ID_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name 
	from ips
	inner join people on ips.ID_people = people.ID_people
	where ID_ips in(
	select max(id_ips)
		 from ips 
		group by ips.id_people)
	and ID_school = '" . $id_school . "') ipss on ipss.id_people = leads.id_people
	where leads.id_subject = '" . $_POST['id_subject'] . "' and people.delete_mark = 0 and
	ipss.id_school = '" . $id_school . "'
	group by people.ID_people
	");

	echo json_encode($staff);
	wp_die();
}

//Добавить занятие в расписание
add_action('wp_ajax_insertShedule_action', 'insertShedule_action');
// add_action('wp_ajax_nopriv_insertShedule_action', 'insertShedule_action');
function insertShedule_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	$time = new DateTime($_POST["time"]);
	$time->add(new DateInterval('PT' . $_POST["duration"] . 'M'));
	$inserted = $wpdb->insert("shedule", [
		"ID_type_of_class" => $_POST["type"],
		"Date" => $_POST["date"],
		"Time_of_start" => $_POST["time"],
		"Duration" => $_POST["duration"],
		"ID_people" => $_POST["staff"],
		"ID_subject" => $_POST["subject"],
		"ID_school" => $id_school,
	]);
	var_dump($inserted);

	// $time = new DateTime($_POST["time"]);
	// $time->add(new DateInterval('PT' . $_POST["duration"] . 'M'));
	// $time->format('H:i:s'),

	wp_die();
}

//Составить расписание для школы
add_action('wp_ajax_composeSheduleSchool_action', 'composeSheduleSchool_action');
// add_action('wp_ajax_nopriv_composeSheduleSchool_action', 'composeSheduleSchool_action');
function composeSheduleSchool_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$classes = $wpdb->get_results("select  id_shedule as id, date, time_of_start, duration, concat(people.Last_name, ' ', LEFT(people.First_name,1), '. ', LEFT(people.patronymic,1)) as Name, type_of_class.name as type, subjects.name 
	from shedule 
	inner join people on shedule.id_people = people.id_people
	inner join subjects on subjects.id_subject = shedule.id_subject
	inner join type_of_class on type_of_class.id_type_of_class = shedule.id_type_of_class
	where shedule.id_school = '" . $id_school . "' and date between '" . $_POST["dateFrom"] . "' and '" . $_POST["dateTo"] . "'
	order by date, time_of_start");

	$maxClasses = $wpdb->get_results("select max(count) as max from (select count(date) as count
	from shedule 
	where shedule.id_school = '" . $id_school . "' and date between '" . $_POST["dateFrom"] . "' and '" . $_POST["dateTo"] . "'
	group by date)a");

	$response = [
		$classes, $maxClasses
	];

	echo json_encode($response);
	wp_die();
}

//Составить расписание для преподавателя
add_action('wp_ajax_composeSheduleStaff_action', 'composeSheduleStaff_action');
// add_action('wp_ajax_nopriv_composeSheduleStaff_action', 'composeSheduleStaff_action');
function composeSheduleStaff_action()
{
	$userdata = [
		'user_login'           => "cmkk",      // (string) Имя пользователя для входа в систему.
		'user_url'             => "cmkk",      // (string) URL пользователя.
		'user_email'           => "cmkk@gmail.com",      // (string) Адрес электронной почты пользователя.
		'user_pass'			   => "cmkk",
		'meta_input'			   => ['myRole' => "mkk", 'myID' => "100"]
	];

	wp_insert_user($userdata);
	// wp_delete_user(19);

	global $wpdb;
	$classes = $wpdb->get_results("select id_shedule as id, date, time_of_start, duration, schools.name as school, type_of_class.name as type, subjects.name 
	from shedule 
	inner join schools on shedule.id_school =schools.id_school
	inner join subjects on subjects.id_subject = shedule.id_subject
	inner join type_of_class on type_of_class.id_type_of_class = shedule.id_type_of_class
	where shedule.id_people = '" . $_POST["id_people"] . "' and date between '" . $_POST["dateFrom"] . "' and '" . $_POST["dateTo"] . "'
	order by date, time_of_start");

	$maxClasses = $wpdb->get_results("select max(count) as max from (select count(date) as count
	from shedule 
	where shedule.id_people = '" . $_POST["id_people"] . "' and date between '" . $_POST["dateFrom"] . "' and '" . $_POST["dateTo"] . "'
	group by date)a");

	$response = [
		$classes, $maxClasses
	];

	echo json_encode($response);
	wp_die();
}

// //Выбрать преподавателей для расписания
// add_action('wp_ajax_selectStaffForShedule_action', 'selectStaffForShedule_action');
// add_action('wp_ajax_nopriv_selectStaffForShedule_action', 'selectStaffForShedule_action');
// function selectStaffForShedule_action()
// {
// 	global $wpdb;
// if (is_user_logged_in()) {
// 	$userInfo = get_user_meta(get_current_user_id());
// 	if (array_key_exists("myID", $userInfo)) {
// 		$userID = $userInfo["myID"][0];
// 		$userRole = $userInfo["myRole"][0];
// 		$id_school = $userID;
// 	}
// }
// 	$staff = $wpdb->get_results("select  people.ID_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name 
// 	from ips
// 	inner join people on ips.ID_people = people.ID_people
// 	where ID_ips in(
// 	select max(id_ips)
// 		 from ips 
// 		group by ips.id_people)
// 	and ID_school ='" . $id_school . "'");

// 	echo json_encode($staff);

// 	wp_die();
// }


//Добавить поход
add_action('wp_ajax_insertUtp_action', 'wp_ajax_insertUtp_action');
function wp_ajax_insertUtp_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$wpdb->show_errors();

	$wpdb->insert("utp", [
		'Name' => $_POST['name'],
		'ID_type_of_utp' => $_POST['id_type_of_utp'],
		'ID_order' => $_POST['id_order'],
		'Difficulty' => $_POST['difficulty'],
		'Start_date' => $_POST['start_date'],
		'End_date' => $_POST['end_date'],
		'ID_school' => $id_school,
		'Region' =>	$_POST['region'],
	]);

	//Добавить руководителя в поход
	$id_utp = $wpdb->get_var("select * from utp order by id_utp desc");
	$wpdb->insert("members_of_utp", [
		'ID_utp' => $id_utp,
		'ID_people' => $_POST['leader'],
		'ID_position' => 7
	]);
	//Добавить завхоза в поход
	$id_utp = $wpdb->get_var("select * from utp order by id_utp desc");
	$wpdb->insert("members_of_utp", [
		'ID_utp' => $id_utp,
		'ID_people' => $_POST['supply'],
		'ID_position' => 12
	]);
	//Добавить медика в поход
	$id_utp = $wpdb->get_var("select * from utp order by id_utp desc");
	$wpdb->insert("members_of_utp", [
		'ID_utp' => $id_utp,
		'ID_people' => $_POST['medic'],
		'ID_position' => 13
	]);

	//Добавить учеников в поход
	$students = $wpdb->get_results("select id_people from students where id_school = '" . $userID . "'");
	foreach ($students as $student) {
		$wpdb->insert("members_of_utp", [
			'ID_utp' => $id_utp,
			'ID_people' => $student->id_people,
			'ID_position' => 8
		]);
	}

	echo (get_permalink(115));
	wp_die();
}

//Изменить поход
add_action('wp_ajax_editUtp_action', 'wp_ajax_editUtp_action');
function wp_ajax_editUtp_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$wpdb->show_errors();
	$utp = $wpdb->get_results("select utp.*, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as people, people.id_people, tou.id_types_of_utp as idType,tou.name as type from utp
	inner join members_of_utp on utp.id_utp = members_of_utp.id_utp
	inner join people on people.id_people = members_of_utp.id_people
	inner join type_of_utp tou on tou.id_types_of_utp = utp.id_type_of_utp
	where utp.id_utp = '" . $_POST['id_utp'] . "'");

	$students = $wpdb->get_results("select id_people from members_of_utp
	where id_utp = '" . $_POST['id_utp'] . "' and ID_position = 8");

	$studentAll = $wpdb->get_results("select people.id_people , concat(Last_name, ' ', First_name, ' ', Patronymic) as Name from people
	inner join students on people.id_people = students.id_people
	where delete_mark = 0 and id_school = '" . $id_school . "'");

	$people = $wpdb->get_results("select people.ID_people, concat(people.Last_name, ' ', people.First_name, ' ', people.patronymic) as Name 
	from people
	inner join (select id_school ,people.ID_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name 
	from ips
	inner join people on ips.ID_people = people.ID_people
	where ID_ips in(
	select max(id_ips)
		 from ips 
		group by ips.id_people)
	and ID_school = '" . $id_school . "') ipss on ipss.id_people = people.id_people
	where people.delete_mark = 0 and
	ipss.id_school = '" . $id_school . "'
	group by people.ID_people
	");

	$types = $wpdb->get_results("select * from type_of_utp");

	$response = [
		$utp, $people, $types, $students, $studentAll,
	];

	echo json_encode($response);
	wp_die();
}

//Сохранить поход
add_action('wp_ajax_saveUtp_action', 'wp_ajax_saveUtp_action');
function wp_ajax_saveUtp_action()
{
	global $wpdb;
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	$wpdb->show_errors();
	$wpdb->update(
		"utp",
		[
			'Name' => $_POST['name'],
			'ID_type_of_utp' => $_POST['id_type_of_utp'],
			'Difficulty' => $_POST['difficulty'],
			'Start_date' => $_POST['start_date'],
			'End_date' => $_POST['end_date'],

		],
		['ID_utp' => $_POST['ID_utp']]
	);
	$wpdb->update(
		"members_of_utp",
		[
			'ID_people' => $_POST['leader'],

		],
		['ID_utp' => $_POST['ID_utp']]
	);

	$wpdb->delete("members_of_utp", [
		'ID_utp' => $_POST['ID_utp'],
		'ID_position' => 8
	]);

	//Добавить учеников в поход
	$students = $_POST["students"];

	foreach ($students as $student) {
		$wpdb->insert("members_of_utp", [
			'ID_utp' => $_POST['ID_utp'],
			'ID_people' => $student,
			'ID_position' => 8
		]);
	}




	echo (get_permalink(96));
	wp_die();
}

//Завершить поход
add_action('wp_ajax_acceptUtp_action', 'wp_ajax_acceptUtp_action');
function wp_ajax_acceptUtp_action()
{
	global $wpdb;

	$members = $wpdb->get_results("select id_people, id_position from members_of_utp
	where ID_utp = '" . $_POST["idUtp"]  . "'");

	$utp = $wpdb->get_row("select utp.*, schools.Name as schoolName, schools.ID_type_of_school as schoolType from utp
	inner join schools on utp.id_school = schools.id_school
	where id_utp = '" . $_POST["idUtp"] . "'");

	foreach ($members as $member) {
		$wpdb->insert(
			"experience",
			[
				"ID_people" => $member->id_people,
				"Date" => $utp->End_date,
				"ID_school" => $utp->ID_school,
				"ID_position" => $member->id_position,
				"ID_utp" => $utp->ID_utp,
			]
		);
		// if ($member->id_position == 7) {
		// 	$leader = $wpdb->insert(
		// 		"experience",
		// 		[
		// 			"ID_people" => $member->id_people,
		// 			"Date" => $utp->End_date,
		// 			"ID_school" => $utp->ID_school,
		// 			"ID_position" => 7,
		// 			"ID_utp" => $utp->ID_utp,
		// 		]
		// 	);
		//  else if ($member->id_position == 8) {
		// 	$student = $wpdb->insert(
		// 		"experience",
		// 		[
		// 			"ID_people" => $member->id_people,
		// 			"Date" => $utp->End_date,
		// 			"ID_school" => $utp->ID_school,
		// 			"ID_position" => 8,
		// 			"ID_utp" => $utp->ID_utp,
		// 		]
		// 	);
		// }
	}


	$wpdb->show_errors();
	var_dump($_POST);
	$updated = $wpdb->update(
		"utp",
		[
			'Date_accept' => $_POST["date"]
		],
		['ID_utp' => $_POST["idUtp"]]
	);
	wp_die();
}

//Составить походы за период
add_action('wp_ajax_composeUtp_action', 'composeUtp_action');
function composeUtp_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$utp = $wpdb->get_results(
		"select utp.ID_utp, utp.name, utp.Start_date, utp.End_date, utp.Difficulty ,type_of_utp.name as type, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as leader, date_accept from utp
	inner join type_of_utp on utp.ID_type_of_utp = type_of_utp.ID_types_of_utp
	inner join members_of_utp on utp.ID_utp = members_of_utp.ID_utp
	INNER join people on members_of_utp.ID_people = people.ID_people
	where id_school ='" . $id_school . "' and ID_position = 7 
	and Start_date >='" . $_POST['dateFrom'] . "' and End_date <='" . $_POST['dateTo'] . "'"
	);


	echo json_encode($utp);
	wp_die();
}

//Добавить заявку на регистрацию
add_action('wp_ajax_insertRegisterRequest_action', 'insertRegisterRequest_action');
add_action('wp_ajax_nopriv_insertRegisterRequest_action', 'insertRegisterRequest_action');

function insertRegisterRequest_action()
{
	global $wpdb;
	$success = true;
	$login = $wpdb->get_var("select login from register_requests where email ='" . $_POST['email'] . "'");
	if ($login == null) {
		$wpdb->insert("register_requests", [
			"Role" => $_POST['role'],
			"Name" => $_POST['name'],
			"Login" => $_POST['login'],
			"Email" => $_POST['email'],
			"Password" => $_POST['password'],
		]);
	} else {
		$success = false;
	}
	$response = [$success, wp_login_url()];
	echo json_encode($response);
	wp_die();
}

// add_action('login_form', 'register_request');
function register_request()
{
?>
	<a class="register-request-href" href="<?php echo get_permalink(125) ?>" style="display: block; margin-bottom:10px">Заявка на регистрацию</a>
<?php
}


//Принять заявку на регистрацию
add_action('wp_ajax_acceptRegisterRequest_action', 'acceptRegisterRequest_action');
function acceptRegisterRequest_action()
{
	global $wpdb;
	$updated = $wpdb->update(
		'register_requests',
		[
			'Accepted' => 1
		],
		[
			'Login' => $_POST['login'],
		]
	);
	$user = $wpdb->get_row("select * from register_requests where login = '" . $_POST['login'] . "'");
	// registerUser($user);
	$request = $wpdb->get_row("select * from register_requests where login = '" . $_POST['login'] . "'");
	$submitted = wp_mail(
		// $request->Email,
		"provirtys@gmail.com",
		"Школа Туризма",
		"Ваша заявка на регистрацию одобрена\nСайт: " .  get_site_url() . "\nЛогин: " . $request->Login . "\nПароль: " . $request->Password,
		"From: ШколаТуризма <schoolTurism123@gmail.com>"
	);
	$requests = $wpdb->get_results("select * from register_requests where Accepted is NULL");

	echo json_encode($requests);
	wp_die();
}

//Отклонить заявку на регистрацию
add_action('wp_ajax_declineRegisterRequest_action', 'declineRegisterRequest_action');
function declineRegisterRequest_action()
{
	global $wpdb;
	$updated = $wpdb->update(
		'register_requests',
		[
			'Accepted' => 0
		],
		[
			'Login' => $_POST['login'],
		]
	);

	$requests = $wpdb->get_results("select * from register_requests where Accepted is NULL");

	echo json_encode($requests);
	wp_die();
}



function registerUser($user)
{

	$userdata = [
		'user_login'           => $user->Login,      // (string) Имя пользователя для входа в систему.
		'user_url'             => $user->Login,      // (string) URL пользователя.
		'user_email'           => $user->Email,      // (string) Адрес электронной почты пользователя.
		'user_pass'			   => $user->Password,
		'meta_input'			   => ['myRole' => $user->Role, 'myID' => $user->ID_request]
	];

	wp_insert_user($userdata);
	global $wpdb;
	if ($user->Role == 'mkk') {
		$wpdb->insert("mkk", [
			'ID_mkk' => $user->ID_request,
			'Name' => $user->Name,
		]);
	} else if ($user->Role == 'school') {
		$wpdb->insert("schools", [
			'ID_school' => $user->ID_request,
			'Name' => $user->Name,
		]);
	}
}

//Добавить члена комиссии через людей
add_action('wp_ajax_insertMemberCommissionThroughPeople_action', 'insertMemberCommissionThroughPeople_action');
function insertMemberCommissionThroughPeople_action()
{
	global $wpdb;
	$wpdb->show_errors();
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	if ($userRole == 'mkk') {
		$wpdb->insert("commission_members", [
			'ID_people' => $_POST['id_people'],
			'ID_order' => $_POST['id_order'],
			'ID_mkk' => $userID,
		]);
		$people = $wpdb->get_var("select ID_people from commission_members order by id_people desc");
		if ($_POST['isChairman'] == "true") {
			$wpdb->update("mkk", [
				'Chairman' => $people,
			], [
				'ID_mkk' => $userID,
			]);
		}
	} else if ($userRole = 'kpk') {
		$wpdb->insert("commission_members", [
			'ID_people' => $_POST['id_people'],
			'ID_order' => $_POST['id_order'],
			'ID_kpk' => $userID,
		]);
		$people = $wpdb->get_var("select ID_people from commission_members order by id_people desc");
		if ($_POST['isChairman'] == "true") {
			$wpdb->update("kpk", [
				'Chairman' => $people,
			], [
				'ID_kpk' => $userID,
			]);
		}
	}




	wp_die();
}



//Изменить Школу
add_action('wp_ajax_editSchool_action', 'editSchool_action');
function editSchool_action()
{
	wp_delete_user(17);

	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	$name = $_POST['name'];
	$type = $_POST['type'];
	$mkk = $_POST['mkk'];
	if ($type == "notChosen") {
		$type = NULL;
	}
	if ($mkk == "notChosen") {
		$mkk = NULL;
	}

	$wpdb->update(
		"schools",
		[
			'Name' => $name,
			'ID_Type_of_school' => $type,
			'ID_mkk' => $mkk,
		],
		[
			'ID_school' => $userID
		]
	);

	wp_die();
}

//Утвердить поход
add_action('wp_ajax_acceptUtpRequest_action', 'acceptUtpRequest_action');
function acceptUtpRequest_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$query = $wpdb->prepare("update utp set approved = 1 where id_utp = %d", $_POST['idUtp']);
	$wpdb->query($query);

	$requests = $wpdb->get_results("select utp.ID_utp, utp.name, schools.name as School, utp.Start_date, utp.End_date, utp.Difficulty ,type_of_utp.name as type, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as leader from utp
	inner join type_of_utp on utp.ID_type_of_utp = type_of_utp.ID_types_of_utp
	inner join members_of_utp on utp.ID_utp = members_of_utp.ID_utp
	INNER join people on members_of_utp.ID_people = people.ID_people
	inner join schools on schools.ID_school = utp.ID_school
	where ID_kpk = '" . $userID . "' and ID_position = 7 and Approved is null");
	echo json_encode($requests);
	wp_die();
}

//Отклонить поход
add_action('wp_ajax_declineUtpRequest_action', 'declineUtpRequest_action');
function declineUtpRequest_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	$query = $wpdb->prepare("update utp set approved = 0, reason = %s where id_utp = %d", $_POST['reason'], $_POST['idUtp']);
	$wpdb->query($query);

	$requests = $wpdb->get_results("select utp.ID_utp, utp.name, schools.name as School, utp.Start_date, utp.End_date, utp.Difficulty ,type_of_utp.name as type, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as leader from utp
	inner join type_of_utp on utp.ID_type_of_utp = type_of_utp.ID_types_of_utp
	inner join members_of_utp on utp.ID_utp = members_of_utp.ID_utp
	INNER join people on members_of_utp.ID_people = people.ID_people
	inner join schools on schools.ID_school = utp.ID_school
	where ID_mkk = '" . $userID . "' and ID_position = 7 and Approved is null");
	echo json_encode($requests);

	wp_die();
}

//Составить опыт
add_action('wp_ajax_composeExperience_action', 'composeExperience_action');
function composeExperience_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	if ($_POST['id_people'] == null) {
		$requests = $wpdb->get_results("select concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio, 
		utp.Start_date, utp.End_date, experience.ID_position, utp.Difficulty, utp.Region, tou.Name as typeUtp
		from experience
		inner join people on experience.ID_people = people.ID_people
		inner join utp on utp.ID_utp = experience.ID_utp
		inner join type_of_utp tou on tou.ID_types_of_utp = utp.ID_type_of_utp
		order by fio");
		$response = [$requests, null, null];

		echo json_encode($response);
	} else {
		$requests = $wpdb->get_results("select concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio,  Date_of_birth, address, telephone, email, place_of_work as job,
		utp.Start_date, utp.End_date, experience.ID_position, utp.Difficulty, utp.Region, tou.Name as typeUtp
		from experience
		inner join people on experience.ID_people = people.ID_people
		inner join utp on utp.ID_utp = experience.ID_utp
		inner join type_of_utp tou on tou.ID_types_of_utp = utp.ID_type_of_utp
		where people.ID_people ='" . $_POST['id_people'] . "'
		order by fio");

		$dateStartYear = $wpdb->get_results("select substr(Date,1,4) as startYear from experience where ID_people ='" . $_POST['id_people'] . "' order by Date LIMIT 1");

		$currentRank = $wpdb->get_results("select ranks.Name, substr(declares.date,1,4) as rankYear from declares 
		inner join ranks on declares.ID_rank = ranks.ID_rank
		where ID_people ='" . $_POST['id_people'] . "' order by date DESC
		LIMIT 1");

		$maxLvls = $wpdb->get_results("SELECT id_position, max(utp.Difficulty) as Difficulty, type_of_utp.Name FROM experience 
		inner join utp on experience.ID_utp = utp.ID_utp
		inner join type_of_utp on type_of_utp.ID_types_of_utp = utp.ID_type_of_utp
		where ID_people = '" . $_POST['id_people'] . "' and ID_position = 8
		group by Name
		UNION
		SELECT id_position, max(utp.Difficulty) as Difficulty, type_of_utp.Name FROM experience 
		inner join utp on experience.ID_utp = utp.ID_utp
		inner join type_of_utp on type_of_utp.ID_types_of_utp = utp.ID_type_of_utp
		where ID_people = '" . $_POST['id_people'] . "' and ID_position != 8
		group by Name
		");

		$response = [$requests, $dateStartYear, $currentRank, $maxLvls];

		echo json_encode($response);
	}

	wp_die();
}

//Добавить диплом/справку
add_action('wp_ajax_insertDiploma_action', 'insertDiploma_action');
function insertDiploma_action()
{
	global $wpdb;
	$wpdb->show_errors();
	if ($_POST['ips'] == 'true') {
		$query = $wpdb->prepare("insert into diplomas (id_order, id_people, id_school, date, for_ips) 
		VALUES (%d, %d, %d, %s, 1)", $_POST['id_order'], $_POST['id_people'], $_POST['id_school'], $_POST['date'],);
		$wpdb->query($query);
	} else if ($_POST['ips'] == 'false') {
		$query = $wpdb->prepare("insert into diplomas (id_order, id_people, id_school, date, for_ips) 
		VALUES (%d, %d, %d, %s, 0)", $_POST['id_order'], $_POST['id_people'], $_POST['id_school'], $_POST['date'],);
		$wpdb->query($query);
	}
	wp_die();
}

//Изменить занятие
add_action('wp_ajax_editClass_action', 'editClass_action');
function editClass_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	$class = $wpdb->get_row("select * from shedule 
	where id_shedule = '" . $_POST['id_shedule'] . "'");

	$subjects = $wpdb->get_results("select subjects.* from subjects 
	inner join schools sType on sType.type_turism = subjects.type_turism
	inner join schools sLevel on sLevel.id_type_of_school = subjects.level
	where sType.id_school = '" . $userID . "' and sLevel.id_school ='" . $userID . "' order by Name");
	$staff = $wpdb->get_results("select people.ID_people, concat(people.Last_name, ' ', people.First_name) as Name 
	from people
	inner join leads on people.ID_people = leads.ID_people
	inner join (select id_school ,people.ID_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name 
	from ips
	inner join people on ips.ID_people = people.ID_people
	where ID_ips in(
	select max(id_ips)
		 from ips 
		group by ips.id_people)
	and ID_school = '" . $id_school . "') ipss on ipss.id_people = leads.id_people
	where leads.id_subject = '" . $class->ID_subject . "' and people.delete_mark = 0 and
	ipss.id_school = '" . $id_school . "'
	group by people.ID_people");
	$response = [$class, $subjects, $staff];

	echo json_encode($response);

	wp_die();
}

//Сохранить занятие
add_action('wp_ajax_saveShedule_action', 'saveShedule_action');
function saveShedule_action()
{
	var_dump($_POST);
	global $wpdb;
	$wpdb->show_errors();
	// $query = $wpdb->prepare("update shedule set id_type_of_class = %d, date = %s, time_of_start = %s, duration = %d, id_people = %d, id_subject = %d 
	// where id_shedule = %d",
	// $_POST['type'],$_POST['date'],$_POST['time'],$_POST['duration'],$_POST['staff'],$_POST['subject'],$_POST['id_shedule']);
	// $wdpb->query($query);

	$wpdb->update("shedule", [
		'id_type_of_class'	=> $_POST['type'],
		'date' => $_POST['date'],
		'time_of_start' => $_POST['time'],
		'duration' => $_POST['duration'],
		'id_people' => $_POST['staff'],
		'id_subject' => $_POST['subject'],
	], [
		'id_shedule' => $_POST['id_shedule']
	]);
	wp_die();
}

//Добавить КПК
add_action('wp_ajax_insertKPK_action', 'insertKPK_action');
function insertKPK_action()
{
	global $wpdb;
	$wpdb->show_errors();
	$email = $wpdb->get_var("select Email from kpk where Email = '" . $_POST['kpkEmail'] . "'");
	$id = $wpdb->get_var("select id_kpk from kpk where id_kpk = '" . $_POST['kpkID'] . "'");
	if ($email == null && $id == null) {
		$inserted = $wpdb->insert("kpk", [
			'id_kpk' => $_POST['kpkID'],
			'Name' => $_POST['kpkName'],
			'Powers' => $_POST['kpkLvl'],
			'Head_kpk' => $_POST['kpkHead'],
			'Email' => $_POST['kpkEmail'],
			'Start_date' => $_POST['dateFrom'],
			'End_date' => $_POST['dateTo'],
			'ID_mkk' => $_POST['mkk'],
		]);
		$password = wp_generate_password(15, false);
		$userdata = [
			'user_login'           => $_POST['kpkEmail'],      // (string) Имя пользователя для входа в систему.
			'user_url'             => $_POST['kpkEmail'],      // (string) URL пользователя.
			'user_email'           => $_POST['kpkEmail'],      // (string) Адрес электронной почты пользователя.
			'user_pass'			   => $password,
			'meta_input'			   => ['myRole' => "kpk", 'myID' => $_POST['kpkID']]
		];
		wp_insert_user($userdata);
		$submitted = wp_mail(
			// $_POST['kpkEmail'],
			"provirtys@gmail.com",
			"Школа Туризма",
			"Данные от аккаунта КПК:\nСайт: " .  get_site_url() . "\nЛогин: " . $_POST['kpkEmail'] . "\nПароль: " . $password,
			"From: ШколаТуризма <schoolTurism123@gmail.com>"
		);
		wp_die();
	} else if ($id != null && $email != null) {
		wp_die('Введенные шифр и email уже используются');
	} else if ($email != null) {
		wp_die('Введенный email уже используется');
	} else if ($id != null) {
		wp_die('Введенный шифр уже используется');
	}
}

//Изменить КПК
add_action('wp_ajax_editKPK_action', 'editKPK_action');
function editKPK_action()
{
	global $wpdb;
	$wpdb->show_errors();

	$curKPK = $wpdb->get_row("select id_kpk, kpk.Name, Head_kpk,kpk.Email,Start_date,End_date, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as Chairman, type_of_school.id_type_of_school,type_of_school.Name as Lvl from kpk
	inner join people on kpk.Chairman = people.ID_people
	inner join type_of_school on kpk.Powers = type_of_school.ID_type_of_school where id_kpk = '" . $_POST['id'] . "'");
	if ($curKPK == null) {
		$curKPK = $wpdb->get_row("select id_kpk, Powers, kpk.Name, Head_kpk, kpk.Email,Start_date,End_date, Chairman from kpk
	where id_kpk = '" . $_POST['id'] . "'");
	}
	$allKPK = $wpdb->get_results("select * from kpk");
	$response = [$curKPK, $allKPK];

	echo json_encode($response);
	wp_die();
}

//Сохранить КПК
add_action('wp_ajax_saveKPK_action', 'saveKPK_action');
function saveKPK_action()
{
	global $wpdb;
	$wpdb->update("kpk", [
		'id_kpk' => $_POST['kpkID'],
		'Name' => $_POST['kpkName'],
		'Powers' => $_POST['kpkLvl'],
		'Head_kpk' => $_POST['kpkHead'],
		'Start_date' => $_POST['dateFrom'],
		'End_date' => $_POST['dateTo'],
	], [
		'id_kpk' => $_POST['kpkID'],
	]);
	wp_die();
}



//Изменить МКК через профиль
add_action('wp_ajax_editMKKProfile_action', 'editMKKProfile_action');
function editMKKProfile_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	$name = $_POST['name'];
	$head = $_POST['head'];
	$chairman = $_POST['chairman'];
	if ($head == "notChosen") {
		$head = NULL;
	}
	if ($chairman == "notChosen") {
		$chairman = NULL;
	}

	$wpdb->update(
		"mkk",
		[
			'Name' => $name,
			'Chairman' => $chairman,
			'Head_mkk' => $head
		],
		[
			'ID_mkk' => $userID
		]
	);

	wp_die();
}

//Изменить КПК через профиль
add_action('wp_ajax_editKPKProfile_action', 'editKPKProfile_action');
function editKPKProfile_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	$name = $_POST['name'];
	$head = $_POST['head'];
	$chairman = $_POST['chairman'];
	if ($head == "notChosen") {
		$head = NULL;
	}
	if ($chairman == "notChosen") {
		$chairman = NULL;
	}

	$wpdb->update(
		"kpk",
		[
			'Name' => $name,
			'Chairman' => $chairman,
			'Head_kpk' => $head
		],
		[
			'ID_kpk' => $userID
		]
	);

	wp_die();
}
//Добавить МКК
add_action('wp_ajax_insertMKK_action', 'insertMKK_action');
function insertMKK_action()
{

	global $wpdb;
	$wpdb->show_errors();
	$email = $wpdb->get_var("select Email from mkk where Email = '" . $_POST['mkkEmail'] . "'");
	$id = $wpdb->get_var("select id_mkk from mkk where id_mkk = '" . $_POST['mkkID'] . "'");
	if ($email == null && $id == null) {
		$inserted = $wpdb->insert("mkk", [
			'id_mkk' => $_POST['mkkID'],
			'Name' => $_POST['mkkName'],
			'Powers' => $_POST['mkkPowers'],
			'Head_mkk' => $_POST['mkkHead'],
			'Email' => $_POST['mkkEmail'],
			'Start_date' => $_POST['dateFrom'],
			'End_date' => $_POST['dateTo'],
		]);
		$password = wp_generate_password(15, false);
		$userdata = [
			'user_login'           => $_POST['mkkEmail'],      // (string) Имя пользователя для входа в систему.
			'user_url'             => $_POST['mkkEmail'],      // (string) URL пользователя.
			'user_email'           => $_POST['mkkEmail'],      // (string) Адрес электронной почты пользователя.
			'user_pass'			   => $password,
			'meta_input'			   => ['myRole' => "mkk", 'myID' => $_POST['mkkID']]
		];
		wp_insert_user($userdata);
		$submitted = wp_mail(
			// $_POST['mkkEmail'],
			"provirtys@gmail.com",
			"Школа Туризма",
			"Данные от аккаунта МКК:\nСайт: " .  get_site_url() . "\nЛогин: " . $_POST['mkkEmail'] . "\nПароль: " . $password,
			"From: ШколаТуризма <schoolTurism123@gmail.com>"
		);
		wp_die();
	} else if ($id != null && $email != null) {
		wp_die('Введенные шифр и email уже используются');
	} else if ($email != null) {
		wp_die('Введенный email уже используется');
	} else if ($id != null) {
		wp_die('Введенный шифр уже используется');
	}
}
//Изменить МКК
add_action('wp_ajax_editMKK_action', 'editMKK_action');
function editMKK_action()
{
	global $wpdb;
	$wpdb->show_errors();
	$curmkk = $wpdb->get_row("select id_mkk, Powers, mkk.Name, Head_mkk, mkk.Email,Start_date,End_date, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as Chairman from mkk
	inner join people on mkk.Chairman = people.ID_people
	where id_mkk = '" . $_POST['id'] . "'");
	if ($curmkk == null) {
		$curmkk = $wpdb->get_row("select id_mkk, Powers, mkk.Name, Head_mkk, mkk.Email,Start_date,End_date, Chairman from mkk
	where id_mkk = '" . $_POST['id'] . "'");
	}
	$allmkk = $wpdb->get_results("select * from mkk");
	$response = [$curmkk, $allmkk];

	echo json_encode($response);
	wp_die();
}



//Сохранить МКК
add_action('wp_ajax_saveMKK_action', 'saveMKK_action');
function saveMKK_action()
{
	global $wpdb;
	$wpdb->update("mkk", [
		'id_mkk' => $_POST['mkkID'],
		'Name' => $_POST['mkkName'],
		'Powers' => $_POST['mkkPowers'],
		'Head_mkk' => $_POST['mkkHead'],
		'Start_date' => $_POST['dateFrom'],
		'End_date' => $_POST['dateTo'],
	], [
		'id_mkk' => $_POST['mkkID'],
	]);
	wp_die();
}

//Добавить членов комиссии
add_action('wp_ajax_insertCommissionMembers_action', 'insertCommissionMembers_action');
function insertCommissionMembers_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$wpdb->show_errors();
	if ($_POST['userRole'] == 'mkk') {
		$wpdb->insert("commission_members", [
			'id_people' => $_POST['id'],
			'id_mkk' => $userID,
		]);
	} else if ($_POST['userRole'] == 'kpk') {
		$wpdb->insert("commission_members", [
			'id_people' => $_POST['id'],
			'id_kpk' => $userID,
		]);
	}

	wp_die();
}

//Удалить членов комиссии
add_action('wp_ajax_deleteCommissionMembers_action', 'deleteCommissionMembers_action');
function deleteCommissionMembers_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	if ($_POST['userRole'] == 'mkk') {
		$wpdb->delete("commission_members", [
			'id_people' => $_POST['id'],
			'id_mkk' => $userID,
		]);
	} else if ($_POST['userRole'] == 'kpk') {
		$wpdb->delete("commission_members", [
			'id_people' => $_POST['id'],
			'id_kpk' => $userID,
		]);
	}

	wp_die();
}

//Добавить ученика
add_action('wp_ajax_insertStudent_action', 'insertStudent_action');
function insertStudent_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$wpdb->show_errors();
	$wpdb->insert("students", [
		'id_people' => $_POST['id'],
		'id_school' => $id_school,
	]);

	wp_die();
}

//Изменить человека
add_action('wp_ajax_editPeople_action', 'editPeople_action');
function editPeople_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$wpdb->show_errors();
	$people = $wpdb->get_row("select * from people where id_people = '" . $_POST['id_people'] . "'");
	echo json_encode($people);
	wp_die();
}

//Сохранить человека
add_action('wp_ajax_savePeople_action', 'savePeople_action');
function savePeople_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$telephone = $_POST['telephone'];
	$email = $_POST['email'];
	if ($telephone == '') {
		$telephone  = null;
	}
	if ($email == '') {
		$email  = null;
	}
	$wpdb->show_errors();
	$wpdb->update(
		"people",
		[
			'Last_name' => $_POST['lastName'],
			'First_name' => $_POST['firstName'],
			'Patronymic' => $_POST['patronymic'],
			'Address' => $_POST['address'],
			'Place_of_work' => $_POST['placeOfWork'],
			'Telephone' => $telephone,
			'Email' => $email,
		],
		[
			'id_people' => $_POST['id']
		]
	);

	wp_die();
}

//Удалить ученика из школы
add_action('wp_ajax_deleteStudent_action', 'deleteStudent_action');
function deleteStudent_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$wpdb->show_errors();
	$wpdb->delete("students", [
		'id_people' => $_POST['id'],
		'id_school' => $id_school,
	]);

	wp_die();
}

//Добавить работника
add_action('wp_ajax_insertIPS_action', 'insertIPS_action');
function insertIPS_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$wpdb->show_errors();
	$wpdb->insert("ips", [
		'id_people' => $_POST['id'],
		'id_position' => $_POST['pos'],
		'id_school' => $id_school,
	]);

	wp_die();
}

//Удалить ученика из школы
add_action('wp_ajax_deleteIPS_action', 'deleteIPS_action');
function deleteIPS_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$wpdb->show_errors();
	$wpdb->delete("ips", [
		'id_people' => $_POST['id'],
		'id_school' => $id_school,
	]);

	wp_die();
}

//Изменить посещения по предмету
add_action('wp_ajax_editVisitsSubject_action', 'editVisitsSubject_action');
function editVisitsSubject_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$subject = $_POST['id_subject'];
	$visits = $_POST['visits'];
	$wpdb->query("delete visits from visits
	inner join shedule on visits.id_shedule = shedule.ID_shedule
	where id_subject = '" . $subject . "'");
	foreach ($visits as $visit) {
		$wpdb->insert("visits", [
			'ID_shedule' => $visit['id_shedule'],
			'ID_people' => $visit['fio'],
		]);
	}


	wp_die();
}

//Получить посещения для школы
add_action('wp_ajax_getVisits_action', 'getVisits_action');
function getVisits_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$visits = $wpdb->get_results("select visits.*, ID_subject from visits
	inner join shedule on visits.ID_shedule = shedule.ID_shedule
	where shedule.ID_school = '" . $userID . "'");

	echo json_encode($visits);
	wp_die();
}

//Составить звания и разряды
add_action('wp_ajax_composeRanks_action', 'composeRanks_action');
function composeRanks_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$wpdb->show_errors();
	if ($_POST['id_people'] == null) {
		$requests = $wpdb->get_results("select id_declares, doc,concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio, 
		ranks.Name as rank, tou.Name as type, concat(kpk.ID_kpk,' ',kpk.Name) as kpk, date, ranks.Duration, declares.ID_types_of_utp as types
		from declares
		inner join people on declares.ID_people = people.ID_people
		inner join ranks on declares.ID_rank = ranks.ID_rank
		inner join type_of_utp tou on declares.ID_types_of_utp = tou.ID_types_of_utp
		left join kpk on declares.ID_kpk = kpk.ID_kpk");
	} else {
		$requests = $wpdb->get_results("select id_declares, doc,concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio, 
		ranks.Name as rank, tou.Name as type, concat(kpk.ID_kpk,' ',kpk.Name) as kpk, date, ranks.Duration, declares.ID_types_of_utp as types
		from declares
		inner join people on declares.ID_people = people.ID_people
		inner join ranks on declares.ID_rank = ranks.ID_rank
		inner join type_of_utp tou on declares.ID_types_of_utp = tou.ID_types_of_utp
		left join kpk on declares.ID_kpk = kpk.ID_kpk
		where people.ID_people ='" . $_POST['id_people'] . "'");
	}
	$dateEndArr = [];
	$today = date('d.m.Y');
	foreach ($requests as $i => $declare) {
		$date = $declare->date;
		if ($declare->Duration == NULL) {
			$dateEndArr[$i] = '-';
		} else {
			$dateEnd = strtotime("+{$declare->Duration} YEAR", strtotime($date));
			$dateEndArr[$i] = date('d.m.Y', $dateEnd);
		}
		$declare->date = date('d.m.Y', strtotime($declare->date));
	}
	$response = [$requests, $dateEndArr, $today];
	echo json_encode($response);

	wp_die();
}

//Получить студентов для школы
add_action('wp_ajax_getStudentsBySchool_action', 'getStudentsBySchool_action');
function getStudentsBySchool_action()
{
	global $wpdb;
	$students = $wpdb->get_results("select 
	concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name, 
	people.id_people from students
	inner join people on students.id_people = people.id_people
	where students.id_school = '" . $_POST['id_school'] . "' 
	and people.ID_people not in
	(select ID_people from diplomas where ID_school = '" . $_POST['id_school'] . "')
    ");

	echo json_encode($students);
	wp_die();
}

//Получить ИПС для школы
add_action('wp_ajax_getIPSBySchool_action', 'getIPSBySchool_action');
function getIPSBySchool_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}

	global $wpdb;
	$ips = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name, people.id_people from ips
	inner join people on ips.id_people = people.id_people
	where ips.id_school = '" . $_POST['id_school'] . "' and people.ID_people not in(select ID_people from diplomas where ID_school = '" . $_POST['id_school'] . "')");

	echo json_encode($ips);
	wp_die();
}


//Получить ИПС для школы
add_action('wp_ajax_composeDiplomas_action', 'composeDiplomas_action');
function composeDiplomas_action()
{
	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;

	$isDiplomas = $_POST['diplomas'];
	if ($isDiplomas == 'true' && $_POST['id_people'] != null) {
		$result = $wpdb->get_results("select concat(Last_name, ' ', First_name, ' ', Patronymic) as fio, schools.Name as schoolName, type_of_school.Name as typeSchool, type_of_utp.Name as typeUtp, diplomas.Date, concat(kpk.ID_kpk,' ',kpk.Name) as kpk from diplomas
		inner join people on people.ID_people = diplomas.ID_people
		inner join schools on schools.ID_school = diplomas.ID_school
		inner join kpk on schools.ID_kpk = kpk.ID_kpk
		inner join ips on ips.ID_people = diplomas.ID_people
		inner join type_of_school on schools.ID_type_of_school = type_of_school.ID_type_of_school
		inner join type_of_utp on schools.Type_turism = type_of_utp.ID_types_of_utp
where diplomas.For_ips = 0 and people.id_people = '" . $_POST['id_people'] . "'
GROUP by people.ID_people");
	} else if ($isDiplomas == 'false'  && $_POST['id_people'] != null) {
		$result = $wpdb->get_results("select concat(Last_name, ' ', First_name, ' ', Patronymic) as fio, schools.Name as schoolName, type_of_school.Name as typeSchool, type_of_utp.Name as typeUtp, diplomas.Date, concat(kpk.ID_kpk,' ',kpk.Name) as kpk from diplomas
			inner join people on people.ID_people = diplomas.ID_people
            inner join schools on schools.ID_school = diplomas.ID_school
            inner join kpk on schools.ID_kpk = kpk.ID_kpk
			inner join ips on ips.ID_people = diplomas.ID_people
            inner join type_of_school on schools.ID_type_of_school = type_of_school.ID_type_of_school
            inner join type_of_utp on schools.Type_turism = type_of_utp.ID_types_of_utp
where diplomas.For_ips = 1 and people.id_people = '" . $_POST['id_people'] . "'
GROUP by people.ID_people");
	} else if ($isDiplomas == 'true'  && $_POST['id_people'] == null) {
		$result = $wpdb->get_results("select concat(Last_name, ' ', First_name, ' ', Patronymic) as fio, schools.Name as schoolName, type_of_school.Name as typeSchool, type_of_utp.Name as typeUtp, diplomas.Date, concat(kpk.ID_kpk,' ',kpk.Name) as kpk from diplomas
			inner join people on people.ID_people = diplomas.ID_people
            inner join schools on schools.ID_school = diplomas.ID_school
            inner join kpk on schools.ID_kpk = kpk.ID_kpk
			inner join ips on ips.ID_people = diplomas.ID_people
            inner join type_of_school on schools.ID_type_of_school = type_of_school.ID_type_of_school
            inner join type_of_utp on schools.Type_turism = type_of_utp.ID_types_of_utp
where diplomas.For_ips = 0
GROUP by people.ID_people");
	} else if ($isDiplomas == 'false'  && $_POST['id_people'] == null) {
		$result = $wpdb->get_results("select concat(Last_name, ' ', First_name, ' ', Patronymic) as fio, schools.Name as schoolName, type_of_school.Name as typeSchool, type_of_utp.Name as typeUtp, diplomas.Date, concat(kpk.ID_kpk,' ',kpk.Name) as kpk from diplomas
			inner join people on people.ID_people = diplomas.ID_people
            inner join schools on schools.ID_school = diplomas.ID_school
            inner join kpk on schools.ID_kpk = kpk.ID_kpk
			inner join ips on ips.ID_people = diplomas.ID_people
            inner join type_of_school on schools.ID_type_of_school = type_of_school.ID_type_of_school
            inner join type_of_utp on schools.Type_turism = type_of_utp.ID_types_of_utp
where diplomas.For_ips = 1 and people.id_people = '" . $_POST['id_people'] . "'
GROUP by people.ID_people");
	}

	echo json_encode($result);
	wp_die();
}


//Изменить присвоение
add_action('wp_ajax_editDeclare_action', 'editDeclare_action');
function editDeclare_action()
{
	global $wpdb;
	$declare = $wpdb->get_row("select * from declares where ID_declares = '" . $_POST['id_declare'] . "'");


	echo json_encode($declare);
	wp_die();
}

//Получить информацию по школе
add_action('wp_ajax_showInfoSchool_action', 'showInfoSchool_action');
function showInfoSchool_action()
{
	global $wpdb;
	// $ips = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name, people.id_people from ips
	// inner join people on ips.id_people = people.id_people
	// where ips.id_school = '" . $_POST['id_school'] . "' and people.ID_people not in(select ID_people from diplomas where ID_school = '" . $_POST['id_school'] . "')");

	$school = $wpdb->get_results("select schools.Name, schools.ID_school, tos.Name as typeSchool, concat(kpk.ID_kpk, ' ', kpk.Name) as kpk, schools.Start_date, schools.End_date, 
	concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as director, tou.Name as typeTurism
	from schools 
	inner join type_of_school tos on tos.ID_type_of_school = schools.ID_type_of_school
	inner join kpk on kpk.ID_kpk = schools.ID_kpk
	INNER join people on people.ID_people = schools.Director_school
	left join type_of_utp tou on tou.ID_types_of_utp = schools.Type_turism where id_school = '" . $_POST['id_school'] . "'");
	$utp = $wpdb->get_results("select * from utp where id_school = '" . $_POST['id_school'] . "'");
	$response = [$school, $utp];
	echo json_encode($response);
	wp_die();
}

//Сохранить присвоение
add_action('wp_ajax_saveRank_action', 'saveRank_action');

function saveRank_action()
{

	if (is_user_logged_in()) {
		$userInfo = get_user_meta(get_current_user_id());
		if (array_key_exists("myID", $userInfo)) {
			$userID = $userInfo["myID"][0];
			$userRole = $userInfo["myRole"][0];
			$id_school = $userID;
		}
	}
	global $wpdb;
	$typesArr = $_POST['types'];
	$types = implode(',', $typesArr);
	$wpdb->update(
		'declares',
		[
			'id_people' => $_POST['people'],
			'ID_kpk' => $userID,
			'Date' => $_POST['date'],
			'ID_rank' => $_POST['rank'],
			'ID_types_of_utp' => $types,
			'doc' => $_POST['doc'],
		],
		[
			'ID_declares' => $_POST['id_declare'],
		]
	);
	wp_die();
}

use PhpOffice\PhpWord\Shared\Converter;
use PhpOffice\PhpWord\Style\TablePosition;
use PhpOffice\PhpWord\PhpWord;

add_action('admin_post_nominateForRank', 'prefix_admin_nominateForRank_callback');
add_action('admin_post_nopriv_nominateForRank', 'prefix_admin_nominateForRank_callback');

function prefix_admin_nominateForRank_callback()
{
	require_once 'vendor/autoload.php';



	$uploadDir = __DIR__;
	$outputFile = 'Представление на звание ' . $_POST['fio'] . '.docx';

	$document = new \PhpOffice\PhpWord\TemplateProcessor($uploadDir . '/template-nominate-for-rank.docx');


	//Загрузка файла
	$uploadFile = $uploadDir . '\\' . basename($_FILES['file']['name']);


	move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);

	$fio = $_POST['fio'];
	$dateOfBirth = $_POST['dateOfBirth'];
	$dateStartYear = $_POST['dateStartYear'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$job = $_POST['job'];
	$currentRank = $_POST['currentRank'];
	$count = $_POST['count'];
	$rows = stripslashes($_POST['values']);
	$rows = json_decode($rows);
	$maxLvls = stripslashes($_POST['maxLvls']);
	$maxLvls = json_decode($maxLvls);

	$document->setValue('fio', $fio);
	$document->setValue('dateOfBirth', $dateOfBirth);
	$document->setValue('dateStartYear', $dateStartYear);
	$document->setValue('address', $address);
	$document->setValue('email', $email);
	$document->setValue('job', $job);
	$document->setValue('currentRank', $currentRank);
	$document->cloneRow('expN', $count);

	//Заполнение таблицы о подготовке
	foreach ($rows as $key => $value) {
		$role = $value->role;
		if ($role != 8) {
			$role = 'p';
		} else {
			$role = 'y';
		}

		$document->setValue('expN#' . ($key + 1), $value->number + 1);
		$document->setValue('expDate#' . ($key + 1), substr($value->date, 3));
		$document->setValue('expRegion#' . ($key + 1), $value->region);
		$document->setValue('expType#' . ($key + 1), $value->type);
		$document->setValue('exp' . $value->cat . $role . '#' . ($key + 1), '*');
		$document->setValue('exp1y#' . ($key + 1), '');
		$document->setValue('exp1p#' . ($key + 1), '');
		$document->setValue('exp2y#' . ($key + 1), '');
		$document->setValue('exp2p#' . ($key + 1), '');
		$document->setValue('exp3y#' . ($key + 1), '');
		$document->setValue('exp3p#' . ($key + 1), '');
		$document->setValue('exp4y#' . ($key + 1), '');
		$document->setValue('exp4p#' . ($key + 1), '');
		$document->setValue('exp5y#' . ($key + 1), '');
		$document->setValue('exp5p#' . ($key + 1), '');
		$document->setValue('exp6y#' . ($key + 1), '');
		$document->setValue('exp6p#' . ($key + 1), '');
	}
	//Заполнение таблицы о максимальном опыте
	foreach ($maxLvls as $value) {
		if ($value->id_position != 8) {
			$role = 'p';
		} else if ($value->id_position == 8) {
			$role = 'y';
		}
		switch ($value->Name) {
			case 'пешеходный':
				$typeUtp = 1;
				break;
			case 'лыжный':
				$typeUtp = 2;
				break;
			case 'горный':
				$typeUtp = 3;
				break;
			case 'водный':
				$typeUtp = 4;
				break;
			case 'велосипедный':
				$typeUtp = 5;
				break;
			case 'авто-мото':
				$typeUtp = 6;
				break;
			case 'спелео':
				$typeUtp = 7;
				break;
			case 'парусный':
				$typeUtp = 8;
				break;
			case 'конный':
				$typeUtp = 9;
				break;
		}

		$difficulty = arabicToRoman($value->Difficulty);

		$document->setValue('maxLvls' . $typeUtp . $role, $difficulty);
	}
	$document->setValue('maxLvls1y', '');
	$document->setValue('maxLvls2y', '');
	$document->setValue('maxLvls3y', '');
	$document->setValue('maxLvls4y', '');
	$document->setValue('maxLvls5y', '');
	$document->setValue('maxLvls6y', '');
	$document->setValue('maxLvls7y', '');
	$document->setValue('maxLvls8y', '');
	$document->setValue('maxLvls9y', '');
	$document->setValue('maxLvls1p', '');
	$document->setValue('maxLvls2p', '');
	$document->setValue('maxLvls3p', '');
	$document->setValue('maxLvls4p', '');
	$document->setValue('maxLvls5p', '');
	$document->setValue('maxLvls6p', '');
	$document->setValue('maxLvls7p', '');
	$document->setValue('maxLvls8p', '');
	$document->setValue('maxLvls9p', '');



	$document->saveAs($outputFile);

	// Имя скачиваемого файла
	$downloadFile = $outputFile;

	// Контент-тип означающий скачивание
	header("Content-Type: application/octet-stream");

	// Размер в байтах
	header("Accept-Ranges: bytes");

	// Размер файла
	header("Content-Length: " . filesize($downloadFile));

	// Расположение скачиваемого файла
	header("Content-Disposition: attachment; filename=" . $downloadFile);

	// Прочитать файл
	readfile($downloadFile);

	//Удалить файлы
	unlink($uploadFile);
	unlink($outputFile);

	wp_die();
	//request handlers should die() when they complete their task
}

//Перевод из арабской в римскую
function arabicToRoman($arabic)
{
	$roman = 'default';
	switch ($arabic) {
		case '1':
			$roman = 'I';
			break;
		case '2':
			$roman = 'II';
			break;

		case '3':
			$roman = 'III';
			break;

		case '4':
			$roman = 'IV';
			break;

		case '5':
			$roman = 'V';
			break;

		case '6':
			$roman = 'VI';
			break;
	}
	return $roman;
}

add_action('wp_ajax_testPhp_action', 'testPhp_action');

function testPhp_action()
{
	$post = $_POST;
	$values = $post['arr'];

	var_dump(($values));
	wp_die();
}
