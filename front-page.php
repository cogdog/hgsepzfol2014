<?php
/**
 * Template for site front page,  using static page
 *
 * Also designed to insert most recent post in Spotlight category
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php get_sidebar('welcome'); ?>

	
				<!-- begin spotlight output -->
				
				
				
				<h2 class="spotlighttitle">FOL Spotlight</h2>
				
				<div id="spotlight">
				
				
				
				<?php 
					// set up query to get most recent spotlight
					$spotlight_query = new WP_Query( array('posts_per_page' =>'3', 'category_name' => 'spotlight') );
					
					 while ( $spotlight_query->have_posts() ) : $spotlight_query->the_post(); ?>
				
						<div class="spotbox">
						<?php if ( in_category( 'twitter' )  ) : ?>
			
							<?php 
							// for some reason not getting the permalink right here, get from custom field
							$the_real_permalink = get_post_meta( get_the_ID(), 'syndication_permalink', true );
							echo wp_oembed_get( $the_real_permalink ); 
							
							?>
				
						<?php else : ?>
							
							
						<?php if ( has_post_thumbnail()) : ?>
						
							<div class="spotthumb">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
								<?php the_post_thumbnail('spotlight-thumb', array('class' => 'spotlightthumb')); ?></a>
								<h3 class="spot-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								
                    		</div>
                    	
                    	<?php else:?>
                    		<div class="spottext">
                    		<h3 class="spot-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                    		
                    		<?php echo limit_text( strip_tags( get_the_content() ), 40)?>
                    		
                    		<p class="more-link"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">read more...</a></p>
                    		</div>
                    	
                    	<?php endif; ?>
                    
							
							
						<?php endif?>
						
						<?php 
							// lets save the excerpts to we can output them after the first row
							if (  has_excerpt() ) {
							
								$spotexcerpts[] = get_the_excerpt();
							} else {
								$spotexcerpts[] = '';
							}
						?>

						<?php if ( ! in_category( array('twitter', 'photo') )  ) comments_popup_link( '<span class="leave-reply alignright">' . __( 'Comment?', 'twentyeleven' ) . '</span>', __( '<span class="alignright"><b>1</b> Comment</span>', 'twentyeleven' ), __( '<span class="alignright"><b>%</b> Comments</span>', 'twentyeleven' ) ); ?>
						
						<?php edit_post_link( __( 'Edit/Categorize', 'twentyeleven' ), '<div class="edit-link" style="text-align:right">', '</div>' ); ?>
						
						</div>
						

					<?php endwhile; ?>
					
					<div class="clearfix"></div>
					
					<?php 
						for ($i=0; $i<count($spotexcerpts); $i++) {
							echo '<div class="excerptbox">' . $spotexcerpts[$i] . '</div>';
						}
					?>
					
				</div>
				
				
				
				<p class="spotlightmore"><a href="/fol/spotlight/">See all Spotlights...</a></p>	

				<?php wp_reset_query(); ?>
				
				<!-- begin widget area for updates -->
				<?php get_sidebar('updates'); ?>
				<!-- end widget area for updates -->
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>