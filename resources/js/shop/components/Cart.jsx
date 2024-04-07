import React from "react";
import { useCart } from "../hooks/useCart";
import ButtonClose from "./ButtonClose";
import { useCartRecipe } from "../hooks/useCartRecipe";
import CartProductItem from "./Cart/CartProductItem";
import CartRecipeItem from "./Cart/CartRecipeItem";
import ShowAlertReact from "../../ShowAlertReact";
import { useTotal } from "../hooks/useTotal";

function Cart({ views, setViews }) {
  const { cart, clearCart, addToCart, removeFromCart, removeQuantity } =
    useCart();
  const {
    cartRecipe,
    addToCartRecipe,
    removeFromCartRecipe,
    removeQuantityRecipe,
    clearCartRecipe,
  } = useCartRecipe();
  const { total } = useTotal();

  const handleOpen = () => {
    setViews((prevState) => ({
      ...prevState,
      cart: true,
    }));
  };

  const handleClose = () => {
    setViews((prevState) => ({
      ...prevState,
      cart: false,
    }));
  };

  const handleOpenMethod = () => {
    if (cart.length === 0 && cartRecipe.length === 0) {
      ShowAlertReact("Tu carrito está vacío", "info");
    } else {
      setViews((prevState) => ({
        ...prevState,
        processPay: true,
      }));
    }
  };

  return (
    <>
      {/* boton del carrito */}
      <button
        onClick={handleOpen}
        type="button"
        className="fixed top-5 right-[76px] z-[105] inline-flex items-center w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-50 dark:hover:bg-opacity-5 dark:focus:ring-gray-600"
      >
        <svg
          className="w-9 h-9 text-gray-700 dark:text-gray-50"
          fill="currentColor"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 576 512"
        >
          <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
        </svg>

        {cart.length !== 0 && (
          <span className="absolute w-6 h-6 text-white bg-red-500 border-2 border-white rounded-full top-0 right-0 flex justify-center items-center dark:border-gray-900 text-[10px]">
            {cart.length}
          </span>
        )}
      </button>

      <section
        className={
          views.cart
            ? "fixed top-0 right-0 w-full h-full bg-white dark:bg-dark-card z-[105] flex justify-center items-center transition-transform duration-100 transform-none"
            : "fixed top-0 right-0 w-full h-full bg-white dark:bg-dark-card z-[105] flex justify-center items-center transition-transform duration-100 -translate-x-full"
        }
      >
        <ButtonClose hide={handleClose} />

        {/* cantidad total del carro */}
        <div className="absolute top-5 right-10 flex justify-center items-center flex-col">
          <svg
            className="w-7 h-7 text-gray-700 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600"
            fill="currentColor"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
          >
            <path d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
          </svg>
          <p className="text-lg">{`${total.toFixed(2)} Bs.D`}</p>
        </div>

        {/* esta es la seccion central */}
        <section className="absolute top-24 bottom-20 w-full overflow-auto left-0 md:mx-6">
          {cart.length === 0 && cartRecipe.length === 0 ? (
            <ul className="flex flex-col gap-4 w-full">
              <li className="text-center text-4xl text-gray-400 px-6">
                Aun nada en el carrito
              </li>
            </ul>
          ) : (
            <ul className="grid gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center w-full">
              {cart.map((product) => (
                <CartProductItem
                  product={product}
                  key={product.id}
                  addToCart={() => addToCart(product)}
                  removeFromCart={() => removeFromCart(product)}
                  removeQuantity={() => removeQuantity(product)}
                />
              ))}
              {cartRecipe.map((recipe) => (
                <CartRecipeItem
                  recipe={recipe}
                  key={recipe.id}
                  addToCartRecipe={() => addToCartRecipe(recipe)}
                  removeFromCartRecipe={() => removeFromCartRecipe(recipe)}
                  removeQuantityRecipe={() => removeQuantityRecipe(recipe)}
                />
              ))}
            </ul>
          )}
        </section>

        <section className="w-full absolute bottom-5 flex justify-center">
          <article className="w-11/12 md:w-3/4 flex justify-center items-center sm:gap-14 gap-10 flex-nowrap">
            <button
              className="btn-remove-from-cart"
              onClick={() => {
                clearCart();
                clearCartRecipe();
              }}
            >
              Vaciar
            </button>
            <button
              onClick={handleOpenMethod}
              id="buttonShowMethods"
              className="btn-primary-rounded"
            >
              Pagar ahora
            </button>
          </article>
        </section>
      </section>
    </>
  );
}

export default Cart;
