<?php
/*
* Template Name: Profile School
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Профиль Школы</p>
				<div class="form__block">
					<div class="form__row">
						<?php
						global $wpdb;
						$directorEducation = $wpdb->get_var("select direcor_education from schools where id_school ='" . $userID . "'");
						if ($directorEducation != 0) {
							$result = $wpdb->get_row("select schools.*, concat(dS.last_name, ' ' ,dS.first_name, ' ', dS.patronymic) as dSFIO, concat(dE.last_name, ' ' ,dE.first_name, ' ', dE.patronymic) as dEFIO from schools
							inner join people dS on schools.Director_school = dS.id_people
							inner join people dE on schools.Director_education = dE.id_people
							where id_school = '" . $userID . "' and delete_mark = 0");
						} else {
							$result = $wpdb->get_row("select schools.*, concat(dS.last_name, ' ' ,dS.first_name, ' ', dS.patronymic) as dSFIO from schools
							inner join people dS on schools.Director_school = dS.id_people
							where id_school = '" . $userID . "' and delete_mark = 0");
						}

						$name = $wpdb->get_var("select name from schools where id_school = '" . $userID . "'");
						?>
						<label for="name">Название</label>
						<input disabled id="name" type="text" name="name" value="<?php echo $name ?>">
					</div>
					<div class="form__row">
						<label for="typeSchool">Уровень школы</label>
						<select disabled name="typeSchool" id="typeSchool">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$current_type = $wpdb->get_var("select id_type_of_school from schools where id_school = '" . $userID . "'");
							$types = $wpdb->get_results("select tos.id_type_of_school as id, tos.Name from type_of_school tos");
							foreach ($types as $type) {
							?>
								<option <?php if ($current_type == $type->id) echo " selected " ?> value="<?php echo $type->id ?>"><?php echo $type->Name ?></option>

							<?php
							}

							?>
						</select>
					</div>
					<div class="form__row">
						<?php 
						$typeTurism = $wpdb->get_var("select Name from type_of_utp where id_types_of_utp = '".$result->Type_turism."'")
						 ?>
							<label for="typeTurism">Вид туризма</label>
							<input disabled type="text" id="typeTurism" value ="<?php echo $typeTurism; ?>">
						</div>
					<div class="form__row">
						<label for="kpk">КПК</label>
						<select disabled name="kpk" id="kpk">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$current_kpk = $wpdb->get_var("select ID_kpk from schools where id_school = '" . $userID . "'");
							$kpk = $wpdb->get_results("select * from kpk");
							foreach ($kpk as $elem) {
							?>
								<option <?php if ($current_kpk == $elem->ID_kpk) echo " selected " ?> value="<?php echo $elem->ID_kpk ?>"><?php echo $elem->Name ?></option>

							<?php
							}
							?>
						</select>
					</div>
					<div class="form__row">
						<label for="dateFrom">Дата начала</label>
						<input disabled type="date" id="dateFrom" value="<?php echo $result->Start_date ?>">
					</div>
					<div class="form__row">
						<label for="dateFrom">Дата окончания</label>
						<input disabled type="date" id="dateTo" value="<?php echo $result->End_date ?>">
					</div>
					<div class="form__row">
						<label for="directorSchool">Начальник</label>
						<input disabled type="text" id="directorSchool" value="<?php echo $result->dSFIO ?>">
					</div>
					<?php if ($directorEducation != 0) { ?>
						<div class="form__row">
							<label for="directorEducation">Дата окончания</label>
							<input disabled type="text" id="directorEducation" value="<?php echo $result->dEFIO ?>">
						</div>
					<?php } ?>


					<!-- <button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn third">Сохранить</button> -->
				</div>
			</form>
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>