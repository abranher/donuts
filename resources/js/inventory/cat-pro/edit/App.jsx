import React from "react";
import { useForm } from "react-hook-form";
import InputForm from "../../../components/InputForm";

function App() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const onSubmit = handleSubmit((data, e) => {
    e.target.submit();
  });

  return (
    <>
      <form
        action={route("category-products.update", category.id)}
        method="POST"
        onSubmit={onSubmit}
        className="relative p-4 bg-white rounded-lg shadow-lg dark:bg-dark-card sm:p-5"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <input type="hidden" name="_method" value="PATCH" />
        <div className="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 className="text-2xl font-bold text-slate-500 dark:text-white">
            Editar Categoría
          </h3>
        </div>
        <section>
          <div className="grid gap-4 my-12 sm:grid-cols-2">
            <InputForm
              name={"name"}
              title={"Nombre de la categoría"}
              register={register}
              errors={errors.name}
              defaultValue={category.name}
              rules={{
                required: {
                  value: true,
                  message: "El nombre es requerido!",
                },
                minLength: {
                  value: 4,
                  message: "El nombre debe tener al menos 4 caracteres",
                },
                maxLength: {
                  value: 255,
                  message: "El nombre debe tener máximo 255 caracteres",
                },
              }}
            />
          </div>
          <div className="my-5">
            <p className="dark:text-gray-300 font-medium">
              Todos los campos son obligatorios (*)
            </p>
          </div>

          <div className="items-center justify-end space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href={route("category-products.index")}>
              <button
                type="button"
                className="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"
              >
                <svg
                  className="mr-1 -ml-1 w-5 h-5"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fillRule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clipRule="evenodd"
                  />
                </svg>
                Descartar
              </button>
            </a>
            <button
              type="submit"
              className="w-full sm:w-auto justify-center text-white inline-flex bg-violet-600 hover:bg-primary-800 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-violet-600 focus:bg-violet-800"
            >
              Añadir
            </button>
          </div>
        </section>
      </form>
    </>
  );
}

export default App;
