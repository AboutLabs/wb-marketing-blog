<?php
/**
 * The Template for displaying category archive pages.
 *
 * @license For the full license information, please view the Licensing folder
 * that was distributed with this source code.
 *
 * @package Bimber_Theme
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

get_header();
?>

	<div id="primary" class="g1-primary-max">
		<div id="content" role="main">

			<header class="g1-row g1-row-layout-page archive-header">
				<div class="g1-row-inner">
					<div class="g1-column">
						<?php
						the_archive_title( '<h1 class="g1-alpha g1-alpha-2nd archive-title">', '</h1>' );
						?>
					</div>
				</div>
				<div class="g1-row-background">
				</div>
			</header>

			<?php
			$bimber_archive_settings = bimber_get_archive_settings();
			bimber_set_template_part_data( $bimber_archive_settings );

			get_template_part( 'template-parts/archive-' . $bimber_archive_settings['template'] );

			bimber_reset_template_part_data();
			?>

		</div><!-- #content -->
		<?php
			$queried_object = get_queried_object();
			$seo_content = get_field('seo_content', $queried_object);

			if($seo_content !== null && $seo_content !== ''){
				  print '<div class="g1-row g1-row-layout-page">';
				  print '<div class="g1-row-inner">';
					  print '<div id="primary" class="g1-column g1-column-2of3">';
					  	print do_shortcode($seo_content);
					  print '</div>';
				  print '</div>';
				  print '<div class="g1-row-background"></div>';
		  	print '</div>';
			}
		?>
	</div><!-- #primary -->

<?php get_footer();

