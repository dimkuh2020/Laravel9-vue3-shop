@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Добавить продукт</h1>
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
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="title" placeholder="Наименование">                    
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="description" placeholder="Описание">                    
                </div>
                <div class="form-group">
                    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент"></textarea>                  
                </div>
                <div class="form-group">
                    <label>Цена</label>
                    <input class="form-control" type="number" name="price">                    
                </div>
                <div class="form-group">
                    <label>Количество на складе</label>
                    <input class="form-control" type="number" name="count">                    
                </div>
                <div class="form-group">                    
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Загрузка</span>
                      </div>
                    </div>
                  </div>
                <div class="form-group">                   
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                      <option selected="selected" disabled>Выберите категорию</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>                          
                      @endforeach                                        
                    </select>
                </div>
                <div class="form-group">                    
                    <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                      @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>                          
                      @endforeach                                         
                    </select>
                </div>
                <div class="form-group">                    
                    <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвет" style="width: 100%;">
                      @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{$color->title}}</option>                          
                      @endforeach                                           
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Добавить">                    
                </div>
            </form>
        </div>          
    </div>
</section>       
@endsection