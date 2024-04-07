import Swal from "sweetalert2";

export const SwalBtnsCustom = Swal.mixin({
  customClass: {
    confirmButton: "btn-primary",
    cancelButton: "btn-danger",
  },
  buttonsStyling: false,
});
