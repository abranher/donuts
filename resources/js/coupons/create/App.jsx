import React, { useState } from "react";
import { useForm } from "react-hook-form";
import InputForm from "../../components/InputForm";
import { CustomProvider, DatePicker, Stack } from "rsuite";
import "rsuite/dist/rsuite.min.css";
import * as locales from "rsuite/locales";
import dayjs from "dayjs";
import isBefore from "date-fns/isBefore";

function App() {
  const [expiresDate, setExpiresDate] = useState("");
  const getDate = (date = "") => dayjs(date).format("YYYY-MM-DDTHH:mm");

  console.log(expiresDate);
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const onSubmit = handleSubmit((data, e) => {
    console.log(data);
    e.target.submit();
  });

  return (
    <>
      <form
        action={route("coupons.store")}
        method="POST"
        onSubmit={onSubmit}
        className="relative p-4 bg-white rounded-lg shadow-lg dark:bg-dark-card sm:p-5"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <div className="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 className="text-2xl font-bold text-slate-500 dark:text-white">
            Crear Cupón
          </h3>
        </div>
        <section>
          <div className="grid gap-7 my-12 sm:grid-cols-2">
            <input
              type="hidden"
              name="expires_at"
              value={expiresDate && getDate(expiresDate)}
            />

            <InputForm
              name={"code"}
              title={"Código (Ej: EJEMPLO123)"}
              register={register}
              errors={errors.code}
              rules={{
                required: {
                  value: true,
                  message: "El Código es requerido! ",
                },
                pattern: {
                  value: /^[0-9A-Z]+$/,
                  message:
                    "El Código solo puede contener mayúsculas y números!",
                },
                minLength: {
                  value: 5,
                  message: "El Código debe tener al menos 5 caracteres!",
                },
                maxLength: {
                  value: 15,
                  message: "El Código no debe tener más de 15 caracteres!",
                },
              }}
            />

            <InputForm
              name={"discount"}
              type="number"
              title={"Descuento (%)"}
              register={register}
              errors={errors.discount}
              rules={{
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
              }}
            />

            <div className="flex flex-col gap-2 w-full">
              <p>Fecha de expiración</p>
              <CustomProvider locale={locales.esAR}>
                <Stack spacing={10} direction="column" alignItems="flex-start">
                  <DatePicker
                    defaultValue={new Date()}
                    size="lg"
                    format="MM/dd/yyyy hh:mm aa"
                    showMeridian
                    name="dates"
                    shouldDisableDate={(date) => isBefore(date, new Date())}
                    onChange={(dates) => {
                      if (dates != null) {
                        setExpiresDate(dates);
                      }
                    }}
                  />
                </Stack>
              </CustomProvider>
            </div>

            <InputForm
              name={"uses"}
              type="number"
              title={"Número de usos"}
              register={register}
              errors={errors.uses}
              rules={{
                required: {
                  value: true,
                  message: "El Número de usos es requerido!",
                },
                pattern: {
                  value: /^[0-9]+$/,
                  message: "El Número de usos solo puede contener números!",
                },
                maxLength: {
                  value: 3,
                  message: "El Número de usos debe tener máximo 3 caracteres",
                },
                validate: (value) => {
                  const valor = parseInt(value);
                  return (
                    (valor !== 0 && valor > 0) ||
                    "El Número de usos no puede ser menor o igual a cero!"
                  );
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
            <a href={route("coupons.index")}>
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
              Crear
            </button>
          </div>
        </section>
      </form>
    </>
  );
}

export default App;
