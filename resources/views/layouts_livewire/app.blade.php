@extends('layouts_livewire.master')

@section('body')

    @yield('content')
    @isset($slot)
        {{ $slot }}
    @endisset

@endsection
