
@extends('layouts.crm')

@section('title', 'Импорт Базы')

@section('menu')
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('import') }}">Файл</a>
        </li>

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
            <a class="nav-link" href="#">Статистика</a>
        </li>

    </ul>
@endsection

@section('content')
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <div class="card card-custom">

            <div class="card-header"><h3 class="search-header">Настройка полей</h3>

            </div>




            <div class="card-body">

                <div class="row">
                    <div class="col">

                        <h4>Поля системы</h4>

                        <div class="field-block autoblock">Имя</div>
                        <div class="field-block autoblock">Фамилия</div>
                        <div class="field-block autoblock">Компания</div>
                        <div class="field-block autoblock">Жопа</div>

                    </div>

                    <div class="col">

                        <h4>Поля файла</h4>

                        <div id="dragfields">
                            <div id="dragitem" class="field-block" draggable="true">Кликуха</div>
                            <div id="dragitem" class="field-block" draggable="true">По Батьке</div>
                            <div id="dragitem" class="field-block" draggable="true">Банда</div>
                            <div id="dragitem"class="field-block" draggable="true">Зад</div>
                        </div>

                    </div>
                </div>

            </div> <!-- Card Body end -->
        </div> <!-- Card end -->
    </div> <!-- Column end -->

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


                    <form method="POST" action="{{ route('excel_load') }}" enctype="multipart/form-data">
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