<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SiCepot 2.0 | Registrasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/registrasi.css">


</head>

<body>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>DAFTAR AKUN</h2>
                <div class="underline-title"></div>
                <h3>SICEPOT</h3>
            </div>

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
            </div>
            @endif

            <form action="/create" method="POST" style="max-width: 600px;">
                @csrf
                <div>
                    <label for="user-password" style="padding-top:20px">Username</label>
                    <input type="text" name="name" class="form-content" id="name" placeholder="Masukkan username"
                        required>

                    <div class="form-border"></div>
                </div>
                <br>
                <div>
                    <label for="user-email" style="padding-top:13px">Email</label> <br>
                    <input type="email" name="email" class="form-content @error('email') is-invalid @enderror"
                        id="email" placeholder="name@email.com" autofocus required value="{{ old('email') }}">
                    <div class="form-border"></div>

                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <br>

                <div>
                    <label for="user-password" style="padding-top:22px">Password</label>
                    <input type="password" name="password" class="form-content" id="password" placeholder="Password min 6 karakter"
                        required>

                    <div class="form-border"></div>
                </div>
                
                <a href="{{ route('login') }}">Kembali  </a>
                <input id="submit-btn" type="submit" name="submit" class="button button-primary" value="SIGN IN">
                <br>
            </form>
        </div>
    </div>
      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>
