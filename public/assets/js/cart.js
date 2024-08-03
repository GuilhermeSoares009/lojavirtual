import http from './services/http';
import currency from './services/currency';

const btns_add_to_cart = document.querySelectorAll('.add-to-cart-link');
const cart_amount = document.querySelector('.cart-amunt');
const product_count = document.querySelector('.product-count');
const qty = document.querySelector('.qty');
const quantity_in_details = document.querySelector('#quantity-in-details');

function totalProducts(data) {
  let total = 0;
  for (const key in data) {
    total+= data[key]['subtotal'];
    console.log(data[key]);
  }

  if(product_count){
    const total_products_in_cart = Object.keys(data).length;
    product_count.textContent = total_products_in_cart;
  }

  if(cart_amount){
    cart_amount.textContent = currency(total);
  }

  if(quantity_in_details){
    quantity_in_details.textContent = 'Total in cart:' + currency(total);
  }

}

btns_add_to_cart.forEach(btn => {
  btn.addEventListener('click', async (event) => {
    try {
      event.preventDefault();
      const id = +btn.getAttribute('data-id');
      let quantity = 1;

      if (qty) {
        quantity = +qty.value;
      }

      const {data} = await http.post('?inc=add-to-cart', {id, quantity});
      console.log(data);
      totalProducts(data);
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