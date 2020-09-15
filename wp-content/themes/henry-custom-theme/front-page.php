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
    <meta name="description" content="Henry Madd is a spoken word artist, theatre maker and workshop facilitator. After cutting his teeth on the Californian poetry circuit he returned to his native England and firmly entrenched"/>
    <title>
      Henry Madd | Spoken Word Artist | Theatre Maker | Workshop Facilitator
    </title>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./style.css" />

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
    

    
    <main>
      <img
        class="head-image"
        src="./images/homepage-head.jpg"
        alt="Henry performing"
      />
      <div class="grid-top">
      
      <div class="about green-back" id="about">
        <div
          class="henry-about-me"
          data-aos="fade-up"
          data-aos-duration="1000"
          data-aos-easing="ease-in-out"
          data-aos-once="true"
        >
<?php echo do_shortcode('[content_block id=192]')?>
        </div>
        <div
          class="quote-wrapper"
          data-aos="fade-left"
          data-aos-duration="1000"
          data-aos-easing="ease-in-out"
          data-aos-once="true"
        >
          <h2 class="quote">
            “Henry is one of the most exciting performers I’ve come across in
            the last couple of years."
          </h2>
          <p>Harry Baker</p>
        </div>
      </div>
      <div class="news section" id="news">
        <h1><span class="red-cap">W</span>hat's happening</h1>
       
        <div class="postlist">
<!-- // -->
<?php
// global $shortcode_tags;
// echo '<pre>'; 
// print_r($shortcode_tags); 
// echo '</pre>';
?>
          <!-- // -->
          <?php 
   // the query
   $the_query = new WP_Query( array(
      'posts_per_page' => 3,
   )); 
?>

<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  <a class="wp-post" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( 'medium' ); ?>
          <div class="text-post btn-6">
            <h4><?php the_title(); ?></h4>
            <?php the_excerpt(); ?>
            <h6><?= get_the_date('jS M Y') ?></h6>
            <span></span>
          </div>
          </a>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php __('No News'); ?></p>
<?php endif; ?>

          <!-- // -->
        </div>
        <a class="view-more-news" href="/">View archive...</a>
      </div>
      
      
      <div
        class="live-events section orange-back"
        id="live-events"
        data-aos="fade-up"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-anchor-placement="top-bottom"
        data-aos-once="true"
      >
        <h1>
          <span class="white-cap">L</span>ive
          <span class="white-cap">E</span>vents
        </h1>
        <h2 class="blue-cap">LicKitySpit</h2>
        <?php echo do_shortcode('[content_block id=195]')?>
        <div class="live-events-lower">

          
          <div class="when">
            
            
            <h3> <span class="white-cap">U</span>pcoming <span class="white-cap">S</span>hows</h3>
            <?php echo do_shortcode('[eo_events]'); ?>
            
      </div>
        <div class="where">
          <h3><span class="white-cap">W</span>here</h3>
          <address>
            Marlow Theatre<br/>
            The Friars, <br/>
            Canterbury,<br/>
            CT1 2AS
          </address>
        </div>
        <img src="./images/gallery/12.jpg" alt="" />
      </div>

        <h2 class="blue-cap">Solo Show – Land Of Lost Content/ Come Alive</h2>
        <?php echo do_shortcode('[content_block id=197]')?>
        <h4>Upcoming dates for Land Of Lost Content/ Come Alive</h4>

        <ul>
          <li>
            28 September – The Yurt, Hidden Isle Festival, Canterbury.
          </li>
          <li>
            29 September – Olbys Soul Café, Making Waves Festival, Canterbury.
          </li>
        </ul>
      </div>
      </div>
      <div class="media section" id="media">
        <h1
          data-aos="fade-in"
          data-aos-duration="1000"
          data-aos-easing="ease-in-out"
          data-aos-once="true"
          data-aos-anchor-placement="top-bottom"
          data-aos-offset="50"
        >
          <span class="orange-cap">M</span>edia
        </h1>
        <ul class="link-content">
          <a
            data-aos="fade-up"
            data-aos-duration="1000"
            data-aos-easing="ease-in-out"
            data-aos-once="true"
            class="the-blue-nib media-link"
            href="https://thebluenib.com/review-of-henry-maddicotts-poetry-show-land-of-lost-content/"
            ><li>
              <h3>The Blue Nib</h3>
              <p>
                Review Of Henry Maddicott’s Poetry Show, Land Of Lost Content
              </p>
            </li></a
          >
          <a
            data-aos="fade-up"
            data-aos-duration="1000"
            data-aos-easing="ease-in-out"
            data-aos-once="true"
            data-aos-delay="250"
            class="canterbury-culture media-link"
            href="https://canterburyculture.org/lickityspit/"
            ><li>
              <h3>Canterbury Culture</h3>
              <p>LicKitySpit: A new evening of poetry in an ancient setting</p>
            </li></a
          >
          <a
            data-aos="fade-up"
            data-aos-duration="1000"
            data-aos-easing="ease-in-out"
            data-aos-once="true"
            data-aos-delay="500"
            class="the-forest-review media-link"
            href="http://www.theforestreview.co.uk/article.cfm?id=117740"
            ><li>
              <h3>The Forest Review</h3>
              <p>Number isn’t up for old red phone boxes</p>
            </li></a
          >
        </ul>
      </div>


      <h1
        data-aos="fade-in"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-once="true"
        data-aos-anchor-placement="top-bottom"
        data-aos-offset="50"
      >
        <span class="blue-cap">G</span>allery
      </h1>
 

      <div
        class="gallery"
        id="gallery"
        data-aos="zoom-up"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-once="true"
      >
        
<?= do_shortcode('[everest_gallery alias="Main"]') ?>
      </div>
      <div class="education section" id="education">
        <h1><span class="blue-cap">E</span>ducation</h1>
        <?php echo do_shortcode('[content_block id=199]')?>
      </div>
      <div class="rex section" id="rex">
        <h1><span class="orange-cap">R</span>ex</h1>
        <?php echo do_shortcode('[content_block id=203]')?>
      </div>
      <div class="contact section" id="contact">
        <h1>Contact Me</h1>
        <div class="contact-content">

            <div class="contact-left">
                <?php echo do_shortcode('[contact-form-7 id="88" title="Contact Henry Madd"]'); ?>
            </div>
            <div class="contact-right">
                <?php echo do_shortcode('[content_block id=206]')?>
            </div>
        </div>
      </div>
    </main>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      window.addEventListener("load", function() {
        // ....
        var container = document.querySelector("#masonry-grid");
        var msnry = new Masonry(container, {
          // options
          columnWidth: window.innerWidth / 4,
          itemSelector: ".grid-item"
        });
        $("document").ready(function() {
          // Javascript
        });
      });
    </script>
    <script>
      $("a").click(function() {
        $("html, body").animate(
          {
            scrollTop: $($(this).attr("href")).offset().top
          },
          500
        );
        return false;
      });
    </script>
    <script>
      $(document).on("scroll", function() {
        let top = $(document).scrollTop();
        if (top > 66) {
          $("#nav-home-text").html(
            "<h4><span class='blue-cap'>H</span>enry <span class='blue-cap'>M</span>add</h4>"
          );
        } else {
          $("#nav-home-text").html("Home");
        }
      });
    </script>
    <?php include 'footer.php'; ?>
  </body>
</html>
