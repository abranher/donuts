import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";
import { FiltersProvider } from "./context/filters";

ReactDOM.createRoot(document.getElementById("tienda")).render(
  <FiltersProvider>
    <App />
  </FiltersProvider>
);
