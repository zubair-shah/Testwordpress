<?php get_header(); ?>
<div class="rq-page-content"> <!-- start of page content -->
    <div class="rq-content-block">
        <div class="rq-shopping-content-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 404-post">
                        <div class="description">
                            <?php print sprintf(esc_html__('We could not find the page you are looking for. %1$s.', 'turbo'), '<a href="' . esc_url(home_url('/')) . '">' . esc_html__('Go back to Home', 'turbo') . '</a>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.page-content -->
<?php get_footer(); ?>
