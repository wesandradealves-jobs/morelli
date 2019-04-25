	</main>
	<footer class="footer">
		<?php if(is_front_page() || $post->post_name == 'fale-conosco') : ?>
			<div class="studio">
				<div>
					<div class="contato">
		                <div>
		                    <h2 class="quem-somos-title">
		                        <span>Quem</span>
		                        <span>Somos</span>
		                    </h2>
		                </div>						
					</div>
				</div>
				<?php
					if(get_page_by_path('quem-somos')->post_content){ ?>
						<div>
						<?php
							$query = new WP_Query( 'page_id='.get_page_by_path('quem-somos')->ID );
							while ($query -> have_posts()) : 
								$query -> the_post();
								the_excerpt();
							endwhile;	
					        wp_reset_query();
					        wp_reset_postdata();
				        ?>
				        </div>
				        <?php			
					}
					if(wp_get_attachment_url(get_post_thumbnail_id(get_page_by_path('quem-somos')->ID), 'full')){
						echo '<div style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id(get_page_by_path('quem-somos')->ID), 'full').')"></div>';
					}
				?>
			</div>
		<?php endif; ?>
		<?php get_template_part('template-parts/copyright'); ?>
	</footer>
</div>
<?php wp_footer(); ?>
<?php if(get_theme_mod('maps')) : ?>
	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC5QMfSnVnSCcmkFag0ygrXzj2QJ9usEG4'></script>
	<noscript>Seu Navegador pode não aceitar javascript.</noscript>
	<?php 
		$lat = explode(',', get_theme_mod('maps'))[0];
		$lng = explode(',', get_theme_mod('maps'))[1];
	?>
	<script>
        var myLatLng = {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
		  zoom: 15,
		  center: myLatLng,
		  disableDefaultUI: true,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '<?php echo get_bloginfo('name', 'display'); ?>'
        });
	</script>
	<noscript>Seu Navegador pode não aceitar javascript.</noscript>
<?php endif; ?>
</body>
</html>