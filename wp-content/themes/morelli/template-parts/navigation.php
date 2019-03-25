<?php 
	if(wp_get_nav_menu_items('Header')){
		?>
		<nav class="navigation">
			<ul>
				<?php 	
					$page = $post->post_name;
					foreach (wp_get_nav_menu_items('header') as $key => $value) {
						echo '<li><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a>'; 
							if($value->title == "Áreas de Atuação"){
								$query_args = array(
							        'post_type' => 'areas-de-atuacao',
						        );
						        $query = new WP_Query( $query_args );	
						        if($query){
						        	?>
										<ul>
											<?php 
												while ( $query->have_posts() ) : 
													$query->the_post();
													echo '<li><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></li>';
												endwhile; 
											?>
										</ul>
						        	<?php
						        }
						        wp_reset_postdata(); 
						        wp_reset_query();
							}
						echo'</li>';
					}
				?>
				<?php if(!did_action('get_footer')) : ?>
					<li>
			            <button onclick="mobileNavigation(this)" class="hamburger hamburger--collapse" type="button">
			              <span class="hamburger-box">
			                <span class="hamburger-inner"></span>
			              </span>
			            </button> 		
					</li>
				<?php endif; ?>
			</ul>
		</nav>
		<?php
	}
?>