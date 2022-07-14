<?php
/*
* Template Name: Add People
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить человека</p>
				<div class="form__block">
					<div class="form__row">
						<label for="last_name">Фамилия</label>
						<input id="lastName" type="text" name="lastName">
					</div>
					<div class="form__row">
						<label for="first_name">Имя</label>
						<input id="firstName" type="text" name="firstName">
					</div>
					<div class="form__row">
						<label for="patronymic">Отчество</label>
						<input id="patronymic" type="text" name="patronymic">
					</div>
					<div class="form__row">
						<label for="gender">Пол</label>
						<select id="gender" name="gender">
							<option value="не указано">-Не выбрано-</option>
							<option value="мужской">Мужской</option>
							<option value="женский">Женский</option>
						</select>
					</div>
					<div class="form__row">
						<label for="date_of_birth">Дата рождения</label>
						<input id="date_of_birth" type="date" name="dateOfBirth">
					</div>
					<div class="form__row">
						<label for="address">Адрес</label>
						<input id="address" type="text" name="address">
					</div>
					<div class="form__row">
						<label for="place_of_work">Место работы</label>
						<input id="place_of_work" type="text" name="placeOfWork">
					</div>
					<div class="form__row">
						<label for="telephone">Телефон</label>
						<input id="telephone" type="tel" name="telephone">
					</div>
					<div class="form__row">
						<label for="email">E-mail</label>
						<input id="email" type="email" name="email">
					</div>
					
					<input id="orderDate" type="date" name="orderDate" hidden>

					<button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn">Добавить</button>
					
					<p class="userRole" hidden><?php echo $userRole; ?></p>
				</div>

			</form>
		</div>
	</section>

</body>

<?php get_footer(); ?>


</html>