<section>
	<div class="first-bl-wrapper">
		<div class="back_img">
			<img src="<?php echo IMAGES; ?>/main_page/header_bg.jpg" alt="" class="img-responsive">
		</div>
		<div class="container slider_block">
			<div class="row">
				<?php
				$args = array('posts_per_page'	=> -1,
					'post_type'     	=> 'slider',
					'category_name'				=> 'main_page_top',
					);
				$query = new WP_Query( $args ); 
				?>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<?php if($query->have_posts()){while($query->have_posts()) {$query->the_post();?>
						<li data-target="#carousel-example-generic"
						data-slide-to="<?php echo $query->current_post; ?>"
						class="<?php if($query->current_post == 0) {echo ' active ';} ?>"></li>
						<?php }}?>
					</ol>
					<!-- rewind loop back to zero without losing data-->
					<?php rewind_posts(); ?>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php if($query->have_posts()) { 
							while($query->have_posts()) { 
								$query->the_post();  ?>
								<?php 
								//this works only if ACF is installed 
								$slider_photo = get_field('single_slide', $post->ID);
								?>
								<div class="item <?php if($query->current_post == 0) {echo ' active';}?>">
									<img class="img-responsive" src="<?php echo $slider_photo; ?>" alt="...">
									<?php echo get_the_content(); ?>
								</div>
								<?php }
												} 
								wp_reset_postdata(); 
								?>

								<span style="opacity: 0">...</span>
					</div>
							<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>-->
            <img src="<?php echo IMAGES; ?>/slider/arr-left.png" alt="">

					</a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
           <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           <span class="sr-only">Next</span>-->
            <img src="<?php echo IMAGES; ?>/slider/arr-right.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
