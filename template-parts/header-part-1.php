<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid justify-content-center justify-content-md-between">
        <div class="d-flex my-2 my-sm-0">
            <a class="navbar-brand me-2 mb-1 d-flex justify-content-center" href="<?php echo get_home_url(); ?>">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
                <img src="<?php echo $image[0]; ?>"
                    height="20"
                    alt=""
                    loading="lazy"
                />
            </a>

            <div class="d-flex">
                <?php get_product_search_form(); ?>
            </div>
        </div>

        <ul class="navbar-nav flex-row">
        <?php
        /*wp_nav_menu(
            array(
                'theme_location' => 'navbar-menu',
                'container' => false,
                'menu_class' => 'navbar-nav flex-row',
                'items_wrap' => '%3$s',
                'walker' => new MDB_Walker()
            )
        );*/

        wp_nav_menu( array(
            'theme_location'  => 'navbar-menu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'bs-example-navbar-collapse-1',
            'menu_class'      => 'navbar-nav mr-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );




        if ( class_exists( 'WooCommerce' ) ) {
            global $woocommerce;
            echo '<li class="nav-item me-3 me-lg-2">
                <a class="nav-link" href="' . wc_get_cart_url() . '">
                    <span><i class="fas fa-shopping-cart"></i></span>';

                    if ( $woocommerce->cart->cart_contents_count !== 0 )
                    echo '<span class="badge rounded-pill badge-notification bg-danger">' . $woocommerce->cart->cart_contents_count . '</span>';

                    echo '</a></li>';
        }
        ?>
        <li class="nav-item dropdown">
            <a
                    class="nav-link dropdown-toggle d-flex align-items-center"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
            >
                <img
                        src="https://mdbootstrap.com/img/new/avatars/2.jpg"
                        class="rounded-circle"
                        height="22"
                        alt=""
                        loading="lazy"
                />
            </a>
            <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
            >
                <li><a class="dropdown-item" href="#">My profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </li>
        </ul>
    </div>
</nav>
