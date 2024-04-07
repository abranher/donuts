export function useFilters() {
  const getGlazed = (rawMaterial) =>
    rawMaterial.filter(
      (raw) => raw.category_raw_material.name == "Glaseados"
    );

  const getToppings = (rawMaterial) =>
    rawMaterial.filter((raw) => raw.category_raw_material.name == "Toppings");

  return { getGlazed, getToppings };
}
