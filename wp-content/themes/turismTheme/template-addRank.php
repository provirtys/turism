<?php
/*
* Template Name: Add Rank
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<form class="form" enctype="multipart/form-data">
				<?php
				if (is_user_logged_in()) {
					$userInfo = get_user_meta(get_current_user_id());
					if (array_key_exists("myID", $userInfo)) {
						$userID = $userInfo["myID"][0];
						$userRole = $userInfo["myRole"][0];
						$id_school = $userID;
					}
				}
				global $wpdb;
				$people = $wpdb->get_results("select id_people, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as Name from people where delete_mark = 0");
				$ranks = $wpdb->get_results("select * from ranks");
				$typesUtp = $wpdb->get_results("select * from type_of_utp");
				?>
				<p class="form__title">Присвоить разряд или звание</p>
				<div class="form__block">
					<div class="form__row">
						<label for="people">Человек</label>
						<select name="people" id="people">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							foreach ($people as $man) { ?>
								<option value="<?php echo $man->id_people ?>"><?php echo $man->Name ?></option>
							<?php	}
							?>
						</select>
					</div>
					<div class="form__row">
						<label for="doc">Номер удостоверения</label>
						<input type="text" id="doc">
					</div>
					<div class="form__row">
						<label for="rank">Звание (разряд)</label>
						<select name="rank" id="rank">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							foreach ($ranks as $rank) { ?>
								<option value="<?php echo $rank->ID_rank ?>"><?php echo $rank->Name ?></option>
							<?php	}
							?>
						</select>
					</div>
					<div class="form__row">
						<label for="rank">Вид туризма</label>
						<div class="form__row form__row-typeUtp">
							<?php foreach ($typesUtp as $type) { ?>
								<div class="form__subrow-typeUtp">
									<input type="checkbox" name="type<?php echo $type->ID_types_of_utp ?>" id="type<?php echo $type->ID_types_of_utp ?>" data-id="<?php echo $type->ID_types_of_utp ?>">
									<label for="type<?php echo $type->ID_types_of_utp ?>"><?php echo ($type->Name) ?></label>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class="form__row">
						<label for="date">Дата</label>
						<input type="date" id="date" value="<?php echo date('Y-m-d'); ?>">
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