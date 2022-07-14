<?php
/*
* Template Name: Add Position
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить должность</p>
				<div class="form__block">
					<div class="form__row">
						<label for="posName">Название</label>
						<input id="posName" type="text" name="posName">
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