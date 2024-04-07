import { useEffect, useState } from "react";
import { useFilters } from "./hooks/useFilters";
import { CartProvider } from "./context/cart";
import { CartRecipeProvider } from "./context/recipe";
import { TotalProvider } from "./context/total";
import { SelectedProductProvider } from "./context/selectedProduct";
import Cart from "./components/Cart";
import Slider from "./components/Slider";
import Headers from "./components/Headers";
import Product from "./components/Product";
import ProcessOrder from "./components/ProcessOrder";
import FinishPay from "./components/FinishPay";
import ProductsOnOffer from "./components/ProductsOnOffer";
import Recipes from "./components/Recipes";
import ProductView from "./components/ProductView";
import Loading from "../components/Loading";
import Monitor from "./components/Monitor";

function App() {
  const [categories, setCategories] = useState([]);
  const [products, setProducts] = useState([]);
  const [userWithRecipes, setUserWithRecipes] = useState([]);
  const [loading, setLoading] = useState(false);
  const { filters, filterProducts } = useFilters();
  const filteredProducts = filterProducts(products);
  const [views, setViews] = useState({
    cart: false,
    processPay: false,
    finishPay: false,
  });

  useEffect(() => {
    getData();
  }, []);

  const getData = async () => {
    setLoading(true);
    const resProducts = await axios.get(route("api-shop.index"));
    const resCategories = await axios.get(route("api-category-products.index"));
    const resRecipes = await axios.get(route("api-recipes.show", userID));
    // tengo que evaluar si la respuesta estuvo ok, porque el Loading sigue aun asi si la consulta falla
    setProducts(resProducts.data);
    setCategories(resCategories.data);
    setUserWithRecipes(resRecipes.data);
    setLoading(false);
  };

  return (
    <SelectedProductProvider>
      <CartProvider>
        <CartRecipeProvider>
          <TotalProvider>
            <Cart views={views} setViews={setViews} />

            <ProcessOrder views={views} setViews={setViews} />

            <FinishPay views={views} setViews={setViews} />

            {loading && <Loading />}

            <Slider />

            <section className="flex flex-col sm:flex-row gap-5 w-full px-12">
              <Monitor />
              <div className="bg-gradient-to-br from-sky-400 via-sky-400 to-violet-400 p-4 rounded-2xl w-full text-white flex items-center justify-between max-w-2xl mx-auto">
                <div className="flex flex-col gap-6">
                  <div>
                    <span className="text-gray-200">Black friday sale </span>
                    <br />
                    <span className="text-2xl text-white font-semibold">
                      20% off every Product{" "}
                    </span>
                  </div>
                  <a
                    href="#"
                    target="_blank"
                    rel="noreferrer"
                    className="text-black bg-white hover:bg-gray-50 px-4 py-2 rounded-lg w-fit  ease duration-300 flex gap-1 items-center group text-sm"
                  >
                    <span>Buy now </span>
                    <svg
                      data-v-e660a7a7=""
                      xmlns="http://www.w3.org/2000/svg"
                      xmlnsXlink="http://www.w3.org/1999/xlink"
                      aria-hidden="true"
                      role="img"
                      className="group-hover:translate-x-1 transition-transform ease duration-200"
                      width="1em"
                      height="1em"
                      viewBox="0 0 256 256"
                    >
                      <path
                        fill="currentColor"
                        d="m221.66 133.66l-72 72a8 8 0 0 1-11.32-11.32L196.69 136H40a8 8 0 0 1 0-16h156.69l-58.35-58.34a8 8 0 0 1 11.32-11.32l72 72a8 8 0 0 1 0 11.32Z"
                      ></path>
                    </svg>
                  </a>
                </div>
                <div>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    className="w-16 h-16 text-gray-100"
                    viewBox="0 0 15 15"
                  >
                    <path
                      fill="currentColor"
                      fillRule="evenodd"
                      d="M4.5 0A2.5 2.5 0 0 0 2 2.5v.286c0 .448.133.865.362 1.214H1.5A1.5 1.5 0 0 0 0 5.5v1A1.5 1.5 0 0 0 1.5 8H7V4h1v4h5.5A1.5 1.5 0 0 0 15 6.5v-1A1.5 1.5 0 0 0 13.5 4h-.862c.229-.349.362-.766.362-1.214V2.5A2.5 2.5 0 0 0 10.5 0c-1.273 0-2.388.68-3 1.696A3.498 3.498 0 0 0 4.5 0ZM8 4h2.786C11.456 4 12 3.456 12 2.786V2.5A1.5 1.5 0 0 0 10.5 1A2.5 2.5 0 0 0 8 3.5V4ZM7 4H4.214C3.544 4 3 3.456 3 2.786V2.5A1.5 1.5 0 0 1 4.5 1A2.5 2.5 0 0 1 7 3.5V4Z"
                      clipRule="evenodd"
                    ></path>
                    <path
                      fill="currentColor"
                      d="M7 9H1v3.5A2.5 2.5 0 0 0 3.5 15H7V9Zm1 6h3.5a2.5 2.5 0 0 0 2.5-2.5V9H8v6Z"
                    ></path>
                  </svg>
                </div>
              </div>
            </section>

            <ProductsOnOffer products={products} />

            <Headers categories={categories} />

            {
              <Product
                category={filters.category}
                products={filteredProducts}
              />
            }

            <ProductView />

            <Recipes userWithRecipes={userWithRecipes} />

            {/* advertisiment */}
            <section className="relative h-96 w-full flex flex-col items-center justify-center text-center text-white">
              {" "}
              <img
                className="absolute w-full h-full top-0 left-0 bottom-0 right-0 object-cover object-center"
                src="img/Donacentral.jpg"
                alt=""
              />
              <div className="absolute top-0 right-0 bottom-0 left-0 bg-gray-900 opacity-70"></div>
              <div className="z-10 text-lg font-bold">GRAN OFERTA!</div>
              <div className="z-10 text-xl font-medium">
                OFERTAS EN LA CATEGORÍA CLÁSICA
              </div>
              <div className="flex items-end justify-center z-10">
                <div className="m-2 sm:m-5">
                  <span className="text-violet-600 font-bold text-xl sm:text-5xl">
                    110{" "}
                  </span>
                  <p>Days </p>
                </div>
                <div className="m-2 sm:m-5">
                  <span className="text-violet-600 font-bold text-xl sm:text-5xl">
                    13{" "}
                  </span>
                  <p>Hours </p>
                </div>
                <div className="m-2 sm:m-5">
                  <span className="text-violet-600 font-bold text-xl sm:text-5xl">
                    47{" "}
                  </span>
                  <p>Minutes </p>
                </div>
                <div className="m-2 sm:m-5">
                  <span className="text-violet-600 font-bold text-xl sm:text-5xl">
                    20{" "}
                  </span>
                  <p>Seconds </p>
                </div>
              </div>
              <div className="rounded-md shadow z-10 mt-5">
                <a
                  href="#"
                  className="w-full px-8 py-3 font-medium border border-transparent text-base leading-6 rounded-full text-white bg-violet-600 hover:bg-violet-500 focus:outline-none focus:border-violet-700 focus:shadow-outline-violet transition duration-150 ease-in-out md:py-4 md:text-md md:px-16"
                >
                  <span>Ver más</span>
                </a>
              </div>
            </section>

            {/* advertisiment */}
            <section className="px-3 py-5 bg-neutral-100 lg:py-10 w-full">
              <div className="grid grid-cols-2 items-center justify-items-center gap-5 w-full">
                <div className="order-2 flex flex-col justify-center items-center">
                  <p className="text-4xl text-center font-bold md:text-7xl text-orange-600">
                    25% OFF{" "}
                  </p>
                  <p className="text-5xl text-center font-bold">SUMMER SALE </p>
                  <p className="my-2 text-sm md:text-lg">
                    For limited time only!{" "}
                  </p>
                  <button className="btn-primary-rounded">Shop Now </button>
                </div>
                <div className="order-1">
                  <img
                    className="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]"
                    src="img/donut1.jpg"
                    alt=""
                  />
                </div>
              </div>
            </section>
          </TotalProvider>
        </CartRecipeProvider>
      </CartProvider>
    </SelectedProductProvider>
  );
}

export default App;
