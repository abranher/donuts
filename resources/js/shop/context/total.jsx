import { createContext, useEffect, useState } from "react";
import { useCart } from "../hooks/useCart";
import { useCartRecipe } from "../hooks/useCartRecipe";

export const TotalContext = createContext();

export function TotalProvider({ children }) {
  const [total, setTotal] = useState(0);
  const { cart } = useCart();
  const { cartRecipe } = useCartRecipe();

  useEffect(() => {
    const amountTotalCart = cart.reduce(
      (accumulator, item) =>
        item.promotions == 0
          ? accumulator + parseFloat(item.sale_price) * item.quantity
          : accumulator +
            parseFloat(
              item.sale_price - item.sale_price * item.promotions[0].discount
            ) *
              item.quantity,
      0
    );

    const amountTotalCartRecipe = cartRecipe.reduce(
      (accumulator, item) =>
        accumulator + parseFloat(item.sale_price) * item.quantity,
      0
    );

    setTotal(amountTotalCart + amountTotalCartRecipe);
  }, [cart, cartRecipe]);

  return (
    <TotalContext.Provider
      value={{
        total,
      }}
    >
      {children}
    </TotalContext.Provider>
  );
}
