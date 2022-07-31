<?php
/**
 * Displays top navigation
 *
 * @package Warehouse Cargo
 */

$warehouse_cargo_sticky_header = get_theme_mod('warehouse_cargo_sticky_header');
    $data_sticky = "false";
    if ($warehouse_cargo_sticky_header) {
    $data_sticky = "true";
    }
?>
<div class="navigation_header py-2" data-sticky="<?php echo esc_attr($data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-9 align-self-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('warehouse_cargo_logo_title',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php }?>
                            <?php else : ?>
                                <?php if( get_theme_mod('warehouse_cargo_logo_title',true) != ''){ ?>
                                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php }?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('warehouse_cargo_logo_text',true) != ''){ ?>
                         <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php }?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-7 col-md-4 col-sm-4 col-3 align-self-center">
                <div class="toggle-nav mobile-menu">
                    <?php if(has_nav_menu('primary')){ ?>
                        <button onclick="warehouse_cargo_openNav()"><i class="fas fa-th"></i></button>
                    <?php }?>
                </div>
                <div id="mySidenav" class="nav sidenav">
                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'warehouse-cargo' ); ?>">
                        <?php if(has_nav_menu('primary')){
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'menu',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                )
                            );
                        } ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="warehouse_cargo_closeNav()"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 align-self-center">
                <div class="headerbtn text-md-right text-center">
                    <?php if(get_theme_mod('warehouse_cargo_headerbtn_url') != '' || get_theme_mod('warehouse_cargo_headerbtn_text') != ''){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('warehouse_cargo_headerbtn_url','')); ?>"><?php echo esc_html(get_theme_mod('warehouse_cargo_headerbtn_text','')); ?></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>