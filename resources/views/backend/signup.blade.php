@extends('backend.layouts.head')
@section('content')

<body class="app app-signup p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="{{url('/')}}"><img class="logo-icon me-2" src="{{url('backend/assets/images/app-logo.svg')}}" alt="logo" /></a>
                    </div>
                    <h2 class="auth-heading text-center mb-4">Sign up to Portal</h2>

                    <div class="auth-form-container text-start mx-auto">
                        <form class="auth-form auth-signup-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Name</label>
                                <input id="signup-name" name="signup-name" type="text" class="form-control signup-name" placeholder="Full name" required="required" />
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Your Email</label>
                                <input id="signup-email" name="signup-email" type="email" class="form-control signup-email" placeholder="Email" required="required" />
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signup-password">Password</label>
                                <input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="Create a password" required="required" />
                            </div>
                            <div class="extra mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="RememberPassword" />
                                    <label class="form-check-label" for="RememberPassword">
                      I agree to the
                      <a href="#" class="app-link">Terms of Service</a> and
                      <a href="#" class="app-link">Privacy Policy</a>.
                    </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">
                    Sign Up
                  </button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">
                            Already have an account?
                            <a class="text-link" href="{{url('/signup')}}">Log in</a>
                        </div>
                    </div>
                    <!--//auth-form-container-->
                </div>
                <!--//auth-body-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
    </div>
    <!--//row-->
</body>
@endsection
