@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Agregar producto</h4>
                </div>
                <div class="card-body" style="overflow-x:scroll; width: 100%">
                    <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select name="cate_id" class="form-select" >
                                    <option value="">Selecciona una categoría</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Pequeña descripción</label>
                                <textarea name="small_description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Precio original</label>
                                <input type="number" class="form-control" name="original_price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Precio de venta</label>
                                <input type="number" class="form-control" name="selling_price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Impuesto</label>
                                <input type="number" class="form-control" name="tax">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" name="qty">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Tendencia</label>
                                <input type="checkbox" name="trending">
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