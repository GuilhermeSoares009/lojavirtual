import http from './services/http';
async function getProducts() {
  try {
    const {data} = await http.get('?inc=get-products');

  } catch (error) {
    console.log(error);
  }
}

getProducts();