<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php $warehouse_cargo_slide_pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'warehouse_cargo_top_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $warehouse_cargo_slide_pages[] = $mod;
        }
      }
      if( !empty($warehouse_cargo_slide_pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $warehouse_cargo_slide_pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p><?php $warehouse_cargo_excerpt = get_the_excerpt(); echo esc_html( warehouse_cargo_string_limit_words( $warehouse_cargo_excerpt, 25 ) ); ?></p>
            <div class="slider-box-btn mt-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','warehouse-cargo'); ?></a>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>

  <?php if(get_theme_mod('warehouse_cargo_detail_call_heading') != '' || get_theme_mod('warehouse_cargo_detail_call_text') != '' || get_theme_mod('warehouse_cargo_detail_working_heading') != '' || get_theme_mod('warehouse_cargo_detail_working_text') != '' || get_theme_mod('warehouse_cargo_detail_location_heading') != '' || get_theme_mod('warehouse_cargo_detail_location_text') != '' || get_theme_mod('warehouse_cargo_detail_quote_heading') != '' || get_theme_mod('warehouse_cargo_detail_quote_url') != '' || get_theme_mod('warehouse_cargo_detail_quote_text') != ''){ ?>
    <section class="details">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 details-box">
            <?php if(get_theme_mod('warehouse_cargo_detail_call_heading') != '' || get_theme_mod('warehouse_cargo_detail_call_text') != ''){ ?>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <i class="fas fa-headset"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <h4><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_call_heading','')); ?></h4>
                  <p class="mb-0"><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_call_text','')); ?></p>
                </div>
              </div>
            <?php }?>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 details-box">
            <?php if(get_theme_mod('warehouse_cargo_detail_working_heading') != '' || get_theme_mod('warehouse_cargo_detail_working_text') != ''){ ?>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <i class="fas fa-clock"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <h4><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_working_heading','')); ?></h4>
                  <p class="mb-0"><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_working_text','')); ?></p>
                </div>
              </div>
            <?php }?>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 details-box">
            <?php if(get_theme_mod('warehouse_cargo_detail_location_heading') != '' || get_theme_mod('warehouse_cargo_detail_location_text') != ''){ ?>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <i class="fas fa-map-marked"></i>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9">
                  <h4><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_location_heading','')); ?></h4>
                  <p class="mb-0"><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_location_text','')); ?></p>
                </div>
              </div>
            <?php }?>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 details-bg">
            <?php if(get_theme_mod('warehouse_cargo_detail_quote_heading') != '' || get_theme_mod('warehouse_cargo_detail_quote_url') != '' || get_theme_mod('warehouse_cargo_detail_quote_text') != ''){ ?>
              <h4><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_quote_heading','')); ?></h4>
              <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_detail_quote_url','')); ?>"><?php echo esc_html(get_theme_mod('warehouse_cargo_detail_quote_text','')); ?></a>
            <?php }?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <section id="latest_post" class="py-5">
    <div class="container">
      <div class="row mt-4">
        <?php $warehouse_cargo_other_latest_post_section = array();
          $latest_post_loop = get_theme_mod('warehouse_cargo_latest_post_loop');
          for ($i=1; $i <= $latest_post_loop; $i++) { 
            $mod = intval( get_theme_mod( 'warehouse_cargo_other_latest_post_section' .$i));
            if ( 'page-none-selected' != $mod ) {
              $warehouse_cargo_other_latest_post_section[] = $mod;
            }
          }
          if( !empty($warehouse_cargo_other_latest_post_section) ) :
          $args = array(
            'post_type' => 'post',
            'post__in' => $warehouse_cargo_other_latest_post_section,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="article-box">
              <?php if ( has_post_thumbnail() ) { ?><?php warehouse_cargo_post_thumbnail(); ?><?php }?>
              <div class="entry-summary p-3 m-0">
                <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
                <p><?php $warehouse_cargo_excerpt = get_the_excerpt(); echo esc_html( warehouse_cargo_string_limit_words( $warehouse_cargo_excerpt, 15 ) ); ?></p>
              </div>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
      </div>
    </div>
  </section>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>