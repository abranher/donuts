import axios from "axios";
import ShowAlert from "../../../ShowAlert";
import { SwalBtnsCustom } from "../../../SwalBtnsCustom";

export default () => ({
  // function search
  inputSearch: "",
  rawMaterials: null,
  error: null,
  async init() {
    try {
      const res = await axios.get(route("api-stock-raw-materials.index"));
      this.rawMaterials = res.data;
    } catch (err) {
      this.rawMaterials = [];
      this.error = err;
    }
  },
  get search() {
    return this.rawMaterials.filter((item) => {
      if (this.inputSearch.length !== 0)
        return item.name.toLowerCase().includes(this.inputSearch.toLowerCase());
    });
  },
  // function addToCart
  rawMaterialsInCart: [],
  rawMaterial: {
    raw_material_id: 0,
    name: "",
    quantity: "",
    expires_at: "",
  },
  addResultToForm(result) {
    this.inputSearch = "";
    this.rawMaterial.raw_material_id = result.id;
    this.rawMaterial.name = result.name;
    this.rawMaterial.expires_at = result.expires_at;
  },
  checkRawInCart(rawMaterial) {
    return this.rawMaterialsInCart.findIndex(
      (item) => item.raw_material_id === rawMaterial.raw_material_id
    );
  },
  addRawMaterialToCart(e) {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(e.target));
    if (data.name.length === 0) {
      return ShowAlert("Busca una materia!", "info");
    }

    const rawInCartIndex = this.checkRawInCart(data);

    if (rawInCartIndex >= 0) {
      this.rawMaterial = {
        raw_material_id: 0,
        name: "",
        quantity: "",
        expires_at: "",
      };
      return ShowAlert("Ya se encuentra esta materia!", "info");
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

    this.rawMaterialsInCart.push(data);
    this.rawMaterial = {
      raw_material_id: 0,
      name: "",
      quantity: "",
      expires_at: "",
    };
  },
  removeRawMaterialFromCart(rawMaterial) {
    const rawInCartIndex = this.checkRawInCart(rawMaterial);

    if (rawInCartIndex >= 0) {
      SwalBtnsCustom.fire({
        title: "¿Estás seguro de eliminar este registro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.isConfirmed) {
          this.rawMaterialsInCart.splice(rawInCartIndex, 1);
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
              route("api-stock-raw-materials.store"),
              this.rawMaterialsInCart
            );

            ShowAlert(response.data.message, response.data.type);
            setTimeout(() => {
              window.location = route("stock-raw-materials.index");
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
