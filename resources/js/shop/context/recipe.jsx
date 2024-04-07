import { createContext, useState } from "react";

export const CartRecipeContext = createContext();

export function CartRecipeProvider({ children }) {
  const [cartRecipe, setCartRecipe] = useState([]);

  const addToCartRecipe = (recipe) => {
    // chekea que el producto esta en el carrito y si esta devuelve el indice
    const recipeInCartIndex = cartRecipe.findIndex(
      (item) => item.id === recipe.id
    );

    if (recipeInCartIndex >= 0) {
      // aqui se procesa el mismo producto y se le va aumentando el quantity
      const newCart = structuredClone(cartRecipe);
      newCart[recipeInCartIndex].quantity += 1;

      if (newCart[recipeInCartIndex].quantity > recipe.available) {
        return;
      }
      return setCartRecipe(newCart);
    }

    // aqui se agrega el producto al carro
    setCartRecipe((prevState) => [
      ...prevState,
      {
        ...recipe,
        quantity: 1,
      },
    ]);
  };

  const removeQuantityRecipe = (recipe) => {
    const recipeInCartIndex = cartRecipe.findIndex(
      (item) => item.id === recipe.id
    );
    if (recipeInCartIndex >= 0) {
      const newCart = cartRecipe.slice();
      newCart[recipeInCartIndex].quantity--;
      if (newCart[recipeInCartIndex].quantity === 0) {
        newCart.splice(recipeInCartIndex, 1);
      }
      return setCartRecipe(newCart);
    }
  };

  const removeFromCartRecipe = (recipe) => {
    setCartRecipe((prevState) =>
      prevState.filter((item) => item.id !== recipe.id)
    );
  };

  const clearCartRecipe = () => {
    setCartRecipe([]);
  };

  return (
    <CartRecipeContext.Provider
      value={{
        cartRecipe,
        addToCartRecipe,
        removeFromCartRecipe,
        removeQuantityRecipe,
        clearCartRecipe,
      }}
    >
      {children}
    </CartRecipeContext.Provider>
  );
}
