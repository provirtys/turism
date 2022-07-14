<?php
/*
* Template Name: People
*/

get_header(); ?>

<body>

	<section class="main">
		<div class="main__container container container__people">
			<h2>Люди</h2>
			<input class="form-control" type="search" placeholder="Поиск" id="search-text" onkeyup="tableSearch()">
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
			$result = $wpdb->get_results("select * from people where delete_mark = 0")
			?>
			<table class="table table-edit table-delete" id="info-table">
				<thead>
					<tr>
						<th></th>
						<th></th>
						<th  value="Last_name" >Фамилия</th>
						<th  value="First" >Имя</th>
						<th  value="Patronymic" >Отчество</th>
						<th  value="Gender" >Пол</th>
						<th  value="Date_of_birth" >Дата рождения</th>
						<th  value="Address" >Адрес</th>
						<th  value="Place_of_work" >Место работы</th>
						<th  value="Telephone" >Телефон</th>
						<th  value="Email" >Email</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result as $man) { ?>
						<tr>
							<td>
								<button value="<?php echo $man->ID_people; ?>" class="deleteBtn tableBtn">
									<svg version="1.1" class="deleteImg tableImg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
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

							</td>
							<td>
								<button class="editBtn tableBtn">
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
							<td><?php echo $man->Last_name; ?></td>
							<td><?php echo $man->First_name; ?></td>
							<td><?php echo $man->Patronymic; ?></td>
							<td><?php echo $man->Gender; ?></td>
							<td><?php echo $man->Date_of_birth; ?></td>
							<td><?php echo $man->Address; ?></td>
							<td><?php echo $man->Place_of_work; ?></td>
							<td><?php echo $man->Telephone; ?></td>
							<td><?php echo $man->Email; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<p class="no-rows" hidden>Людей нет</p>
			<p class="userRole" hidden><?php echo $userRole; ?></p>
		</div>
	</section>
	<div class="modals modals-student">
		<div class="modal">
			<div class="main__container container">
				<form class="form">
					<p class="form__title">Изменить данные о человеке</p>
					<div class="form__block">
						<div class="form__row">
							<label for="lastName">Фамилия</label>
							<input id="lastName" type="text" name="lastName">
						</div>
						<div class="form__row">
							<label for="firstName">Имя</label>
							<input id="firstName" type="text" name="firstName">
						</div>
						<div class="form__row">
							<label for="patronymic">Отчество</label>
							<input id="patronymic" type="text" name="patronymic">
						</div>
						<div class="form__row">
							<label for="address">Адрес</label>
							<input id="address" type="text" name="address">
						</div>
						<div class="form__row">
							<label for="placeOfWork">Место работы</label>
							<input id="placeOfWork" type="text" name="placeOfWork">
						</div>
						<div class="form__row">
							<label for="telephone">Телефон</label>
							<input id="telephone" type="tel" name="telephone">
						</div>
						<div class="form__row">
							<label for="email">Email</label>
							<input id="email" type="email" name="email">
						</div>

						<p class="userID" hidden><?php echo $userID; ?></p>
						<button class="form__submit btn">Сохранить</button>

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