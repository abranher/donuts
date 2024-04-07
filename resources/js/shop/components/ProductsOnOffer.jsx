import React from "react";
import { useFilters } from "../hooks/useFilters";
import { APP_URL } from "../../APP_URL";
import { useCart } from "../hooks/useCart";

function ProductsOnOffer({ products }) {
  const { addToCart, removeFromCart, cart } = useCart();
  const { filterProductsWithOffers } = useFilters();
  const productsWithOffers = filterProductsWithOffers(products);

  const checkProductInCart = (product) =>
    cart.some((item) => item.id === product.id);

  return (
    <>
      {productsWithOffers.length != 0 && (
        <section className="bg-gray-100 dark:bg-dark w-full px-auto">
          <h3 className="py-7 px-10 text-3xl dark:text-slate-100 font-medium">
            Promociones
          </h3>
          <div className="py-2 mb-6 md:px-12 mx-3 flex relative z-30 justify-start items-center gap-6 overflow-x-auto">
            <ul className="flex justify-center md:justify-start md:gap-8 gap-5 mb-6 mx-2 items-center flex-nowrap">
              {productsWithOffers.map((product) => {
                const isProductInCart = checkProductInCart(product);
                const discount = `${product.promotions[0].discount * 100}%`;
                const discountPrice = (
                  product.sale_price -
                  product.sale_price * product.promotions[0].discount
                ).toFixed(2);
                return (
                  <li
                    key={product.id}
                    className="flex justify-center h-72 items-center bg-slate-200 border dark:bg-dark-card dark:border-slate-600 border-slate-300 w-full gap-2 rounded-lg"
                  >
                    <div className="w-80 h-72">
                      <div className="scale-105 h-72 bg-cover xl:h-full border border-slate-300 dark:text-gray-600 rounded-lg relative overflow-hidden bg-white">
                        <div className="absolute right-0 top-0 h-16 w-16">
                          <div className="absolute transform rotate-45 bg-green-600 text-center text-white font-semibold py-1 right-[-35px] top-[32px] w-[170px]">
                            {discount}{" "}
                            <span className="text-sm">de descuento</span>
                          </div>
                        </div>
                        <img
                          src={`${APP_URL}/storage/products/${product.image}`}
                          alt={product.name}
                          className="inset-0 w-full h-full object-cover rounded-lg"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <div className="flex flex-col justify-center h-80 p-4 w-3/4">
                      <div className="flex justify-start items-center mt-2.5 mb-5">
                        <svg
                          className="w-4 h-4 text-yellow-300 mr-1"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 22 20"
                        >
                          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg
                          className="w-4 h-4 text-yellow-300 mr-1"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 22 20"
                        >
                          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg
                          className="w-4 h-4 text-yellow-300 mr-1"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 22 20"
                        >
                          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg
                          className="w-4 h-4 text-yellow-300 mr-1"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 22 20"
                        >
                          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg
                          className="w-4 h-4 text-gray-600 dark:text-gray-600"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor"
                          viewBox="0 0 22 20"
                        >
                          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <span className="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">
                          5.0
                        </span>
                      </div>
                      <div className="flex justify-center items-start flex-col">
                        <h1 className="flex-auto font-medium text-slate-900 dark:text-gray-200">
                          {product.name}
                        </h1>
                        <p>
                          {product.description.length >= 30
                            ? `${product.description.slice(0, 30)}...`
                            : product.description}
                        </p>
                        <div className="w-full flex gap-2 items-center mt-2 order-1">
                          <span className="text-2xl font-bold text-violet-600">
                            {`${discountPrice} Bs.D`}
                          </span>
                          <span className="text-xl line-through">
                            {`${product.sale_price} Bs.D`}
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

                      <div className="flex justify-start mt-3 space-x-4 text-sm font-medium">
                        <div className="flex-auto flex justify-start items-center">
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
                    </div>
                  </li>
                );
              })}
            </ul>
          </div>
        </section>
      )}
    </>
  );
}

export default ProductsOnOffer;
