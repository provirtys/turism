<?php
/*
* Template Name: Positions
*/

get_header(); ?>

<body>
		<section class="main">
		<div class="main__container container">
		<h2>Должности</h2>
		<?php global $wpdb;
		$result = $wpdb->get_results("select * from positions");
		?>		
		<table class = "table">
			<thead>
				<tr>
					<th>Должность</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($result as $pos){ ?>
				<tr>
					<td><?php echo $pos->Name; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</section>

</body>


<?php get_footer(); ?>


</html>