const modal = document.getElementById('modal');
const category = document.querySelectorAll('.options .categories .button');
const cards = document.querySelectorAll('.cardArea .card');

const closeModal = document.querySelector('#modal #close');
const closeCart = document.querySelector('#cart #close');

const cartArea = document.querySelector('#cart');
const cartButton = document.querySelector('.cartIcon');
const addCart = document.querySelectorAll('#modal #addCart');

category.forEach(option => {
    option.addEventListener('click', (event) => {
        event.preventDefault();
        const option = event.target;

        category.forEach(option => {
            option.classList.replace('actived', 'disabled');
        });

        option.classList.replace('disabled', 'actived');
        const value = option.value;

        const allCardAreas = document.querySelectorAll(".cardArea");
        allCardAreas.forEach(area => {
            area.classList.remove('show');
        });

        const cardArea = document.querySelector(value);
        cardArea.classList.toggle('show');
    });
})

cards.forEach(card => {
    card.addEventListener('click', modalItem);
})

addCart.forEach(add => {
    add.addEventListener('click', updateCart);
})

cartButton.addEventListener('click', () => cartArea.classList.remove('hidden'));
closeCart.addEventListener('click', () => cartArea.classList.add('hidden'));
closeModal.addEventListener('click', () => modal.classList.add('hidden'));

function modalItem(event) {
    event.preventDefault();

    const id = this.id;
    const name = document.querySelector(`#${id} .data #name`).innerHTML;
    const ingredients = document.querySelector(`#${id} .data #ingredients`).innerHTML;
    const price = document.querySelector(`#${id} .data #price`).value;
    const idItem = document.querySelector(`#${id} .data #id`).value;
    const image = document.querySelector(`#${id} .img #img`).getAttribute('src');

    document.querySelector("#modal .tag").value = id;
    document.querySelector("#modal .name").innerHTML = name;
    document.querySelector("#modal #name").value = name;
    document.querySelector("#modal .body .name").innerHTML = name;
    document.querySelector("#modal .ingredients").innerHTML = ingredients;
    document.querySelector("#modal #ingredients").value = ingredients;
    document.querySelector("#modal .price").innerHTML = price;
    document.querySelector("#modal #price").value = price;
    document.querySelector("#modal #id").value = idItem;
    document.querySelector("#modal #image").setAttribute('src', image);
    document.querySelector('#qtd').value = 0;

    modal.classList.remove('hidden');
}

const cart = new Map();
let total = 0;

function updateCart(event) {
    event.preventDefault();

    total = 0;

    const tag = this.value;
    const name = document.querySelector(`#${tag} .data #name`).innerHTML;
    const price = document.querySelector(`#${tag} .data #price`).value;
    const image = document.querySelector(`#${tag} .img #img`).getAttribute('src');
    const qtd = document.querySelector('#qtd').value;

    (qtd > 0) ? cart.set(tag, {name: name, price: price, image: image, qtd: qtd}) : cart.delete(tag);

    document.querySelector('.cart .list').innerHTML = "";
    
    cart.forEach(element => {
        document.querySelector('.cart .list').innerHTML +=  `<div class="item" id="${tag}">
                                                                <div class="img">
                                                                    <img id="img" src="${element.image}" alt="Image">
                                                                </div>
                                                                <div class="data">
                                                                    <h2 class="name">${element.name}</h2>
                                                                    <div class="bloco">
                                                                        <p class="qtd">Qtd. ${element.qtd}</p>
                                                                        <p class="price">${element.price}</p>
                                                                    </div>
                                                                </div>
                                                            </div>`;
        
        total += element.price * element.qtd;
    });

    document.querySelector('.total').innerHTML = total.toFixed(2);
}


const radioEntrega = document.querySelector('#entrega');
const radioLocal = document.querySelector('#local');

const inputAddress = document.getElementById('address');
let entrega = false;

radioEntrega.addEventListener('click', () => {
    inputAddress.classList.remove('hidden');
    inputAddress.setAttribute('required', 'required');
    entrega = true;
});

radioLocal.addEventListener('click', () => {
    inputAddress.classList.add('hidden');
    inputAddress.removeAttribute('required');
    entrega = false;
});

const radioCartao = document.getElementById('cartao');
const radioPix = document.getElementById('pix');
const radioDinheiro = document.getElementById('dinheiro');

let pagamento = "";

radioCartao.addEventListener('click', () => {
    pagamento = "Cartão";
    document.getElementById('troco').classList.add('hidden');
});
radioPix.addEventListener('click', () => {
    pagamento = "Pix";
    document.getElementById('troco').classList.add('hidden');
});
radioDinheiro.addEventListener('click', () => {
    pagamento = "Dinheiro";
    document.getElementById('troco').classList.remove('hidden');
});

const finishButtom = document.getElementById('finish');

finishButtom.addEventListener('click', () => {
    if(cart.size != 0) {
        let comanda = "*Pedido:* "

        cart.forEach(element => {
            comanda += `${element.qtd}x ${element.name} -- `
        });

        comanda += `\n*Total:* ${total.toFixed(2)} `;

        if(entrega){
            if(!inputAddress.value){
                return null;
            }
            comanda += `\n*Endereço:* ${inputAddress.value} `;
        }
        else {
            comanda += `\n*Retirar no local* `;
        }

        if(!pagamento){
            return null;
        }

        comanda += `\n*Forma de Pagamento:* ${pagamento}`;

        if(pagamento == "Dinheiro"){
            const troco = document.getElementById("troco").value;
            if(!troco){
                return null;
            }
            comanda += `\n*Troco para:* ${troco}`;
        }

        comanda = window.encodeURIComponent(comanda);
        const mensagem = "https://wa.me/5513988121415?text=" + comanda;

        window.open(mensagem, "_blank");
        cartArea.classList.add('hidden');
        modal.classList.add('hidden');
    }
    else {
        alert("Carrinho vazio...");
    }
});