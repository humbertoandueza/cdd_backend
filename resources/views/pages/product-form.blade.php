@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('product-forms')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        @if ($action == 'create')
                            <h3>Crear Producto
                                <small>Alianza Admin panel</small>
                            </h3>
                        @else
                            <h3>Editar Producto
                                <small>Alianza Admin panel</small>
                            </h3>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        @if ($action == 'create')
                            <li class="breadcrumb-item active">Crear producto </li>
                        @else
                            <li class="breadcrumb-item active">Editar producto </li>
                        @endif
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row product-adding">
                            @if ($action == 'create')
                                <form class="needs-validation user-add" method="POST" enctype="multipart/form-data"
                                    action="{{ route('store-product') }}">
                                @else
                                    <form class="needs-validation user-add" method="POST" enctype="multipart/form-data"
                                        action="{{ route('update-product', ['id' => $product->id]) }}">
                            @endif
                            <div class="col-xl-7">
                                @csrf
                                <div class="col-12">
                                    <div class="panel">
                                        <div class="button_outer">
                                            <div class="btn_upload">
                                                <input type="file" id="upload_file" name="picture">
                                                @if ($action == 'create')
                                                    Subir imagen
                                                @else
                                                    Editar imagen
                                                @endif
                                            </div>
                                            <div class="processing_bar"></div>
                                            <div class="success_box"></div>
                                        </div>
                                    </div>
                                    <div class="error_msg"></div>
                                    @if ($action == 'create')
                                        <div class="uploaded_file_view" id="uploaded_view">
                                            <span class="file_remove">X</span>
                                        </div>
                                    @else
                                        <div class="uploaded_file_view show" id="uploaded_view">
                                            <span class="file_remove">X</span>
                                            <img src="{{ asset('assets/images/products/' . $product->photoUrl) }}"
                                                alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="form">
                                    <div class="form-group mb-3 row">
                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Nombre :</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control" name="name"
                                                @if ($action != 'create') value="{{ $product->name }}" @endif
                                                id="validationCustom01" type="text" required="">
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Marca :</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control" name="brand"
                                                @if ($action != 'create') value="{{ $product->brand }}" @endif
                                                id="validationCustom01" type="text" required="">
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="form-group mb-3 row">
                                        <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price :</label>
                                        <div class="col-xl-8 col-sm-7">
                                            <input class="form-control" name="price"
                                                @if ($action != 'create') value="{{ $product->price }}" @endif
                                                id="validationCustom02" type="text" required="">
                                        </div>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form">
                                    @if ($store)
                                        <input type="hidden" name="store_id" value="{{ $store }}">
                                    @else
                                        <div class="form-group row">
                                            <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Tienda
                                                :</label>
                                            <div class="col-xl-8 col-sm-7">
                                                <select class="form-control digits" id="exampleFormControlSelect1"
                                                    name="store_id">
                                                    @foreach ($stores as $store)
                                                        <option @if ($action != 'create' && $product->store_id == $store->id) selected @endif
                                                            value="{{ $store->id }}">{{ $store->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Estado
                                        :</label>
                                    <div class="col-xl-8 col-sm-7">
                                        <select class="form-control digits" id="exampleFormControlSelect1" name="status">
                                            <option value="ACTIVE" @if ($action != 'create' && $product->status == 'ACTIVE') selected @endif>
                                                ACTIVO</option>
                                            <option value="INACTIVE" @if ($action != 'create' && $product->status == 'INACTIVE') selected @endif>
                                                INACITVO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Categorias
                                        :</label>
                                    <div class="col-xl-8 col-sm-7">
                                        <select class="form-control digits" id="exampleFormControlSelect1"
                                            name="categories[]" multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if ($action != 'create')
                                    <div class="form-group row">
                                        <label for="">Categorias asociadas</label>
                                        <ul class="list-group border border-black">
                                            @forelse ($product->categories()->pluck('name') as $category_product)
                                                <li class="list-group-item"># {{ $category_product }}</li>
                                            @empty
                                                <li class="list-group-item">No hay categorias asociadas al producto
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif
                                <div class="mt-4">
                                    @if ($action == 'create')
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    @endif
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Container-fluid Ends-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script>
        var categories = JSON.parse('@json($categories)');

        console.log(categories);

        $(document).ready(function() {

            var count = 0;

            console.log(count);

            $('#agregar').click(function(e) {

                console.log('ready');

                count++;

                let select = $("<select class='form-select mb-2' name='categorias[]' id='categoria" +
                    count + "'></select>")
                let button = $("<i class='eliminar fs-5 my-2 bi bi-x-circle-fill'></i>");

                button.click(function(e) {

                    e.preventDefault();

                    $(this).next().remove()

                    $(this).remove()
                })

                for (let i = 0; i < categories.length; i++) {

                    select.append("<option value='" + categories[i].id + "'>" + categories[i].name +
                        "</option>");
                }

                $('#select-container').append(button);
                $('#select-container').append(select);
            });
        })
    </script>
@endsection
