@extends('layouts.site')

@section('css')
    @include('layouts.asset.css')
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.content.card.index')
@endsection

@section('js')
    @include('layouts.asset.js')
@endsection
