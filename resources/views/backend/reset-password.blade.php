@extends('backend.layouts.head')
@section('content')

<body class="app app-reset-password p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{url('backend/assets/images/app-logo.svg')}}" alt="logo"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-4">Password Reset</h2>
                    <div class="auth-intro mb-4 text-center">Enter your email address below. We'll email you a link to a page where you can easily create a new password.</div>

                    <div class="auth-form-container text-left">
                        <form class="auth-form resetpass-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="reg-email">Your Email</label>
                                <input id="reg-email" name="reg-email" type="email" class="form-control login-email" placeholder="Your Email" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Reset Password</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5"><a class="app-link" href="login.html">Log in</a> <span class="px-2">|</span> <a class="app-link" href="login.html">Sign up</a></div>
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
