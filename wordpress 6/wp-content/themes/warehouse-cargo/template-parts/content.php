<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Warehouse Cargo
 */
?>

<div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
        <?php if ( has_post_thumbnail() ) { ?><?php warehouse_cargo_post_thumbnail(); ?><?php }?>
        <div class="entry-summary p-3 m-0">
            <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
            <p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','warehouse-cargo'); ?></a>
        </div>
    </article>
</div>