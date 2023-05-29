@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить Тег</h1>
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
            <form action="{{route('tags.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="title" placeholder="Наименование">                    
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Добавить">                    
                </div>
            </form>
        </div>          
    </div>
</section>       
@endsection