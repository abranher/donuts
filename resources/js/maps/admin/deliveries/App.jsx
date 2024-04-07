import React from "react";
import MapView from "./components/MapView";

function App() {
  return (
    <>
      <section className="w-full flex flex-col justify-center items-start gap-6 py-8 bg-white dark:bg-dark-card rounded-lg shadow-lg">
        <div>
          <p className="font-bold text-xl dark:text-gray-300 px-8">
            Mapa de repartidores
          </p>
        </div>
        <div className="bg-slate-200 w-full h-[650px]">
          <MapView />
        </div>
      </section>
    </>
  );
}

export default App;
