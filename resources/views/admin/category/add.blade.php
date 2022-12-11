@extends('layouts.admin')

@section('content')
<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h4>Agregar categoría</h4>
            </div>
            <div class="card-body" style="overflow-x:scroll; width: 100%">
                <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Descripción</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection