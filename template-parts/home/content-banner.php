<?php
if( has_post_thumbnail() ) {
    $style = 'style="background-image: url(\''. get_the_post_thumbnail_url( get_the_ID(), 'full' ) .'\')"';
} else {
    $style = '';
}
?>
<section class="home-banner" <?php echo $style; ?>>
    <div class="responsive-bg">
        <div class="banner-content">
            <div class="container">
                <div class="section-title">
                    <h2 class="wow animate__animated animate__fadeIn"><?php the_content(); ?></h2>
                </div>
                <?php        
                $link = get_field( '_banner_button_link' );
                if ( $link ) {
                    $link_url         = $link['url']; // link url
                    $link_title     = $link['title']; // link title
                    $link_target     = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="btn-wrap wow heartbeat animated">
                        <a class="btn-stride" 
                            href="<?php echo esc_url( $link_url ); ?>" 
                            target="<?php echo esc_attr( $link_target ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                        </a>
                    </div>
                    <?php 
                }
                ?>
            </div>
        </div>
    </div>
</section>