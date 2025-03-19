@extends('layout/template')
@section('content')
    @if (session()->get('id_role') == '00')
        @include('dashboard.component.admin.dashboard')
    @endif
@endsection
