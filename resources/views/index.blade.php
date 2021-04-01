@extends('layout')

@section('title', 'Início')
@section('description', 'Painel de Controle')

@section('content')

    <div class="row spacing">

        <div class="col-md-12 text-center">
            <button class="btn btn-success">
                <span class="btn-label">
                    <i class="material-icons">check</i>
                </span>Login Server
            </button>

                <button class="btn btn-success">
                    <span class="btn-label">
                        <i class="material-icons">check</i>
                    </span>Map Server
                </button>

                <button class="btn btn-success">
                        <span class="btn-label">
                            <i class="material-icons">check</i>
                        </span>Char Server
                </button>
        </div>

    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 spacing-top">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">supervisor_account</i>
            </div>
            <div class="card-content">
                <p class="category">Jogadores Online</p>
                <h3 class="card-title">12</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> atualizado a cada 5 minutos
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 spacing-top">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">account_box</i>
            </div>
            <div class="card-content">
                <p class="category">Total de Contas</p>
                <h3 class="card-title">12</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> atualizado em tempo real
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 spacing-top">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">group_add</i>
            </div>
            <div class="card-content">
                <p class="category">Total de Personagens</p>
                <h3 class="card-title">12</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> atualizado em tempo real
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 spacing-top">
        <div class="card card-stats">
            <div class="card-header" data-background-color="red">
                <i class="material-icons">group_add</i>
            </div>
            <div class="card-content">
                <p class="category">Total de Clãns</p>
                <h3 class="card-title">12</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> atualizado em tempo real
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header card-header-text" data-background-color="purple">
                <h4 class="card-title">TOP PVP</h4>
                <p class="category">Os 3 melhores jogadores do pvp.</p>
            </div>
            <div class="card-content table-responsive tablecenter">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Pontos</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_ouro.png')}}"></td>
                        <td>Dakota Rice</td>
                        <td>231</td>
                    </tr>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_prata.png')}}"></td>
                        <td>Minerva Hooper</td>
                        <td>112</td>
                    </tr>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_bronze.png')}}"></td>
                        <td>Sage Rodriguez</td>
                        <td>21</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header card-header-text" data-background-color="purple">
                <h4 class="card-title">TOP WOE</h4>
                <p class="category">Os 3 melhores jogadores da woe.</p>
            </div>
            <div class="card-content table-responsive tablecenter">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Pontos</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_ouro.png')}}"></td>
                        <td>Dakota Rice</td>
                        <td>231</td>
                    </tr>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_prata.png')}}"></td>
                        <td>Minerva Hooper</td>
                        <td>112</td>
                    </tr>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_bronze.png')}}"></td>
                        <td>Sage Rodriguez</td>
                        <td>21</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header card-header-text" data-background-color="purple">
                <h4 class="card-title">TOP MVP</h4>
                <p class="category">Os 3 melhores jogadores.</p>
            </div>
            <div class="card-content table-responsive tablecenter">
                <table class="table table-hover">
                    <thead class="text-warning">
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Pontos</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_ouro.png')}}"></td>
                        <td>Dakota Rice</td>
                        <td>231</td>
                    </tr>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_prata.png')}}"></td>
                        <td>Minerva Hooper</td>
                        <td>112</td>
                    </tr>
                    <tr>
                        <td><img src="{{asset('assets/img/top/trofeu_bronze.png')}}"></td>
                        <td>Sage Rodriguez</td>
                        <td>21</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
