<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script
      async
      src="https://www.googletagmanager.com/gtag/js?id=UA-152879632-1"
    ></script> -->
    <script>
      // window.dataLayer = window.dataLayer || [];
      // function gtag() {
      //   dataLayer.push(arguments);
      // }
      // gtag("js", new Date());

      // gtag("config", "UA-152879632-1");
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/button.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Henry Madd | Spoken Word Artist | Theatre Maker | Workshop Facilitator
    </title>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../style.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./masonry.pkgd.min.js"></script>
  </head>
  <body>
    <?php
      define('WP_USE_THEMES', false);
      require('./wp-load.php');
      query_posts('showposts=4');
      include 'header.php';
      include 'nav.php';
    ?>
    
    <?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );
	?>
<div class="post-wrapper">
<?php
	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->
	</div>
	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>


		<?php
	}
	?>

</article><!-- .post -->

<?php include 'footer.php'; ?>
      </body>
      </html>