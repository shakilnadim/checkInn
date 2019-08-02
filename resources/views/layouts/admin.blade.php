@extends('layouts.app')

@section('content')

    @include('inc.leftNav')

    <section id="dashboard-content" class="mt-nav pt-4 pl-5">
        @yield('dashboard-content')
    </section>


@endsection
