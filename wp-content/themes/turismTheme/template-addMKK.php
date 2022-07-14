<?php
/*
* Template Name: Add MKK
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить МКК</p>
				<div class="form__block">
					<div class="form__row">
						<label class="emailWithHint" for="mkkEmail">Email <span class="underLabel">(Используется для авторизации)</span></label>
						<input id="mkkEmail" type="text" name="mkkEmail">
					</div>
					<div class="form__row">
						<label for="mkkID">Шифр МКК</label>
						<input id="mkkID" type="text" name="mkkID">
					</div>
					<div class="form__row">
						<label for="mkkName">Название</label>
						<input id="mkkName" type="text" name="mkkName">
					</div>
					<?php
					global $wpdb;
					$powers = $wpdb->get_var("select powers from mkk where id_mkk ='" . $userID . "'");
					?>
					<div class="form__row">
						<label for="mkkLVL">Полномочия МКК</label>
						<input id="mkkPowers" type="text" name='mkkPowers'>
					</div>
					<?php
					if ($userID == '100-00') {
					?>
						<div class="form__row">
							<label for="mkkHead">Головная МКК</label>
							<select name="mkkHead" id="mkkHead">
								<option value="notChosen">-Не выбрано-</option>
								<?php
								global $wpdb;
								$result = $wpdb->get_results("select * from mkk");
								foreach ($result as $mkk) { ?>
									<option value="<?php echo $mkk->ID_mkk; ?>"><?php echo $mkk->Name; ?></option>
								<?php } ?>
							</select>
						</div>
					<?php
					}
					?>
					<div class="form__row">
						<label for="dateFrom">Начало полномочий</label>
						<input id="dateFrom" type="date" name="dateFrom">
					</div>
					<div class="form__row">
						<label for="dateTo">Окончание полномочий</label>
						<input id="dateTo" type="date" name="dateTo">
					</div>



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