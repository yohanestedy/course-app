@extends('layouts.auth', ['title' => 'Login'])

@section('mainContent')
    <style>
        .colored-toast.swal2-icon-success {
            background-color: #a5dc86 !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast.swal2-icon-warning {
            background-color: #f8bb86 !important;
        }

        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-question {
            background-color: #87adbd !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                    <div class="login-brand">
                        <img src="../assets/img/stisla-fill.svg" alt="logo" width="100"
                            class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">
                            <form id="form" method="POST" action="{{ route('login.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @if (session('error')) is-invalid @endif @error('email')
                                            is-invalid
                                        @enderror "
                                        name="email" tabindex="1" value="{{ old('email') }}">
                                    <div class="invalid-feedback">

                                        @error('email')
                                            Please fill in your email
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password"
                                        class="form-control @if (session('error')) is-invalid @endif @error('password')
                                            is-invalid
                                        @enderror "
                                        name="password" tabindex="2" value="{{ old('password') }}">
                                    <div class="invalid-feedback">
                                        @if (session('error'))
                                            {{ session('error') }}
                                        @endif
                                        @error('password')
                                            Please fill in your password
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                            id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-block"
                                        tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="register">Create One</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session()->has('success'))
            swal('Success', '{{ session('success') }}', 'success');
        @elseif (session()->has('error'))
            swal('Error', '{{ session('error') }}', 'error');
        @elseif (session()->has('logout'))

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            })

            ;
            (async () => {
                await Toast.fire({
                    icon: 'info',
                    title: '{{ session('logout') }}',
                })
            })()
        @endif
    </script>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah submit default agar kita bisa menambahkan efek loading

            // Tambahkan kelas 'btn-progress' ke tombol
            this.classList.add('btn-progress');

            // Nonaktifkan tombol saat loading
            this.disabled = true;

            // Setelah efek loading, lanjutkan dengan submit form
            setTimeout(() => {
                // Kirim form secara manual setelah animasi loading selesai
                document.getElementById('form').submit();
            }, 500); // Sesuaikan durasi loading (1 detik di sini)
        });
    </script>
@endsection
