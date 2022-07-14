<?php 
/*
* Template Name: High Category
*/

get_header(); ?>

<body>
<section class="main">
		<div class="main__container container">
			<h2>Школы высшей категории</h2>
			<?php global $wpdb;
			$result = $wpdb->get_results("select * from schools where id_type_of_school = 6");
			?>
			<table class="table">
				<thead>
					<tr>
						<th></th>
						<th>Название школы</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result as $school) { ?>
						<tr>
							<td class="changeIpsTd">
								<button class="changeIpsBtn">
									Изменить состав
								</button>

							</td>
							<td><?php echo $school->Name; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>