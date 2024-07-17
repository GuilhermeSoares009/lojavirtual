import http from './services/http';

const btns_add_to_cart = document.querySelectorAll('.add-to-cart-link');
const cart_amount = document.querySelector('.cart-amunt');

function totalProducts(data) {
  for (const key in data) {
    total += data[key]['qty'] * data[key]['subtotal'];
  }
}

btns_add_to_cart.forEach(btn => {
  btn.addEventListener('click', async (event) => {
    try {
      event.preventDefault();
      const id = +btn.getAttribute('data-id');
      const {data} = await http.post('?inc=add-to-cart', {id});
      console.log(data);
    } catch (error) {
      console.log(error);
    }
  });
});



async function getProducts() {
  try {
    const {data} = await http.get('?inc=get-products');
    totalProducts(data);
  } catch (error) {
    console.log(error);
  }
}

getProducts();