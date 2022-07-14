<?php
/*
* Template Name: Php Word
*/
get_header(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Documents</title>
	<style>
		input {
			display: block;
			width: 300px;
			margin-bottom: 10px;
			height: 50px;
		}
	</style>
</head>

<body>
	<form action="<?php echo esc_attr(admin_url('admin-post.php')); ?>" method="POST" enctype="multipart/form-data">
		<input type="text" name="name">
		<input type="text" name="head">
		<input type="date" name="dateStart">
		<input type="date" name="dateEnd">
		<input type="text" name="type">
		<input type="number" name="lvl">
		<input type="file" name="file">
		<button type="submit">Отправить</button>
		<input type="hidden" name="action" value="myform" />
	</form>
</body>


<?php get_footer(); ?>


</html>