<?php
/*
* Template Name: Add Utp
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить поход</p>
				<?php
				global $wpdb;
				$school = $wpdb->get_row("select schools.*, tou.Name as typeTurism, tos.Name as typeSchool, tos.id_type_of_school as typeSchoolValue from schools
					inner join type_of_utp tou on tou.id_types_of_utp = schools.type_turism
					inner join type_of_school tos on tos.id_type_of_school = schools.id_type_of_school where id_school = '" . $userID . "'");
				?>
				<div class="form__block">
					<div class="form__row">
						<label for="nameUtp">Название</label>
						<input id="nameUtp" type="text" name="nameUtp">
					</div>

					<div class="form__row form__rowPeriod">
						<label>Период</label>
						<p>С</p>
						<input type="date" class="periodFrom period">
						<p>По</p>
						<input type="date" class="periodTo period">
					</div>
					<div class="form__row">
						<label for="typeUtp">Вид похода</label>
						<select disabled id="typeUtp" name="typeUtp" value="<?php echo $school->typeTurism ?>">
							<?php
							global $wpdb;
							$typesOfUtp = $wpdb->get_results("select * from type_of_utp");
							foreach ($typesOfUtp as $i => $type) { ?>
								<option <?php if($school->typeTurism==$type->Name){echo "selected";} ?> value="<?php echo $type->ID_types_of_utp ?>"><?php echo $type->Name; ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="form__row">
						<label>Сложность похода</label>
						<input disabled type="text" name="difficultyUtp" data-difficultyUtp="<?php echo $school->typeSchoolValue ?>" value="<?php echo $school->typeSchool ?>">
					</div>
					<div class="form__row">
						<label>Район похода</label>
						<input type="text" name="regionUtp">
					</div>
					<div class="form__row">
						<label>Руководитель</label>
						<select id="leaderUtp" name="leaderUtp">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							global $wpdb;
							$wpdb->show_errors();
							if (is_user_logged_in()) {
								$userInfo = get_user_meta(get_current_user_id());
								if (array_key_exists("id_school", $userInfo)) {
									$userIdSchool = $userInfo["id_school"][0];
									$id_school = $userIdSchool;
								}
							}
							$staff = $wpdb->get_results("select people.ID_people, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as Name 
							from people
							inner join ips on ips.ID_people = people.ID_people
							where ips.ID_school = '" . $id_school . "'");
							foreach ($staff as $i => $elem) { ?>
								<option value="<?php echo $elem->ID_people ?>"><?php echo $elem->Name; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form__row">
						<label>Завхоз</label>
						<select id="supplyUtp" name="supplyUtp">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							global $wpdb;
							foreach ($staff as $i => $elem) { ?>
								<option value="<?php echo $elem->ID_people ?>"><?php echo $elem->Name; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form__row">
						<label>Медик</label>
						<select id="medicUtp" name="medicUtp">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							foreach ($staff as $i => $elem) { ?>
								<option value="<?php echo $elem->ID_people ?>"><?php echo $elem->Name; ?></option>
							<?php } ?>
						</select>
					</div>
					<!-- 
					<?php global $wpdb;
					$result = $wpdb->get_results("select people.id_people , concat(Last_name, ' ', First_name, ' ', Patronymic) as Name from people
					inner join students on people.id_people = students.id_people
					where delete_mark = 0 and id_school = '" . $id_school . "'");
					?>
					<p class="tableName">Ученики</p>
					<input class="form-control" type="search" placeholder="Поиск" id="search-text" onkeyup="tableSearch()">

					<div class="container-table-members container">

						<table class="table table-members" id="info-table">
							<thead>
								<tr>
									<th onclick="sortTable(0)" class="thCheckBox th"></th>
									<th onclick="sortTable(1)" class="th">ФИО</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($result as $man) { ?>
									<tr>
										<td class="tdCheckBox">
											<input type="checkbox" class="tableCheckBox" id="student<?php echo $man->id_people ?>" value="<?php echo $man->id_people ?>">

										</td>
										<td>
											<label class="tdLabel" for="student<?php echo $man->id_people ?>"><?php echo $man->Name; ?></label>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div> -->


					<input id="orderDate" type="date" name="orderDate" hidden>

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