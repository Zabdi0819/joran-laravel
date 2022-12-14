@extends('layouts.admin')

@section('content')
    <div class="py-3">
        <div class="container">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Editar producto</h4>
                </div>
                <div class="card-body" style="overflow-x:scroll; width: 100%">
                    <form action="{{ url('update-product/'.$products -> id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select name="cate_id" class="form-select" >
                                    <option value="">{{ $products -> category -> name}}</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nombre</label>
                                <input type="text" value="{{ $products -> name }}" class="form-control" name="name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" value="{{ $products -> slug }}" class="form-control" name="slug">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Pequeña descripción</label>
                                <textarea name="small_description" rows="3" class="form-control">{{ $products -> small_description }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Descripción</label>
                                <textarea name="description" rows="3" class="form-control">{{ $products -> description }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Precio original</label>
                                <input type="number" value="{{ $products -> original_price }}" class="form-control" name="original_price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Precio de venta</label>
                                <input type="number" value="{{ $products -> selling_price }}" class="form-control" name="selling_price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Impuesto</label>
                                <input type="number" value="{{ $products -> tax }}" class="form-control" name="tax">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Cantidad</label>
                                <input type="number" value="{{ $products -> qty }}" class="form-control" name="qty">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" {{ $products -> status == '1' ? 'checked':'' }}  name="status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Tendencia</label>
                                <input type="checkbox" {{ $products -> trending == '1' ? 'checked':'' }} name="trending">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" value="{{ $products -> meta_title }}" class="form-control" name="meta_title">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" rows="3" class="form-control">{{ $products -> meta_keywords }}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" rows="3" class="form-control">{{ $products -> meta_description }}</textarea>
                            </div>
                            @if($products -> image)
                                <img src="{{ asset('assets/uploads/product/'.$products -> image) }}" style="width: 150px; height: 110px" alt="Imagen de categoría">
                            @endif
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image">
                            </div>
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