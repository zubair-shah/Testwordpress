<div class="post-share">
    <span><?php esc_html_e('Share:', 'turbo-helper') ?></span>
    <ul>
        <li><a href="<?php echo esc_url('//twitter.com/intent/tweet?url=' . urlencode(get_the_permalink())) ?>"><i class="fab fa-twitter"></i></a></li>
        <li><a href="<?php echo esc_url('//www.facebook.com/sharer/sharer.php?u=' . get_the_permalink()) ?>"><i class="fab fa-facebook"></i></a></li>
        <li><a href="<?php echo esc_url('//plus.google.com/share?url=' . get_the_permalink()) ?>"><i class="fab fa-google-plus"></i></a></li>
        <li><a href="<?php echo esc_url('//www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . get_the_title() . '&summary=' . get_the_excerpt() . '&source=') ?>"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="<?php echo esc_url('//pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . get_the_post_thumbnail() . '&description=' . get_the_excerpt()) ?>"><i class="fab fa-pinterest-p"></i></a></li>
    </ul>
</div>