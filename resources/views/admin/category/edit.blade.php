@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Editar/Actualizar categoría</h4>
                </div>
                <div class="card-body" style="overflow-x:scroll; width: 100%">
                    <form action="{{ url('update-category/'.$category -> id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" value="{{ $category -> name }}" class="form-control" name="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" value="{{ $category -> slug }}" class="form-control" name="slug">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" rows="3" class="form-control">{{ $category -> description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" {{ $category -> status == '1' ? 'checked':'' }} name="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Popular</label>
                                <input type="checkbox" {{ $category -> popular == '1' ? 'checked':'' }} name="popular">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" value="{{ $category -> meta_title }}" class="form-control" name="meta_title">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" rows="3" class="form-control">{{ $category -> meta_keywords }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control">{{ $category -> meta_descrip }}</textarea>
                            </div>
                            @if($category -> image)
                                <img src="{{ asset('assets/uploads/category/'.$category -> image) }}" alt="Imagen de categoría">
                            @endif
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection