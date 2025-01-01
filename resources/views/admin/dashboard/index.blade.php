@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">admin</li>
@endsection

@section('content')
    @include('admin.dashboard.small')
@endsection
