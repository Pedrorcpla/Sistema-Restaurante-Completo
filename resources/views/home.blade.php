@extends('index')
@section('content')

    <div class="carousel">

    </div>

    <div class="dishoftheday">
        <div class="row">
            <p>Prato do dia</p>
            <div class="line"></div>
        </div>

        <button class="cardDay">

        </button>
    </div>

    <div class="options">
        <div class="categories">
            <button class="disabled button" id="c1" value="#burger">Burger</button>
            <button class="disabled button" id="c2" value="#pastel">Pastel</button>
            <button class="actived button" id="c3" value="#porcoes">Porções</button>
            <button class="disabled button" id="c4" value="#bebidas">Bebidas</button>
        </div>

        <div class="cardArea" id="burger">
            @foreach ($items as $item)
                @if($item->category_id == 1)
                    <div class="card" id="{{ $item->tag }}">
                        <div class="img">
                            <img id="img" src="http://127.0.0.1:8000{{ $item->image_path }}" alt="Image">
                        </div>
                        <div class="data">
                            <h2 id="name">{{ $item->name }}</h2>
                            <p id="ingredients">{{ $item->ingredients }}</p>
                            <p class="price">{{ number_format($item->price, 2, '.', '')}}</p>
                            <input type="hidden" id="price" value="{{ number_format($item->price, 2, '.', '')}}">
                            <input type="hidden" id="id" value="1">
                            <input type="hidden" id="category" value="{{ $item->category_id }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
        <div class="cardArea" id="pastel">
            @foreach ($items as $item)
                @if($item->category_id == 2)
                    <div class="card" id="{{ $item->tag }}">
                        <div class="img">
                            <img id="img" src="http://127.0.0.1:8000{{ $item->image_path }}" alt="Image">
                        </div>
                        <div class="data">
                            <h2 id="name">{{ $item->name }}</h2>
                            <p id="ingredients">{{ $item->ingredients }}</p>
                            <p class="price">{{ number_format($item->price, 2, '.', '')}}</p>
                            <input type="hidden" id="price" value="{{ number_format($item->price, 2, '.', '')}}">
                            <input type="hidden" id="id" value="1">
                            <input type="hidden" id="category" value="{{ $item->category_id }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="cardArea show" id="porcoes">
            @foreach ($items as $item)
                @if($item->category_id == 3)
                    <div class="card" id="{{ $item->tag }}">
                        <div class="img">
                            <img id="img" src="http://127.0.0.1:8000{{ $item->image_path }}" alt="Image">
                        </div>
                        <div class="data">
                            <h2 id="name">{{ $item->name }}</h2>
                            <p id="ingredients">{{ $item->ingredients }}</p>
                            <p class="price">{{ number_format($item->price, 2, '.', '')}}</p>
                            <input type="hidden" id="price" value="{{ number_format($item->price, 2, '.', '')}}">
                            <input type="hidden" id="id" value="1">
                            <input type="hidden" id="category" value="{{ $item->category_id }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="cardArea" id="bebidas">
            @foreach ($items as $item)
                @if($item->category_id == 4)
                    <div class="card" id="{{ $item->tag }}">
                        <div class="img">
                            <img id="img" src="http://127.0.0.1:8000{{ $item->image_path }}" alt="Image">
                        </div>
                        <div class="data">
                            <h2 id="name">{{ $item->name }}</h2>
                            <p id="ingredients">{{ $item->ingredients }}</p>
                            <p class="price">{{ number_format($item->price, 2, '.', '')}}</p>
                            <input type="hidden" id="price" value="{{ number_format($item->price, 2, '.', '')}}">
                            <input type="hidden" id="id" value="1">
                            <input type="hidden" id="category" value="{{ $item->category_id }}">
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div id="modal" class="modal hidden">
        <button id="close">X</button>
        <div class="card">
            <div class="top">
                <div class="area">
                    <h2 class="name">AAA</h2>
                    <div class="img">
                        <img id="image" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="area">
                    <div class="data">
                        <input type="hidden" name="id" id="id" value="44">
                        <h2 class="name">AAA</h2>
                        <p class="ingredients">AAA</p>
                        <div class="row">
                            <div class="line"></div>
                            <p class="price">0</p>
                        </div>
                    </div>
                    
                    <div class="quantity">
                        <p>Quantidade</p>
                        <input type="number" id="qtd" name="qtd">
                    </div>
                    <button id="addCart" class="tag">Adicionar ao Carrinho</button>
                </div>

                <input type="hidden" id="name">
                <input type="hidden" id="ingredients">
                <input type="hidden" id="price">
            </div>
        </div>
    </div>

    <div id="cart" class="cart hidden">
        <button id="close">X</button>
        <div class="card">
            <div class="items">
                <div class="area">
                    <div class="row">
                        <p class="title">Carrinho</p>
                        <div class="line"></div>
                    </div>
                    <div class="list" id="list">
                        <!-- Itens do carrinho -->
                    </div>
                </div>
            </div>
            <div class="datas">
                <div class="area">
                    <div class="retirada">
                        <div class="radio">
                            <input type="radio" id="local" name="retirada" value="local" />
                            <label for="local">Retirar no local</label>
                        </div>
                        <div class="radio">
                            <input type="radio" id="entrega" name="retirada" value="entrega" />
                            <label for="entrega">Entrega (3.00)</label>
                        </div>
                    </div>

                    <input type="text" id="address" class="address hidden" name="address" placeholder="Informe seu endereço...">

                    <div class="row">
                        <p>Valor total</p>
                        <div class="line"></div>
                        <p class="total">00.00</p>
                    </div>

                    <div class="retirada">
                        <div class="radio">
                            <input type="radio" id="cartao" name="pagamento" value="cartao" />
                            <label for="cartao">Cartão</label>
                        </div>
                        <div class="radio">
                            <input type="radio" id="pix" name="pagamento" value="pix" />
                            <label for="pix">Pix</label>
                        </div>
                        <div class="radio">
                            <input type="radio" id="dinheiro" name="pagamento" value="dinheiro" />
                            <label for="dinheiro">Dinheiro</label>
                        </div>
                    </div>

                    <select name="troco" id="troco" class="troco hidden">
                        <option value="">Escolha o valor para troco</option>
                        <option value="2.00">2.00</option>
                        <option value="5.00">5.00</option>
                        <option value="10.00">10.00</option>
                        <option value="20.00">20.00</option>
                        <option value="50.00">50.00</option>
                        <option value="100.00">100.00</option>
                        <option value="200.00">200.00</option>
                    </select>

                    <button class="finish" id="finish">Finalizar Pedido</button>
                </div>
            </div>
        </div>
    </div>

@stop