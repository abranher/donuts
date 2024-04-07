import { useContext } from "react";
import { SelectedProductContext } from "../context/selectedProduct";

export const useSelectedProduct = () => {
  const context = useContext(SelectedProductContext);

  // esto es para saber si estamos utilizando el contexto fuera del proveedor
  if (context === undefined) {
    throw new Error(
      "useSelectedProduct must be used within a SelectedProductProvider"
    );
  }

  return context;
};
