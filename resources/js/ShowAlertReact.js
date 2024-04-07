import withReactContent from "sweetalert2-react-content";
import { SwalBtnsCustom } from "./SwalBtnsCustom";

export default function ShowAlertReact(message, icon, foco = "") {
  onfocus(foco);
  const MySwal = withReactContent(SwalBtnsCustom);
  MySwal.fire({
    title: message,
    icon: icon,
  });
}

function onfocus(foco) {
  if (foco !== "") {
    document.getElementById(foco).focus();
  }
}
