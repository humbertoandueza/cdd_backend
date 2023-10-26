@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('store-forms')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        @if ($action == 'create')
                            <h3>Crear Tienda
                                <small>Alianza Admin panel</small>
                            </h3>
                        @else
                            <h3>Editar Tienda
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
                        <li class="breadcrumb-item">Tiendas </li>
                        @if ($action == 'create')
                            <li class="breadcrumb-item active">Crear tienda </li>
                        @else
                            <li class="breadcrumb-item active">Editar tienda </li>
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
                <div class="card tab2-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="account" role="tabpanel"
                                aria-labelledby="account-tab">
                                @if ($action == 'create')
                                    <form class="needs-validation user-add" method="POST" enctype="multipart/form-data"
                                        action="{{ route('store-store') }}">
                                    @else
                                        <form class="needs-validation user-add" method="POST" enctype="multipart/form-data"
                                            action="{{ route('update-store', ['id' => $store->id]) }}">
                                @endif
                                @csrf
                                <h4>Detalles de cuenta</h4>
                                {{-- <div class="card ">
                                        <div class="card-body">
                                            <form class="dropzone digits" id="singleFileUpload" action="/upload.php">
                                                <div class="dz-message needsclick">
                                                    <i class="fa fa-cloud-upload-alt"></i>
                                                    <h4 class="mb-0 f-w-600">Coloca aqui el banner de tu tienda.</h4>
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
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
                                            <img src="{{ asset('assets/images/storeProfile/' . $store->picture) }}"
                                                alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                        Nombre</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control"
                                            @if ($action != 'create') value="{{ $store->name }}" @endif
                                            name="name" id="validationCustom0" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span>
                                        Direccion</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control"
                                            @if ($action != 'create') value="{{ $store->address }}" @endif
                                            name="address" id="validationCustom2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span>
                                        Correo</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control"
                                            @if ($action != 'create') value="{{ $store->email }}" @endif
                                            name="email" id="validationCustom2" type="email" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span>
                                        Telefono</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control" name="phone"
                                            @if ($action != 'create') value="{{ $store->phone }}" @endif
                                            id="validationCustom3" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span>
                                        Latitud en mapa</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control" name="lat"
                                            @if ($action != 'create') value="{{ $store->lat }}" @endif
                                            id="validationCustom3" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span>
                                        Longitud en mapa</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control" name="lng"
                                            @if ($action != 'create') value="{{ $store->lng }}" @endif
                                            id="validationCustom3" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0"><span>*</span>
                                        Estado</label>
                                    <div class="col-xl-5 col-sm-4">
                                        <select class="form-control digits" id="exampleFormControlSelect1"
                                            name="status">
                                            <option value="ACTIVE" @if ($action != 'create' && $store->status == 'ACTIVE') selected @endif>
                                                ACTIVO</option>
                                            <option value="INACTIVE" @if ($action != 'create' && $store->status == 'INACTIVE') selected @endif>
                                                INACITVO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0"><span>*</span>
                                        Propietario</label>
                                    <div class="col-xl-5 col-sm-4">
                                        <select class="form-control digits" id="exampleFormControlSelect1"
                                            name="user_id">
                                            @foreach ($users as $user)
                                                <option @if ($action != 'create' && $store->user_id == $user->id) selected @endif
                                                    value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="pull-left">
                                    @if ($action == 'create')
                                        <button type="submit" class="btn btn-primary">Crear</button>
                                    @else
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    @endif
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
@endsection
