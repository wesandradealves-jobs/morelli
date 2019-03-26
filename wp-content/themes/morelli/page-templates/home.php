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
			<div class="grid-item">
				<h2 class="quem-somos-title">
					<?php 
						echo get_field('mosaico')['titulo'];
					?>
				</h2>
			</div>
			<!-- Áreas de Atuação -->
			<?php 
				for ($i = 0; $i < 7; $i++) {
					echo '<div class="grid-item grid-item-'.$i.'">';
						foreach (get_field('mosaico')['areas_do_mosaico'] as $key => $value) {
							if((int)explode('Área ', $value['slot_do_mosaico'])[1] == ($i + 2)){

								// Carrega Posts
						        $query_args = array(
						            'post_type' => 'areas-de-atuacao',
						            'post__in' => $value['areas_de_atuacao']
						        );
						        $query = new WP_Query( $query_args );
						        if($query){ ?>
									<div class="grid-posts">
						        	<?php
							          while ( $query->have_posts() ) : $query->the_post();
							          	?>
							          	<div class="post">
							          		<h3><?php echo get_the_title(); ?></h3>
							          		<p><?php echo  substr(get_the_excerpt(), 0, 70).'...' ?></p>
							          		<a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><i class="fal fa-arrow-right"></i> Ver Mais</a>
							          	</div>
							          	<?php
							          endwhile; ?>
									</div>
						          <?php
						        }
						        wp_reset_query();
						        wp_reset_postdata();

						        // BG
								echo '<div class="grid-bg" style="background-image:url('.$value['background'].')"></div>';
							}
						}
					echo '</div>';
				}
			?>
			<!--  -->
			<div  onclick="document.location='<?php echo get_page_link(get_page_by_path('profissionais')->ID); ?>';return false;" class="grid-item">
				<h2><?php print_r(get_page_by_path('profissionais')->post_name); ?></h2>
				<p>
					Profissionais Experientes. <br>
					Atendemos todo o Brasil. <br>
					Sede em São Paulo
				</p>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>