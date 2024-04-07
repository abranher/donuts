import React from "react";
import { useSelectedProduct } from "../hooks/useSelectedProduct";
import { APP_URL } from "../../APP_URL";
import { useCart } from "../hooks/useCart";
import Valorations from "./ProductView/Valorations";

function ProductView() {
  const { selectedProduct, setSelectedProduct, productView, setProductView } =
    useSelectedProduct();
  const { addToCart, removeFromCart, cart } = useCart();

  let isProductInCart = false;
  if (selectedProduct != null) {
    const checkProductInCart = (product) =>
      cart.some((item) => item.id === product.id);
    isProductInCart = checkProductInCart(selectedProduct);
  }

  return (
    <>
      {selectedProduct && (
        <section
          className={
            productView
              ? "fixed inset-0 w-full h-full bg-white dark:bg-dark-card z-[180] flex justify-center items-center flex-col transition-transform duration-100 transform-none"
              : "fixed inset-0 w-full h-full bg-white dark:bg-dark-card z-[180] flex justify-center items-center flex-col transition-transform duration-100 -translate-x-full"
          }
        >
          <button
            onClick={() => {
              setProductView(false);
            }}
            type="button"
            className="fixed top-6 left-6 z-20 bg-white cursor-pointer inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-50 dark:hover:bg-opacity-5 dark:focus:ring-gray-600"
          >
            <svg
              className="w-7 h-7 text-gray-700 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              fill="currentColor"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 448 512"
            >
              <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
          </button>
          <div className="fixed inset-x-0 z-10 h-[88px] top-0 w-full bg-white text-2xl font-bold text-center dark:text-white rounded-t-lg dark:bg-dark shadow-xl"></div>

          <section className="w-full py-24 h-full bg-white text-gray-700 dark:bg-dark dark:text-white overflow-y-auto">
            <section>
              {/* Image product */}
              <section className="w-full h-[410px] cursor-pointer aspect-video">
                <img
                  src={`${APP_URL}/storage/products/${selectedProduct.image}`}
                  alt={selectedProduct.name}
                  className="inset-0 w-full h-full object-cover object-center rounded-t-md"
                  loading="lazy"
                />
              </section>

              {/* description product */}
              <section className="p-4">
                <div className="flex justify-center items-start flex-col">
                  <h1 className="flex-auto text-3xl font-medium text-slate-900 dark:text-gray-200">
                    {selectedProduct.name}
                  </h1>
                  <div className="w-full flex-none mt-2 order-1 text-4xl font-bold text-violet-600">
                    {selectedProduct.sale_price}{" "}
                    <span className="text-2xl">Bs.D</span>
                  </div>
                  <div
                    className={
                      selectedProduct.available == 0
                        ? "text-2xl my-2 font-medium text-red-500"
                        : "text-2xl my-2 font-medium text-green-500"
                    }
                  >
                    {selectedProduct.available == 0 ? "Agotado" : "En stock"} :{" "}
                    {selectedProduct.available}
                  </div>
                </div>

                <div className="flex items-center justify-center mt-4 pb-4">
                  <label className="flex justify-center items-center flex-col gap-3">
                    <p className="text-2xl font-medium dark:text-slate-200">
                      Tamaño:{" "}
                    </p>
                    <div className="flex justify-center text-2xl items-center font-bold dark:text-white">
                      {selectedProduct.size}
                    </div>
                  </label>
                </div>

                <div className="space-y-2">
                  <p className="text-2xl flex flex-col gap-2">
                    <span className="text-gray-800 font-semibold">
                      Categoría:{" "}
                    </span>
                    <span className="text-gray-600">
                      {selectedProduct.category_product.name}
                    </span>
                  </p>
                </div>

                <div className="my-8 text-2xl flex flex-col gap-2">
                  <h2 className="text-gray-800 font-semibold">Descripción:</h2>
                  <p className="text-lg text-gray-600">
                    {selectedProduct.description}
                  </p>
                </div>

                <p className="flex my-4 gap-2">
                  <span>
                    <svg
                      className="w-6 h-6 text-gray-600"
                      fill="currentColor"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 640 512"
                    >
                      <path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                    </svg>
                  </span>
                  <span>Entrega Estimada:</span>
                  <span>01 - 07, Julio 2024</span>
                </p>

                <Valorations />
              </section>

              {/* Button Add to cart */}
              <section className="w-full fixed bottom-0 py-5 flex justify-center bg-white">
                <article className="w-11/12 md:w-3/4 flex justify-center items-center sm:gap-14 gap-10 flex-nowrap">
                  <button
                    onClick={() => {
                      isProductInCart
                        ? removeFromCart(selectedProduct)
                        : addToCart(selectedProduct);
                    }}
                    className={
                      isProductInCart
                        ? "btn-remove-from-cart"
                        : "btn-primary-rounded"
                    }
                    disabled={selectedProduct.available == 0 ? true : false}
                  >
                    {isProductInCart ? "Remover" : "Añadir al carrito"}
                  </button>
                </article>
              </section>
            </section>
          </section>
        </section>
      )}
    </>
  );
}

export default ProductView;
