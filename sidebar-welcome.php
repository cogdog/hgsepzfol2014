<?php
/**
 * Welcome widget area
 */
?>

<?php

	if (  ! is_active_sidebar( 'fol_welcome'  ) )
		return;
	// If we get this far, we have widgets. Let do this.
?>
	
<div id="welcomery" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'fol_welcome' ); ?>
</div><!-- #welcomery -->
