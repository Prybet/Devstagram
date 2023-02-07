@extends('layouts.app')

@section('title')
    Página Principal
@endsection

@section('content')
    <x-post-list :posts="$posts" />
@endsection
