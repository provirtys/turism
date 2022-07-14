<?php
/*
* Template Name: Profile KPK
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Профиль КПК</p>
				<div class="form__block">
					<div class="form__row">
						<?php
						global $wpdb;


						$result = $wpdb->get_row("select name,powers,start_date,end_date from kpk where id_kpk = '" . $userID . "'");
						$name = $result->name;
						$powers = $result->powers;
						switch ($powers) {
							case 4:
								$powers = 'Высший уровень';
								break;
							case 3:
								$powers = 'Специализированный уровень';
								break;
							case 2:
								$powers = 'Базовый уровень';
								break;
							case 1:
								$powers = 'Начальный уровень';
								break;
						}
						$startDate = $result->start_date;
						$endDate = $result->end_date;
						?>
						<label for="name">Название</label>
						<input disabled id="name" type="text" name="name" value="<?php echo $name ?>">
					</div>
					<div class="form__row">
						<label for="head_kpk">Головная МКК</label>
						<select disabled name="head_kpk" id="head_kpk">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$head_kpk = $wpdb->get_var("select head_kpk from kpk where id_kpk = '" . $userID . "'");
							$kpk = $wpdb->get_results("select * from kpk where powers > (select powers from kpk where id_kpk =  '" . $userID . "')");
							foreach ($kpk as $elem) {
							?>
								<option <?php if ($head_kpk == $elem->ID_kpk) echo " selected " ?> value="<?php echo $elem->ID_kpk ?>"><?php echo $elem->ID_kpk . ' ' . $elem->Name ?></option>

							<?php
							}

							?>
						</select>
					</div>
					<div class="form__row">
						<label for="powers_mkk">Полномочия</label>
						<input disabled type="text" value="<?php echo $powers; ?>">
					</div>
					<div class="form__row">
						<label for="head_mkk">Начало полномочий</label>
						<input disabled type="date" value="<?php echo $startDate; ?>">
					</div>
					<div class="form__row">
						<label for="head_mkk">Конец полномочий</label>
						<input disabled type="date" value="<?php echo $endDate; ?>">
					</div>
					<div class="form__row">
						<label for="chairmanSelect">Председатель</label>
						<select name="chairmanSelect" id="chairmanSelect">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$chairman = $wpdb->get_var("select chairman from kpk where id_kpk = '" . $userID . "'");
							$members = $wpdb->get_results("select people.id_people, concat(Last_name, ' ', First_name, ' ', Patronymic) as Name
							from commission_members
							inner join people on people.id_people = commission_members.id_people
							where ID_kpk = '" . $userID . "' and delete_mark = 0");
							var_dump($userID);
							foreach ($members as $man) {
							?>
								<option <?php if ($chairman == $man->id_people) echo " selected " ?> value="<?php echo $man->id_people ?>"><?php echo $man->Name ?></option>

							<?php
							}

							?>
						</select>
					</div>
					<p class="userID" hidden><?php echo $userID; ?></p>
					<button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn">Сохранить</button>
				</div>
			</form>

		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>