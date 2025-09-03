@extends('layouts.admin')
@section('content')
<h1>Bienvenido {{ Auth::user()->email }} </h1>
@endsection
