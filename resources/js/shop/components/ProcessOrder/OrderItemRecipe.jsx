import React from "react";

function OrderItemRecipe({ recipe }) {
  const subtotal = (recipe.quantity * recipe.sale_price).toFixed(2);

  return (
    <article className="flex justify-between text-sm font-bold py-3 px-4 border-b">
      <div className="flex gap-2">
        <div className="bg-gray-200 w-16 h-16">foto</div>
        <div className="flex flex-col justify-center gap-2">
          <p>{recipe.name}</p>
          <span>{`${recipe.quantity} x ${recipe.sale_price} Bs.D`}</span>
        </div>
      </div>
      <div className="flex justify-center items-center">
        <span className="text-end">{`${subtotal} Bs.D`}</span>
      </div>
    </article>
  );
}

export default OrderItemRecipe;
