@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактировать категорию</h1>
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
            <form action="{{route('categories.update', $category->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input class="form-control" type="text" name="title" value="{{$category->title}}" placeholder="{{$category->title}}">                    
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Редактировать">                    
                </div>
            </form>       
        </div>          
    </div>
</section>       
@endsection