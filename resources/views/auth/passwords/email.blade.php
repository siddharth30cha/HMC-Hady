<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="Description" content="Hady Mobile Phone" />
        <meta name="Author" content="Hady Mobile Phone" />
        <meta name="keywords" content="Hady Mobile Phone" />
        <title>Reset Password - Hady Mobile Phone</title>
        <link rel="icon" href="build/assets/images/brand-logos/favicon.ico" type="image/x-icon" />
        <link  id="style" href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend/css/app-fce3f544.css') }}" />
        <script src="{{ asset('backend/js/authentication-main.js') }}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card">
                        <div class="card-body p-5">
                            <p class="h5 fw-semibold mb-2 text-center">Reset Password</p>
                            <div class="row gy-3">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="col-xl-12">
                                        <label for="email" class="form-label text-default">Email Address</label>
                                        <input type="email" class="form-control form-control-lg mb-3" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    </div>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary"> Send Password Reset Link </button>
                                    </div>

                                    <div class="text-center">
                                        <p class="fs-12 text-muted mt-3"><a href="{{ route('login') }}" class="text-primary">Back to Login</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
