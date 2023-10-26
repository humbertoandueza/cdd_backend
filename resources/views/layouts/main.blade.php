@extends('index')
@section('content')

<div class="page-wrapper">
    @yield('navbar')

    <div class="page-body-wrapper">
        @yield('sidebar')

        <div class="page-body">
            @yield('dashboard')
            @yield('product-lists')
            @yield('product-forms')
            @yield('user-lists')
            @yield('user-forms')
            @yield('store-lists')
            @yield('store-forms')
            @yield('store-detail')
            @yield('category-lists')
        </div>
    </div>
</div>

@endsection
