import React from "react";
import { APP_URL } from "../../APP_URL";
import { useCartRecipe } from "../hooks/useCartRecipe";

function Recipes({ userWithRecipes }) {
  const { addToCartRecipe, removeFromCartRecipe, cartRecipe } = useCartRecipe();
  const recipes =
    userWithRecipes.recipes == undefined ? [] : userWithRecipes.recipes;

  const checkRecipeInCart = (recipe) =>
    cartRecipe.some((item) => item.id === recipe.id);

  return (
    <>
      {recipes.length != 0 && (
        <section className="bg-gray-100 dark:bg-dark w-full px-auto">
          <h3 className="py-7 px-10 text-3xl dark:text-slate-100 font-medium">
            Tus Recetas
          </h3>
          <div className="py-2 mb-6 md:px-12 mx-3 flex relative z-30 justify-start items-center gap-6 overflow-x-auto">
            <ul className="flex justify-center md:justify-start md:gap-8 gap-5 mb-6 mx-2 items-center flex-nowrap">
              {recipes.map((recipe) => {
                const isRecipeInCart = checkRecipeInCart(recipe);
                return (
                  <li
                    key={recipe.id}
                    className="flex justify-center h-72 items-center bg-slate-200 border dark:bg-dark-card dark:border-slate-600 border-slate-300 w-full gap-2 rounded-lg"
                  >
                    <div className="w-80 h-72">
                      <div className="scale-105 h-72 bg-cover xl:h-full border border-slate-300 dark:text-gray-600 rounded-lg relative overflow-hidden bg-white">
                        <img
                          src={`${APP_URL}/storage/products/${recipe.image}`}
                          alt={recipe.name}
                          className="inset-0 w-full h-full object-cover rounded-lg"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <div className="flex flex-col justify-center h-80 p-4 w-3/4">
                      <div className="flex justify-center items-start flex-col">
                        <h1 className="flex-auto font-medium text-slate-900 dark:text-gray-200">
                          {recipe.name}
                        </h1>
                        <p>
                          {recipe.description == null
                            ? ""
                            : recipe.description.length >= 30
                            ? `${recipe.description.slice(0, 30)}...`
                            : recipe.description}
                        </p>
                        <div className="w-full flex-none mt-2 order-1 text-4xl font-bold text-violet-600">
                          {recipe.sale_price}{" "}
                          <span className="text-2xl">Bs.D</span>
                        </div>
                        <div
                          className={
                            recipe.available == 0
                              ? "text-sm font-medium text-red-500"
                              : "text-sm font-medium text-green-500"
                          }
                        >
                          {recipe.available == 0
                            ? "No disponible"
                            : "Disponibles"}{" "}
                          : {recipe.available}
                        </div>
                      </div>

                      <div className="flex justify-start mt-3 space-x-4 text-sm font-medium">
                        <div className="flex-auto flex justify-start items-center">
                          <button
                            onClick={() => {
                              isRecipeInCart
                                ? removeFromCartRecipe(recipe)
                                : addToCartRecipe(recipe);
                            }}
                            className={
                              isRecipeInCart
                                ? "btn-remove-from-cart"
                                : "btn-primary-rounded"
                            }
                            disabled={recipe.available == 0 ? true : false}
                          >
                            {isRecipeInCart ? "Remover" : "Añadir al carrito"}
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

export default Recipes;
