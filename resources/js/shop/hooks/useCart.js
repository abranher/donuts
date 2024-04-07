import { useContext } from "react";
import { CartContext } from "../context/cart";

export const useCart = () => {
  const context = useContext(CartContext);

  // esto es para saber si estamos utilizando el contexto fuera del proveedor
  if (context === undefined) {
    throw new Error("useCart must be used within a CartProvider");
  }

  return context;
};
