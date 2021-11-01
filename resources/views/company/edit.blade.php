

@extends('layout.default')
@section('content')

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$company->id}}">
    <input type="text" name="name" id="name" value="{{$company->name}}">
    <input class="btn btn-dark" type="submit">
</form>
@stop




{{--{{ $company->id }}--}}
{{--{{ $company->name }}--}}

