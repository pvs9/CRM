
@extends('layouts.crm')

@section('title', 'Профиль')

@section('add_scripts')
    <script src="{{ asset('js/Chart.bundle.js') }}"></script>
@endsection

@section('menu')
    <ul class="navbar-nav mr-auto">

        {{--  <li class="nav-item">
            <a class="nav-link" href="{{ route('import') }}">Файл</a>
        </li> --}}

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('events') }}">События <span class="sr-only"></span></a>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('desk') }}">Доска</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients') }}">Клиенты</a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="#">Маркетинг</a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('statistics') }}">Статистика</a>
        </li>

    </ul>
@endsection

@section('content')
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <div class="card card-custom">
            <h3 class="card-header">Ваши результаты</h3>



            <div class="card-body">
                <div>
                    {!! $statistic->render() !!}
                </div>
            </div> <!-- Card Body end -->
        </div> <!-- Card end -->
    </div> <!-- Column end -->

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card card-custom">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist" id="sideTab">

                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" >Информация</a>
                    </li>

                </ul>
            </div> <!-- Card Header end -->


            <div class="card-body tab-content" id="sideTabContent">

                <div class="info">
                    <h3> {{ Auth::user()->last_name }} {{ Auth::user()->first_name }} </h3>
                    <p> {{ Auth::user()->position }} </p>

                </div> <!-- Info Block end -->

                <hr />

                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                    <div class="block">
                        <h5>Показатели </h5>
                        <p><h3> 255 </h3> сделок закрыто </p>

                    </div> <!-- Last Comment end -->

                        <hr />


                        <div class="block">

                            @if (Auth::user()->is_admin == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Новый менеджер</button>
                            @endif
                            {{--<button type="button" class="btn btn-primary">Редактировать информацию</button> --}}
                            <a href="{{ route('logout') }}"><button type="button" class="btn btn-secondary">Выйти</button></a>
                        </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Новый менеджер</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('user_create') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="exampleInputName">Основное</label>
                                            <input class="form-control" name="last_name" id="exampleInputName2" aria-describedby="pnameHelp" placeholder="Фамилия">
                                            <br/>
                                            <input class="form-control" name="first_name" id="exampleInputName1" aria-describedby="pnameHelp" placeholder="Имя">
                                            <hr/>
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
                                            <small id="emailHelp" class="form-text text-muted">Основной Email, используемый в качестве логина.</small>
                                            <br/>
                                            <label for="exampleInputEmail1">Пароль</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Пароль" required>
                                            <hr/>
                                            <label for="exampleInputPhone1">Должность</label>
                                            <input name="position" class="form-control" id="exampleInputPhone1" aria-describedby="phoneHelp" placeholder="Должность">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- New Event end -->

            </div> <!-- General end -->
            </div> <!-- Tab Body end -->

        </div> <!-- Card end -->

    </div> <!-- Column end -->
    @endsection