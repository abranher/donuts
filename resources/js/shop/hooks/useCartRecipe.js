import { useContext } from "react";
import { CartRecipeContext } from "../context/recipe";

export const useCartRecipe = () => {
  const context = useContext(CartRecipeContext);

  // esto es para saber si estamos utilizando el contexto fuera del proveedor
  if (context === undefined) {
    throw new Error("useCartRecipe must be used within a CartRecipeProvider");
  }

  return context;
};
