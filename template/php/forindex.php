<div class="exc_list">
<?php 
	$tours = new WP_Query(array('cat' => '3', 'posts_per_page'   => -1));

	if ($tours->have_posts()) :
		while($tours->have_posts()) : $tours->the_post(); 
?>

<div class="item">

		<?php 
		$value = get_field( "thumb" );
		if($value) { ?>

		<amp-img src="<?php the_field('thumb') ?>" width="93" height="90" />
		
		<?php } else { ?>

		<p class="tempP">пока нет фото</p>

		<?php	} ?>


	<div class="left">
		<p><a href='<?php the_permalink();?>'><?php the_field('short-name'); ?></a></p>
		<p class="price">от <?php the_field('price'); ?> р.</p>
	</div>
	<div class="right">
		<p><?php the_field('duration'); ?> ч</p>
	</div>	

</div> <!-- exc_list wrap-->


<?php
$counter++;
endwhile;

else :
	echo 'smthng wrong! look twentytwelve/page-templates/amp/index.php';
endif;
wp_reset_postdata();	

?>

</div>