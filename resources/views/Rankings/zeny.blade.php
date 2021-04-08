@extends('layout')

@section('title', 'Ranking de Zenys')
@section('description', 'Ranking de Zenys')

@section('content')

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">emoji_events</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">TOP <b>50</b> personagens mais ricos</h4>
            <div class="table-responsive tablecenter">
                <table class="table">
                    <thead class="text-primary">
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Clãn</th>
                    <th>Zenys</th>
                    </thead>
                    <tbody>
                    @foreach($rankingZeny as $data)
                        <tr>
                            <td>{{$n}}</td>
                            <td>{{$data->char_name}}</td>
                            <td>@if($data->guild_name){{$data->guild_name}}@else Sem clãn @endif</td>
                            <td class="text-primary">{{$data->zeny}}z</td>
                        </tr>
                        @php $n++; @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
