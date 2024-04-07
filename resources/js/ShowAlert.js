import { SwalBtnsCustom } from "./SwalBtnsCustom";

export default function ShowAlert(message, icon) {
  SwalBtnsCustom.fire({
    title: message,
    icon: icon,
  });
}
