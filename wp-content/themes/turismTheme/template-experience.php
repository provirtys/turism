<?php
/*
* Template Name: Experience
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2>Предыдущий опыт</h2>
			<?php global $wpdb;
			if (is_user_logged_in()) {
				$userInfo = get_user_meta(get_current_user_id());
				if (array_key_exists("myID", $userInfo)) {
					$userID = $userInfo["myID"][0];
					$userRole = $userInfo["myRole"][0];
					$id_school = $userID;
				}
			}
			$people = $wpdb->get_results("select concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as FIO, people.id_people from people
			inner join experience on people.ID_people = experience.ID_people
			group by people.id_people 
			order by FIO");
			$result = $wpdb->get_results("select concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as fio, 
				utp.Start_date, utp.End_date, experience.ID_position, utp.Difficulty, utp.region, tou.Name as typeUtp
				from experience
				inner join people on experience.ID_people = people.ID_people
				inner join utp on utp.ID_utp = experience.ID_utp
				inner join type_of_utp tou on tou.ID_types_of_utp = utp.ID_type_of_utp
				order by fio");

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
			<div class="form__row" hidden>
				<button value="<?php ?>" class="downloadBtn">
					<svg class="downloadImg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
						<g>
							<path d="M165,0C74.019,0,0,74.018,0,165c0,90.98,74.019,165,165,165s165-74.02,165-165C330,74.018,255.981,0,165,0z M165,300
		c-74.439,0-135-60.561-135-135S90.561,30,165,30s135,60.561,135,135S239.439,300,165,300z" />
							<path d="M211.667,127.121l-31.669,31.666V75c0-8.285-6.716-15-15-15c-8.284,0-15,6.715-15,15v83.787l-31.665-31.666
		c-5.857-5.857-15.355-5.857-21.213,0c-5.858,5.859-5.858,15.355,0,21.213l57.271,57.271c2.929,2.93,6.768,4.395,10.606,4.395
		c3.838,0,7.678-1.465,10.607-4.393l57.275-57.271c5.857-5.857,5.858-15.355,0.001-21.215
		C227.021,121.264,217.524,121.264,211.667,127.121z" />
							<path d="M195,240h-60c-8.284,0-15,6.715-15,15c0,8.283,6.716,15,15,15h60c8.284,0,15-6.717,15-15C210,246.715,203.284,240,195,240z
		" />
						</g>

					</svg>
				</button>
			</div>
			<div class="container-table container container-table-experience">
				<table class="table">

					<thead>
						<tr>
							<th class="th" onclick="sortTable(0)">ФИО</th>
							<th class="th" onclick="sortTable(1)">Дата</th>
							<th class="th" onclick="sortTable(2)">Район</th>
							<th class="th" onclick="sortTable(3)">Вид туризма</th>
							<th class="th" onclick="sortTable(4)">Поход:руковод.</th>
							<th class="th" onclick="sortTable(5)">Поход:ученик</th>
							<th class="th" onclick="sortTable(6)">Кат.сложн.</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($result as $exp) { ?>
							<tr>
								<?php
								$dateFrom = date("d.m.Y", strtotime($exp->Start_date));
								$dateTo = date("d.m.Y", strtotime($exp->End_date));


								?>
								<td><?php echo $exp->fio; ?></td>
								<td><?php echo $dateFrom . '-' . $dateTo; ?></td>
								<td><?php echo $exp->region   ?></td>
								<td><?php echo $exp->typeUtp   ?></td>
								<td><?php
									if ($exp->ID_position != 8) {
										echo '+';
									}
									?></td>
								<td><?php
									if ($exp->ID_position == 8) {
										echo '+';
									}
									?></td>
								<td><?php echo $exp->Difficulty; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<p class="no-rows" hidden>Предыдущего опыта нет</p>
			<p class="userRole" hidden><?php echo $userRole; ?></p>
		</div>

		<form class="hiddenForm" hidden  action="<?php echo esc_attr(admin_url('admin-post.php')); ?>" method="POST" enctype="multipart/form-data">
		<input type="text" name="fio">
		<input type="text" name="dateOfBirth">
		<input type="text" name="dateStartYear">
		<input type="text" name="address">
		<input type="text" name="email">
		<input type="text" name="job">
		<input type="text" name="currentRank">
		<input type="text" name="count">
		<input type="text" name="values">
		<input type="text" name="maxLvls">
		<input type="hidden" name="action" value="nominateForRank" />

	</form>
	</section>
								
</body>


<?php get_footer(); ?>


</html>