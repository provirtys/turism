<?php
/*
* Template Name: Diplomas
*/
get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2>Дипломы</h2>
			<?php global $wpdb;
			$people = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as FIO, people.id_people from people
			inner join diplomas on people.ID_people = diplomas.ID_people
			where For_ips = 0
			group by people.id_people");
			$result = $wpdb->get_results("select concat(Last_name, ' ', First_name, ' ', Patronymic) as fio, schools.Name as schoolName, type_of_school.Name as typeSchool, type_of_utp.Name as typeUtp, diplomas.Date, concat(kpk.ID_kpk,' ',kpk.Name) as kpk from diplomas
			inner join people on people.ID_people = diplomas.ID_people
            inner join schools on schools.ID_school = diplomas.ID_school
            inner join kpk on schools.ID_kpk = kpk.ID_kpk
			inner join ips on ips.ID_people = diplomas.ID_people
            inner join type_of_school on schools.ID_type_of_school = type_of_school.ID_type_of_school
            inner join type_of_utp on schools.Type_turism = type_of_utp.ID_types_of_utp
where diplomas.For_ips = 0
GROUP by people.ID_people");
			?>
			<div class="form__row">
				<label for="people">Выберите человека:</label>
				<select name="people" id="people">
					<option value="notChosen">-Не выбрано-</option>
					<?php
					foreach ($people as $man) { ?>
						<option value="<?php echo $man->id_people ?>"><?php echo $man->FIO ?></option>
					<?php } ?>
				</select>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>ФИО</th>
						<th>Школа</th>
						<th>Уровень</th>
						<th>Вид туризма</th>
						<th>КПК</th>
						<th>Дата выдачи</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result as $diploma) { ?>
						<tr>
							<td>
								<?php echo $diploma->fio; ?>
							</td>
							<td>
								<?php echo $diploma->schoolName; ?>
							</td>
							<td>
								<?php echo $diploma->typeSchool; ?>
							</td>
							<td>
								<?php echo $diploma->typeUtp; ?>
							</td>
							<td>
								<?php echo $diploma->kpk; ?>
							</td>
							<td><?php echo $diploma->Date; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<p hidden class="id_page"><?php global $post; echo $post->ID; ?></p>
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>