import React, { useState } from "react";
import { useForm } from "react-hook-form";

function App() {
  const ElementRoot = document.getElementById("main");
  const routeStore = ElementRoot.getAttribute("data-route-store");
  const routeIndex = ElementRoot.getAttribute("data-route-index");
  const csrfToken = ElementRoot.getAttribute("data-csrf");
  const [Municipalities, setMunicipalities] = useState([]);

  const filterData = (e) => {
    const filteredMunicipalities = municipalities.filter((item) => {
      return item.state_id == e.target.value;
    });
    setMunicipalities(filteredMunicipalities);
  };

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
        action={routeStore}
        method="POST"
        onSubmit={onSubmit}
        className="relative p-4 bg-white rounded-lg shadow-lg dark:bg-dark-card sm:p-5"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <div className="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
          <h3 className="text-2xl font-bold text-slate-500 dark:text-white">
            Crear repartidor
          </h3>
        </div>
        <section>
          <h2 className="text-2xl font-bold text-slate-500 dark:text-white my-3">
            Datos de la cuenta
          </h2>
          <div className="grid gap-4 mb-4 lg:grid-cols-2">
            <div>
              <label
                htmlFor="email"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Correo electrónico *
              </label>
              <input
                type="text"
                id="email"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="ejemplo@ejemplo.com"
                {...register("email", {
                  required: {
                    value: true,
                    message: "El correo es requerido!",
                  },
                  pattern: {
                    value: /^[a-z0-9_.+-]+@[a-z0-9-]+\.[a-z]{2,4}$/,
                    message:
                      "Correo no válido, debe tener la forma ejemplo@ejemplo.com",
                  },
                })}
              />
              {errors.email && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.email.message}
                  </span>
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="username"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Nombre de usuario *
              </label>
              <input
                type="text"
                id="username"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="carlosF90"
                {...register("username", {
                  required: {
                    value: true,
                    message: "El nombre de usuario es requerido!",
                  },
                  minLength: {
                    value: 4,
                    message:
                      "El nombre de usuario de tener al menos 4 caracteres!",
                  },
                  maxLength: {
                    value: 20,
                    message:
                      "El nombre de usuario no debe tener más de 20 caracteres!",
                  },
                })}
              />
              {errors.username && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.username.message}
                  </span>
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="password"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Contraseña *
              </label>
              <input
                type="password"
                id="password"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="Ej: Example.23"
                {...register("password", {
                  required: {
                    value: true,
                    message: "La contraseña es requerida!",
                  },
                  minLength: {
                    value: 8,
                    message: "La contraseña debe tener al menos 8 caracteres",
                  },
                  validate: (contrasena) => {
                    const Mayuscula = /[A-Z]/;
                    const CaracteresEspeciales = /[\W_]/;
                    const Numbers = /[0-9]/;
                    const Space = /\s/;

                    if (Space.test(contrasena)) {
                      return "La contraseña no puede contener espacios";
                    } else if (!Mayuscula.test(contrasena)) {
                      return "La contraseña debe tener al menos una letra mayúscula";
                    } else if (!CaracteresEspeciales.test(contrasena)) {
                      return "La contraseña debe tener al menos un carácter especial";
                    } else if (!Numbers.test(contrasena)) {
                      return "La contraseña debe tener al menos un número";
                    } else {
                      return true;
                    }
                  },
                })}
              />
              {errors.password && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.password.message}
                  </span>
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="password_confirmation"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Confirme contraseña *
              </label>
              <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="Ej: Example.23"
                {...register("password_confirmation", {
                  required: {
                    value: true,
                    message: "Confirmar contraseña es requerido!",
                  },
                  validate: (value) =>
                    value === watch("password") ||
                    "Las contraseñas deben coincidir",
                })}
              />
              {errors.password_confirmation && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.password_confirmation.message}
                  </span>
                </p>
              )}
            </div>
          </div>
          <h2 className="text-2xl font-bold text-slate-500 dark:text-white my-3">
            Información Personal
          </h2>
          <div className="grid gap-4 mb-4 lg:grid-cols-2">
            <div>
              <label
                htmlFor="name"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Nombre Completo*
              </label>
              <input
                type="text"
                id="name"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="Nombre Apellido"
                {...register("name", {
                  required: {
                    value: true,
                    message: "El nombre es requerido!",
                  },
                  minLength: {
                    value: 4,
                    message: "El nombre debe tener al menos 4 caracteres",
                  },
                  maxLength: {
                    value: 80,
                    message: "El nombre debe tener máximo 80 caracteres",
                  },
                })}
              />
              {errors.name && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.name.message}
                  </span>
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="birth"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Fecha de Nacimiento *
              </label>
              <input
                type="date"
                id="birth"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                {...register("birth", {
                  required: {
                    value: true,
                    message: "La fecha de nacimiento es requerida!",
                  },
                  validate: (value) => {
                    const fechaNacimiento = new Date(value);
                    const fechaActual = new Date();
                    const edad =
                      fechaActual.getFullYear() - fechaNacimiento.getFullYear();

                    return edad >= 18 || "Debe ser mayor de edad";
                  },
                })}
              />
              {errors.birth && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.birth.message}
                  </span>
                </p>
              )}
            </div>

            <div className="flex flex-col gap-2">
              <label
                htmlFor="identification_number"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Cédula de Identidad *
              </label>
              <div className="flex gap-2">
                <select
                  name="type"
                  id="type"
                  className="w-26 px-2 focus:bg-violet-50 border focus:border-violet-600 text-gray-900 text-sm rounded-lg block py-2.5 dark:bg-gray-700 dark:focus:border-violet-600 dark:text-white focus:outline-none"
                >
                  {typeIdentificationCard.map((item) => (
                    <option key={item} value={item}>
                      {item}
                    </option>
                  ))}
                </select>
                <div className="relative z-0 w-full">
                  <input
                    type="text"
                    id="identification_number"
                    className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                    placeholder="Ej: 00000000"
                    {...register("identification_number", {
                      required: {
                        value: true,
                        message: "El número de cédula es requerido!",
                      },
                      minLength: {
                        value: 7,
                        message:
                          "El número de cédula debe tener al menos 7 caracteres",
                      },
                      pattern: {
                        value: /^[0-9]+$/,
                        message:
                          "El número de cédula solo puede contener números!",
                      },
                    })}
                  />
                </div>
              </div>
              {errors.identification_number && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.identification_number.message}
                  </span>
                </p>
              )}
            </div>

            <div className="flex gap-2 flex-col">
              <label
                htmlFor="identification_number"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Número de Télefono *
              </label>
              <div className="flex gap-2">
                <select
                  name="code_phone"
                  id="code_phone"
                  className="w-20 px-2 focus:bg-violet-50 border focus:border-violet-600 text-gray-900 text-sm rounded-lg block py-2.5 dark:bg-gray-700 dark:focus:border-violet-600 dark:text-white focus:outline-none"
                  required
                >
                  {phoneCodes.map((item) => (
                    <option key={item} value={item}>
                      {item}
                    </option>
                  ))}
                </select>
                <div className="relative z-0 w-full">
                  <input
                    type="text"
                    id="phone_number"
                    className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                    placeholder="Ej: 0000000"
                    {...register("phone_number", {
                      required: {
                        value: true,
                        message: "El número de télefono es requerido!",
                      },
                      pattern: {
                        value: /^[0-9]+$/,
                        message:
                          "El número de télefono solo puede contener números!",
                      },
                      minLength: {
                        value: 7,
                        message:
                          "El número de télefono debe tener al menos 7 caracteres",
                      },
                      maxLength: {
                        value: 7,
                        message:
                          "El número de télefono no debe tener más de 7 caracteres",
                      },
                    })}
                  />
                </div>
              </div>
              {errors.phone_number && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.phone_number.message}
                  </span>
                </p>
              )}
            </div>

            <div className="relative z-0 w-full">
              <label
                htmlFor="state_id"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Estado
              </label>
              <select
                name="state_id"
                id="state_id"
                className="w-full px-2 focus:bg-violet-50 border focus:border-violet-600 text-gray-900 text-sm rounded-lg block py-2.5 dark:bg-gray-700 dark:focus:border-violet-600 dark:text-white focus:outline-none"
                onChange={filterData}
                required
              >
                <option value="">--Seleccionar--</option>
                {states.map((item) => (
                  <option key={item.id} value={item.id}>
                    {item.name}
                  </option>
                ))}
              </select>
            </div>

            <div className="relative z-0 w-full">
              <label
                htmlFor="municipality_id"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Municipio
              </label>
              <select
                name="municipality_id"
                id="municipality_id"
                className="w-full px-2 focus:bg-violet-50 border focus:border-violet-600 text-gray-900 text-sm rounded-lg block py-2.5 dark:bg-gray-700 dark:focus:border-violet-600 dark:text-white focus:outline-none"
                required
              >
                <option value="">--Seleccionar--</option>
                {Municipalities.map((item) => (
                  <option key={item.id} value={item.id}>
                    {item.name}
                  </option>
                ))}
              </select>
            </div>

            <div className="sm:col-span-2">
              <label
                htmlFor="address"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Dirección *
              </label>
              <textarea
                id="address"
                rows="4"
                className="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="Ej: Calle #00, Casa #00"
                {...register("address", {
                  required: {
                    value: true,
                    message: "La dirección es requerida!",
                  },
                  minLength: {
                    value: 15,
                    message: "La dirección debe tener al menos 15 caracteres!",
                  },
                  maxLength: {
                    value: 120,
                    message:
                      "La dirección no debe tener más de 120 caracteres!",
                  },
                })}
              ></textarea>
              {errors.address && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.address.message}
                  </span>
                </p>
              )}
            </div>
          </div>

          <h2 className="text-2xl font-bold text-slate-500 dark:text-white my-3">
            Datos de Repartidor
          </h2>
          <div className="grid gap-4 mb-4 lg:grid-cols-2">
            <div>
              <label
                htmlFor="vehicle_type"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                Tipo de vehículo *
              </label>
              <select
                type="text"
                id="vehicle_type"
                className="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                required
                {...register("vehicle_type", {
                  required: {
                    value: true,
                    message: "El tipo de vehículo es requerido!",
                  },
                })}
              >
                {vehicleType.map((item) => (
                  <option key={item} value={item}>
                    {item}
                  </option>
                ))}
              </select>
              {errors.vehicle_type && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.vehicle_type.message}
                  </span>
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="plate"
                className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                N° de placa *
              </label>
              <input
                type="text"
                id="plate"
                className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none"
                placeholder="ASDF456"
                {...register("plate", {
                  required: {
                    value: true,
                    message: "El número de placa es requerido!",
                  },
                  minLength: {
                    value: 7,
                    message:
                      "El número de placa debe tener al menos 7 caracteres!",
                  },
                  maxLength: {
                    value: 7,
                    message:
                      "El número de placa no debe tener más de 7 caracteres!",
                  },
                  pattern: {
                    value: /^[0-9A-Za-z]+$/g,
                    message:
                      "Número de placa no válido, solo puede contener números y letras!",
                  },
                })}
              />
              {errors.plate && (
                <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                  <span className="font-medium">
                    Ups! {errors.plate.message}
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
            <a href={routeIndex}>
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
              Añadir
            </button>
          </div>
        </section>
      </form>
    </>
  );
}

export default App;
