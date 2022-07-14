<?php
/*
* Template Name: MKK
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2>МКК РФ</h2>
			<?php global $wpdb;

			$result = $wpdb->get_results("select id_mkk, Powers, mkk.Name, Head_mkk,mkk.email,Start_date,End_date, concat(people.Last_name, ' ', people.First_name, ' ', people.Patronymic) as Chairman from mkk
			inner join people on mkk.Chairman = people.ID_people
			union 
			select id_mkk,Powers, mkk.Name, Head_mkk,mkk.email,Start_date,End_date, Chairman  from mkk
			where Chairman is null
			");
			?>
			<table class="table table-edit " id="info-table">
				<thead>
					<tr>
						<?php
						if ($userID == '100-00') {
						?>
							<th></th>
						<?php } ?>
						<th onclick="sortTable(1)" value="ID" class="th">Шифр</th>
						<th onclick="sortTable(2)" value="Name" class="th">Название</th>
						<th onclick="sortTable(3)" value="Head_mkk" class="th">Головная МКК</th>
						<th onclick="sortTable(4)" value="Powers" class="th">Полномочия</th>
						<th onclick="sortTable(5)" value="Start_date" class="th">Начало полномочий</th>
						<th onclick="sortTable(6)" value="End_date" class="th">Окончание полномочий</th>
						<th onclick="sortTable(7)" value="Chairman" class="th">Председатель</th>
						<th onclick="sortTable(8)" value="Email" class="th">Email</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result as $mkk) {
						$dateStart = date('d.m.Y', strtotime($mkk->Start_date));
						$dateEnd = date('d.m.Y', strtotime($mkk->End_date));
						$today = (date('d.m.Y'));
					?>
						<tr>
							<?php
							if ($userID == '100-00') {
							?>
								<td>
									<button value="<?php echo $mkk->id_mkk ?>" class="editBtn tableBtn">
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
								</td>
							<?php } ?>
							<td><?php echo $mkk->id_mkk; ?></td>
							<td><?php echo $mkk->Name; ?></td>
							<td><?php echo $mkk->Head_mkk; ?></td>
							<td><?php echo $mkk->Powers; ?></td>
							<td><?php echo $dateStart; ?></td>
							<td <?php if (strtotime($today) > strtotime($dateEnd)) {
									echo 'style="color:red"';
								} ?>>
								<?php
								echo $dateEnd; ?></td>
							<td><?php echo $mkk->Chairman; ?></td>
							<td><?php echo $mkk->email; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
	<div class="modals modals-mkk">
		<div class="modal">
			<div class="main__container container">
				<form class="form">
					<p class="form__title">Изменить МКК</p>
					<div class="form__block">
						<div class="form__row">
							<label for="mkkID">Шифр МКК</label>
							<input id="mkkID" type="text" name="mkkID">
						</div>
						<div class="form__row">
							<label for="mkkName">Название</label>
							<input id="mkkName" type="text" name="mkkName">
						</div>
						<?php
						global $wpdb;
						$powers = $wpdb->get_var("select powers from mkk where id_mkk ='" . $userID . "'");
						?>
						<div class="form__row">
							<label for="mkkPowers">Полномочия</label>
							<input <?php
									if ($userID != '100-00') {	?> disabled <?php
																			}
																				?> id="mkkPowers" type="text" name='mkkPowers'>
						</div>

						<div class="form__row">
							<label for="mkkHead">Головная МКК</label>
							<select <?php
									if ($userID != '100-00') {	?> disabled <?php
																			}
																				?> name="mkkHead" id="mkkHead">
								<option value="notChosen">-Не выбрано-</option>
								<?php
								global $wpdb;
								$result = $wpdb->get_results("select * from mkk");
								foreach ($result as $mkk) { ?>
									<option value="<?php echo $mkk->ID_mkk; ?>"><?php echo $mkk->Name; ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form__row">
							<label for="dateFrom">Начало полномочий</label>
							<input id="dateFrom" type="date" name="dateFrom">
						</div>
						<div class="form__row">
							<label for="dateTo">Окончание полномочий</label>
							<input id="dateTo" type="date" name="dateTo">
						</div>

						<div class="form__row">
							<label for="mkkEmail">Email</label>
							<input disabled id="mkkEmail" type="text" name="mkkEmail">
						</div>

						<p class="userID" hidden><?php echo $userID; ?></p>
						<button <?php
								if ($userID != '100-00') {	?> hidden <?php
																	}
																		?> class="form__submit btn">Сохранить</button>

					</div>

				</form>
			</div>
			<button class="modal-close-btn">
				<svg version="1.1" class="modal-close-btn-img" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
					<g>
						<path d="M17.586,46.414C17.977,46.805,18.488,47,19,47s1.023-0.195,1.414-0.586L32,34.828l11.586,11.586
		C43.977,46.805,44.488,47,45,47s1.023-0.195,1.414-0.586c0.781-0.781,0.781-2.047,0-2.828L34.828,32l11.586-11.586
		c0.781-0.781,0.781-2.047,0-2.828c-0.781-0.781-2.047-0.781-2.828,0L32,29.172L20.414,17.586c-0.781-0.781-2.047-0.781-2.828,0
		c-0.781,0.781-0.781,2.047,0,2.828L29.172,32L17.586,43.586C16.805,44.367,16.805,45.633,17.586,46.414z" />
						<path d="M32,64c8.547,0,16.583-3.329,22.626-9.373C60.671,48.583,64,40.547,64,32s-3.329-16.583-9.374-22.626
		C48.583,3.329,40.547,0,32,0S15.417,3.329,9.374,9.373C3.329,15.417,0,23.453,0,32s3.329,16.583,9.374,22.626
		C15.417,60.671,23.453,64,32,64z M12.202,12.202C17.49,6.913,24.521,4,32,4s14.51,2.913,19.798,8.202C57.087,17.49,60,24.521,60,32
		s-2.913,14.51-8.202,19.798C46.51,57.087,39.479,60,32,60s-14.51-2.913-19.798-8.202C6.913,46.51,4,39.479,4,32
		S6.913,17.49,12.202,12.202z" />
					</g>
				</svg>
			</button>
		</div>
	</div>
</body>


<?php get_footer(); ?>


</html>