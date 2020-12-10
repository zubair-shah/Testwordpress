
<section id="contact-form" style="    background-color: #c7322b;">
    <div class="container">
        <div class="sec-padding">

            <div class="main">

                <div class="heading">
                    <h1>CABLE CONTACT FORM</h1>
                    <h6>GET IN TOUCH</h6> 
                </div>
                <!-- <form action="post">
                    <label for="name">
                        <input type="text" class="input"; name="firstname" id="name" placeholder="ENTER YOUR FIRST NAME">
                    </label>
                    <label for="name2">
                        <input type="text" class="input"; name="lastname" id="name2" placeholder="ENTER YOUR LAST NAME">
                    </label>
                    <label for="email">
                        <input type="email" class="input"; name="email" id="email" placeholder="ENTER YOUR EMAIL ">
                    </label>
                    <label for="password">
                        <input type="password" name="pasword" id="password" placeholder="ENTER YOUR PASSWORD">
                    </label>

                    <label for="subject">
                        <textarea name="subject" class="tarea"; id="subject" cols="30" rows="10"
                            placeholder="comment your problems"></textarea>
                    </label>
                    <label for="btn">
                        <input type="submit" class="subbtn"name="Button" id="btn" placeholder="">
                    </label>

                </form> -->

                <?php echo do_shortcode( '[contact-form-7 id="22" title="Contact Us"]' ); ?>

            </div>



        </div>
    </div>

</section>

<footer class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>© 2020 Cable TV & Internet Deals. All rights reserved.</p>
                    <p>Powered by <a class="ff-secondary" href="">Simply Activate LLC</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
<script type="text/javascript" src="<?php 'bloginfo'('template_directory') ?>/js/theme-lib.js"></script>
<script type="text/javascript" src="<?php 'bloginfo'('template_directory') ?>/js/theme-fun.js"></script>
<script type="text/javascript" src="<?php 'bloginfo'('template_directory') ?>/js/wow.min.js"></script>

<script>
new WOW().init();
</script>

<?php 'wp_footer'(); ?>
</body>

</html>