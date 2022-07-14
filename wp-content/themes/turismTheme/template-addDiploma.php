<?php
/*
* Template Name: Add Diploma
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Выдать диплом</p>
				<div class="form__block">
					<div class="form__row">
						<label for="school">Школа</label>
						<select name="school" id="school">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$schools = $wpdb->get_results("select *	from schools
							where id_kpk = '".$userID."'");
							foreach ($schools as $school) { ?>
								<option value="<?php echo $school->ID_school ?>">
								<?php echo $school->Name ?></option>
							<?php }
							?>
						</select>
					</div>
					<div class="form__row">
						<label for="people">Человек</label>
						<select name="people" id="people">
							<option value="notChosen">-Выберите школу-</option>
						</select>
					</div>
					<div class="form__row">
						<label for="date">Дата выдачи</label>
						<input id="date" type="date" name="date">
					</div>
					<button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn">Добавить</button>
				</div>
			</form>
		</div>
	</section>
</body>


<?php get_footer(); ?>


</html>