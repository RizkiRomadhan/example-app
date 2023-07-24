@extends('app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yinka Enoch Adedokun">
        <title>Login Page</title>
    </head>

    {{-- <body>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><span class="fa fa-android"></span></h2>
                    </span>
                    <img src="/img/HMTI.png" alt="HMTI">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Log In</h2>
                        </div>
                        <div class="row">
                            <form action="{{ route('login.store') }}" method="POST" class="form-group">
                                {{ csrf_field() }}
                                @method('POST')

                                <div class="row">
                                    <input type="text" name="email" id="email"
                                        class="form__input @error('email') is-invalid @enderror" placeholder="Email" />
                                    @error('email')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <!-- <span class="fa fa-lock"></span> -->
                                    <input type="password" name="password" id="password"
                                        class="form__input @error('email') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <select class="form__input form-select @error('jurusan') is-invalid @enderror"
                                        id="role" name="role">
                                        <option value="">Login Sebagai</option>
                                        <option value="admin">Admin</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="pembimbing">Pembimbing</option>
                                        <option value="penguji">Penguji</option>
                                        <option value="koordinator">Koordinator</option>
                                        <option value="laboran">Laboran</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-row">
                                    <input type="checkbox" name="remember_me" id="remember_me" class="" checked>
                                    <label for="remember_me">Remember Me!</label>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="container-fluid text-center footer">
            Copyright by <a href="https://bit.ly/yinkaenoch">Rizki Romadhan.</a></p>
        </div>
    </body> --}}

    <body>
        <div class="container py-5">
            <div class="w-50 center border rounded px-3 py-3 mx-auto">
                <div class="text-center">
                    <h1>Login</h1>
                </div>
                <form action="{{ route('login.store') }}" method="POST" class="form-group">
                    {{ csrf_field() }}
                    @method('POST')

                    <div class="row">
                        <input type="text" name="email" id="email"
                            class="form__input @error('email') is-invalid @enderror" placeholder="Email" />
                        @error('email')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- <span class="fa fa-lock"></span> -->
                        <input type="password" name="password" id="password"
                            class="form__input @error('email') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <select class="form__input form-select @error('jurusan') is-invalid @enderror" id="role"
                            name="role">
                            <option value="">Login Sebagai</option>
                            <option value="admin">Admin</option>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="pembimbing">Pembimbing</option>
                            <option value="penguji">Penguji</option>
                            <option value="koordinator">Koordinator</option>
                            <option value="laboran">Laboran</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row">
                        <input type="checkbox" name="remember_me" id="remember_me" class="" checked>
                        <label for="remember_me">Remember Me!</label>
                    </div>
                    <div class="row; text-center">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
@endsection

@push('styles')
    <style>
        .main-content {
            width: 50%;
            border-radius: 20px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
            margin: 5em auto;
            display: flex;
        }

        .company__info {
            background-color: #008080;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
        }

        .fa-android {
            font-size: 3em;
        }

        @media screen and (max-width: 640px) {
            .main-content {
                width: 90%;
            }

            .company__info {
                display: none;
            }

            .login_form {
                border-top-left-radius: 20px;
                border-bottom-left-radius: 20px;
            }
        }

        @media screen and (min-width: 642px) and (max-width:800px) {
            .main-content {
                width: 70%;
            }
        }

        .row>h2 {
            color: #008080;
        }

        .login_form {
            background-color: #fff;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            border-top: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }

        form {
            padding: 0 2em;
        }

        .form__input {
            width: 100%;
            border: 0px solid transparent;
            border-radius: 0;
            border-bottom: 1px solid #aaa;
            padding: 1em .5em .5em;
            padding-left: 2em;
            outline: none;
            margin: 1.5em auto;
            transition: all .5s ease;
        }

        .form__input:focus {
            border-bottom-color: #008080;
            box-shadow: 0 0 5px rgba(0, 80, 80, .4);
            border-radius: 4px;
        }

        .btn {
            transition: all .5s ease;
            width: 70%;
            border-radius: 30px;
            color: #008080;
            font-weight: 600;
            background-color: #fff;
            border: 1px solid #008080;
            margin-top: 1.5em;
            margin-bottom: 1em;
        }

        .btn:hover,
        .btn:focus {
            background-color: #2a06ad;
            color: #fff;
        }
    </style>
@endpush
