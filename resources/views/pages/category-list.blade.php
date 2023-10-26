@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('category-lists')
    <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#Create">
        Crear una categoria
    </button>

    @if (session('success'))
        <div class="bg-success p-2 mt-2">{{ session('success') }}</div>
    @endif

    <div class="accordion mt-2" id="accordionExample">
        @forelse ($categories as $category)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#{{ $category->name }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $category->name }}
                        <a href="{{route('delete-category', ['id' => $category->id])}}" class="ms-3"><i class="bi bi-trash-fill"></i></a>
                    </button>
                </h2>
                <div id="{{ $category->name }}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="mt-2">
                            @forelse ($category->products()->pluck('name', 'id') as $id => $product)
                                <div class="flex">
                                    <li class="fs-5">° {{ $product }}</li>
                                    <a href="{{ route('remove-product-category', ['product' => $id, 'category' => $category->id]) }}"
                                        class="fs-4 ms-1"><i class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <br>
                            @empty
                                <h3>No hay productos en esta categoria</h3>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="{{ $category->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="CreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="CreateLabel">Editar categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-category') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                Nombre</label>
                            <div class="col-xl-5 col-md-4">
                                <input class="form-control rounded" name="name" id="validationCustom0" type="text"
                                    required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        @empty
        No hay categorias
        @endforelse
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="CreateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="CreateLabel">Crear una categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-category') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group row">
                            <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                Nombre</label>
                            <div class="col-xl-5 col-md-4">
                                <input class="form-control rounded" name="name" id="validationCustom0" type="text"
                                    required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
