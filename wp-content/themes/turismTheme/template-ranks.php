<?php
/*
* Template Name: Ranks
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2 class="main__title">Присвоенные разряды и звания</h2>
			<?php
			global $wpdb;
			$people = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as FIO, people.id_people from people
			inner join declares on people.ID_people = declares.ID_people
			group by people.id_people");
			$types = $wpdb->get_results("select * from type_of_utp");
			$result = $wpdb->get_results("select id_declares,doc,concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio, 
			ranks.Name as rank,  concat(kpk.ID_kpk,' ',kpk.Name) as kpk, date, ranks.Duration, declares.ID_types_of_utp as types
			from declares
			inner join people on declares.ID_people = people.ID_people
			inner join ranks on declares.ID_rank = ranks.ID_rank
			left join kpk on declares.ID_kpk = kpk.ID_kpk
            ");

			?>
			<div class="form__row">
				<label for="people">Выберите человека:</label>
				<select name="people" id="people">
					<option value="notChosen">-Не выбрано-</option>
					<?php
					foreach ($people as $man) { ?>
						<option value="<?php echo $man->id_people ?>"><?php echo $man->FIO ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="container-table container-table-ranks">
				<table class="table table-edit">

					<thead>
						<tr>
							<th></th>
							<th class="th" onclick="sortTable(0)">ФИО</th>
							<th class="th" onclick="sortTable(1)">Номер удостоверения</th>
							<th class="th" onclick="sortTable(2)">Дата присвоения</th>
							<th class="th" onclick="sortTable(3)">Дата окончания</th>
							<th class="th" onclick="sortTable(4)">КПК</th>
							<th class="th" onclick="sortTable(5)">Вид туризма</th>
							<th class="th" onclick="sortTable(6)">Звание/разряд</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($result as $declare) {
							$date = $declare->date;
							if ($declare->Duration == NULL) {
								$dateEnd = '-';
							} else {
								$dateEnd = strtotime("+{$declare->Duration} YEAR", strtotime($date));
								$dateEnd = date('d.m.Y', $dateEnd);
							}


							$dateStart = date('d.m.Y', strtotime($date));
							$today = date('d.m.Y');
						?>
							<tr>
								<td>

									<button <?php
											if ($userID == '100-00' or $userID == substr($declare->kpk, 0, 6)) {
											} else {
												echo 'disabled';
											}

											?> class="editBtn tableBtn" value="<?php echo $declare->id_declares; ?>">
										<svg version="1.1" id="Layer_1" class="editImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
											<g id="XMLID_23_">
												<path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
		c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
		C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z" />
												<path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
		C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z" />
											</g>
										</svg>
									</button>

								</td>
								<td><?php echo $declare->fio; ?></td>
								<td><?php echo $declare->doc; ?></td>

								<td><?php echo $dateStart; ?></td>
								<td <?php if (strtotime($today) > strtotime($dateEnd) && $dateEnd != '-') echo 'style="color:red"'; ?>>
									<?php
									echo $dateEnd; ?></td>
								<td><?php echo $declare->kpk; ?></td>
								<td><?php
									$typesString = '';
									$isFirst = true;
									$typesCur = str_replace(' ', '', $declare->types);
									$typesCur = str_replace(',', '', $typesCur);
									$typesArr = str_split($typesCur);
									foreach ($typesArr as $type) {
										if (!$isFirst)
											echo ', ';

										if ($type > 0)
											$isFirst = false;

										if ($type == '1')
											echo 'пешеходный';
										else if ($type == '2')
											echo 'лыжный';
										else if ($type == '3')
											echo 'горный';
										else if ($type == '4')
											echo 'водный';
										else if ($type == '5')
											echo 'велосипедный';
										else if ($type == '6')
											echo 'авто-мото';
										else if ($type == '7')
											echo 'спелео';
										else if ($type == '8')
											echo 'парусный';
										else if ($type == '9')
											echo 'конный';

										// var_dump($declare->types);
										// if (stripos($declare->types, $type->ID_types_of_utp)) {
										// if (!$isFirst) {
										// 	echo ', ';
										// }
										// echo $type->Name;
										// $isFirst = false;
										// }

									}
									?></td>
								<td><?php echo $declare->rank; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
	<div class="modals modals-student">
		<div class="modal">
			<div class="main__container container">
				<form class="form">
					<p class="form__title">Изменить данные о присвоении</p>
					<div class="form__block">
						<?php
						$peopleAll = $wpdb->get_results("select id_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name from people where delete_mark = 0");
						$ranksAll = $wpdb->get_results("select * from ranks");
						$typesUtpAll = $wpdb->get_results("select * from type_of_utp");
						?>
						<div class="form__row">
							<label for="people">Человек</label>
							<select name="people" id="people">
								<option value="notChosen">-Не выбрано-</option>
								<?php
								foreach ($peopleAll as $man) { ?>
									<option value="<?php echo $man->id_people ?>"><?php echo $man->Name ?></option>
								<?php	}
								?>
							</select>
						</div>
						<div class="form__row">
							<label for="doc">Номер удостоверения</label>
							<input type="text" id="doc">
						</div>
						<div class="form__row">
							<label for="rank">Звание (разряд)</label>
							<select name="rank" id="rank">
								<option value="notChosen">-Не выбрано-</option>
								<?php
								foreach ($ranksAll as $rank) { ?>
									<option value="<?php echo $rank->ID_rank ?>"><?php echo $rank->Name ?></option>
								<?php	}
								?>
							</select>
						</div>
						<div class="form__row">
							<label for="rank">Вид туризма</label>
							<div class="form__row form__row-typeUtp">
								<?php foreach ($typesUtpAll as $type) { ?>
									<div class="form__subrow-typeUtp">
										<input type="checkbox" name="type<?php echo $type->ID_types_of_utp ?>" id="type<?php echo $type->ID_types_of_utp ?>" data-id="<?php echo $type->ID_types_of_utp ?>">
										<label for="type<?php echo $type->ID_types_of_utp ?>"><?php echo ($type->Name) ?></label>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="form__row">
							<label for="date">Дата</label>
							<input type="date" id="date">
						</div>


						<p class="userID" hidden><?php echo $userID; ?></p>
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