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

$queried_object = get_queried_object();

?>

	<div id="primary" class="g1-primary-max">
		<div id="content" role="main">

			<header class="g1-row g1-row-layout-page archive-header">
				<div class="g1-row-inner">
					<div class="g1-column">
						<?php
							$seo_title = get_field('seo_title', $queried_object);
							
							if($seo_title !== null && $seo_title !== ''){
								echo '<h1>'.$seo_title.'</h1>';
							}
							the_archive_description();
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
			$seo_content = get_field('seo_content', $queried_object);

			if($seo_content !== null && $seo_content !== ''){
				echo '<div class="g1-row g1-row-layout-page">';
				echo '<div class="g1-row-inner">';
					echo '<div id="primary" class="g1-column">';
						echo $seo_content;
					echo '</div>';
				echo '</div>';
				echo '<div class="g1-row-background"></div>';
		  	echo '</div>';
			}
		?>
	</div><!-- #primary -->

<?php get_footer();