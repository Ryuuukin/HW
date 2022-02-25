@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Личный кабинет абитуриента</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Ваши заполненные данные:
                    @foreach($data as $el)
                    <div class="alert alert-info">
                        <p>Фамилия: {{ $el -> surname }}</p>
                        <p>Имя: {{ $el -> name }}</p>
                        <p>Отчество: {{ $el -> midname }}</p>
                        <p>Паспортные данные: {{ $el -> passportdata }}</p>
                        <p>Email: {{ $el -> email }}</p>
                        <a href="{{ route('home-update') }}"><button class="btn btn-primary">Редактировать</button></a>


                    </div>


                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
