<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SiCepot 2.0 | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/login.css">

  
</head>

<body>


    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
                <h2>SICEPOT</h2>
            </div>

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                </div>
            @endif

            <form action="/login" method="post" style="max-width: 600px;">
                @csrf
                <div>
                    <label for="user-email" style="padding-top:10px">Enter your Email*</label>
                    <input type="email" name="email" class="form-content @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">

                    <div class="form-border"></div>

                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <br>
                <div>
                    <label for="user-password" style="padding-top:22px">Password*</label>
                    <input type="password" name="password" class="form-content" id="password" placeholder="Password"
                        required>

                    <div class="form-border"></div>
                </div>
                <input id="submit-btn" type="submit" name="submit" class="button button-primary" value="LOGIN">
                <br> <br>
                <label>Belum punya akun?<a href="/registrasi"> Daftar</a></label>
            </form>
        </div>
    </div>
</body>

</html>
