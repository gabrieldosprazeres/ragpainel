@extends('layout')

@section('title', 'Ranking de MVPs')
@section('description', 'Ranking de MVPs')

@section('content')

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="{{$configs['color']}}">
            <i class="material-icons">emoji_events</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">TOP <b>50</b> melhores matadores de MVPs</h4>
            <div class="table-responsive tablecenter color-{{$configs['color']}}">
                <table class="table">
                    <thead class="text-primary">
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Clãn</th>
                    <th>Pontos</th>
                    </thead>
                    <tbody>
                    @foreach($rankingMVP as $data)
                        <tr>
                            <td>{{$n}}</td>
                            <td>{{$data->char_name}}</td>
                            <td>@if($data->guild_name){{$data->guild_name}}@else Sem clãn @endif</td>
                            <td class="text-primary">{{$data->mvps}}</td>
                        </tr>
                        @php $n++; @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
