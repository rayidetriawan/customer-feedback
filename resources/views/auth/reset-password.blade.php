<!doctype html>
<html lang="en" data-topbar="light" data-sidebar-image="none">

<head>
    <meta charset="utf-8" />
    <title>Reset Password | Customer Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="http://velzon.laravel-default.themesbrand.com/assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/lenna.custom.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>


<div class="auth-page-wrapper auth-bg-cover py-4 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden">
        <div class="container">
            <div class="row pt-4">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="" class="d-block">
                                                {{-- <img src="./assets/img/mitrajaya.png" alt="" height="50"> --}}
                                                <img src="https://mactel.co.id/wp-content/uploads/2022/03/of_Logo2-840x480-Copy.png" alt="" height="50">
                                            </a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3 text-center">
                                                <!-- <i class="ri-double-quotes-l display-4 text-success"></i> -->
                                                {{-- <span class="text-success fs-20 fw-bold text-danger">
                                                    Mengapa Harus AHASS ?
                                                </span>  --}}
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                                                </div>
                                                <div class="carousel-inner text-center text-black pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">" 
                                                            Internet bagi pelanggan rumahan & SOHO "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" 
                                                            Internet khusus bagi lembaga pemerintahan "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" Internet khusus bagi pelanggan corporate "</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-5">
                                <div class="p-lg-5 p-5">
                                    <div class="mb-5 mt-2">
                                        <h4 class="text-primary fw-semibold">Tidak ingat password ?</h4>
                                        <p class="text-muted">Setel ulang password anda !</p>
                                    </div>
                                    
                                    <div class="mt-3 mb-3">
                                        <form action="{{ route('reset') }}" method="POST">
                                            @csrf
                                                <div class="alert border-0 alert-warning text-center mb-4" role="alert">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                        Masukkan email, Kami akan dikirimkan tautan reset kepada Anda!
                                                        </font>
                                                    </font>
                                                </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Email</label>
                                                <input type="email" class="form-control" autocomplete="off" id="email"
                                                    name="email" placeholder="Enter email" required>
                                            </div>     
                                            
        
                                            <div class="mt-4">
                                                <br>
                                                <button class="btn btn-primary w-100" type="submit">Kirim Tautan Reset</button>
                                                
                                            </div>
        
                                        </form>
                                    </div>

                                    <!-- <div class="mt-5 text-center text-muted">
                                        <p class="mb-0">Ahass Mitra Jaya Depok</p>
                                    </div> -->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Media Acces Telematika.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="http://velzon.laravel-default.themesbrand.com/assets/libs/particles.js/particles.js.min.js"></script>
<script src="http://velzon.laravel-default.themesbrand.com/assets/js/pages/particles.app.js"></script>
<script src="http://velzon.laravel-default.themesbrand.com/assets/js/pages/password-addon.init.js"></script>
@if (session('message'))
    <script>
        Toastify({
            text: "{{ session('message') }}",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #0ab39c, #2982aa)",
            },
            //onClick: function(){} // Callback after click
        }).showToast();
    </script>
@endif
@error('password')
    <script>
        Toastify({
            text: "Username atau Password Salah!",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #621219, #a40a0a)",
            },
            //onClick: function(){} // Callback after click
            }).showToast();
    </script>
@enderror
@error('username')
    <script>
        Toastify({
            text: "Username atau Password Salah!",
            duration: 3000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #621219, #a40a0a)",
            },
            //onClick: function(){} // Callback after click
            }).showToast();
    </script>
@enderror
<script type="text/javascript">
    $('#btnSubmit').click(function() {
        $(this).css('display', 'none');
        $('#loading').show();
        return true;
    });
</script>
</body>

</html>
