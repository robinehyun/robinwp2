<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php // Show the selected frontpage content.
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
		else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>
		<hr />
		<div class="red-border"></div>

		<div id="mid" class="container">
			<div class="row">
				<div class="col-md-3">
					<p>Home Header</p>
					<p>
						<select class="selectpicker">
						  <option>Map</option>
						  <option>Featured Posts</option>
						</select>
					</p>
				</div>
				<div class="col-md-3">
					<p>Sidebar</p>
					<p>
						<select class="selectpicker">
						  <option>Yes</option>
						  <option>No</option>
						</select>
					</p>
			 </div>
				<div class="col-md-3">
					<p>Blog Listing</p>
					<p>
						<select class="selectpicker">
						  <option>Standard</option>
						  <option>Title Over Image</option>
						  <option>Title Over Image In Block</option>
						</select>
					</p>
				</div>
				<div class="col-md-3">
					<p>Header Style</p>
					<p>
						<select class="selectpicker">
						  <option>Standard</option>
						  <option>Top Menu</option>
						  <option>Bottom Menu</option>
							<option>Bottom Menu Centered</option>
						</select>
					</p>
				</div>
			</div>

			<button type="button" id="yello" class="btn btn-default btn-lg btn-block">BUILD DEMO</button>
		</div>


		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== twentyseventeen_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in Twenty Seventeen.
			 *
			 * @since Twenty Seventeen 1.0
			 *
			 * @param $num_sections integer
			 */
			$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
			global $twentyseventeencounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$twentyseventeencounter = $i;
				twentyseventeen_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== twentyseventeen_panel_count() ) ends here. ?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
