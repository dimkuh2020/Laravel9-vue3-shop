@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Тег</h1>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary">Редактировать</a>
                            </div>
                            <form action="{{route('tags.destroy', $tag->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">                               
                                <tbody >                                                                          
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$tag->id}}</td>                                            
                                    </tr>
                                    <tr>
                                        <td>Наименование</td>
                                        <td>{{$tag->title}}</td>                                            
                                    </tr>                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>      
@endsection