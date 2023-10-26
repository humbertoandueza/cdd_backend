@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('store-detail')
    <div class="vendor-cover">
        <div>
            <img src="{{ asset('assets/images/banners/header-19.png') }}" alt=""
                class="bg-img w-100 lazyload blur-up" />
        </div>
    </div>
    <!-- vendor cover end -->

    <!-- section start -->
    <section class="vendor-profile pt-0">
        <div class="container">
            <div class="row">
                <div class="col-2 profile-image">
                    <div>
                        <img src="{{ asset('assets/images/storeProfile/' . $store->picture) }}" alt=""
                            class="img-store" />
                        <h3 class="text-center mt-2">{{ $store->name }}</h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h6>750 followers | 10 review</h6>
                    </div>
                </div>
                <div class="col-8 profile-detail d-flex align-items-center">
                    <div>
                        <p>
                            Based in United States, Totto store has been an Multikart
                            member since May 15, 2017. Totto Store are engaged in all
                            kinds of western clothing. In garment field we have maintained
                            3 years exporting experience. company insist in the principle
                            of "Customer first, Quality uppermost".Based in United States,
                            Totto store has been an
                        </p>
                    </div>
                </div>
                <div class="col-2 vendor-contact">
                    <div>
                        <h6>Siguenos:</h6>
                        <div class="footer-social vendor">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <h6>Si tienes cualquier peticion:</h6>
                        <a href="#" class="btn btn-solid btn-sm">Contactanos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

    <!-- collection section start -->
    <section class="section-b-space">
        <div class="container">
            <form class="" method="GET" action="{{ route('detail-store', ['id' => $store->id]) }}">
                <div class="row">
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
                            <input type="text" class="form-control search-input" value="{{ $search }}"
                                name="search" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-secondary mt-3">Filtrar</button>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('product-form', ['action' => 'create', 'store' => $store->id]) }}"
                            class="btn btn-primary mt-3">Añadir producto</a>
                    </div>
                </div>
                @if (session('success'))
                    <div class="bg-success p-2 mt-2">{{ session('success') }}</div>
                @endif
            </form>
            <div class="row">
                <div class="col">
                    <div class="collection-wrapper">
                        <div class="collection-content ratio_asos">
                            <div class="page-main-content">
                                <div class="collection-product-wrapper">
                                    <div class="row products-admin ratio_asos">
                                        @forelse ($products as $product)
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="card">
                                                    <div class="card-body product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="javascript:void(0)"><img
                                                                        src="{{ asset('assets/images/products/' . $product->photoUrl) }}"
                                                                        class="img-fluid blur-up lazyload bg-img"
                                                                        alt=""></a>
                                                                <div class="product-hover">
                                                                    <ul>
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('product-form', ['action' => 'edit', 'id' => $product->id, 'store' => $store->id]) }}"><i
                                                                                    class="bi bi-pencil-square"></i></a>
                                                                        </li>
                                                                        <li>
                                                                            <a
                                                                                href="{{ route('delete-product', ['id' => $product->id]) }}"><i
                                                                                    class="bi bi-trash3"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="rating"><i class="fa fa-star"></i> <i
                                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                                    class="fa fa-star"></i> <i class="fa fa-star"></i></div>
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
                                    <div class="product-pagination mb-0">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#"
                                                                    aria-label="Previous"><span aria-hidden="true"><i
                                                                            class="fa fa-chevron-left"
                                                                            aria-hidden="true"></i></span>
                                                                    <span class="sr-only">Previous</span></a>
                                                            </li>
                                                            <li class="page-item active">
                                                                <a class="page-link" href="#">1</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#">2</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#">3</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#"
                                                                    aria-label="Next"><span aria-hidden="true"><i
                                                                            class="fa fa-chevron-right"
                                                                            aria-hidden="true"></i></span>
                                                                    <span class="sr-only">Next</span></a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <div class="product-search-count-bottom">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- collection section end -->
@endsection
