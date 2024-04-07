import React from "react";
import { APP_URL } from "../../../APP_URL";

function OrderItem({ product }) {
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
  const subtotal = (product.quantity * product.sale_price).toFixed(2);
  const subtotalPromo = (product.quantity * discountPrice).toFixed(2);

  return product.promotions.length === 0 ? (
    <article className="flex justify-between text-sm font-bold py-3 px-4 border-b">
      <div className="flex gap-2">
        <div className="bg-gray-200 flex-shrink-0 flex justify-center w-16 h-16">
          <img
            src={`${APP_URL}/storage/products/${product.image}`}
            alt={product.name}
            className="w-16 h-16 object-cover aspect-video"
          />
        </div>
        <div className="flex flex-col justify-center gap-2">
          <p>{product.name}</p>
          <span>{`${product.quantity} x ${product.sale_price} Bs.D`}</span>
        </div>
      </div>
      <div className="flex justify-center items-center">
        <span className="text-end">{`${subtotal} Bs.D`}</span>
      </div>
    </article>
  ) : (
    <article className="flex justify-between text-sm font-bold py-3 px-4 border-b">
      <div className="flex gap-2">
        <div className="relative overflow-hidden">
          <div className="absolute right-0 top-0 h-9 w-9">
            <div className="absolute transform rotate-45 bg-green-600 text-center text-white font-semibold text-[8px] py-1 right-[-23px] top-[2px] w-[70px]">
              {discount}
            </div>
          </div>
          <div className="flex-shrink-0 flex justify-center">
            <img
              src={`${APP_URL}/storage/products/${product.image}`}
              alt={product.name}
              className="w-16 h-16 object-cover aspect-video"
            />
          </div>
        </div>

        <div className="flex flex-col justify-center gap-2">
          <p>{product.name}</p>
          <span>{`${product.quantity} x ${discountPrice} Bs.D`}</span>
        </div>
      </div>
      <div className="flex justify-center items-center">
        <span className="text-end">{`${subtotalPromo} Bs.D`}</span>
      </div>
    </article>
  );
}

export default OrderItem;
