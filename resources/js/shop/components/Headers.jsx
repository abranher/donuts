import React from "react";
import Filters from "./Filters";

export default function Headers({ categories }) {
  return (
    <>
      <section className="flex justify-start items-center gap-4 w-full">
        <h2 className="mx-5 mt-8 text-3xl dark:text-slate-100 font-medium">
          Navega por las distintas categorías
        </h2>
      </section>
      <section className="w-11/12">
        <article className="py-4 flex justify-center items-center flex-col gap-3 w-full">
          <Filters categories={categories} />
        </article>
      </section>
    </>
  );
}
