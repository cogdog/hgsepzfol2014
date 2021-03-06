<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">


	<?php if ( in_category( 'twitter' )  ) : ?>
				
		<?php 
			if ( has_excerpt() AND (  substr( strip_tags( get_the_excerpt() ), 0, 12 ) !=  substr( strip_tags( get_the_content() ), 0, 12 ) ) ) {
		 		echo '<div class="spotlightexcerpt">';
		  		echo get_the_excerpt();
		  		echo '</div>';
			}
		?>

		</header><!-- .entry-header -->
			
					
					
		<?php echo wp_oembed_get( get_permalink() ); ?>
				
	<?php else : ?>
	
	
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			
			<?php 
			if ( has_excerpt() ) {
		 		echo '<div class="spotlightexcerpt">';
		  		echo get_the_excerpt();
		  		echo '</div>';
			}
		?>

					
			</header><!-- .entry-header -->
				
				
				<?php if (in_category('blog') ) : // Only Excerpts for search, blogs ?>
					<div class="entry-summary">
						
						<?php the_excerpt(); ?>
						
						<p><a href="<?php the_permalink(); ?>" class="fol-more-link">Read full blog post...</a></p>
						
					</div><!-- .entry-summary -->
					
					<?php else : ?>
					
					<div class="entry-content">
						
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<?php endif; ?>
					<footer class="entry-meta">
						<?php $show_sep = false; ?>
						<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
						<?php
							/* translators: used between list items, there is a space after the comma */
							$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
							if ( $categories_list ):
						?>
						<span class="cat-links">
							<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
							$show_sep = true; ?>
						</span>
						<?php endif; // End if categories ?>
						<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
						<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
						<?php
							/* translators: used between list items, there is a space after the comma */
							$tags_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
							if ( $tags_list ):
							if ( $show_sep ) : ?>
						<span class="sep"> | </span>
							<?php endif; // End if $show_sep ?>
						<span class="tag-links">
							<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
							$show_sep = true; ?>
						</span>
						<?php endif; // End if $tags_list ?>
						<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

						<?php if ( comments_open() ) : ?>
						<?php if ( $show_sep ) : ?>
						<span class="sep"> | </span>
						<?php endif; // End if $show_sep ?>
						<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Got a Comment?', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'twentyeleven' ), __( '<b>%</b> Replies', 'twentyeleven' ) ); ?></span>
						<?php endif; // End if comments_open() ?>

						<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
			
				<?php endif; // end if !is_category('twitter') ?>				

</article><!-- #post-<?php the_ID(); ?> -->
