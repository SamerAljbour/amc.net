<!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer id="ts-footer">

            <div class="map ts-height__600px" id="map" data-mask-top-nw-color="#fff" data-mask-bottom-wn-color="#1f1f1f" style="height: 600px; overflow: hidden;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.7234567890123!2d-117.94694400000001!3d34.038405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDAyJzE4LjMiTiAxMTfCsDU2JzQ5LjAiVw!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="AMC Location Map">
                </iframe>
            </div>
            <!--end map-->
            <section id="contact" class="ts-block ts-background-is-dark ts-separate-bg-element" data-bg-image="assets/img/bg-desk.jpg" data-bg-image-opacity=".1" data-bg-color="#1f1f1f" data-mask-bottom-wn-color="#000">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>{{ __("footer.Contact_Us") }}</h3>
                            <address>
                                <figure>
                                    2590 Rocky Road
                                    <br>
                                    Philadelphia, PA 19108
                                </figure>
                                <br>
                                <figure>
                                    <div class="font-weight-bold">{{ __("footer.Email") }}:</div>
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=office@example.com" target="_blank" rel="noopener noreferrer">
                                        office@example.com
                                    </a>
                                </figure>
                                <figure>
                                    <div class="font-weight-bold">{{ __("footer.Phone") }}:</div>
                                    +1 215-606-0391
                                </figure>
                                {{-- <div class="font-weight-bold">Skype:</div>
                                startups.agency --}}
                            </address>
                            <!--end address-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-8">
                            <h3>{{ __("footer.Contact_Form") }}</h3>
                           <form id="form-contact" class="clearfix ts-form ts-form-email ts-inputs__transparent">
    @csrf
    <div id="form-messages" class="alert" style="display: none;"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="form-contact-name">{{ __("footer.Your_Name") }} *</label>
                <input type="text" class="form-control" id="form-contact-name" name="name" placeholder="{{ __("footer.Your_Name") }}" required>
                <div class="invalid-feedback" id="name-error"></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label for="form-contact-email">{{ __("footer.Your_Email") }} *</label>
                <input type="email" class="form-control" id="form-contact-email" name="email" placeholder="{{ __("footer.Your_Email") }}" required>
                <div class="invalid-feedback" id="email-error"></div>
            </div>
        </div>
    </div>
    <!-- Add phone field if needed -->
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="form-contact-phone">{{ __("footer.Your_Phone") }} *</label>
                <input type="text" class="form-control" id="form-contact-phone" name="phone" placeholder="{{ __("footer.Your_Phone") }}" required>
                <div class="invalid-feedback" id="phone-error"></div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="form-contact-message">{{ __("footer.Your_Message") }} *</label>
                <textarea class="form-control" id="form-contact-message" rows="5" name="message" placeholder="{{ __("footer.Your_Message") }}" required></textarea>
                <div class="invalid-feedback" id="message-error"></div>
            </div>
        </div>
    </div>
    <div class="form-group clearfix">
        <button type="submit" class="btn btn-primary float-right" id="form-contact-submit">{{ __("footer.Send_Message") }}</button>
    </div>
</form>
                            <!--end form-contact -->
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>

            <div class="text-center text-white pb-5" data-bg-color="#000">
                <small>© <script>document.write(new Date().getFullYear());</script> {{ __("footer.AMC_rights") }}
</small>
            </div>
        </footer>
        <!--end #footer-->
        @push('scripts')
        <script>
           document.getElementById('form-contact').addEventListener('submit', function(e) {
    e.preventDefault();

    // Clear previous errors and messages
    document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
    const messageDiv = document.getElementById('form-messages');
    messageDiv.style.display = 'none';

    // Get form data
    const formData = new FormData(this);
    const submitButton = document.getElementById('form-contact-submit');
    const originalButtonText = submitButton.innerHTML;

    // Show loading state
    submitButton.innerHTML = 'Sending...';
    submitButton.disabled = true;

    // AJAX request
    fetch('{{ route("contact.send") }}', {  // Using Laravel's route helper in JS
        method: 'POST',
        body: formData,
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        // Show success message
        messageDiv.textContent = data.message;
        messageDiv.className = 'alert alert-success';
        messageDiv.style.display = 'block';

        // Reset form
        this.reset();
    })
    .catch(error => {
        console.error('Error:', error);

        if (error.errors) {
            // Handle validation errors
            for (const field in error.errors) {
                const input = document.querySelector(`[name="${field}"]`);
                const errorElement = document.getElementById(`${field}-error`);

                if (input && errorElement) {
                    input.classList.add('is-invalid');
                    errorElement.textContent = error.errors[field][0];
                }
            }
        } else {
            // Show generic error message
            messageDiv.textContent = error.message || 'An error occurred. Please try again.';
            messageDiv.className = 'alert alert-danger';
            messageDiv.style.display = 'block';
        }
    })
    .finally(() => {
        submitButton.innerHTML = originalButtonText;
        submitButton.disabled = false;
    });
});
            </script>
        @endpush
