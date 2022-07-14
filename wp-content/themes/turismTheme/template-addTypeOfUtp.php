<?php
/*
* Template Name: Add Type of Utp
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form">
				<p class="form__title">Добавить вид похода</p>
				<div class="form__block">
					<div class="form__row">
						<label for="utpName">Название</label>
						<input id="utpName" type="text" name="utpName">
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