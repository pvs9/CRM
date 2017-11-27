
@extends('layouts.empty')

@section('title', 'Вход')

@section('content')
    <div class="container signin">

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <h2 class="form-signin-heading">Вход в систему</h2>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
            <br/>
            <label for="inputPassword" class="sr-only">Пароль</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
            <hr/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
        </form>

    </div> <!-- /container -->
@endsection