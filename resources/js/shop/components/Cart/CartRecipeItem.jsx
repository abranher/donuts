import React from "react";
import { APP_URL } from "../../../APP_URL";

function CartRecipeItem({
  recipe,
  addToCartRecipe,
  removeFromCartRecipe,
  removeQuantityRecipe,
}) {
  return (
    <li className="flex flex-col gap-4 p-4 max-w-xl md:max-w-lg border border-slate-300 dark:border-slate-500 rounded-md mx-4">
      <div className="flex-shrink-0 flex justify-center">
        <img
          src={`${APP_URL}/storage/products/${recipe.image}`}
          alt={recipe.name}
          className="w-48 h-32 object-cover aspect-video"
        />
      </div>
      <div className="flex justify-center items-center">
        <div className="mt-0 w-11/12">
          <h2 className="text-lg text-center font-bold dark:text-slate-100">
            {recipe.name}
          </h2>
          <p className="mt-2 text-gray-600 text-center dark:text-slate-300">
            {recipe.description == null
              ? ""
              : recipe.description.length >= 30
              ? `${recipe.description.slice(0, 30)}...`
              : recipe.description}
          </p>
          <div className="text-sm font-medium text-center text-green-500">
            En stock : {recipe.available}
          </div>
          <div className="mt-4 flex flex-col items-center gap-2">
            <span className="text-gray-600 dark:text-slate-300 flex items-center">
              Cantidad:{" "}
            </span>
            <div className="flex items-center">
              <button
                onClick={removeQuantityRecipe}
                className="dark:bg-gray-700 bg-slate-200 dark:text-white rounded-l-lg px-2 py-1"
              >
                -
              </button>
              <span className="mx-2 text-gray-600 dark:text-white">
                {recipe.quantity}
              </span>
              <button
                onClick={addToCartRecipe}
                className="dark:bg-gray-700 bg-slate-200 dark:text-white rounded-r-lg px-2 py-1"
              >
                +
              </button>
            </div>
            <span className="text-xl font-bold flex items-center">{`${recipe.sale_price} Bs.D`}</span>
          </div>
        </div>
      </div>
      <div className="flex justify-center items-center">
        <button
          onClick={removeFromCartRecipe}
          className="btn-remove-from-cart"
          type="button"
        >
          Remover
        </button>
      </div>
    </li>
  );
}

export default CartRecipeItem;
