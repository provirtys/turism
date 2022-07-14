<?php
/*
* Template Name: Add KPK
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить КПК</p>
				<div class="form__block">
					<div class="form__row">
						<label class="emailWithHint" for="kpkEmail">Email <span class="underLabel">(Используется для авторизации)</span></label>
						<input id="kpkEmail" type="text" name="kpkEmail">
					</div>
					<div class="form__row">
						<label for="kpkID">Шифр КПК</label>
						<input id="kpkID" type="text" name="kpkID">
					</div>
					<div class="form__row">
						<label for="kpkName">Название</label>
						<input id="kpkName" type="text" name="kpkName">
					</div>
					<?php
					global $wpdb;
					$powers = $wpdb->get_var("select powers from kpk where id_kpk ='" . $userID . "'");
					if ($powers >= 4) { ?>
						<div class="form__row">
							<label for="kpkLVL">Уровень КПК</label>
							<select name="kpkLvl" id="kpkLvl">
								<?php
								global $wpdb;
								$result = $wpdb->get_results("select * from type_of_school where id_type_of_school < 4");
								foreach ($result as $kpk) { ?>
									<option value="<?php echo $kpk->ID_type_of_school; ?>"><?php echo $kpk->Name; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form__row">
							<label for="kpkHead">Головная КПК</label>
							<select name="kpkHead" id="kpkHead">
								<option value="notChosen">-Не выбрано-</option>
								<?php
								global $wpdb;
								$result = $wpdb->get_results("select * from kpk");
								foreach ($result as $kpk) { ?>
									<option value="<?php echo $kpk->ID_kpk; ?>"><?php echo $kpk->Name . ' ' . $kpk->ID_kpk; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form__row">
							<label for="mkk">Связанная МКК</label>
							<select name="mkk" id="mkk">
								<option value="notChosen">-Не выбрано-</option>
								<?php
								global $wpdb;
								$result = $wpdb->get_results("select * from mkk");
								foreach ($result as $mkk) { ?>
									<option value="<?php echo $mkk->ID_mkk; ?>"><?php echo $mkk->Name . ' ' . $mkk->ID_mkk; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form__row">
							<label for="dateFrom">Начало полномочий</label>
							<input id="dateFrom" type="date" name="dateFrom">
						</div>
						<div class="form__row">
							<label for="dateTo">Окончание полномочий</label>
							<input id="dateTo" type="date" name="dateTo">
						</div>

					<?php
					}
					?>


					<p class="userID" hidden><?php echo $userID; ?></p>
					<button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn">Добавить</button>

				</div>

			</form>
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>