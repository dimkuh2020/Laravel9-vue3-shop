@extends('admin.layouts.main')

@section('content')    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Теги</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('tags.create')}}" class="btn btn-primary">Добавить</a>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Наименование</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach ($tags as $tag)                                            
                                        <tr>
                                            <td>{{$tag->id}}</td>
                                            <td><a href="{{route('tags.show', $tag->id)}}">{{$tag->title}}</a></td>                                            
                                        </tr>                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
