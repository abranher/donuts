import React from "react";
import { useForm } from "react-hook-form";

function App() {
  const {
    register,
    handleSubmit,
    formState: { errors },
    watch,
  } = useForm();

  const onSubmit = handleSubmit((data, e) => {
    console.log(data);
    e.target.submit();
  });

  return (
    <>
      <form
        action={route("promotions.update", promotion.id)}
        method="POST"
        onSubmit={onSubmit}
        className="relative p-4 bg-white rounded-lg shadow-lg dark:bg-dark-card sm:p-5"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <input type="hidden" name="_method" value="PATCH" />
        <div className="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 className="text-2xl font-bold text-slate-500 dark:text-white">
            Editar Promoción
          </h3>
        </div>
        <section>
          <div className="grid gap-7 my-12 sm:grid-cols-2">
            <div className="relative z-0 w-full">
              <input
                type="text"
                id="title"
                className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                placeholder=""
                defaultValue={promotion.title}
                {...register("title", {
                  required: {
                    value: true,
                    message: "El Título es requerido! ",
                  },
                  minLength: {
                    value: 15,
                    message: "El Título debe tener al menos 15 caracteres!",
                  },
                  maxLength: {
                    value: 60,
                    message: "El Titulo no debe tener más de 60 caracteres!",
                  },
                })}
              />
              <label
                htmlFor="title"
                className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >
                Título *
              </label>
              {errors.title && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.title.message}
                  </span>
                </p>
              )}
            </div>

            <div className="relative z-0 w-full">
              <input
                type="number"
                id="discount"
                className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                placeholder=""
                defaultValue={promotion.discount}
                {...register("discount", {
                  required: {
                    value: true,
                    message: "El Descuento es requerido! ",
                  },
                  pattern: {
                    value: /^[0-9]+$/,
                    message: "El Descuento solo puede contener números!",
                  },
                  maxLength: {
                    value: 3,
                    message: "El Descuento debe tener máximo 3 caracteres",
                  },
                  validate: (value) => {
                    const valor = parseInt(value);
                    return (
                      (valor !== 0 && valor > 0) ||
                      "El Descuento no puede ser menor o igual a cero!"
                    );
                  },
                })}
              />
              <label
                htmlFor="discount"
                className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >
                Descuento *
              </label>
              {errors.discount && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.discount.message}
                  </span>
                </p>
              )}
            </div>

            <div className="relative z-0 w-full">
              <input
                type="datetime-local"
                id="start_date"
                className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                placeholder=""
                defaultValue={promotion.start_date}
                {...register("start_date", {
                  required: {
                    value: true,
                    message: "La fecha de inicio es requerida! ",
                  },
                  validate: (value) => {
                    const date = new Date(value);
                    const now = new Date();

                    return (
                      date > now ||
                      "La fecha de inicio tiene que ser en el presente o futuro!"
                    );
                  },
                })}
              />
              <label
                htmlFor="start_date"
                className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >
                Fecha Inicio *
              </label>
              {errors.start_date && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.start_date.message}
                  </span>
                </p>
              )}
            </div>

            <div className="relative z-0 w-full">
              <input
                type="datetime-local"
                id="end_date"
                className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                placeholder=""
                defaultValue={promotion.end_date}
                {...register("end_date", {
                  required: {
                    value: true,
                    message: "La fecha de fin es requerida! ",
                  },
                  validate: (value) => {
                    return (
                      (watch("start_date") != value &&
                        watch("start_date") < value) ||
                      "La fecha fin no puede ser menor o igual a la fecha inicio!"
                    );
                  },
                })}
              />
              <label
                htmlFor="end_date"
                className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >
                Fecha Fin *
              </label>
              {errors.end_date && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.end_date.message}
                  </span>
                </p>
              )}
            </div>

            <div className="relative z-0 w-full">
              <textarea
                type="text"
                rows={4}
                id="description"
                className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                placeholder=""
                defaultValue={promotion.description}
                {...register("description", {
                  required: {
                    value: true,
                    message: "La Descripción es requerido!",
                  },
                  minLength: {
                    value: 30,
                    message: "La Descripción debe tener al menos 30 caracteres",
                  },
                  maxLength: {
                    value: 200,
                    message: "La Descripción debe tener máximo 200 caracteres",
                  },
                })}
              ></textarea>
              <label
                htmlFor="description"
                className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
              >
                Descrpción *
              </label>
              {errors.description && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.description.message}
                  </span>
                </p>
              )}
            </div>
          </div>
          <div className="my-5">
            <p className="dark:text-gray-300 font-medium">
              Todos los campos son obligatorios (*)
            </p>
          </div>
          <div className="items-center justify-end space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href={route("promotions.index")}>
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
              Actualizar
            </button>
          </div>
        </section>
      </form>
    </>
  );
}

export default App;
