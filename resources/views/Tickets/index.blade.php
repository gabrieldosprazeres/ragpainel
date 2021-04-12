@extends('layout')

@section('title', 'Enviar Ticket')
@section('description', 'Enviar Ticket')

@section('content')

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Enviar Ticket</h4>
                        <form method="post" action="{{route('tickets.send')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Título</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-3">
                                    <select class="selectpicker" name="category" data-style="btn btn-primary btn-round" title="Selecione a Categoria" data-size="7">
                                        @foreach($categorys as $category)
                                        <option value="{{$category->name}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <textarea name="body" class="form-control bodyfield"></textarea>

                            <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector:'textarea.bodyfield',
            height:500,
            menubar:false,
            plugins:['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css:[
                '{{asset('assets/css/content.css')}}'
            ],
            images_upload_url:'{{route('imageupload')}}',
            images_upload_credentials:true,
            convert_urls:false
        });
    </script>

@endsection
