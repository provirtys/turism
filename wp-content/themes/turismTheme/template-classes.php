<?php
/*
* Template Name: Classes
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<div class="form-shedule">
				<h2>Расписание</h2>
				<div class="form__row form__rowPeriod">
					<label for="school">Период</label>
					<p>С</p>
					<input type="date" class="periodFrom period" value="<?php echo date('Y-m-d'); ?>">
					<p>По</p>
					<input type="date" class="periodTo period" value="<?php
																		$date = date('Y-m-d', strtotime("+7 day"));
																		echo $date; ?>">
				</div>
				<?php
				if (is_user_logged_in()) {
					$userInfo = get_user_meta(get_current_user_id());
					if (array_key_exists("myID", $userInfo)) {
						$userID = $userInfo["myID"][0];
						$userRole = $userInfo["myRole"][0];
						$id_school = $userID;
					}
				}
				?>
				<div class="form__row">
					<label for="school">Школа</label>
					<select name="school" id="school" class="sheduleSelect" disabled>
						<option value="notChosen">-Не выбрано-</option>
						<?php
						$schools = $wpdb->get_results("
							select * from schools");
						$mySchool = $wpdb->get_var("select Name from schools where id_school = '" . $id_school . "'");
						foreach ($schools as $school) { ?>
							<option <?php if ($mySchool == $school->Name) echo "selected" ?> value="<?php echo $school->ID_school ?>"><?php echo $school->Name ?></option>
						<?php } ?>
					</select>
					<button class="composeBtn btn composeBtnSchool">Составить расписание <br> для школы</button>
				</div>
				<div class="form__row">
					<label for="staff">Преподаватель</label>
					<select name="staff" id="staff" class="sheduleSelect">
						<option value="notChosen">-Не выбрано-</option>
						<?php
						$staff = $wpdb->get_results("
					select  people.ID_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name 
					from ips
					inner join people on ips.ID_people = people.ID_people
					where ID_ips in(
					select max(id_ips)
						 from ips 
						group by ips.id_people)
					and ID_school = '" . $id_school . "' and delete_mark = 0");

						foreach ($staff as $staff) { ?>
							<option value="<?php echo $staff->ID_people ?>"><?php echo $staff->Name ?></option>
						<?php } ?>
					</select>
					<button class="composeBtn btn composeBtnStaff">Составить расписание <br> для преподавателя</button>
				</div>

				<p class="tableName"></p>

				<div class="container-table container">
					<table class="table table-shedule">
						<!-- <thead>
					<tr>
						<?php
						for ($i = 0; $i <= 6; $i++) {
							$date = date('D, M d ', time() + $i * 24 * 60 * 60);

							// Вывод месяца на русском
							$monthes = array(
								1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
								5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
								9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
							);
							// echo $monthes[(date('n', strtotime($date)))];

							// Вывод дня недели
							$days = array(
								'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
								'Четверг', 'Пятница', 'Суббота'
							);
						?> <th><?php echo (date('d.m.Y', strtotime($date))) . '<br> (' . $days[(date('w', strtotime($date)))] . ')'; ?></th>

						<?php }
						?>
					</tr>
				</thead> -->
						<tbody>

						</tbody>
					</table>

				</div>
				<p class="hint hint-table" hidden>Листать таблицу можно также и с помощью стрелок на клавиатуре</p>
			</div>


		</div>
	</section>
	<div class="modals modals-class">
		<div class="modal">
			<div class="main__container container">
				<form class="form">
					<p class="form__title">Изменить занятие</p>
					<div class="form__block">
						<div class="form__row">
							<label for="date">Дата проведения</label>
							<input id="date" type="date" name="date">
						</div>
						<div class="form__row">
							<label for="time">Время проведения</label>
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
								$subjects = $wpdb->get_results("
								select subjects.* from subjects 
								inner join schools sType on sType.type_turism = subjects.type_turism
								inner join schools sLevel on sLevel.id_type_of_school = subjects.level
								where sType.id_school = '" . $userID . "' and sLevel.id_school ='" . $userID . "' order by Name");
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
							<select name="staff" id="modal-staff">
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
						<button class="form__submit btn">Сохранить</button>
					</div>
				</form>
			</div>
			<button class="modal-close-btn">
				<svg version="1.1" class="modal-close-btn-img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
					<g>
						<path d="M17.586,46.414C17.977,46.805,18.488,47,19,47s1.023-0.195,1.414-0.586L32,34.828l11.586,11.586
		C43.977,46.805,44.488,47,45,47s1.023-0.195,1.414-0.586c0.781-0.781,0.781-2.047,0-2.828L34.828,32l11.586-11.586
		c0.781-0.781,0.781-2.047,0-2.828c-0.781-0.781-2.047-0.781-2.828,0L32,29.172L20.414,17.586c-0.781-0.781-2.047-0.781-2.828,0
		c-0.781,0.781-0.781,2.047,0,2.828L29.172,32L17.586,43.586C16.805,44.367,16.805,45.633,17.586,46.414z" />
						<path d="M32,64c8.547,0,16.583-3.329,22.626-9.373C60.671,48.583,64,40.547,64,32s-3.329-16.583-9.374-22.626
		C48.583,3.329,40.547,0,32,0S15.417,3.329,9.374,9.373C3.329,15.417,0,23.453,0,32s3.329,16.583,9.374,22.626
		C15.417,60.671,23.453,64,32,64z M12.202,12.202C17.49,6.913,24.521,4,32,4s14.51,2.913,19.798,8.202C57.087,17.49,60,24.521,60,32
		s-2.913,14.51-8.202,19.798C46.51,57.087,39.479,60,32,60s-14.51-2.913-19.798-8.202C6.913,46.51,4,39.479,4,32
		S6.913,17.49,12.202,12.202z" />
					</g>
				</svg>
			</button>
		</div>
	</div>
</body>


<?php get_footer(); ?>


</html>