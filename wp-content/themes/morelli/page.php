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
	<?php 
		if($post->post_name == 'fale-conosco'){
			?>
			<form class="contactform" method="POST" action="<?php echo site_url('phpmailer/send.php') ?>">
				<p><i class="fal fa-envelope"></i> Entre em contato conosco preenchendo o formulário abaixo.</p>
				<div>
					<input tabindex="1" onkeypress="mascara(this,soLetras)" required="required" type="text" name="contato[Nome]" placeholder="Nome *">
				</div>
				<div>
					<input tabindex="2" required="required" type="email" name="contato[Email]" placeholder="E-mail *">
				</div>
				<div>
					<input  tabindex="3" type="tel" name="contato[Telefone]" placeholder="Telefone" class="telefone">
				</div>
				<div>
					<label for="areas-de-interesse">Áreas de Interesse</label>
					<?php 
							$query_args = array(
						        'post_type' => 'areas-de-atuacao',
					        );
					        $query = new WP_Query( $query_args );	
							while ( $query->have_posts() ) : 
								$query->the_post();
								?>
								<span>
									<input type="checkbox" name="contato[areas-de-interesse][]" value="<?php echo get_the_title(); ?>" />
									<label for="areas-de-interesse"><?php echo get_the_title(); ?></label>
								</span>
								<?php 
							endwhile; 
					        wp_reset_postdata(); 
					        wp_reset_query();
					?>
				</div>
				<div>
					<textarea  tabindex="4" name="contato[Mensagem]" placeholder="Sua mensagem aqui"></textarea>
				</div>
				<div>
					<button  tabindex="5" class="btn btn-1">Enviar <?php echo (is_front_page() ? '→' : '') ?></button>
				</div>
			</form>
			<?php
		}
		if($post->post_name == 'quem-somos' || $post->post_name == 'fale-conosco' && get_theme_mod('maps')){
			echo '<div id="map" class="map"></div>';
		}
	?>
<?php get_footer(); ?>