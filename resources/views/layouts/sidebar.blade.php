@section('sidebar')
    <!-- Page Sidebar Start-->
    <div class="page-sidebar">
        <div class="main-header-left d-none d-lg-block">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="d-none d-lg-block blur-up lazyloaded logo"
                        src="{{asset('assets/images/icons/Logo Letras Blancas sin Fondo.png')}}" alt="">
                </a>
            </div>
        </div>
        <div class="sidebar custom-scrollbar">
            <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                    aria-hidden="true"></i></a>
            <div class="sidebar-user">
                <img class="img-60" src="{{asset('assets/images/avatar/administrador.png')}}" alt="#">
                <div>
                    <h6 class="f-14">ADMIN</h6>
                    <p>general manager.</p>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a class="sidebar-header" href="{{route('dashboard')}}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="sidebar-header" href="javascript:void(0)">
                        <i data-feather="box"></i>
                        <span>Productos</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>

                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('list-product')}}">
                                <i class="fa fa-circle"></i>
                                <span>Lista</span>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product-form', ['action' => 'create'])}}">
                                <i class="fa fa-circle"></i>
                                <span>Crear Producto</span>
                                <i class="fa fa-angle-right pull-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="sidebar-header" href="javascript:void(0)">
                        <i data-feather="user-plus"></i>
                        <span>Usuarios</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('list-user')}}">
                                <i class="fa fa-circle"></i>Lista
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user-form', ['action' => 'create'])}}">
                                <i class="fa fa-circle"></i>Crear usuario
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="sidebar-header" href="javascript:void(0)">
                        <i data-feather="users"></i>
                        <span>Tiendas</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('list-store')}}">
                                <i class="fa fa-circle"></i>Lista
                            </a>
                        </li>
                        <li>
                            <a href="{{route('store-form', ['action' => 'create'])}}">
                                <i class="fa fa-circle"></i>Crear tienda
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="sidebar-header" href="javascript:void(0)">
                        <i class="bi bi-bookmark"></i>
                        <span>Categorias</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{route('list-categories')}}">
                                <i class="fa fa-circle"></i>Lista
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="sidebar-header" href="javascript:void(0)"><i
                            data-feather="settings"></i><span>Configuración</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="profile.html"><i class="fa fa-circle"></i>Perfil
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Page Sidebar Ends-->

    <!-- Right sidebar Start-->
    <div class="right-sidebar" id="right_side_bar">
        <div>
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                    </div>
                    <div class="col-sm-4 text-end p-0">
                        <i class="me-2" data-feather="settings"></i>
                    </div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="search friend">
                <i class="fa fa-search"></i>
            </div>
            <div class="p-l-30 p-r-30 friend-list-name">
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/user.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/user1.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status">28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/user2.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status">2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/user5.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status">2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded"
                                    src="assets/images/dashboard/designer.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Right sidebar Ends-->
@endsection
