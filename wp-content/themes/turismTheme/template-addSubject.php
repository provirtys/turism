<?php
/*
* Template Name: Add Subject
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить тематику занятий</p>
				<div class="form__block">
					<div class="form__row">
						<label for="subjName">Название</label>
						<input id="subjName" type="text" name="subjName">
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