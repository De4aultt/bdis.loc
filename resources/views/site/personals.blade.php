@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.content.personals.index')
@endsection

@section('js')
    @include('layouts.asset.jsfortable')
@endsection
