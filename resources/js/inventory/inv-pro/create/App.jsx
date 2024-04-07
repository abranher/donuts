import React, { useState } from "react";
import { useForm } from "react-hook-form";
import InputForm from "../../../components/InputForm";
import SelectForm from "../../../components/SelectForm";
import TextareaForm from "../../../components/TextareaForm";
import UploadIcon from "../../../icons/UploadIcon";

function App() {
  const [previewUrl, setPreviewUrl] = useState(null);

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

  const handleFileChange = (e) => {
    const FileList = e.target.files;
    if (FileList.length == 0) {
      setPreviewUrl(null);
    } else {
      const reader = new FileReader();
      reader.onloadend = () => {
        setPreviewUrl(reader.result);
      };
      reader.readAsDataURL(FileList[0]);
    }
  };

  return (
    <>
      <form
        action={route("products.store")}
        method="POST"
        onSubmit={onSubmit}
        encType="multipart/form-data"
        className="relative p-4 bg-white rounded-lg shadow dark:bg-dark-card sm:p-5"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <div className="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 className="text-2xl font-bold text-slate-500 dark:text-white">
            Crear Producto
          </h3>
        </div>
        <section>
          <div className="grid gap-4 mb-4 lg:grid-cols-2">
            <InputForm
              name={"name"}
              title={"Nombre del producto"}
              register={register}
              errors={errors.name}
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
            <span className="block mb-2 text-base font-medium text-gray-900 dark:text-white">
              Imagen del producto
            </span>
            <div className="flex justify-center items-center w-full">
              <label
                htmlFor="dropzone-file"
                className="flex flex-col justify-center items-center w-full h-32 bg-violet-50 rounded-lg border-2 border-violet-300 border-dashed cursor-pointer hover:bg-violet-100"
              >
                <div className="flex flex-col justify-center items-center pt-5 pb-6">
                  <UploadIcon />
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
                  name="image"
                  onChange={handleFileChange}
                  className="z-0"
                  required
                />
              </label>
            </div>
          </div>

          <div className="w-full flex justify-center my-7">
            {previewUrl == null ? (
              <img
                src="../img/previewImage.jpg"
                className="w-full h-auto max-w-xl rounded-lg"
                alt="Imagen previsualizada"
              />
            ) : (
              <img
                src={previewUrl}
                className="w-full h-auto max-w-xl rounded-lg"
                alt="Imagen previsualizada"
              />
            )}
          </div>
          <div className="w-full flex justify-center">
            <h2>** La Imagen es obligatoria **</h2>
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
            {categories.length == 0 ? (
              <a
                href={route("category-products.create")}
                className="w-full sm:w-auto justify-center text-white inline-flex bg-violet-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-violet-600 active:bg-violet-800"
              >
                Crear Categoría
              </a>
            ) : (
              <button
                type="submit"
                className="w-full sm:w-auto justify-center text-white inline-flex bg-violet-600 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-violet-600 active:bg-violet-800"
              >
                Añadir
              </button>
            )}
          </div>
        </section>
      </form>
    </>
  );
}

export default App;
