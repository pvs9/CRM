
@extends('layouts.crm')

@section('title', 'Статистика')

@section('add_scripts')
    <script src="{{ asset('js/Chart.bundle.js') }}"></script>
@endsection

@section('menu')
    <ul class="navbar-nav mr-auto">

        @if (Auth::user()->user_group > 1)
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('file') }}">Файл</a>
        </li>
        @endif

        <li class="nav-item">
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
            <a class="nav-link active" href="{{ route('statistics') }}">Статистика</a>
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

            <div class="card-header"><h3 class="search-header">Статистика</h3>
            </div>


            <div class="card-body">

                <div class="graph">
                    {!! $statistic->render() !!}
                </div>
            </div> <!-- Card Body end -->
        </div> <!-- Card end -->
    </div> <!-- Column end -->
@endsection