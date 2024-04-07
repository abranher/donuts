import { SwalBtnsCustom } from "./SwalBtnsCustom";

const ConfirmAlert = (
  title = "Por favor, Confirma la Operación",
  confirmButtonText = "Confirmar",
  icon = "info"
) =>
  SwalBtnsCustom.fire({
    title: title,
    icon: icon,
    showCancelButton: true,
    confirmButtonText: confirmButtonText,
    cancelButtonText: "Cancelar",
  });

export default ConfirmAlert;
