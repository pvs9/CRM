
@extends('layouts.crm')

@section('title', 'События')

@section('menu')
    <ul class="navbar-nav mr-auto">

        <li class="nav-item">
            <a class="nav-link" href="#">Файл</a>
        </li>

        <li class="nav-item ">
            <a class="nav-link active" href="{{ route('events') }}">События <span class="sr-only"></span></a>
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

            <div class="card-header"><h3 class="search-header">События</h3>
                <div class="input-group" id="adv-search">

                    <input type="text" class="form-control" placeholder="Поиск по событиям" />
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary">Поиск</button>
                        </div>
                    </div>
                </div>
            </div>

            @isset($events)
            <div class="card-body">
                <table class="table table-striped table-hover ">
                    <tbody>
                    @foreach ($events as $event)
                    <tr class="active-tr">
                        <td><a href="{{ route('events', ['id' => $event->client_id]) }}">{{ $event->last_name }} {{ $event->first_name }} {{ $event->given_name }}</a></td>
                        <td><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</a></td>
                        <td><a href="mailto:{{ $event->email }}"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</a></td>
                        <td><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $event->type }}, {{ $event->date }}</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- Card Body end -->
            @endisset
        </div> <!-- Card end -->
    </div> <!-- Column end -->

    @isset($client_side)
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="card card-custom">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist" id="sideTab">

                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true" >Основное</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" >Контакт</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false" >История</a>
                        </li>

                    </ul>
                </div> <!-- Card Header end -->


                <div class="card-body tab-content" id="sideTabContent">

                    <div class="info">
                        <h3> {{ $client_side->last_name }} {{ $client_side->first_name }} {{ $client_side->given_name }} </h3>
                        <p> {{ $client_side->position }} </p>
                        <p> {{ $client_side->company }} </p>
                        <div>
                            <button type="button" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</button>
                            <button type="button" class="btn btn-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</button>
                        </div>
                    </div> <!-- Info Block end -->

                    <hr />

                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                        <div class="block">
                            <h5>Последний комментарий </h5>
                            <p>{{ $client_side->last_comment }}</p>
                        </div> <!-- Last Comment end -->

                        <hr />
                        @isset($nst_event)
                            <div class="block">
                                <h5>Ближайшее событие </h5>
                                <p> <h3> {{ $nst_event->type }} </h3><h6>{{ $nst_event->date }}</h6>{{ $nst_event->address }}</p>

                                <form>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Добавить комментарий о событии</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-primary">Сохранить</button>
                                    <button type="button" class="btn btn-secondary">Перенести</button>
                                </form>
                            </div> <!-- Next Event end -->
                        @endisset
                        <hr />

                        <div class="block">
                            <h5>Новое событие</h5>

                            <form>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Выберите событие</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Предложение</option>
                                        <option>Письмо</option>
                                        <option>Звонок</option>
                                        <option>Встреча</option>
                                        <option>Договор</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="datepicker">Дата</label>
                                    <input id="datepicker"/>
                                </div>
                                <script>
									$('#datepicker').datepicker({
										uiLibrary: 'bootstrap4',
										iconsLibrary: 'fontawesome'
									});
                                </script>
                                <button type="button" class="btn btn-primary">Добавить</button>
                            </form>

                        </div> <!-- New Event end -->

                    </div> <!-- General end -->

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                        <div class="block">
                            <h5><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> {{ $client_side->telephone }}</a></h5>
                            <p>Основной мобильный <a class="text-muted" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                            <h5><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> {{ $client_side->telephone2 }}</a></h5>
                            <p>Дополнительный мобильный <a class="text-muted" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                            <h5><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> {{ $client_side->email }}</a></h5>
                            <p>Основная почта <a class="text-muted" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></p>
                        </div> <!-- Contact Data end -->

                        <!-- <button type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Добавть контакт</button> -->

                    </div> <!-- Contact end -->

                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        @isset($cl_events)
                            <div class="block">
                                <button type="button" class="btn btn-secondary">История событий</button>
                                <button type="button" class="btn btn-secondary">История звонков</button>
                                <hr />
                                @foreach ($cl_events as $cl_event)
                                    <div id="history-event">
                                        <h5>{{ $cl_event->created_at }}</h5>
                                        <p>Создано событие "{{ $cl_event->type }}" на {{ $cl_event->date }}. Адрес: {{ $cl_event->address }}</p>
                                        <hr />
                                    </div>
                                @endforeach
                            </div> <!-- Contact Data end -->
                        @endisset
                    </div> <!-- History end -->

                </div> <!-- Tab Body end -->

            </div> <!-- Card end -->

        </div> <!-- Column end -->
    @endisset
@endsection