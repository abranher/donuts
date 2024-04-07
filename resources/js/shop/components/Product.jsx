import React, { useState } from "react";
import { useCart } from "../hooks/useCart";
import { APP_URL } from "../../APP_URL";
import { useSelectedProduct } from "../hooks/useSelectedProduct";
import Start from "./Start";

function Product({ category, products }) {
  const { addToCart, removeFromCart, cart } = useCart();
  const [amountToShow, setAmountToShow] = useState(5);
  const { selectedProduct, setSelectedProduct, productView, setProductView } =
    useSelectedProduct();
  const productsQuantity = products.length;

  const checkProductInCart = (product) =>
    cart.some((item) => item.id === product.id);

  return (
    <>
      <section className="bg-white dark:bg-dark w-full">
        <h3 className="py-7 px-10 text-3xl dark:text-slate-100 font-medium">
          {category === "all" ? "Todas" : category}
        </h3>
        <div className="py-1 px-2 flex relative z-30 justify-start items-center gap-6 overflow-x-auto">
          <ul className="flex justify-center md:justify-start md:gap-8 gap-2 items-center md:flex-wrap flex-nowrap">
            {products.slice(0, amountToShow).map((product) => {
              const isProductInCart = checkProductInCart(product);
              const discount =
                product.promotions.length !== 0
                  ? `${product.promotions[0].discount * 100}%`
                  : "";
              const discountPrice =
                product.promotions.length !== 0
                  ? (
                      product.sale_price -
                      product.sale_price * product.promotions[0].discount
                    ).toFixed(2)
                  : "";
              return product.promotions.length === 0 ? (
                <li
                  key={product.id}
                  className="flex justify-center items-center flex-col"
                >
                  <span
                    className="w-48 h-32 cursor-pointer aspect-video"
                    onClick={() => {
                      setSelectedProduct(product);
                      setProductView(true);
                    }}
                  >
                    <img
                      src={`${APP_URL}/storage/products/${product.image}`}
                      alt={product.name}
                      className="inset-0 w-full h-full object-cover rounded-t-md"
                      loading="lazy"
                    />
                  </span>
                  <div className="flex-auto p-4 w-56">
                    <div className="flex justify-center items-start flex-col">
                      <h1 className="flex-auto font-medium text-slate-900 dark:text-gray-200">
                        {product.name}
                      </h1>
                      <div className="w-full flex-none mt-2 order-1 text-4xl font-bold text-violet-600">
                        {product.sale_price}{" "}
                        <span className="text-2xl">Bs.D</span>
                      </div>
                      <div
                        className={
                          product.available == 0
                            ? "text-sm font-medium text-red-500"
                            : "text-sm font-medium text-green-500"
                        }
                      >
                        {product.available == 0 ? "Agotado" : "En stock"} :{" "}
                        {product.available}
                      </div>
                    </div>
                    <div className="flex justify-center items-center mt-2.5 mb-5">
                      <Start color={"yellow"} />
                      <Start color={"yellow"} />
                      <Start color={"yellow"} />
                      <Start color={"yellow"} />
                      <Start />
                      <span className="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                        5.0
                      </span>
                    </div>
                    <div className="flex items-center justify-center mt-4 pb-4">
                      <label className="flex justify-center items-center flex-col gap-3">
                        <p className="text-base font-medium dark:text-slate-200">
                          Tamaño:{" "}
                        </p>
                        <div className="flex justify-center items-center font-bold dark:text-white">
                          {product.size}
                        </div>
                      </label>
                    </div>
                    <div className="flex justify-center space-x-4 text-sm font-medium">
                      <div className="flex-auto flex justify-center items-center">
                        <button
                          onClick={() => {
                            isProductInCart
                              ? removeFromCart(product)
                              : addToCart(product);
                          }}
                          className={
                            isProductInCart
                              ? "btn-remove-from-cart"
                              : "btn-primary-rounded"
                          }
                          disabled={product.available == 0 ? true : false}
                        >
                          {isProductInCart ? "Remover" : "Añadir al carrito"}
                        </button>
                      </div>
                    </div>
                    <p className="mt-3 text-sm text-slate-600 dark:text-gray-200">
                      Envío gratuito en todos sus pedidos.
                    </p>
                  </div>
                </li>
              ) : (
                <li
                  key={product.id}
                  className="flex justify-center items-center flex-col"
                >
                  <span
                    className="w-48 h-32 cursor-pointer aspect-video relative overflow-hidden"
                    onClick={() => {
                      setSelectedProduct(product);
                      setProductView(true);
                    }}
                  >
                    <div className="absolute right-0 top-0 h-16 w-16">
                      <div className="absolute transform rotate-45 bg-green-600 text-center text-white font-semibold py-1 right-[-35px] top-[32px] w-[170px]">
                        {discount} <span className="text-sm">de descuento</span>
                      </div>
                    </div>
                    <img
                      src={`${APP_URL}/storage/products/${product.image}`}
                      alt={product.name}
                      className="inset-0 w-full h-full object-cover rounded-t-md"
                      loading="lazy"
                    />
                  </span>
                  <div className="flex-auto p-4 w-56">
                    <div className="flex justify-center items-start flex-col">
                      <h1 className="flex-auto font-medium text-slate-900 dark:text-gray-200">
                        {product.name}
                      </h1>
                      <div className="w-full flex flex-col gap-2 items-start mt-2 order-1">
                        <span className="text-2xl font-bold text-violet-600">
                          {discountPrice} Bs.D
                        </span>
                        <span className="text-lg line-through">
                          {product.sale_price} Bs.D
                        </span>
                      </div>
                      <div
                        className={
                          product.available == 0
                            ? "text-sm font-medium text-red-500"
                            : "text-sm font-medium text-green-500"
                        }
                      >
                        {product.available == 0 ? "Agotado" : "En stock"} :{" "}
                        {product.available}
                      </div>
                    </div>
                    <div className="flex justify-center items-center mt-2.5 mb-5">
                      <Start color={"yellow"} />
                      <Start color={"yellow"} />
                      <Start color={"yellow"} />
                      <Start color={"yellow"} />
                      <Start />
                      <span className="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                        5.0
                      </span>
                    </div>
                    <div className="flex items-center justify-center mt-4 pb-4">
                      <label className="flex justify-center items-center flex-col gap-3">
                        <p className="text-base font-medium dark:text-slate-200">
                          Tamaño:{" "}
                        </p>
                        <div className="flex justify-center items-center font-bold dark:text-white">
                          {product.size}
                        </div>
                      </label>
                    </div>
                    <div className="flex justify-center space-x-4 text-sm font-medium">
                      <div className="flex-auto flex justify-center items-center">
                        <button
                          onClick={() => {
                            isProductInCart
                              ? removeFromCart(product)
                              : addToCart(product);
                          }}
                          className={
                            isProductInCart
                              ? "btn-remove-from-cart"
                              : "btn-primary-rounded"
                          }
                          disabled={product.available == 0 ? true : false}
                        >
                          {isProductInCart ? "Remover" : "Añadir al carrito"}
                        </button>
                      </div>
                    </div>
                    <p className="mt-3 text-sm text-slate-600 dark:text-gray-200">
                      Envío gratuito en todos sus pedidos.
                    </p>
                  </div>
                </li>
              );
            })}
          </ul>
        </div>
        <div className="py-7 px-10">
          {productsQuantity > amountToShow && (
            <a
              className="link-primary text-xl"
              onClick={() => setAmountToShow(amountToShow + 5)}
            >
              Ver más...
            </a>
          )}
          {productsQuantity < amountToShow && (
            <a
              className="link-primary text-xl"
              onClick={() => setAmountToShow(5)}
            >
              Ver menos...
            </a>
          )}
        </div>
      </section>
    </>
  );
}

export default Product;
