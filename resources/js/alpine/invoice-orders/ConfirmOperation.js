import { SwalBtnsCustom } from "../../SwalBtnsCustom";

export default () => ({
  verify(event) {
    event.preventDefault();
    SwalBtnsCustom.fire({
      title: "Por favor, Confirma la Operación",
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        event.target.submit();
      }
    });
  },
});
