<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign Up Form</title>
{{--    toast--}}
    <link href="{{ asset('plugin/toastr/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('src/register/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('src/register/css/style.css') }}">
</head>
<body>
<div class="main">
    <div class="container">
        <div class="signup-content">
            <div class="signup-desc">
                <div class="signup-desc-content">
                    <h2><span>Au</span>Creative</h2>
                    <p class="title">Sign up now to try undraw 30 days for free</p>
                    <p class="desc">
                        MIT licensed illustrations for every project you can imagine and create
                    </p>
                    <img src="{{ asset('src/register/images/signup-img.jpg') }}" alt="" class="signup-img">
                </div>
            </div>
            <div class="signup-form-conent">
                <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                    <h3></h3>
                    <fieldset>
                        <span class="step-current">Step 1 / 4</span>
                        <div class="row">
                            <div class="form-group" id="send_verification_code">
                                <input type="text" name="phonenumber" id="phonenumber" />
                                <label for="phone_number">Your Phone Number</label>
                                <button type="submit" class="mt-4 btn btn-info" id="send-verification-code"> Send Verification Code</button>
                            </div>
                            <div class="form-group" id="check_verification_code">
                                <input type="text" id="verificationcode">
                                <label for="verificationcode"> Verification Code</label>
                                <button type="submit" class="mt-4 btn btn-success" id="check-verification-code">Check Verification Code</button>
                            </div>
                        </div>
                        <div class="alert alert-success" id="verificationmessage">
                        </div>
                    </fieldset>
                    <h3></h3>
                    <fieldset>
                        <span class="step-current">Step 2 / 4</span>
                        <div class="form-group">
                            <input type="text" name="email" id="email" required/>
                            <label for="email">Your Email</label>
                        </div>
                    </fieldset>

                    <h3></h3>
                    <fieldset>
                        <span class="step-current">Step 3 / 4</span>
                        <div class="form-group">
                            <input type="text" name="your_password" id="your_password" required/>
                            <label for="your_password">Your Password</label>
                            <span toggle="#your_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                    </fieldset>

                    <h3></h3>
                    <fieldset>
                        <span class="step-current">Step 4 / 4</span>
                        <div class="form-group">
                            <input type="text" name="confirm_password" id="confirm_password" required/>
                            <label for="confirm_password">Confirm your password</label>
                            <span toggle="#confirm_password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('src/register/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('src/register/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('src/register/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
<script src="{{ asset('src/register/vendor/jquery-steps/jquery.steps.min.js') }}"></script>
<script src="{{ asset('plugin/toastr/src/jquery.toast.js') }}"></script>

<script src="{{ asset('src/register/js/main.js') }}"></script>

</body>

</html>
