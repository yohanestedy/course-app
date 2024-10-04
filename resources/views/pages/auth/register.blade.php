@extends('layouts.auth', ['title' => 'Register'])

@section('cssLibraries')
    <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">
@endsection

@section('mainContent')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="../assets/img/stisla-fill.svg" alt="logo" width="100"
                            class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength"
                                            data-indicator="pwindicator" name="password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control"
                                            name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('jsLibraries')
    <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

    <script src="../assets/js/page/auth-register.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session()->has('success'))
            swal('Success', '{{ session('success') }}', 'success');
        @elseif (session()->has('error'))
            swal('Error', '{{ session('error') }}', 'error');
        @elseif (session()->has('register'))

            Swal.fire({
                title: "Selamat",
                icon: "success",
                text: '{{ session('register') }}',
                showCloseButton: true,
                showCancelButton: false,
                confirmButtonText: `<i class="fas fa-sign-in-alt"></i> Login`,
            }).then((result) => {
                if (result.isConfirmed) { // Memeriksa apakah tombol 'Login' diklik
                    window.location.href = '{{ route('login') }}'; // Redirect ke route login
                }
            });
        @endif
    </script>
@endsection
