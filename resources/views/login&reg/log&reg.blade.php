<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>{{ $title }}</title>
</head>

<body>

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h5 class="h1 text-gray-900 mb-4 -mt-4">Sistem informasi monitoring peoyek</h5>
                                        @if (session()->has('pesan_buat_akun'))
                                            <div class="alert alert-success">{{ session('pesan_buat_akun') }}</div>
                                        @endif
                                        @if (session()->has('gagal_daftar'))
                                            <div class="alert alert-danger">{{ session('gagal_daftar') }}</div>
                                        @endif
                                        @if (session()->has('gagal_login'))
                                            <div class="alert alert-danger">{{ session('gagal_login') }}</div>
                                        @endif
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-user btn-block"
                                                data-toggle="modal" data-target="#exampleModal">
                                                Login
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-user btn-block"
                                                data-toggle="modal" data-target="#exampleModa">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="post" action="/auth/login">
                    @csrf
                    <div class="modal-body">
                        @error('email')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Email :
                                </span>
                            </div>
                            <input type="email" class="form-control @error('username') is-invalid @enderror"
                                placeholder="Email" name="email" id="email" value="{{ old('email') }}" required>
                        </div>
                        @error('password')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Password :
                                </span>
                            </div>
                            <input type="password" class="form-control @error('username') is-invalid @enderror"
                                placeholder="Password" name="password" id="password" value="{{ old('password') }}"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="exampleModa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="user" method="post" action="/auth">
                    @csrf
                    <div class="modal-body">
                        @error('name')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Name :
                                </span>
                            </div>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Name" name="name" id="name" value="{{ old('name') }}"
                                required>
                        </div>
                        @error('username')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Username :
                                </span>
                            </div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                placeholder="Username" name="username" id="username" value="{{ old('username') }}"
                                required>
                        </div>
                        @error('email')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Email :
                                </span>
                            </div>
                            <input type="email" class="form-control @error('username') is-invalid @enderror"
                                placeholder="Email" name="email" id="email" value="{{ old('email') }}"
                                required>
                        </div>
                        @error('password')
                            <span class="text-tiny+ text-danger">{{ $message }}</span>
                        @enderror
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Password :
                                </span>
                            </div>
                            <input type="password" class="form-control @error('username') is-invalid @enderror"
                                placeholder="Password" name="password" id="password" value="{{ old('password') }}"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
