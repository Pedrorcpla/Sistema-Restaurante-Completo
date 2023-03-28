@extends('index')
@section('content')
<div>
    <h1>Salve seu Token:</h1>
    <p>
        @foreach ($message as $key => $value)
            {{ $key }}: {{ $value }}
        @endforeach
    </p>
</div>
@stop