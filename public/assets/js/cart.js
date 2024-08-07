import http from './services/http';
import currency from './services/currency';

const btns_add_to_cart = document.querySelectorAll('.add-to-cart-link');
const cart_amount = document.querySelector('.cart-amunt');
const product_count = document.querySelector('.product-count');
const qty = document.querySelector('.qty');
const quantity_in_details = document.querySelector('#quantity-in-details');
const remove_from_cart = document.querySelectorAll('.remove');
const plus = document.querySelectorAll('.plus');
const minus = document.querySelectorAll('.minus');


function totalProducts(data) {
  let total = 0;
  for (const key in data) {
    total+= parseFloat(data[key]['subtotal']);
    console.log(data[key]);
  }

  if(product_count){
    const total_products_in_cart = Object.keys(data).length;
    product_count.textContent = total_products_in_cart;
  }

  if(cart_amount){
    console.log(total);
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

remove_from_cart.forEach(btn_remove => {
  btn_remove.addEventListener('click', async (event) => {
    event.preventDefault();
    
    const id = btn_remove.CDATA_SECTION_NODE.id;

    await http.get('?inc=cart-remove', {
      params: {
        id
      }
    });

    window.location.reload();

  });
});

plus.forEach(btn_plus => {
  btn_plus.addEventListener('click', (event) => {
    event.preventDefault();
    const id = btn_plus.dataset.id;
    const qtyProduct = document.querySelector('#qty' + id);
    qtyProduct.value++;
  });
});


minus.forEach(btn_minus => {
  btn_minus.addEventListener('click', (event) => {
    event.preventDefault();
    const id = btn_minus.dataset.id;
    const qtyProduct = document.querySelector('#qty' + id);
    qtyProduct.value++;
  });
});