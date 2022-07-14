<?php 
/*
* Template Name: Types of Utp
*/

get_header(); ?>


<body>
		<section class="main">
		<div class="main__container container">
		<h2>Виды походов</h2>
		<?php global $wpdb;
		$result = $wpdb->get_results("select * from type_of_utp");
		?>		
		<table class = "table">
			<thead>
				<tr>
					<th>Название</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach($result as $order){ ?>
				<tr>
					<td><?php echo $order->Name; ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</section>

</body>
<?php get_footer(); ?>