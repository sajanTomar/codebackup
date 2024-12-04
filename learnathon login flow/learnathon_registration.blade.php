@extends('layouts.frontend')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@include('includes.frontend1.css')

@endsection

@section('content')
<section style="background-color: #3777ff; min-height: 100vh; height: auto; display: flex; align-items: center;">
    {{--<div style="position: sticky; top: 8vh; left: 10vw; padding: 10px; z-index: 10;">
        <img src="{!! asset('assets/frontend1/images/LAT_Logo.png') !!}" alt="learnathon-logo" style="height: 20vh;">
    </div>--}}
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Form container -->
                <div class="form-container p-4 bg-white rounded shadow" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div style="position: absolute; top: 10px; left: 3vw;">
                        <img src="{!! asset('assets/frontend1/images/bambinos-large.png') !!}" alt="Logo" style="height: 50px; margin-left: 1.5vw;">
                    </div>    
                    <h2 class="text-center mb-4">Learn-A-Thon: Registration Form</h2>
                    <form id="registrationForm" action="{{ route('learnathon.register') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="parentName"><strong>Parent Name</strong></label>
                                <input type="text" class="form-control" name="parent_name" id="parentName" placeholder="Enter parent name">
                                @error('parent_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="parentName"><strong>Parent Email</strong></label>
                                <input type="text" class="form-control" name="parent_email" id="parentEmail" placeholder="Enter email address">
                                @error('parent_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row"> <!-- Use form-row for horizontal layout -->
                            <div class="form-group col-md-6">
                                <label for="country_code"><strong>Country Code</strong></label>
                                <select name="country_code" class="custom-select select2" id="country_code">
                                    <option value="">Select Country</option>
                                    <optgroup label="Most Selected">
                                        <option data-isocode="IN" value="+91">(+91) India</option>
                                        <option data-isocode="BD" value="+880">(+880) Bangladesh</option>
                                        <option data-isocode="US" value="+1">(+1) USA</option>
                                        <option data-isocode="AE" value="+971">(+971) UAE</option>
                                        <option data-isocode="CA" value="+1">(+1) Canada</option>
                                        <option data-isocode="AU" value="+61">(+61) Australia</option>
                                        <option data-isocode="QA" value="+974">(+974) Qatar</option>
                                        <option data-isocode="SA" value="+966">(+966) Saudi Arabia</option>
                                        <option data-isocode="KW" value="+965">(+965) Kuwait</option>
                                        <option data-isocode="SG" value="+65">(+65) Singapore</option>
                                    </optgroup>
                                    <optgroup label="Other Countries">
                                        @foreach($countryCodes as $country)
                                            <option data-isocode="{{ $country->iso_code }}" value="{{ $country->code }}">
                                                ({{ $country->code }}) {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('country_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile_number"><strong>Mobile Number</strong></label>
                                <input type="number" class="form-control" name="mobile_number" id="mobile_number" placeholder="Enter mobile number">
                                @error('mobile_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="wapp_country_code"><strong>Whatsapp Country Code</strong></label>
                                <select name="wapp_country_code" name="wapp_country_code" class="custom-select select2" id="wapp_country_code">
                                    <option value="">Select Country</option>
                                    <optgroup label="Most Selected">
                                        <option data-isocode="IN" value="+91">(+91) India</option>
                                        <option data-isocode="BD" value="+880">(+880) Bangladesh</option>
                                        <option data-isocode="US" value="+1">(+1) USA</option>
                                        <option data-isocode="AE" value="+971">(+971) UAE</option>
                                        <option data-isocode="CA" value="+1">(+1) Canada</option>
                                        <option data-isocode="AU" value="+61">(+61) Australia</option>
                                        <option data-isocode="QA" value="+974">(+974) Qatar</option>
                                        <option data-isocode="SA" value="+966">(+966) Saudi Arabia</option>
                                        <option data-isocode="KW" value="+965">(+965) Kuwait</option>
                                        <option data-isocode="SG" value="+65">(+65) Singapore</option>
                                    </optgroup>
                                    <optgroup label="Other Countries">
                                        @foreach($countryCodes as $country)
                                            <option data-isocode="{{ $country->iso_code }}" value="{{ $country->code }}">
                                                ({{ $country->code }}) {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                @error('wapp_country_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="wapp_number"><strong>Whatsapp Number</strong></label>
                                <input type="number" class="form-control" name="wapp_number" id="wapp_number" placeholder="Enter whatsapp number">
                                @error('wapp_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div id="childFieldsContainer">
                            <div class="form-row child-fields"> <!-- Use form-row for horizontal layout -->
                                <div class="form-group col-md-4">
                                    <label for="child_name"><strong>Child Name</strong></label>
                                    <input type="text" class="form-control" name="child_name[]" placeholder="Enter child name">
                                    @error('child_name.*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob"><strong>Date of Birth</strong></label>
                                    <input type="date" class="form-control" name="dob[]" placeholder="Enter child DOB">
                                    @error('dob.*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 text-center mt-4 button-container">
                                    <button type="button" class="btn btn-primary addMoreButton">Add More</button>
                                </div>
                            </div> 
                        </div>
                        <button type="submit" id="registerBtn" class="btn btn-round btn-warning btn-block" style="width: 100%; max-width: 300px; margin: 0 auto;">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="overlay_modal_header"></div>
<div class="modal fade" id="popup_toggle_password" tabindex="-1" role="dialog" aria-labelledby="popupTogglePasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="password_login" style="display: block;">
                    <h4>Login With Password</h4>
                    <div class="modal_main">
                        <form action="{{route('learnathon.login')}}" method="POST" id="mpinloginform">
                            @csrf
                            <input type="hidden" name="country_code" id="modal_country_code">
                            <input type="hidden" name="mobile_no" id="modal_mobile_no">
                            <div class="form-group">
                                <label class="form-label">Enter Password:</label>
                                <div class="otp-field mb-4 d-flex justify-content-between">
                                    <input type="number" class="form-control" name="password[]" required>
                                    <input type="number" class="form-control" name="password[]" required>
                                    <input type="number" class="form-control" name="password[]" required>
                                    <input type="number" class="form-control" name="password[]" required>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <button type="button" id="password_btn" class="btn btn-primary submit_password">Submit</button>
                                <button type="button" class="btn btn-link" id="mobile_button_header" onclick="save_mobile_header()">Forgot Password?</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="forgot_password" style="display: none;">
                    <h4>Forgot Password</h4>
                    <div class="modal_main">
                        <div class="form-group">
                            <label class="form-label">Enter Mobile:</label>
                            <input type="number" class="form-control" placeholder="Enter your phone number.." autocomplete="new">
                        </div>
                        <button type="button" class="btn btn-link">Forget Password</button>
                        <div class="text-left mt-3">
                            <button type="submit" id="password_btn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>

                <div class="set_password" style="display: none;">
                    <h4>Create Login Password</h4>
                    <div class="modal_main">
                        <form action="{{route('parent.set.mpin')}}" method="POST" id="setpasswordform">
                            <div class="form-group">
                                <label class="form-label">Set Password:</label>
                                <div class="otp-field1 mb-4 d-flex justify-content-between">
                                    <input type="number" class="form-control" name="set_password[]" required>
                                    <input type="number" class="form-control" name="set_password[]" disabled required>
                                    <input type="number" class="form-control" name="set_password[]" disabled required>
                                    <input type="number" class="form-control" name="set_password[]" disabled required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm Password:</label>
                                <div class="otp-field2 mb-4 d-flex justify-content-between">
                                    <input type="number" class="form-control" name="confirm_set_password[]" required>
                                    <input type="number" class="form-control" name="confirm_set_password[]" disabled required>
                                    <input type="number" class="form-control" name="confirm_set_password[]" disabled required>
                                    <input type="number" class="form-control" name="confirm_set_password[]" disabled required>
                                </div>
                            </div>
                            <div class="text-left mt-3">
                                <button type="submit" id="set_password_btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup popup_toggle_otp_header">
    <div class="popup_header">
        <button type="button" class="_close_popup_buton"><i class="fa fa-times"></i></button>
    </div>
    <div class="popup_body">
        <div class="modal_heading">
            <h4>
                Enter OTP
            </h4>
        </div>
        <div class="modal_main">
            <div class="row">
                <div class="col-md-12 proceed">
                    <p>Please enter the code we just sent to <strong id="given_number_header">91-11-46710500</strong> to proceed</p>

                </div>
            </div>

            <div class="otp_field main_login text-center digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                <input type="number" class="form-control form_control_padding" id="header_otp1" maxlength="4" autocomplete="off">
            </div>
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="buton" class="btn btn-primary btn-round" id="validate_otp_btn_header" onclick="verifyOtp()">Confirm</button>
                </div>
            </div>
            <div class="row otp_text mt-4">
                <div class="col-md-12">
                    <p class="text-center">Didn't Receive OTP?<button type="button" class="btn btn-link p-0 resend_button" onclick="resend_otp_header()">Resend</button></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@include('includes.frontend1.js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{!! asset('assets/frontend1/js/owl.carousel.min.js') !!}"></script>
<script src="{{asset('assets/notify.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $(".forgot_password").hide();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInputs = document.querySelectorAll('.otp-field input');

        passwordInputs.forEach((input, index) => {
            input.addEventListener('input', function () {
                if (this.value.length === 1) {
                    // Move to the next input box if available
                    if (index < passwordInputs.length - 1) {
                        passwordInputs[index + 1].focus();
                    }
                }
            });

            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && this.value.length === 0) {
                    // Move to the previous input box if available
                    if (index > 0) {
                        passwordInputs[index - 1].focus();
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Open a specific popup modal
        $(".open_popup_button_header").click(function () {
            $(".popup_toggle_mobile_header").addClass("open_popup");
            $(".overlay_modal_header").addClass("overlay_modal_open");

            // Ensure all other popups are closed
            $(".popup").not(".popup_toggle_mobile_header").removeClass("open_popup");
        });

        // Close any open popup modal on clicking the close button or overlay
        $(document).on("click", "._close_popup_buton, .overlay_modal_header", function () {
            console.log("Popup close triggered");

            // Close all popups and remove overlay
            $(".popup").removeClass("open_popup");
            $(".overlay_modal_header").removeClass("overlay_modal_open");

            // Reset modal content
            resetModalContent();
        });

        // Go back to the previous modal (e.g., from OTP to mobile)
        $(".back_mobile_popup_header").click(function () {
            $(".popup_toggle_otp_header").removeClass("open_popup");
            $(".popup_toggle_mobile_header").addClass("open_popup");
        });

        // Open the "Book Demo" modal
        $(".open_book_demo").click(function () {
            $('#book_demo_modal').modal('toggle'); // Using Bootstrap modal
        });

        // Function to reset modal content
        function resetModalContent() {
            // Reset .popup_toggle_password modal content
            $(".popup_toggle_password #mobile_number").val(""); // Clear mobile number
            $(".popup_toggle_password #country_code").val(""); // Clear country code
            $(".popup_toggle_password #mobile_button_header")
                .html("Continue")
                .attr("disabled", true); // Reset button
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.close-modal').forEach(button => {
            button.addEventListener('click', function () {
                const modalClass = this.getAttribute('data-modal');
                const modalElement = document.querySelector(`.${modalClass}`);
                
                // Hide the modal immediately
                if (modalElement) {
                    modalElement.style.display = 'none';
                }

                // Perform AJAX call (optional)
                $.ajax({
                    url: '/your-endpoint', // Optional if needed
                    type: 'POST',
                    data: {
                        modal: modalClass,
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    success: function (response) {
                        console.log('Modal closed successfully:', response);
                    },
                    error: function (xhr) {
                        console.error('Error closing modal:', xhr);
                    }
                });
            });
        });
    });
</script>
<script>
    $('#login_with_Password').click(function() {
        const countryCode = $('#country_code').val();
        const mobileNumber = $('#mobile_number').val();

        $('#modal_country_code').val(countryCode);
        $('#modal_mobile_no').val(mobileNumber);
        $('.popup_toggle_password').addClass('open_popup');
        $('.popup_toggle_mobile_header').removeClass('open_popup');
    });
    $('.submit_password').on('click', function (event) {
        event.preventDefault(); // Prevent normal form submission

        const country_code = $('#modal_country_code').val();
        const mobile_no = $('#modal_mobile_no').val();

        const formData = new FormData(this);
        formData.append('country_code', country_code);
        formData.append('mobile_no', mobile_no);

        const redirectLink = "{{ route('parent.events') }}";

        $("#password_btn").attr('disabled', true);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#password_btn").attr('disabled', false);

                if (response.success) {
                    window.location.href = redirectLink;
                } else {
                    $.notify(response.data, { type: 'danger' });
                }
            },
            error: function (error) {
                console.log(error);
                $("#password_btn").attr('disabled', false);
            },
        });
    });

    var given_mobile_js = '';

    function save_mobile_header() {
        alert('hello');
        var mobile_no = $('#mobile_number').val();
        var country_code = $('#country_code').val();
        alert(mobile_no, country_code)
        $("#header_otp1").val("");
        $('#popup_toggle_password').modal('hide');

        $('#popup_toggle_password').removeClass('show').hide();
        $('.modal-backdrop').remove();

        // Show loading spinner on the button
        // $('#mobile_button_header').html('<i class="fa fa-refresh fa-spin"></i>');
        // $('#mobile_button_header').attr('disabled', true);

        // Make an AJAX request to validate mobile number
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {
                mobile_no: mobile_no,
                country_code: country_code
            },
            url: "{{ route('learnathon.validate') }}",
            dataType: 'json',
            success: function(response) {
                // Restore the button
                // $('#mobile_button_header').html('Continue');
                $('#mobile_button_header').attr('disabled', false);

                if (response.success === true) {
                    // Populate and open the OTP modal
                    $('#given_number_header').html(response.data.mobile_number);
                    alert(response.data.mobile_number);
                    $(".popup_toggle_otp_header").addClass("open_popup");

                    given_mobile_js = response.data.mobile_number;

                    // Show additional info if email exists
                    if (response.client_email && response.client_email !== '') {
                        $('#given_number_header').text(response.data + ' / ' + response.client_email);
                    }
                } else {
                    // Notify error
                    $.notify(response.data, { type: "danger" });

                    // Redirect if the response type indicates signup
                    if (response.type === 'signup') {
                        window.location.href = "{!! route('parent.events') !!}";
                    }
                }
            },
            error: function() {
                // Notify error
                $.notify("Mobile number should be a valid 10-digit number", { type: "danger" });

                // Restore the button
                $('#mobile_button_header').html('Send OTP');
                $('#mobile_button_header').attr('disabled', false);
            }
        });
    }

    function verifyOtp() {
        var otp = $('#header_otp1').val();
        // console('otp is '+otp);

        $('#validate_otp_btn_header').html('<i class="fa fa-refresh fa-spin"></i>');
        $('#validate_otp_btn_header').attr('disabled', true);
        //var redirectLink = "{{route('parent.dashboard')}}";
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {
                otp: otp
            },
            url: "{{ route('parent.login.otpvalidate') }}",
            //processData : false, // Don't process the files
            //contentType : false, // Set content type to false as jQuery will tell the server its a query string request
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    alert('hhh');
                    $('.popup_toggle_otp_header').modal('hide');
                    $('.popup_toggle_otp_header').removeClass('show').hide();
                    $('.modal-backdrop').remove();
                
                    // Reset the OTP input field
                    $('#header_otp1').val('');

                    // Open the password modal
                    $('#popup_toggle_password').modal('show');

                    // Show specific sections
                    $(".password_login").hide();
                    $(".set_password").show();

                    // Hide other sections
                    $(".forgot_password").hide();
                } else {
                    $.notify("" + response.data + "", {
                        type: "danger"
                    });
                    $('#validate_otp_btn_header').html('Confirm');
                    $('#validate_otp_btn_header').attr('disabled', false);
                }
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $.each(errors, function(index, value) {
                    $.notify("" + value + "", {
                        type: "danger"
                    });
                });

                $('#validate_otp_btn_header').html('Confirm');
                $('#validate_otp_btn_header').attr('disabled', false);
            }
        });
    }

    function resend_otp_header() {
        var mobile_no_js1 = given_mobile_js;

        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: {
                mobile_no: mobile_no_js1
            },
            url: "{{ route('resend.otpCode') }}",
            //processData : false, // Don't process the files
            //contentType : false, // Set content type to false as jQuery will tell the server its a query string request
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    $.notify("OTP has been sent to your mobile number", {
                        type: "success"
                    });
                } else {
                    //$.notify(""+response.data+"", {type:"danger"});
                    //$('#mobilenumbererr').html('<strong>'+response.data+'</strong>');
                }
            },
            error: function(data) {}
        });
    }

    $('form#setpasswordform').on('submit', function() {
        var mobile_no = $('#mobile_number').val();
        var country_code = $('#country_code').val();
        var formData = new FormData(this);
        formData.append('country_code', country_code);
        formData.append('mobile_no', mobile_no);
        var redirectLink = "{{route('parent.events')}}";
        $("#set_password_btn").attr('disabled', true);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            data: formData,
            url: $(this).attr('action'),
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            dataType: 'json',
            success: function(response) {
                if (response.success == true) {
                    window.location.href = redirectLink;
                    $("#set_password_btn").attr('disabled', false);
                } else {
                    $.notify("" + response.data + "", {
                        type: "danger"
                    });
                    $("#set_password_btn").attr('disabled', false);
                }
            },
            error: function(data) {
                console.log(data);
                $("#set_password_btn").attr('disabled', false);
            }

        });
        return false;
    });

</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();

        $(document).on('click', '.addMoreButton', function() {
           
            $(this).hide();

            var newFields = $('.child-fields:first').clone();
            newFields.find('input').val('');

            var buttonContainer = newFields.find('.button-container');
            buttonContainer.empty();
            buttonContainer.append('<button type="button" class="btn btn-primary addMoreButton mr-1">Add</button>');
            buttonContainer.append('<button type="button" class="btn btn-danger removeButton">Remove</button>');

            $('#childFieldsContainer').append(newFields);
        });

        $(document).on('click', '.removeButton', function() {
  
            $(this).closest('.child-fields').remove();

            $('#childFieldsContainer .child-fields:last .addMoreButton').show();
        });

        $('#registerBtn').click(function(e) {
            e.preventDefault();
            $('.text-danger').remove();
            let isValid = true;

            // Validate each child name and dob
            $('input[name="child_name[]"]').each(function() {
                if ($(this).val() === '') {
                    $(this).closest('.form-group').append('<div class="text-danger">Child name is required.</div>');
                    isValid = false;
                }
            });
            
            $('input[name="dob[]"]').each(function() {
                if ($(this).val() === '') {
                    $(this).closest('.form-group').append('<div class="text-danger">Date of birth is required.</div>');
                    isValid = false;
                }
            });

            if(isValid) {
                $.ajax({
                    url: $('#registrationForm').attr('action'),
                    method: 'POST',
                    data: $('#registrationForm').serialize(),
                    success: function(response) {
                        if (response.success) {
                            if(response.success == 'existing_account') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Existing account',
                                    text: response.message,
                                    timer: 1000,
                                    confirmButtonText: 'OK'
                                }).then(function(){
                                    $('#modal_country_code').val(response.country_code);
                                    $('#modal_mobile_no').val(response.mobile_number);
                                    $('#given_number_header').text(response.mobile_number);
                                    var myModal = new bootstrap.Modal(document.getElementById('popup_toggle_password'));
                                    myModal.show();
                                    // function(){
                                    //     window.location.href = "{{ route('parent.events') }}"
                                    // }
                                }
                                );
                            } 
                            else {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Registration Successful',
                                        text: 'Your form has been submitted successfully!',
                                        timer: 1000,
                                        showConfirmButton: false
                                    }).then(function(){
                                            $('#modal_country_code').val(response.country_code);
                                            $('#modal_mobile_no').val(response.mobile_number);
                                            $('#given_number_header').text(response.mobile_number);
                                            $('.popup_toggle_otp_header').show();
                                            save_mobile_header();
                                        }
                                    );
                                    // $('#registrationForm')[0].reset();
                                    // $('.select2').val(null).trigger('change');
                                    $('.text-danger').remove();
                            }
                        }    
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Something went wrong. Please try again.',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('.text-danger').remove(); // Clear previous error messages
                            
                            $.each(errors, function(key, messages) {
                                let inputElement = $('[name="' + key + '"]');
                                let errorMessage = '<div class="text-danger">' + messages[0] + '</div>';
                                inputElement.closest('.form-group').append(errorMessage);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred during form submission.',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            }
        });
    });
</script>

@endsection
