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
						<label for="people">Длительность</label>
						<select name="people" id="people">
							<option value="notChosen">-Не выбрано-</option>
							<?php
							$students = $wpdb->get_results("select  people.id_people, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio
							from students
							inner join people on students.ID_people = people.ID_people
							where ID_student in(
							select max(id_student) 
								 from students
								group by students.id_people) and people.ID_people not in(select ID_people from diplomas where ID_school = '" . $id_school . "')
							and ID_school = '" . $id_school . "' and delete_mark = 0");
							
							foreach ($students as $student) { ?>
								<option value="<?php echo $student->id_people ?>"><?php echo $student->fio ?></option>
							<?php }
							?>
							
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