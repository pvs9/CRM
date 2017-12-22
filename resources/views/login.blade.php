
@extends('layouts.empty')

@section('title', 'Вход')

@section('content')
    @if ((count($errors) > 0) || (Session::has('error')))
            <div class="modal" id="errorModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ошибка</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    @if (Session::has('error'))
                                        <li>{{ Session::get('error') }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
    			$('#errorModal').modal('show');
            </script>
    @endif
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