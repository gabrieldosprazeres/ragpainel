@extends('layout')

@section('title', 'Ranking do PVP')
@section('description', 'Ranking do PVP')

@section('content')

    <div class="card">
        <div class="card-header card-header-icon" data-background-color="purple">
            <i class="material-icons">emoji_events</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">TOP <b>50</b> melhores jogadores do PVP</h4>
            <div class="table-responsive tablecenter">
                <table class="table">
                    <thead class="text-primary">
                    <th>Posição</th>
                    <th>Clãn</th>
                    <th>Matou</th>
                    <th>Morreu</th>
                    <th>Pontos</th>
                    </thead>
                    <tbody>
                    @foreach($rankingPVP as $data)
                        <tr>
                            <td>{{$n}}</td>
                            <td>{{$data->char_name}}</td>
                            <td>{{$data->matou}}</td>
                            <td>{{$data->morreu}}</td>
                            <td class="text-primary">{{$data->total}}</td>
                        </tr>
                        @php $n++; @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
