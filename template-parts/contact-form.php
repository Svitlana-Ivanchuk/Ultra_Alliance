<div class="contactform_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="contactform_form">
                    <?php echo do_shortcode('[contact-form-7 id="9" title="Напишіть нам"]'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contactform_contact">
                    <b>Ел. пошта —</b>
                    <p class="contactform_contact-text"><a
                            href="mailto:<?php echo get_bloginfo('admin_email'); ?> "><?php echo get_bloginfo('admin_email'); ?> </a>
                    </p>
                    <br>
                    <b>Тел. номер —</b>
                    <p class="contactform_contact-text"><a
                            href="tel:<?php echo get_option('admin_phone'); ?> "><?php echo get_option('admin_phone'); ?>
                        </a></p>

                    <?php echo do_shortcode('[wbcr_html_snippet id="126"]'); ?>

                    <b>Головний офіс — </b>
                    <p><?php echo get_option('main_office'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>