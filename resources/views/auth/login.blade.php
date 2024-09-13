<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marvel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/icon.png" />
</head>

<body>
    <div class="splash">
        <img src="{{ url('/') }}/assets/images/LeeyinGroup-md.png" alt="" width="400px">
    </div>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 login-half-bg d-flex flex-row " style="min-height: 200px">
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end iView">Copyright
                            &copy;
                            {{ date('Y') }} All rights reserved.</p>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="remobile">
                                <div class="mt-4 mb-4 login-group-icon text-center">
                                    <img src="{{ url('/') }}/assets/images/LeeyinGroup.png" style="width:50%">
                                    {{-- <h1 style="font-size: 70px">Lee Yin Group</h1> --}}
                                </div>
                                <h4>Welcome back!</h4>
                                <h6 class="font-weight-light">Happy to see you again!</h6>
                                <form class="pt-3" id="login-form">
                                    <div class="form-group">
                                        <label for="username">Email / Username</label>
                                        <div class="input-group i-form">
                                            <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                    <i class="mdi mdi-account-outline text-primary"
                                                        style="font-size:20px"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg border-left-0"
                                                id="username" name="username" placeholder="Email / Username">
                                        </div>
                                    </div>
                                    <div class="form-group i-form">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                    <i class="mdi mdi-lock-outline text-primary"
                                                        style="font-size:20px"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg border-left-0"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center i-form">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                Belum punya akun?
                                                <a href="#" class="auth-link text-black">Daftar </a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="my-2 align-items-center i-form">
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-block btn-rounded btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-2 d-flex">
                                    <button type="button" class="btn btn-facebook auth-form-btn flex-grow me-1">
                                        <i class="mdi mdi-facebook me-2"></i>Facebook
                                    </button>
                                    <button type="button" class="btn btn-google auth-form-btn flex-grow ms-1">
                                        <i class="mdi mdi-google me-2"></i>Google
                                    </button>
                                </div> --}}
                                    {{-- <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                                </div> --}}
                                </form>
                            </div>
                            <p class="font-weight-medium text-center flex-grow align-self-end iView2"
                                style="position: absolute; bottom: 10px">
                                Copyright
                                &copy;
                                {{ date('Y') }} All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ url('/') }}/assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ url('/') }}/assets/js/template.js"></script>
    <script src="{{ url('/') }}/assets/js/jquery.min.js"></script>
    <!-- endinject -->
</body>
<script src="{{ url('/') }}/assets/js/sweetalert2.min.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    $('#login-form').on("submit", function(e) {
        e.preventDefault()
        var username = $('#username').val();
        var password = $('#password').val();
        if (!username || !password) {
            return Toast.fire({
                icon: "warning",
                title: "Alert",
                text: "Fill the Username & Password first"
            });
        }

        $.ajax({
            url: "{{ url('/') }}/login",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                username: username,
                password: password,
            },
            success: function(data) {
                console.log(data)
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Login Success",
                    text: "Redirecting..",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    location.href = '{{ url('/') }}'
                });
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    title: JSON.parse(xhr.responseText).error
                });

            }
        });

    })
</script>

</html>
