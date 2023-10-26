@extends('layouts.main')
@include('layouts.sidebar')
@include('layouts.navbar')

@section('user-forms')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        @if ($action == 'create')
                            <h3>Crear usuario
                                <small>Alianza Admin panel</small>
                            </h3>
                        @else
                            <h3>Editar usuario
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
                        <li class="breadcrumb-item">Usuarios </li>
                        @if ($action == 'create')
                            <li class="breadcrumb-item active">Crear usuario </li>
                        @else
                            <li class="breadcrumb-item active">Editar usuario </li>
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
                                    Subir imagen
                                    <form class="needs-validation user-add" method="POST" enctype="multipart/form-data"
                                        action="{{ route('store-user') }}">
                                    @else
                                        <form class="needs-validation user-add" method="POST" enctype="multipart/form-data"
                                            action="{{ route('update-user', ['id' => $user->id]) }}">
                                @endif
                                @csrf
                                <h4>Detalles de cuenta</h4>
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
                                            <img src="{{ asset('assets/images/avatar/' . $user->picture) }}" alt="">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                        Nombre</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control"
                                            @if ($action != 'create') value="{{ $user->name }}" @endif
                                            name="name" id="validationCustom0" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom2" class="col-xl-3 col-md-4"><span>*</span>
                                        Correo</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control"
                                            @if ($action != 'create') value="{{ $user->email }}" @endif
                                            name="email" id="validationCustom2" type="email" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom3" class="col-xl-3 col-md-4"><span>*</span>
                                        Contraseña</label>
                                    <div class="col-xl-5 col-md-4">
                                        <input class="form-control" name="password" id="validationCustom3" type="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0"><span>*</span>
                                        Estado</label>
                                    <div class="col-xl-5 col-sm-4">
                                        <select class="form-control digits" id="exampleFormControlSelect1" name="status">
                                            <option value="ACTIVE" @if ($action != 'create' && $user->status == 'ACTIVE') selected @endif>ACTIVO
                                            </option>
                                            <option value="INACTIVE" @if ($action != 'create' && $user->status == 'INACTIVE') selected @endif>
                                                INACITVO</option>
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
