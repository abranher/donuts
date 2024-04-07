import { useContext } from "react";
import { FiltersContext } from "../context/filters";

export function useFilters() {
  const { filters, setFilters } = useContext(FiltersContext);

  const filterProducts = (products) =>
    products.filter(
      (product) =>
        parseFloat(product.sale_price) >= filters.minPrice &&
        (filters.category === "all" ||
          product.category_product.name === filters.category)
    );

  const filterProductsWithOffers = (products) =>
    products.filter((product) => product.promotions.length !== 0);

  return { filters, filterProducts, filterProductsWithOffers, setFilters };
}
