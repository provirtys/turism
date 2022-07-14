<?php
/*
* Template Name: Add Register Request
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Заявка на регистрацию</p>
				<div class="form__block">
					<div class="form__row">
						<label for="role">Роль</label>
						<select name="role" id="role">
							<option value="school">Школа спортивного туризма</option>
							<option value="mkk">Маршрутно квалификационная комиссия</option>
						</select>
					</div>
					<div class="form__row">
						<label for="name">Название школы/МКК</label>
						<input id="name" type="text" name="name">
					</div>
					<div class="form__row">
						<label for="login">Логин</label>
						<input id="login" type="text" name="login">
					</div>
					<div class="form__row">
						<label for="email">Email</label>
						<input id="email" type="email" name="email">
					</div>
					<div class="form__row">
						<label for="password">Пароль</label>
						<input id="password" type="password" name="password">
					</div>
					<button class="form__resetbtn btn" type="reset">Сброс</button>
					<button class="form__submit btn">Отправить заявку</button>
				</div>
			</form>
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>