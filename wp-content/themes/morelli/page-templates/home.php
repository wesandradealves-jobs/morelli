<?php
    /**
    * Template Name: Home
    */
?>
<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('template-parts/webdoor'); ?>
	<?php endwhile;
	endif; ?>
	<!-- Mosaico -->
	<?php if(get_field('mosaico')) : 
		?>
		<div class="grid">
			<?php 
				for ($i = 1; $i <= 10; $i++) {
					echo '<div '.( ($i == 8) ? 'onclick="document.location='."'".get_page_link(get_page_by_path('profissionais')->ID)."'".';return false;"' : '' ).' class="grid-item grid-item-'.$i.'">';
					if($i != 1 && $i != 8){ ?>
						<div class="grid-posts">
						<?php
						foreach (get_field('mosaico')['areas_do_mosaico'] as $key => $value) :
							if((int)explode('Área ', $value['slot_do_mosaico'])[1] == $i) :
						        $query_args = array(
						            'post_type' => 'areas-de-atuacao',
						            'post__in' => $value['areas_de_atuacao']
						        );
						        $query = new WP_Query( $query_args );
						        if($query):
						        	?>
						        	
										<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				 			          	<div class="post">
				 			          		<h3><?php echo get_the_title(); ?></h3>
				 			          		<p><?php echo  substr(get_the_excerpt(), 0, 70).'...' ?></p>
				 			          		<a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><i class="fal fa-arrow-right"></i> Ver Mais</a>
				 			          	</div>		
				 			          	<?php endwhile; ?>        			
						        	
						        	<?php
						        endif;
							endif;
					        wp_reset_postdata(); 
					        wp_reset_query();							
						endforeach;
						?>
						</div>
						<?php
					} else {
						if($i == 1){
							get_template_part( 'template-parts/contato' );
						} else {
							?>
								<div>
									<h2><?php echo get_the_title(get_page_by_path('profissionais')->ID); ?></h2>
								</div>
								<div>
									<p><?php echo get_the_excerpt(get_page_by_path('profissionais')->ID); ?></p>
								</div>
							<?php 
						}
					}
					echo '</div>';
				}
			?>	
		</div>
	<?php endif; ?>
<?php get_footer(); ?>