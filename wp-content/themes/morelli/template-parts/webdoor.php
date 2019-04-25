<?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full') || get_field('galeria')) : ?>
	<section class="webdoor" <?php if(!get_field('galeria') && wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full')) : ?> style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>);"<?php endif;?>>
		<?php if(get_field('galeria')) : ?>
		<div class="owl-carousel">
			<?php 
				foreach (get_field('galeria') as $key => $value) {
					echo '<div class="item" style="background-image:url('.$value['imagem'].')">';
					if(is_front_page()) :
						?>
						<?php if($value['titulo']||$value['texto']||$value['url']) : ?>
						<div class="container">
							<div>
								<?php if($value['titulo']) : ?>
								<h3><?php echo $value['titulo']; ?></h3>
								<?php endif; ?>
								<?php if($value['texto']) : ?>
									<?php echo $value['texto']; ?>
								<?php endif; ?>
								<?php if($value['url']) : ?>
									<a href="<?php echo $value['url']; ?>" class="btn btn-1">Ver Mais</a>
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>
						<?php 
					endif;
					echo '</div>';
				}
			?>
		</div>
		<?php else : ?>
		<div class="container">
			<?php if(!is_front_page() && !get_field('galeria')) : ?>
				<h2><?php echo get_the_title(); ?></h2>
				<ul class="breadcrumbs">
					<li><a href="<?php echo site_url() ?>">Home</a></li>
					<li><a href="#"><?php echo get_the_title(); ?></a></li>
				</ul>
			<?php endif;?>
		</div>
		<?php endif;?>
	</section>
<?php endif;?>