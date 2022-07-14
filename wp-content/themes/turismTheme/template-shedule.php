<?php
/*
* Template Name: Shedule
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
				<p class="hint hint-table" hidden>Листатьs таблицу можно также и с помощью стрелок на клавиатуре</p>
			</div>


		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>