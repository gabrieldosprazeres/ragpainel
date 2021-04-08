@extends('layout')

@section('title', 'Gerenciar Banimentos')
@section('description', 'Gerenciar Banimentos')

@section('content')

    @if($errors->any())

        <div class="row">
            <div class="col-md-12">

                <div class="alert alert-danger">
                            <span>

                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach</span>
                    </span>
                </div>

            </div>
        </div>

    @endif

    @if(Session::has('custom_alert'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                                <span>
                                {{ Session::get('custom_alert') }}
                                    @php
                                        Session::forget('custom_alert');
                                    @endphp
                                </span>
                </div>
            </div>
        </div>
    @endif

    @if(Session::has('custom_alert_success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                                <span>
                                {{ Session::get('custom_alert_success') }}
                                    @php
                                        Session::forget('custom_alert_success');
                                    @endphp
                                </span>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="red">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Adicionar Banimento</h4>
                        <form method="post" action="{{route('admin.managerban.add')}}">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" minlength="4" maxlength="10" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-fill btn-danger">Banir</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">person_remove</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Remover Banimento</h4>
                        <form method="post" action="{{route('admin.managerban.remove')}}">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" minlength="4" maxlength="10" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-fill btn-success">Remover</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Consultar Banimento</h4>
                        <form method="post" action="{{route('admin.managerban.find')}}">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" value="{{$findlogin}}" minlength="4" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Situação</label>
                                <input type="text" name="banfind" value="{{$findban}}" class="form-control" disabled required>
                            </div>
                            <button type="submit" class="btn btn-fill btn-info">Consultar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
