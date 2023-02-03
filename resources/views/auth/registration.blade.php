@extends('layouts.auth')
@section('content')
    <section class="auth">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="auth__body">
                        <a href="/" class="logo">
                            Storage of <span class="blue">things</span>
                        </a>
                        <h2 class="auth__title">Регистрация</h2>
                        <p class="auth__help">Войдите для использования всех возможностей.</p>
                        <form action="/registration" method="post" class="auth__form form">
                            @csrf
                            <div class="form__field">
                                <label for="email" class="form__label" hidden>Email</label>
                                <input type="email" name="email" id="email" class="form__input" placeholder="Email">
                            </div>
                            <div class="form__field">
                                <label for="name" class="form__label" hidden>Username</label>
                                <input type="text" name="name" id="name" class="form__input" placeholder="Имя пользователя">
                            </div>
                            <div class="form__field">
                                <label for="password" class="form__label" hidden>Password</label>
                                <input type="password" name="password" id="password" class="form__input" placeholder="Пароль">
                            </div>
                            <div class="form__footer">
                                <button class="form__button button">Создать аккаунт</button>
                                <a href="/login" class="form__link">У меня уже есть аккаунт</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
