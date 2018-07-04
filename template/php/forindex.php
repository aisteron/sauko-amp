<?php 
	$tours = new WP_Query(array('cat' => '3', 'posts_per_page'   => -1));

	if ($tours->have_posts()) :
		while($tours->have_posts()) : $tours->the_post(); 
?>

<div class="listItem">
	<div class="listImg">
		<?php 
		$value = get_field( "thumb" );
		if($value) { ?>

		<img class="lazyload" data-src="<?php the_field('thumb') ?>">
		
		<?php } else { ?>

		<p class="tempP">пока нет фото</p>

		<?php	} ?>


	</div>
	
	<div class="listContent">
		<p><a href='<?php the_permalink();?>'><?php the_field('short-name'); ?></a></p>
		<!--p><?php the_field('type'); ?></p-->
		<p>
			<span>от <span byn="<?php the_field('price'); ?>"><?php the_field('price'); ?></span> <span class="curSign">BYN</span></span>
			<span><?php the_field('duration'); ?> ч</span>
		</p>
	</div>

</div>

<?php
$counter++;
endwhile;

else :
	echo 'smthng wrong! look tour.php';
endif;
wp_reset_postdata();	

?>