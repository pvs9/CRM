
@extends('layouts.crm')

@section('title', 'Импорт Базы')

@section('menu')
    <ul class="navbar-nav mr-auto">

        @if (Auth::user()->user_group > 1)
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('file') }}">Файл</a>
        </li>
        @endif

        <li class="nav-item ">
            <a class="nav-link" href="{{ route('events') }}">События <span class="sr-only"></span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('clients') }}">Клиенты</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">Маркетинг</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('statistics') }}">Статистика</a>
        </li>

    </ul>
@endsection

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
                                    @if(Session::has('error'))
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

    @isset($fields)
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <div class="card card-custom">
            <div class="card-header"><h3 class="search-header">Настройка полей</h3></div>
            <div class="card-body">

                <div class="row">
                    <div class="col">
                        <h4>Поля системы</h4>
                        <div class="field-block autoblock">Фамилия</div>
                        <div class="field-block autoblock">Имя</div>
                        <div class="field-block autoblock">Отчество</div>
                        <div class="field-block autoblock">Компания</div>
                        <div class="field-block autoblock">Должность</div>
                        <div class="field-block autoblock">E-mail</div>
                        <div class="field-block autoblock">Телефон</div>
                        <div class="field-block autoblock">Дополонительный телефон</div>
                        <div class="field-block autoblock">Комментарий</div>
                    </div>
                    <div class="col">
                        <h4>Поля файла</h4>
                        <div id="dragfields">
                            <form method="POST" action="{{ route('excel_import') }}">
                            {{ csrf_field() }}

                        @foreach($fields as $key=>$value)
                            <div id="dragitem" class="field-block" draggable="true">
                                <input type="hidden" name="fields[]" value="{{ $value }}">
                                {{ $value }}
                            </div>
                                <input type="hidden" name="path" value="{{ $path }}">
                        @endforeach
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Импорт</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- Card Body end -->
        </div> <!-- Card end -->
    </div> <!-- Column end -->
    @endisset

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        <div class="card card-custom">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist" id="sideTab">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" >Загружка файла</a>
                    </li>
                </ul>
            </div> <!-- Card Header end -->


            <div class="card-body tab-content" id="sideTabContent">

                <div class="block">
                    <h5>Выберите файл</h5>


                    <form method="POST" action="{{ route('excel_fields') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="excel" type="file" style="margin-bottom: 20px;">

                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </form>
                </div> <!-- Next Event end -->
                <hr />
            </div> <!-- General end -->
        </div> <!-- Tab Body end -->
    </div> <!-- Card end -->
    </div> <!-- Column end -->
    <script src="{{ asset('js/drag.js') }}"></script>
@endsection