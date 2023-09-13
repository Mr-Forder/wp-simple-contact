<?php if (get_plugin_options('simple_contact_active')) : ?>

      <?php
      $scheme_colour = get_plugin_options('simple_contact_colour');
      $disable_phone = get_plugin_options('simple_contact_disable_phone');
      $form_title = get_plugin_options('simple_contact_title');

      ?>



      <div class="form-container">

            <div id="form_success"></div>
            <div id="form_error"></div>
            <form id="enquiry_form">
                  <?php wp_nonce_field('wp_rest'); ?>
                  <h3 style="color:<?php echo $scheme_colour; ?>"><?php echo $form_title; ?></h3>
                  <label>Name</label><br />
                  <input type="text" name="name" placeholder="your name"><br /><br />

                  <?php
                  if (!$disable_phone) {
                        echo '<label>Phone</label><br />';
                        echo '<input type="text" name="phone" placeholder="your phone number"><br /><br />';
                  }
                  ?>
                  <!-- <label>Phone</label><br />
                  <input type="text" name="phone"><br /><br /> -->

                  <label>Email</label><br />
                  <input type="text" name="email" placeholder="address@email.com"><br /><br />

                  <label>Message</label><br />
                  <textarea name="message" placeholder="add your message here"></textarea><br /><br />

                  <button type="submit" style="background-color:<?php echo $scheme_colour; ?>">Submit form</button>
            </form>
      </div>

      <script>
            jQuery(document).ready(function($) {
                  $("#enquiry_form").submit(function(event) {
                        event.preventDefault();
                        $("#form_error").hide();
                        var form = $(this);
                        $.ajax({
                              type: "POST",
                              url: "<?php echo get_rest_url(null, 'v1/simple-contact/submit'); ?>",
                              data: form.serialize(),
                              success: function(res) {
                                    form.hide();
                                    $("#form_success").html(res).fadeIn();
                              },
                              error: function() {
                                    $("#form_error").html("Error submitting form!").fadeIn();
                              }
                        })
                  });
            });
      </script>

<?php else : ?>

      <p>Simple Contact Form is not active. Active in Simple Contact Settings.</p>

<?php endif; ?>