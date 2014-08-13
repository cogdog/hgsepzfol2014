<?php
/**
 * Update Widget Area
 *
 * lifted from the TwentyEleven Footer
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<?php
	/*
	 * The updates widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'update-left'  )
		&& ! is_active_sidebar( 'update-mid' )
		&& ! is_active_sidebar( 'update-right'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="updates">
	<?php if ( is_active_sidebar( 'update-left' ) ) : ?>
	<div  class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'update-left' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'update-mid' ) ) : ?>
	<div class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'update-mid' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'update-right' ) ) : ?>
	<div class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'update-right' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
</div><!-- #updates -->