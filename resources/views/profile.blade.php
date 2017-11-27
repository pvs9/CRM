
@extends('layouts.crm')

@section('title', 'Профиль')

@section('menu')
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="#">Файл</a>
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
            <h3 class="card-header">Ваши результаты</h3>



            <div class="card-body">
                <div class="graph">
                    Это блок с графиком
                </div>
                <div class="graph">
                    Это блок с графиком
                </div>
                <div class="graph">
                    Это блок с графиком
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

                        <p><h3> 160 </h3> минут звонков </p>
                    </div> <!-- Last Comment end -->

                    <hr />


                    <div class="block">


                        <button type="button" class="btn btn-primary">Редактировать информацию</button>
                        <button type="button" class="btn btn-secondary">Выйти</button>


                    </div> <!-- New Event end -->

                </div> <!-- General end -->





            </div> <!-- Tab Body end -->

        </div> <!-- Card end -->

    </div> <!-- Column end -->
@endsection