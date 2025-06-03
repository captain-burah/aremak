<div>

    <div class="">



        <form class="border border-primary rounded px-3 py-3" action="../service_inquiry.php" method="POST" id="contact-form-desktop">
            <div class="form-group text-primary">
                <h3 class="mx-auto text-center">Register Your Interest</h3>
            </div>
            <?php if ($ack_message != "") { ?>
                <div class="row gy-4 custom-width mx-auto mb-3">
                    <div class="col-lg-12 col-md-12">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center">
                            <?php if ($ack_message == 'success') { ?>
                                <div class="text-white py-2 px-4 rounded-pill bg-success">
                                    Your inquiry was submitted! Thank You!
                                </div>
                            <?php } else { ?>
                                <div class="text-white p-2 rounded- bg-warning">
                                    ERROR! Required:
                                    <?php
                                    echo $ack_message;
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <input type="hidden" name="page_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            <div class="form-group text-primary">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required <?php echo $form_disabled; ?>>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group text-primary">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required
                            <?php echo $form_disabled; ?>>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-primary">
                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone*" required
                            <?php echo $form_disabled; ?>>
                    </div>
                </div>
            </div>
            <div class="form-group text-primary">
                <textarea class="form-control" name="message" id="message" rows="2" placeholder="Inquiry Message*"
                    required <?php echo $form_disabled; ?>></textarea>
            </div>

            <button type="button" id="submit-button" <?php echo $form_disabled; ?>
                class="btn btn-warning rounded-pill text-dark w-100 border border-primary"
                onclick="handleRecaptchaSubmit()">
                <span class="btn-text">Register Your Interest</span>
                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
            </button>
        </form>

    </div>
</div><!-- End Info Item -->
<script src="../js/jquery.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LcVuUorAAAAAD-TjUj5VYEQNxjopmxCgRSb_Rgq"></script>
<script>
    function handleRecaptchaSubmit() {
        const button = document.getElementById('submit-button');
        const btnText = button.querySelector('.btn-text');
        const spinner = button.querySelector('.spinner-border');

        // Show loading
        button.disabled = true;
        btnText.textContent = "Submitting...";
        spinner.classList.remove('d-none');

        // Run reCAPTCHA
        grecaptcha.ready(function () {
            grecaptcha.execute('<?php echo Config::GOOGLE_RECAPTCHA_SITE_KEY; ?>', { action: 'submit' })
                .then(function (token) {
                    // Append token and submit form
                    const form = document.getElementById("contact-form-desktop");
                    const input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "recaptcha_token";
                    input.value = token;
                    form.appendChild(input);
                    form.submit();
                })
                .catch(function (error) {
                    console.error("reCAPTCHA error:", error);

                    // Reset UI if error
                    button.disabled = false;
                    btnText.textContent = "SUBMIT";
                    spinner.classList.add('d-none');
                });
        });
    }
</script>