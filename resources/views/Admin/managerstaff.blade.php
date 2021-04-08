@extends('layout')

@section('title', 'Gerenciar Equipe')
@section('description', 'Gerenciar Equipe')

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
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Adicionar membro a equipe</h4>
                        <form method="post" action="{{route('admin.managerstaff.add')}}">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" minlength="4" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Cargo</label>
                                        <select name="staffadd" class="selectpicker" data-style="btn btn-success btn-round" title="Selecione o Cargo" data-size="7" required>
                                            <option value="1">Administrador</option>
                                            <option value="2">Game Master</option>
                                            <option value="3">Comunnity Manager</option>
                                        </select>
                            </div>
                            <button type="submit" class="btn btn-fill btn-success">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="red">
                        <i class="material-icons">person_remove</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Remover membro da equipe</h4>
                        <form method="post" action="{{route('admin.managerstaff.remove')}}">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" minlength="4" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Cargo</label>
                                <div class="form-group label-floating">
                                    <label class="control-label">Cargo</label>
                                    <select name="staffremove" class="selectpicker" data-style="btn btn-danger btn-round" title="Selecione o Cargo" data-size="7" required>
                                        <option value="1">Administrador</option>
                                        <option value="2">Game Master</option>
                                        <option value="3">Comunnity Manager</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill btn-danger">Remover</button>
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
                        <h4 class="card-title">Procurar membro da equipe</h4>
                        <form method="post" action="{{route('admin.managerstaff.find')}}">
                            @csrf
                            <div class="form-group label-floating">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" value="{{$findlogin}}" minlength="4" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Cargo</label>
                                <select name="stafffind" class="selectpicker" data-style="btn btn-info btn-round" title="{{$findstaff}}" data-size="7" disabled></select>
                            </div>
                            <button type="submit" class="btn btn-fill btn-info">Consultar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
