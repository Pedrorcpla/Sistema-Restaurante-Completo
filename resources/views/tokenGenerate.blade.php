@extends('index')
@section('content')
<form class="formItem" method="POST" action="/token" enctype="multipart/form-data">
    @csrf
    <h1>Gerar token</h1><br>

    <label for="name">Nome:</label>
    <input type="text" id="name" name="name"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br>

    <label for="password">Senha:</label>
    <input type="password" id="password" name="password"><br>

    <button type="submit">Gerar</button>
</form>

@stop