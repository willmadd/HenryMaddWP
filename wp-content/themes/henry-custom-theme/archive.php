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
    
    <main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

</main><!-- #site-content -->

      </body>
      </html>