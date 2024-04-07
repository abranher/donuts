import React, { useId } from "react";
import { useFilters } from "../hooks/useFilters";

function Filters({ categories }) {
  const { filters, setFilters } = useFilters();
  const minPriceFilterId = useId();

  const handleChangeMinPrice = (e) => {
    setFilters((prevState) => ({
      ...prevState,
      minPrice: parseFloat(e.target.value),
    }));
  };

  const handleChangeCategory = (e) => {
    setFilters((prevState) => ({
      ...prevState,
      category: e.target.value,
    }));
  };

  return (
    <>
      <section className="flex justify-center items-center flex-col gap-3">
        <label htmlFor={minPriceFilterId} className="text-2xl font-medium">
          Precio a partir de:
        </label>
        <input
          className="text-lg"
          type="range"
          id={minPriceFilterId}
          min={"0"}
          max={"60"}
          onChange={handleChangeMinPrice}
          value={filters.minPrice}
        />
        <span className="text-2xl font-bold">{`${filters.minPrice}Bs.D`}</span>
      </section>

      <section className="py-4 flex justify-start gap-3 overflow-x-auto w-full">
        <button
          onClick={handleChangeCategory}
          className={
            filters.category == "all"
              ? "h-10 px-6 whitespace-nowrap font-semibold rounded-xl border-2 border-slate-300 text-slate-900 dark:text-slate-300 bg-gray-200 dark:bg-gray-800"
              : "h-10 px-6 whitespace-nowrap font-semibold rounded-xl border-2 border-slate-300 text-slate-900 dark:text-slate-300"
          }
          value={"all"}
        >
          Todas
        </button>
        {categories.map((category) => (
          <button
            key={category.id}
            onClick={handleChangeCategory}
            className={
              filters.category == category.name
                ? "h-10 px-6 whitespace-nowrap font-semibold rounded-xl border-2 border-slate-300 text-slate-900 dark:text-slate-300 bg-gray-200 dark:bg-gray-800"
                : "h-10 px-6 whitespace-nowrap font-semibold rounded-xl border-2 border-slate-300 text-slate-900 dark:text-slate-300"
            }
            value={category.name}
          >
            {category.name}
          </button>
        ))}
      </section>
    </>
  );
}

export default Filters;
