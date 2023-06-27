@extends('index')
@section('content')
<form class="formItem" method="POST" action="/item" enctype="multipart/form-data">
    @csrf
    <h1>Cadastro de item</h1><br>

    <label for="name">Nome:</label>
    <input type="text" id="name" name="name"><br>

    <label for="ingredients">Ingredientes:</label>
    <textarea id="ingredients" name="ingredients"></textarea><br>

    <label for="price">Preço:</label>
    <input type="text" id="price" name="price"><br>

    <label for="tag">Tag:</label>
    <input type="text" id="tag" name="tag"><br>

    <label for="image">Imagem:</label>
    <input type="file" id="image" name="image"><br>

    <label for="category_id">Categoria:</label>
    <select id="category_id" name="category_id">
        <option value="1">Burger</option>
        <option value="2">Pastel</option>
        <option value="3">Porções</option>
        <option value="4">Bebidas</option>
        <option value="5">Refeições</option>
    </select><br>

    <button type="submit">Salvar</button>
</form>

@stop