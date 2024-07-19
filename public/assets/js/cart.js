import http from './services/http';
import currency from './services/currency';

const btns_add_to_cart = document.querySelectorAll('.add-to-cart-link');
const cart_amount = document.querySelector('.cart-amunt');

function totalProducts(data) {
  let total = 0;
  for (const key in data) {
    total += data[key]['qty'] * data[key]['subtotal'];
  }

  if(cart_amount){
    cart_amount.textContent = total === 0 ? currency(0) : currency(total);
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