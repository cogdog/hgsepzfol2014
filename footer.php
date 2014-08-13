<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-generator">
				<a href="http://projectzero.gse.harvard.edu/"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/project-zero-logo-280.jpg" alt=""></a><br />
				<a href="http://projectzero.gse.harvard.edu/">a project zero production</a> • <a href="http://www.gse.harvard.edu/">harvard graduate school of education</a><br />
				web work by <a href="http://cogdog.info/">@cogdog</a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>