//pagina que le da funcionamiento al carrito de compras


const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector(
	'.container-cart-products'
);

btnCart.addEventListener('click', () => {
	containerCartProducts.classList.toggle('hidden-cart');
});

/* ========================= */
const cartInfo = document.querySelector('.cart-product');
const rowProduct = document.querySelector('.row-product');

// Lista de todos los contenedores de productos
const productsList = document.querySelector('.container-items');

// Variable de arreglos de Productos
let allProducts = [];

myStorage = window.localStorage;

const valorTotal = document.querySelector('.total-pagar');

const countProducts = document.querySelector('#contador-productos');

const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');

productsList.addEventListener('click', e => {
	if (e.target.classList.contains('btn-add-cart')) {
		const product = e.target.parentElement;

		const infoProduct = {
			quantity: 1,
			title: product.querySelector('h2').textContent,
			price: product.querySelector('p').textContent,
		};

		const exits = allProducts.some(
			product => product.title === infoProduct.title
		);

		if (exits) {
			const products = allProducts.map(product => {
				if (product.title === infoProduct.title) {
					product.quantity++;
					return product;
				} else {
					return product;
				}
			});
			allProducts = [...products];
		} else {
			allProducts = [...allProducts, infoProduct];
		}

		showHTML();
	}
});

rowProduct.addEventListener('click', e => {
	if (e.target.classList.contains('icon-close')) {
		const product = e.target.parentElement;
		const title = product.querySelector('p').textContent;

		allProducts = allProducts.filter(
			product => product.title !== title
		);

		console.log(allProducts);

		showHTML();
	}
});

//Se crean dos vectores para dividir los
const nombresProductos = [];
const preciosProductos = [];
const cantidadProductos=[];


// Funcion para mostrar  HTML
const showHTML = () => {
	if (!allProducts.length) {
		cartEmpty.classList.remove('hidden');
		rowProduct.classList.add('hidden');
		cartTotal.classList.add('hidden');
	} else {
		cartEmpty.classList.add('hidden');
		rowProduct.classList.remove('hidden');
		cartTotal.classList.remove('hidden');
	}

	// Limpiar HTML
	rowProduct.innerHTML = '';

	let total = 0;
	let totalOfProducts = 0;

	allProducts.forEach(product => {
		const containerProduct = document.createElement('div');
		containerProduct.classList.add('cart-product');

		containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <span class="precio-producto-carrito">${product.price}</span>
            </div>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="icon-close"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        `;

		rowProduct.append(containerProduct);

		total =
			total + parseInt(product.quantity * product.price.slice(1));
		totalOfProducts = totalOfProducts + product.quantity;
	});

	valorTotal.innerText = `$${total}`;
	countProducts.innerText = totalOfProducts;

	

};

const boton = document.getElementById('miBoton');
boton.addEventListener('click', mandarPedido);
function mandarPedido() {
	console.log('Botón presionado. Enviando pedido...');

    console.log('Iniciando mandarPedido...');
    
    allProducts.forEach(producto => {
        nombresProductos.push(producto.title);
        preciosProductos.push(parseFloat(producto.price.slice(1)));
        cantidadProductos.push(parseInt(producto.quantity));
    });

    console.log('Datos preparados:', nombresProductos, preciosProductos, cantidadProductos);

    const datosAEnviar = {
        nombres: nombresProductos,
        precios: preciosProductos,
        cantidades: cantidadProductos
    };

    const datosJSON = JSON.stringify(datosAEnviar);

    fetch('subirpedido.php', {
		method: 'POST',
		body: datosJSON,
		headers: {
			'Content-Type': 'application/json'
		}
	})
	.then(response => response.json())
	.then(data => {
		// Verificar si la operación fue exitosa
		if (data.success) {
			console.log('Operación completada con éxito.');
	
			// Verificar si se proporcionó una URL de redirección
			if (data.redireccionar) {
				window.location.href = data.redireccionar;
			} else {
				location.reload();
			}
		} else {
			console.error('Error en la operación:', data.mensaje);
			// Puedes mostrar un mensaje de error en la interfaz si lo deseas
		}
	})
	
	.catch(error => {
		console.error('Error en la operación:', error.message);
		// Puedes mostrar un mensaje de error en la interfaz si lo deseas
	});
	
}

// Agrega esto al final de tu archivo Funciones.js
document.addEventListener('DOMContentLoaded', function () {
    // Tu código existente aquí

    // Agrega el siguiente código para manejar la redirección
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            var response = JSON.parse(xhr.responseText);
            if (response.success && response.redireccionar) {
                window.location.href = response.redireccionar;
            }
        }
    };

    // Reemplaza 'subirpedido.php' con la ruta correcta a tu script PHP
    xhr.open('GET', 'subirpedido.php', true);
    xhr.send();
});
