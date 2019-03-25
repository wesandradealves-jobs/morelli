<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('template-parts/webdoor'); ?>
		<?php if(get_the_content()) : ?>
		<section class="the_content">
			<div class="container">
				<?php 
					the_content();
				?>
			</div>
		</section>
		<?php endif; ?>
	<?php endwhile;
	endif; ?>
<?php get_footer(); ?>