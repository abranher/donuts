import { createContext, useState } from "react";

export const CartContext = createContext();

export function CartProvider({ children }) {
  const [cart, setCart] = useState([]);

  const addToCart = (product) => {
    // chekea que el producto esta en el carrito y si esta devuelve el indice
    const productInCartIndex = cart.findIndex((item) => item.id === product.id);

    if (productInCartIndex >= 0) {
      // aqui se procesa el mismo producto y se le va aumentando el quantity
      const newCart = structuredClone(cart);
      newCart[productInCartIndex].quantity += 1;

      if (newCart[productInCartIndex].quantity > product.available) {
        return;
      }
      return setCart(newCart);
    }

    // aqui se agrega el producto al carro
    setCart((prevState) => [
      ...prevState,
      {
        ...product,
        quantity: 1,
      },
    ]);
  };

  const removeQuantity = (product) => {
    const productInCartIndex = cart.findIndex((item) => item.id === product.id);
    if (productInCartIndex >= 0) {
      const newCart = cart.slice();
      newCart[productInCartIndex].quantity--;
      if (newCart[productInCartIndex].quantity === 0) {
        newCart.splice(productInCartIndex, 1);
      }
      return setCart(newCart);
    }
  };

  const removeFromCart = (product) => {
    setCart((prevState) => prevState.filter((item) => item.id !== product.id));
  };

  const clearCart = () => {
    setCart([]);
  };

  return (
    <CartContext.Provider
      value={{
        cart,
        addToCart,
        removeFromCart,
        removeQuantity,
        clearCart,
      }}
    >
      {children}
    </CartContext.Provider>
  );
}
