import { useContext } from "react";
import { TotalContext } from "../context/total";

export const useTotal = () => {
  const context = useContext(TotalContext);

  // esto es para saber si estamos utilizando el contexto fuera del proveedor
  if (context === undefined) {
    throw new Error("useTotal must be used within a TotalProvider");
  }

  return context;
};
