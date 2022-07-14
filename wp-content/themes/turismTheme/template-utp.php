<?php
/*
* Template Name: Utp
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2>Походы</h2>
			<?php global $wpdb;
			if (is_user_logged_in()) {
				$userInfo = get_user_meta(get_current_user_id());
				if (array_key_exists("myID", $userInfo)) {
					$userID = $userInfo["myID"][0];
					$userRole = $userInfo["myRole"][0];
					$id_school = $userID;
				}
			}

			?>

			<div class="form__row form__rowPeriod">
				<p>С</p>
				<input type="date" class="periodFrom period">
				<p>По</p>
				<input type="date" class="periodTo period">
				<button class="btn btnUtp">Составить</button>
			</div>
			<div class="tableInfo">
				<input class="form-control" type="search" placeholder="Поиск" id="search-text" onkeyup="tableSearch()">
				<div class="tableInfo__subrow">
					<svg class="tableImg" version=" 1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
						<g>
							<path d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300
												c-74.44,0-135-60.561-135-135S90.56,30,165,30s135,60.561,135,135S239.439,300,165,300z" />
							<path d="M226.872,106.664l-84.854,84.853l-38.89-38.891c-5.857-5.857-15.355-5.858-21.213-0.001
												c-5.858,5.858-5.858,15.355,0,21.213l49.496,49.498c2.813,2.813,6.628,4.394,10.606,4.394c0.001,0,0,0,0.001,0
												c3.978,0,7.793-1.581,10.606-4.393l95.461-95.459c5.858-5.858,5.858-15.355,0-21.213
												C242.227,100.807,232.73,100.806,226.872,106.664z" />
						</g>

					</svg> - Отметить пройденный поход
					<svg class="tableImg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="399px" height="399px" viewBox="0 0 399 399" style="enable-background:new 0 0 399 399;" xml:space="preserve">
						<g>
							<path d="M374.195,241.486l-25.323-71.712l25.568-72.409c1.356-3.843,0.765-8.104-1.59-11.432
		c-2.354-3.328-6.176-5.306-10.251-5.306c0,0-121.6,0-129.267,0c-7.979,0-7.596-4.415-7.596-4.415
		c0-27.587-16.988-39.896-36.559-39.896H82.003c2.44-3.742,3.82-8.172,3.82-12.816c0-12.958-10.542-23.5-23.5-23.5h-15
		c-12.958,0-23.5,10.542-23.5,23.5c0,8.14,4.226,15.629,11,19.889V399h40V237.307h115.504c1.922,0,5.411,0.578,5.411,6v0.614
		c0,8.284,6.716,15,15,15c0.015,0,0.027-0.002,0.043-0.002c0.014,0,0.027,0.002,0.041,0.002H362.6c0.007,0,0.014,0,0.021,0
		c6.935,0,12.556-5.622,12.556-12.557C375.176,244.635,374.827,242.986,374.195,241.486z" />
					</svg> - Поход завершен
				</div>
			</div>
			<table class="table" id="info-table">
				<thead>
					<tr>
						<th hidden></th>
						<th onclick="sortTable(0)" class="th">Название</th>
						<th onclick="sortTable(1)" class="th">Дата начала</th>
						<th onclick="sortTable(2)" class="th">Дата окончания</th>
						<th onclick="sortTable(3)" class="th">Вид похода</th>
						<th onclick="sortTable(4)" class="th">Сложность</th>
						<th onclick="sortTable(5)" class="th">Район</th>
						<th onclick="sortTable(6)" class="th">Руководитель</th>
						<th onclick="sortTable(7)" class="th">Статус</th>
						<th onclick="sortTable(8)" class="th">Отметка о прохождении</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$startDate =
						$result = $wpdb->get_results("select utp.ID_utp, utp.name, utp.Start_date, utp.End_date, 
						utp.Difficulty ,type_of_utp.name as type, Region,
						concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as leader, 
						date_accept, utp.Approved, Reason 
						from utp
						inner join type_of_utp on utp.ID_type_of_utp = type_of_utp.ID_types_of_utp
						inner join members_of_utp on utp.ID_utp = members_of_utp.ID_utp
						INNER join people on members_of_utp.ID_people = people.ID_people
						where id_school ='" . $id_school . "' and ID_position = 7");
					foreach ($result as $utp) { ?>
						<tr>
							<td hidden>
								<?php if ($utp->date_accept == null) { ?>
									<button value="<?php echo $utp->ID_utp; ?>" class="editBtn tableBtn">
										<svg version="1.1" id="Layer_1" class="editImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
											<g id="XMLID_23_">
												<path id="XMLID_24_" d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
		c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
		C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z" />
												<path id="XMLID_27_" d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
		C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z" />
											</g>
										</svg>
									</button>

								<?php } ?>
							</td>
							<td><?php echo $utp->name; ?></td>
							<td><?php echo $utp->Start_date; ?></td>
							<td><?php echo $utp->End_date; ?></td>
							<td><?php echo $utp->type; ?></td>
							<td><?php echo $utp->Difficulty; ?></td>
							<td><?php echo $utp->Region; ?></td>
							<td><?php echo $utp->leader; ?></td>
							<td <?php if($utp->Reason>0){
								echo "class = 'tdClickable' title=".$utp->Reason ;
							} ?>>
							<?php 
							
							if($utp->Approved == NULL){
								echo '<p>Не утвержден</p>';
							}
							else if($utp->Approved == 0){
								echo '<p style="color:red">Отклонен</p>';
							}
							else if($utp->Approved == 1){
								echo '<p style="color:#30b169">Утвержден</p>';
							}
							?>
							</td>
							<td>
								<?php
								if ($utp->date_accept == null) {
								?>
									<button class="tableBtn acceptBtn">
										<svg class="tableImg tableImg-accept" version=" 1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
											<g>
												<path d="M165,0C74.019,0,0,74.019,0,165s74.019,165,165,165s165-74.019,165-165S255.981,0,165,0z M165,300
												c-74.44,0-135-60.561-135-135S90.56,30,165,30s135,60.561,135,135S239.439,300,165,300z" />
												<path d="M226.872,106.664l-84.854,84.853l-38.89-38.891c-5.857-5.857-15.355-5.858-21.213-0.001
												c-5.858,5.858-5.858,15.355,0,21.213l49.496,49.498c2.813,2.813,6.628,4.394,10.606,4.394c0.001,0,0,0,0.001,0
												c3.978,0,7.793-1.581,10.606-4.393l95.461-95.459c5.858-5.858,5.858-15.355,0-21.213
												C242.227,100.807,232.73,100.806,226.872,106.664z" />
											</g>

										</svg>

									</button>
								<?php } else { ?>
									<button class="tableBtn">
										<svg class="tableImg tableImg-accepted" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="399px" height="399px" viewBox="0 0 399 399" style="enable-background:new 0 0 399 399;" xml:space="preserve">
											<g>
												<path d="M374.195,241.486l-25.323-71.712l25.568-72.409c1.356-3.843,0.765-8.104-1.59-11.432
		c-2.354-3.328-6.176-5.306-10.251-5.306c0,0-121.6,0-129.267,0c-7.979,0-7.596-4.415-7.596-4.415
		c0-27.587-16.988-39.896-36.559-39.896H82.003c2.44-3.742,3.82-8.172,3.82-12.816c0-12.958-10.542-23.5-23.5-23.5h-15
		c-12.958,0-23.5,10.542-23.5,23.5c0,8.14,4.226,15.629,11,19.889V399h40V237.307h115.504c1.922,0,5.411,0.578,5.411,6v0.614
		c0,8.284,6.716,15,15,15c0.015,0,0.027-0.002,0.043-0.002c0.014,0,0.027,0.002,0.041,0.002H362.6c0.007,0,0.014,0,0.021,0
		c6.935,0,12.556-5.622,12.556-12.557C375.176,244.635,374.827,242.986,374.195,241.486z" />
										</svg>
									</button>
								<?php }
								?>

							</td>
						</tr>
					<?php
					} ?>
				</tbody>
			</table>
			<p class="no-rows" hidden>Походов нет</p>
		</div>
	</section>

</body>
<?php get_footer(); ?>


</html>