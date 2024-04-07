import React from "react";
import { APP_URL } from "../../../APP_URL";

function CartProductItem({
  product,
  addToCart,
  removeFromCart,
  removeQuantity,
}) {
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
    <li className="flex flex-col gap-4 p-4 max-w-xl md:max-w-lg border border-slate-300 dark:border-slate-500 rounded-md mx-4">
      <div className="flex-shrink-0 flex justify-center">
        <img
          src={`${APP_URL}/storage/products/${product.image}`}
          alt={product.name}
          className="w-48 h-32 object-cover aspect-video"
        />
      </div>
      <div className="flex justify-center items-center">
        <div className="mt-0 w-11/12">
          <h2 className="text-lg text-center font-bold dark:text-slate-100">
            {product.name}
          </h2>
          <p className="mt-2 text-gray-600 text-center dark:text-slate-300">
            {product.description.length >= 30
              ? `${product.description.slice(0, 30)}...`
              : product.description}
          </p>
          <div className="text-sm font-medium text-center text-green-500">
            En stock : {product.available}
          </div>
          <div className="mt-4 flex flex-col items-center gap-2">
            <span className="text-gray-600 dark:text-slate-300 flex items-center">
              Cantidad:{" "}
            </span>
            <div className="flex items-center">
              <button
                onClick={removeQuantity}
                className="dark:bg-gray-700 bg-slate-200 dark:text-white rounded-l-lg px-2 py-1"
              >
                -
              </button>
              <span className="mx-2 text-gray-600 dark:text-white">
                {product.quantity}
              </span>
              <button
                onClick={addToCart}
                className="dark:bg-gray-700 bg-slate-200 dark:text-white rounded-r-lg px-2 py-1"
              >
                +
              </button>
            </div>
            <span className="text-xl font-bold flex items-center">{`${product.sale_price} Bs.D`}</span>
          </div>
        </div>
      </div>
      <div className="flex justify-center items-center">
        <button
          onClick={removeFromCart}
          className="btn-remove-from-cart"
          type="button"
        >
          Remover
        </button>
      </div>
    </li>
  ) : (
    <li className="flex flex-col gap-4 p-4 max-w-xl md:max-w-lg border border-slate-300 dark:border-slate-500 rounded-md mx-4 relative overflow-hidden">
      <div className="absolute right-0 top-0 h-16 w-16">
        <div className="absolute transform rotate-45 bg-green-600 text-center text-white font-semibold py-1 right-[-35px] top-[32px] w-[170px]">
          {discount} <span className="text-sm">de descuento</span>
        </div>
      </div>
      <div className="flex-shrink-0 flex justify-center">
        <img
          src={`${APP_URL}/storage/products/${product.image}`}
          alt={product.name}
          className="w-48 h-32 object-cover aspect-video"
        />
      </div>
      <div className="flex justify-center items-center">
        <div className="mt-0 w-11/12">
          <h2 className="text-lg text-center font-bold dark:text-slate-100">
            {product.name}
          </h2>
          <p className="mt-2 text-gray-600 text-center dark:text-slate-300">
            {product.description.length >= 30
              ? `${product.description.slice(0, 30)}...`
              : product.description}
          </p>
          <div className="text-sm font-medium text-center text-green-500">
            En stock : {product.available}
          </div>
          <div className="mt-4 flex flex-col items-center gap-2">
            <span className="text-gray-600 dark:text-slate-300 flex items-center">
              Cantidad:{" "}
            </span>
            <div className="flex items-center">
              <button
                onClick={removeQuantity}
                className="dark:bg-gray-700 bg-slate-200 dark:text-white rounded-l-lg px-2 py-1"
              >
                -
              </button>
              <span className="mx-2 text-gray-600 dark:text-white">
                {product.quantity}
              </span>
              <button
                onClick={addToCart}
                className="dark:bg-gray-700 bg-slate-200 dark:text-white rounded-r-lg px-2 py-1"
              >
                +
              </button>
            </div>
            <span className="text-xl font-bold flex items-center">{`${discountPrice} Bs.D`}</span>
            <span className="text-lg line-through">
              {`${product.sale_price} Bs.D`}
            </span>
          </div>
        </div>
      </div>
      <div className="flex justify-center items-center">
        <button
          onClick={removeFromCart}
          className="btn-remove-from-cart"
          type="button"
        >
          Remover
        </button>
      </div>
    </li>
  );
}

export default CartProductItem;
