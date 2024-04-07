import axios from "axios";
import ShowAlert from "../../../ShowAlert";
import { SwalBtnsCustom } from "../../../SwalBtnsCustom";

export default () => ({
  // function search
  inputSearch: "",
  products: null,
  error: null,
  async init() {
    try {
      const res = await axios.get(route("api-stock-products.index"));
      this.products = res.data;
    } catch (err) {
      this.products = [];
      this.error = err;
    }
  },
  get search() {
    return this.products.filter((item) => {
      if (this.inputSearch.length !== 0)
        return item.name.toLowerCase().includes(this.inputSearch.toLowerCase());
    });
  },
  // function addToCart
  productsInCart: [],
  product: {
    product_id: 0,
    name: "",
    quantity: "",
    expires_at: "",
  },
  addResultToForm(result) {
    this.inputSearch = "";
    this.product.product_id = result.id;
    this.product.name = result.name;
    this.product.expires_at = result.expires_at;
  },
  checkProductInCart(product) {
    return this.productsInCart.findIndex(
      (item) => item.product_id === product.product_id
    );
  },
  addProductToCart(e) {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(e.target));
    if (data.name.length === 0) {
      return ShowAlert("Busca un producto!", "info");
    }

    const productInCartIndex = this.checkProductInCart(data);

    if (productInCartIndex >= 0) {
      this.product = {
        product_id: 0,
        name: "",
        quantity: "",
        expires_at: "",
      };
      return ShowAlert("Ya se encuentra este producto!", "info");
    }

    const Numbers = /^[0-9]+$/;
    const Space = /\s/;

    if (data.quantity == "") {
      return ShowAlert("La Cantidad es requerida!", "info");
    } else if (data.quantity == 0) {
      return ShowAlert("La Cantidad no puede ser cero!", "info");
    } else if (Space.test(data.quantity)) {
      return ShowAlert("La Cantidad no puede contener espacios", "info");
    } else if (!Numbers.test(data.quantity)) {
      return ShowAlert("La Cantidad solo puede contener números", "info");
    }

    if (data.expires_at == "") {
      return ShowAlert("La Fecha de Expiración es requerida!", "info");
    } else if (new Date(data.expires_at) <= new Date()) {
      return ShowAlert(
        "La Fecha de Expiración tiene que ser en el futuro!",
        "info"
      );
    }

    this.productsInCart.push(data);
    this.product = {
      product_id: 0,
      name: "",
      quantity: "",
      expires_at: "",
    };
  },
  removeProductFromCart(product) {
    const productInCartIndex = this.checkProductInCart(product);

    if (productInCartIndex >= 0) {
      SwalBtnsCustom.fire({
        title: "¿Estás seguro de eliminar este registro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          this.productsInCart.splice(productInCartIndex, 1);
        }
      });
    }
  },
  async sendRequest() {
    SwalBtnsCustom.fire({
      title: "Por favor, Confirma la Operación",
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Guardar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        const sendRequest = async () => {
          try {
            const response = await axios.post(
              route("api-stock-products.store"),
              this.productsInCart
            );

            ShowAlert(response.data.message, response.data.type);
            setTimeout(() => {
              window.location = route("stock-products.index");
            }, 1500);
          } catch (error) {
            console.log(error);
            return ShowAlert(
              error.response.data.message,
              error.response.data.type
            );
          }
        };
        sendRequest();
      }
    });
  },
});
