<?php
/*
* Template Name: Visits
*/

get_header(); ?>

<body>
	<section class="main">
		<div class="main__container container">
			<h2>Посещения</h2>
			<?php
			$subjects = $wpdb->get_results("select subjects.id_subject, subjects.Name from subjects
			inner join shedule on shedule.id_subject = subjects.id_subject 
			where id_school = '" . $userID . "'
			group by shedule.id_subject");
			$cntDate = 0;
			$classes = $wpdb->get_results("select * from shedule where id_school = '" . $userID . "' order by Date");
			$students = $wpdb->get_results("select  people.*, concat(people.last_name, ' ' ,people.first_name, ' ', people.patronymic) as FIO
			from students
			inner join people on students.ID_people = people.ID_people
			where ID_student in(
			select max(id_student)
				 from students
				group by students.id_people)
			and ID_school ='" . $id_school . "' and delete_mark = 0 order by FIO");

			?>
			<div class="visits">
				<?php
				foreach ($subjects as $subject) { ?>
					<div class="visits__subject">
						<div value="<?php echo $subject->id_subject ?>" class="visits__row"><?php echo $subject->Name ?>
							<button class="save btn">Сохранить</button>
						</div>
						<table class="visits__table table">
							<thead>
								<tr>
									<th></th>
									<?php
									foreach ($classes as $class) {
										if ($subject->id_subject == $class->ID_subject) { ?>
											<th value="<?php echo $class->ID_shedule ?>">
												<p class="vertical">
													<?php
													$cntDate++;
													$newDate = date('d-m-Y', strtotime($class->Date));
													echo $newDate;
													?>
												</p>
											</th>
									<?php
										}
									}
									?>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($students as $student) { ?>
									<tr>

										<td value="<?php echo $student->ID_people ?>">
											<?php echo $student->FIO ?>
										</td>
										<?php
										$curCntDate = 0;
										while ($curCntDate < $cntDate) { ?>
											<td class="cell">
											
											</td>
										<?php
											$curCntDate++;
										}
										?>
									</tr>

								<?php
								}
								?>
							</tbody>
						</table>

					</div>
				<?php
					$cntDate = 0;
				}
				?>
			</div>

		</div>
		
	</section>

</body>


<?php get_footer(); ?>


</html>