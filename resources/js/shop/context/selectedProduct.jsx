import { createContext, useState } from "react";

export const SelectedProductContext = createContext();

export function SelectedProductProvider({ children }) {
  const [selectedProduct, setSelectedProduct] = useState(null);
  const [productView, setProductView] = useState(false);

  return (
    <SelectedProductContext.Provider
      value={{
        selectedProduct,
        setSelectedProduct,
        productView,
        setProductView,
      }}
    >
      {children}
    </SelectedProductContext.Provider>
  );
}
