<?php
/*
* Template Name: Schools
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2>Школы</h2>
			<?php global $wpdb;
			$result = $wpdb->get_results("select schools.*, kpk.ID_kpk, kpk.Name as kpkName from schools
		inner join kpk on schools.ID_kpk = kpk.ID_kpk");
			?>
			<table class="table">
				<thead>
					<tr>
						<th class="th" onclick="sortTable(0)">Название</th>
						<th class="th" onclick="sortTable(1)">КПК</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result as $school) { ?>
						<tr>
							<td class="showInfoTd" data-id_school="<?php echo $school->ID_school ?>"><?php echo $school->Name; ?></td>
							<td><?php echo $school->ID_kpk . ' ' . $school->kpkName; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
	<div class="modals modals-student">
		<div class="modal">
			<div class="main__container container">
				<form class="form">
					<p class="form__title">Информация о школе</p>
					<div class="form__block">
						<div class="form__row">
							<label for="lastName">Название</label>
							<input disabled id="nameSchool" type="text" name="nameSchool">
						</div>
						<div class="form__row">
							<label for="typeSchool">Уровень школы</label>
							<input disabled type="text" id="typeSchool">
						</div>
						<div class="form__row">
							<label for="typeTurism">Вид туризма</label>
							<input disabled type="text" id="typeTurism">
						</div>
						<div class="form__row">
							<label for="kpk">КПК</label>
							<input disabled type="text" id="kpk">
						</div>
						<div class="form__row">
							<label for="dateFrom">Дата начала</label>
							<input disabled type="date" id="dateFrom">
						</div>
						<div class="form__row">
							<label for="dateFrom">Дата окончания</label>
							<input disabled type="date" id="dateTo">
						</div>
						<div class="form__row">
							<label for="directorSchool">Начальник</label>
							<input disabled type="text" id="directorSchool">
						</div>

						<p class="userID" hidden><?php echo $userID; ?></p>
						<!-- <button class="form__submit btn">Сохранить</button> -->
						<p class="modalLabel">Походы</p>
						<table class="table">
							<thead>
								<th>Название</th>
								<th>Регион</th>
								<th>Дата начала</th>
								<th>Дата окончания</th>
							</thead>
							<tbody>

							</tbody>
						</table>
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
	<?php
	$json = '[{"id_position":"8","Difficulty":"2","Name":"лыжный"},{"id_position":"8","Difficulty":"4","Name":"пешеходный"},{"id_position":"7","Difficulty":"4","Name":"пешеходный"}]';
	$maxLvls = stripslashes($json);

	$maxLvls = json_decode($json);
	

	// var_dump($maxLvls);
	foreach ($maxLvls as $key => $value) {
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

		
// 		$difficulty = arabicToRoman($value->Difficulty);

// 		$document->setValue('maxLvls' . $typeUtp . $role, $difficulty);
	}

	// var_dump($rows);
	// echo($rows[0]->number+1);
	// foreach ($rows as $row) {
	// 	var_dump($row->date);
	// 	echo '<br>';
	// }
	// var_dump(json_decode($json, true));

	?>
</body>


<?php get_footer(); ?>


</html>