
@extends('layouts.crm')

@section('title', 'Доска клиентов')
@section('add_scripts')
    <script src="{{ asset("js/gijgo.min.js") }}"></script>
    <script src="{{ asset("js/call.js") }}"></script>
    <link rel="stylesheet" href="{{ asset("css/gijgo.min.css") }}">
@endsection

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

        <li class="nav-item ">
            <a class="nav-link active" href="{{ route('desk') }}">Доска</a>
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

    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

        <div class="card card-custom">

            <div class="card-header"><h3 class="search-header">Доска клиентов</h3>
                <div class="input-group" id="adv-search">

                    <input type="text" id="table_search" class="form-control" placeholder="Поиск по клиентам" />
                </div>
            </div>


            @isset($clients)
                <div class="card-body">
                    <table id="data_table" class="display table table-striped table-hover ">
                        <tbody>
                        @foreach ($clients as $client)
                            @if (Route::current()->parameter('id', null) == $client->id)
                                <tr class="active-tr">
                                    <td><a href="{{ route('desk', ['id' => $client->id]) }}">{{ $client->last_name }} {{ $client->first_name }} {{ $client->given_name }}</a></td>
                                    <td id="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>  Звонок</a></td>
                                    <td><a href="mailto:{{ $client->email }}"><i class="fa fa-envelope" aria-hidden="true"></i>  Письмо</a></td>
                                    <td>{{ $client->company }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td><a href="{{ route('desk', ['id' => $client->id]) }}">{{ $client->last_name }} {{ $client->first_name }} {{ $client->given_name }}</a></td>
                                    <td id="phone"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>  Звонок</a></td>
                                    <td><a href="mailto:{{ $client->email }}"><i class="fa fa-envelope" aria-hidden="true"></i>  Письмо</a></td>
                                    <td>{{ $client->company }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <script>
						$(document).ready(function(){
							$("#table_search").keyup(function(){
								_this = this;
								$.each($("#data_table tbody tr"), function() {
									if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
										$(this).hide();
									} else {
										$(this).show();
									}
								});
							});
						});
                    </script>
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
                            <button type="button" id="phone" class="btn btn-primary"><i class="fa fa-phone" aria-hidden="true"></i> Звонок</button>
                            <a href="mailto:{{ $client_side->email }}"><button type="button" class="btn btn-secondary"><i class="fa fa-envelope" aria-hidden="true"></i> Письмо</button></a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deskModal"> Забрать</button>
                        </div>
                    </div> <!-- Info Block end -->
                    <div class="modal fade" id="deskModal" tabindex="-1" role="dialog" aria-labelledby="deskModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id=" deskModalLabel">Клиент</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('client_take', ['id' => $client_side->id]) }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <p>Вы точно хотите забрать клиента на доску?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                            <button type="submit" class="btn btn-primary">Забрать</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
						('#deskModal').on('shown.bs.modal', function () {
							$('#myInput').focus()
						})
						$(function () {
							$('[data-toggle="tooltip"]').tooltip()
						})

						// Initialize popover component
						$(function () {
							$('[data-toggle="popover"]').popover()
						})
                    </script>
                    <hr />

                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                        <div class="block">
                            <h5>Последний комментарий </h5>
                            <p>{{ $client_side->last_comment }}</p>
                        </div> <!-- Last Comment end -->

                        @isset($nst_event)
                            <hr />
                            <div class="block">
                                <h5>Ближайшее событие </h5>
                                <p> <h3> {{ $nst_event->type }} </h3><h6>{{ $nst_event->date }}</h6>{{ $nst_event->address }}</p>
                            </div> <!-- Next Event end -->
                        @endisset
                        <hr />
                        </div> <!-- New Event end -->


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
                                {{-- <button type="button" class="btn btn-secondary">История событий</button>
                                    <button type="button" class="btn btn-secondary">История звонков</button>
                                    <hr />--}}
                                @foreach ($cl_events as $event)
                                    <div id="history-event">
                                        <h5>{{ $event->created_at }}</h5>
                                        <p>Создано событие "{{ $event->type }}" на {{ $event->date }}. Адрес: {{ $event->address }}</p>
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

