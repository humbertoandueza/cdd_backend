@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('product-lists')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Lista de productos
                            <small>Alianza Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Productos</li>
                        <li class="breadcrumb-item active">Lista de productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form class="" method="GET" action="{{ route('list-product') }}">
            <div class="row">
                <div class="col-2">
                    <label for="status" class="form-label m-0">Buscar por:</label>
                    <select class="form-select" name="searchBy" aria-label="Default select example">
                        <option value="name">Nombre</option>
                        <option value="store">Tienda</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="status" class="form-label m-0">Estado</label>
                    <select class="form-select" name="filter" aria-label="Default select example">
                        <option value="ACTIVE">ACTIVO</option>
                        <option value="INACITVE">INACTIVO</option>
                    </select>
                </div>
                <div class="col-5">
                    <div class="input-group search">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control search-input" value="{{ $search }}" name="search"
                            placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-secondary mt-3">Filtrar</button>
                </div>
            </div>

        </form>
        @if (session('success'))
            <div class="bg-success p-2 mt-2">{{ session('success') }}</div>
        @endif
        <div class="row products-admin ratio_asos">
            @forelse ($products as $product)
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="javascript:void(0)"><img
                                            src="{{ asset('assets/images/products/' . $product->photoUrl) }}"
                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    <div class="product-hover">
                                        <ul>
                                            <li>
                                                <a
                                                    href="{{ route('product-form', ['action' => 'edit', 'id' => $product->id]) }}"><i
                                                        class="bi bi-pencil-square"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ route('delete-product', ['id' => $product->id]) }}"><i
                                                        class="bi bi-trash3"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail">
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                <a href="javascript:void(0)">
                                    <h6>{{ $product->name }}</h6>
                                </a>
                                <a href="javascript:void(0)">
                                    <h6><strong>Marca
                                        </strong> {{ $product->brand }}</h6>
                                </a>
                                <h4>{{ $product->price }} USD</h4>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <h3>No hay productos</h3>
            @endforelse
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
