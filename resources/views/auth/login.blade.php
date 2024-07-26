<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login &mdash; Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="header-logo-container">
            <div class="header-logo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
                <h1>INVENTARIS</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-3">
                        <h5 class="card-title mb-4">Login</h5>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" required autofocus>
                            <div class="invalid-feedback">
                                Username tidak boleh Kosong!
                            </div>
                        </div>
                        @error('username')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        <div class="invalid-feedback">
                            Password tidak boleh Kosong!
                        </div>
                        @error('password')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            Copyright &copy; 2024 &bull; By Kafe Kopi Kampung <br>
            Ambarukmo Yogyakarta
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        (function () {
            'use strict';

            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
</body>
</html>
