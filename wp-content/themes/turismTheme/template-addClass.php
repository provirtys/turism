<?php
/*
* Template Name: Add Class
*/

get_header(); ?>
<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить занятие</p>
				<div class="form__block">
					<div class="form__row">
						<label for="date">Дата проведения</label>
						<input id="date" type="date" name="date">
					</div>
					<div class="form__row">
						<label for="time">Начало занятия</label>
						<input id="time" type="time" name="time">
					</div>
					<div class="form__row">
						<label for="duration">Длительность (мин.)</label>
						<input id="duration" type="number" name="duration">
					</div>
					<div class="form__row">
						<label for="subject">Тематика занятия</label>
						<select name="subject" id="subject">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							echo $userID;
							$subjects = $wpdb->get_results("
							select subjects.* from subjects 
							inner join schools sType on sType.type_turism = subjects.type_turism
							inner join schools sLevel on sLevel.id_type_of_school = subjects.level
							where sType.id_school ='" . $userID . "' and sLevel.id_school ='" . $userID . "' order by Name");
							foreach ($subjects as $subject) { ?>
								<option value="<?php echo $subject->ID_subject ?>"><?php echo $subject->Name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form__row">
						<label for="posName">Вид занятия</label>
						<select name="type" id="type">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$types = $wpdb->get_results("
							select * from type_of_class");
							foreach ($types as $type) { ?>
								<option value="<?php echo $type->ID_type_of_class ?>"><?php echo $type->Name ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form__row">
						<label for="staff">Преподаватель</label>
						<select name="staff" id="staff">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$ips = $wpdb->get_results("select people.id_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name from people
								inner join ips on people.id_people = ips.id_people
								where id_school = '" . $userID . "'");
							foreach ($ips as $man) { ?>
								<option value="<?php echo $man->id_people ?>"><?php echo $man->Name ?></option>
							<?php	}
							?>
						</select>
					</div>
					<button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn">Добавить</button>
				</div>
			</form>
			<?php 
						$schoolDates = $wpdb->get_row("select Start_date,End_date from schools where ID_school = '".$userID."'");
						$schoolStartDate = $schoolDates->Start_date;
						$schoolEndDate = $schoolDates->End_date;

					?>
					
					<input hidden type="date" class="schoolStartDate" value = "<?php echo date('Y-m-d',strtotime($schoolStartDate)) ?>">
					<input hidden type="date" class="schoolEndDate" value = "<?php echo date('Y-m-d',strtotime($schoolEndDate)) ?>">
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>