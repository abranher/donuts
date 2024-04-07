import React from "react";
import { useForm } from "react-hook-form";
import { APP_URL } from "../../../APP_URL";
import SelectForm from "../../../components/SelectForm";
import InputForm from "../../../components/InputForm";
import TextareaForm from "../../../components/TextareaForm";

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
        action={route("products.update", product.id)}
        method="POST"
        onSubmit={onSubmit}
        encType="multipart/form-data"
        className="relative p-4 bg-white rounded-lg shadow dark:bg-dark-card sm:p-5"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <input type="hidden" name="_method" value="PATCH" />
        <div className="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 className="text-2xl font-bold text-slate-500 dark:text-white">
            Editar Producto
          </h3>
        </div>
        <section>
          <div className="grid gap-4 mb-4 lg:grid-cols-2">
            <InputForm
              name={"name"}
              title={"Nombre del producto"}
              register={register}
              errors={errors.name}
              defaultValue={product.name}
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
                  value: 60,
                  message: "El nombre debe tener máximo 60 caracteres",
                },
              }}
            />

            <InputForm
              name={"price"}
              title={"Precio actual (Ej: 2.22)"}
              register={register}
              errors={errors.price}
              defaultValue={product.price}
              rules={{
                required: {
                  value: true,
                  message: "El precio es requerido!",
                },
                pattern: {
                  value: /^[0-9]+\.[0-9]{2,2}$/,
                  message: "Precio no válido, debe tener la forma 00.00",
                },
                validate: (value) => {
                  const valor = parseFloat(value);
                  return (
                    (valor !== 0 && valor > 0) ||
                    "El precio no puede ser menor o igual a cero!"
                  );
                },
              }}
            />

            <SelectForm
              name={"category_product_id"}
              title={"Categoría"}
              register={register}
              defaultValue={product.category_product_id}
              errors={errors.category_product_id}
              rules={{
                required: {
                  value: true,
                  message: "La categoría es requerida!",
                },
              }}
              data={categories}
            />

            <SelectForm
              name={"size"}
              title={"Tamaño"}
              register={register}
              errors={errors.size}
              defaultValue={product.size}
              rules={{
                required: {
                  value: true,
                  message: "El tamaño es requerido!",
                },
              }}
              data={sizes}
              arrayData
            />

            <InputForm
              name={"min_stock"}
              type={"number"}
              title={"Mínimo en Stock"}
              register={register}
              errors={errors.min_stock}
              defaultValue={product.min_stock}
              rules={{
                required: {
                  value: true,
                  message: "El mínimo en stock es requerido!",
                },
                validate: (value) => {
                  const valor = parseInt(value);
                  if (valor === 0) {
                    return "El mínimo en stock no puede ser cero!";
                  }
                },
              }}
            />

            <InputForm
              name={"max_stock"}
              type={"number"}
              title={"Máximo en Stock"}
              register={register}
              errors={errors.max_stock}
              defaultValue={product.max_stock}
              rules={{
                required: {
                  value: true,
                  message: "El máximo en stock es requerido!",
                },
                validate: (value) => {
                  const valor = parseInt(value);
                  const valorMinStock = parseInt(watch("min_stock"));
                  if (valor === 0) {
                    return "El máximo en stock no puede ser cero!";
                  } else if (valorMinStock >= valor) {
                    return "El máximo en stock no puede ser menor o igual al mínimo en stock";
                  }
                },
              }}
            />

            <TextareaForm
              name={"description"}
              title={"Descripción"}
              register={register}
              errors={errors.description}
              defaultValue={product.description}
              rules={{
                required: {
                  value: true,
                  message: "La descripción es requerida!",
                },
                minLength: {
                  value: 30,
                  message: "La descripción debe tener al menos 30 caracteres",
                },
                maxLength: {
                  value: 255,
                  message: "La descripción debe tener máximo 255 caracteres",
                },
              }}
            />
          </div>

          <div className="mb-4">
            <span className="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
              Imagenes del producto
            </span>
            <div className="flex justify-center items-center gap-4 flex-wrap">
              <div className="relative p-2 bg-gray-100 rounded-lg w-40 h-40 dark:bg-gray-700">
                <img
                  className="w-36 h-36"
                  src={`${APP_URL}/storage/products/${product.image}`}
                  alt={product.name}
                />
              </div>
            </div>
            <div className="flex justify-center items-center w-full my-4">
              <label
                htmlFor="dropzone-file"
                className="flex flex-col justify-center items-center w-full h-32 bg-violet-50 rounded-lg border-2 border-violet-300 border-dashed cursor-pointer hover:bg-violet-100"
              >
                <div className="flex flex-col justify-center items-center pt-5 pb-6">
                  <svg
                    aria-hidden="true"
                    className="mb-3 w-10 h-10 text-gray-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                    />
                  </svg>
                  <p className="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span className="font-semibold">Click para cargar</span>
                  </p>
                  <p className="text-xs text-gray-500 dark:text-gray-400">
                    SVG, PNG, JPG or GIF (MÁX. 800x400px)
                  </p>
                </div>
                <input
                  id="dropzone-file"
                  type="file"
                  className="hidden"
                  name="imagen"
                />
              </label>
            </div>
          </div>
          <div className="my-5">
            <p className="dark:text-gray-300 font-medium">
              Todos los campos son obligatorios (*)
            </p>
          </div>

          <div className="items-center justify-end space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
            <a href={route("products.index")}>
              <button
                type="button"
                className="w-full justify-center sm:w-auto text-gray-500 inline-flex items-center bg-white hover:bg-gray-100 focus:outline-none rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600"
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
              className="w-full sm:w-auto justify-center text-white inline-flex bg-violet-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-violet-600 active:bg-violet-800"
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
