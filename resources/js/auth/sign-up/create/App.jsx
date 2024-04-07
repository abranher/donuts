import React, { useState } from "react";
import { useForm } from "react-hook-form";
import InputForm from "../../../components/InputForm";
import SelectForm from "../../../components/SelectForm";
import TextareaForm from "../../../components/TextareaForm";

function App() {
  const [Municipalities, setMunicipalities] = useState([]);

  const filterData = (e) => {
    const filteredMunicipalities = municipalities.filter(
      (item) => item.state_id == e.target.value
    );
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
        className="space-y-4 md:space-y-6 flex flex-col gap-3"
        action={route("signup.register")}
        onSubmit={onSubmit}
        method="POST"
      >
        <input type="hidden" name="_token" value={csrfToken} />

        <h2 className="text-2xl font-bold text-slate-500 dark:text-white my-3">
          Datos de la cuenta
        </h2>
        <div className="grid gap-7 mb-4 lg:grid-cols-2">
          <InputForm
            name={"email"}
            title={"Correo electrónico"}
            register={register}
            errors={errors.email}
            rules={{
              required: {
                value: true,
                message: "El correo es requerido!",
              },
              pattern: {
                value: /^[a-z0-9_.+-]+@[a-z0-9-]+\.[a-z]{2,4}$/,
                message:
                  "Correo no válido, debe tener la forma ejemplo@ejemplo.com",
              },
            }}
          />

          <InputForm
            name={"username"}
            title={"Nombre usuario"}
            register={register}
            errors={errors.username}
            rules={{
              required: {
                value: true,
                message: "El nombre de usuario es requerido!",
              },
              minLength: {
                value: 4,
                message: "El nombre de usuario de tener al menos 4 caracteres!",
              },
              maxLength: {
                value: 20,
                message:
                  "El nombre de usuario no debe tener más de 20 caracteres!",
              },
            }}
          />

          <InputForm
            name={"password"}
            type="password"
            title={"Contraseña"}
            register={register}
            errors={errors.password}
            rules={{
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
            }}
          />

          <InputForm
            name={"password_confirmation"}
            type="password"
            title={"Confirme Contraseña"}
            register={register}
            errors={errors.password_confirmation}
            rules={{
              required: {
                value: true,
                message: "Confirmar contraseña es requerido!",
              },
              validate: (value) =>
                value === watch("password") ||
                "Las contraseñas deben coincidir",
            }}
          />
        </div>

        <h2 className="text-2xl font-bold text-slate-500 dark:text-white my-3">
          Información Personal
        </h2>

        <div className="grid gap-7 mb-4 lg:grid-cols-2">
          <InputForm
            name={"name"}
            title={"Nombre Completo"}
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
                value: 80,
                message: "El nombre debe tener máximo 80 caracteres",
              },
            }}
          />

          <InputForm
            name={"birth"}
            type={"date"}
            title={"Fecha de Nacimiento"}
            register={register}
            errors={errors.birth}
            rules={{
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
            }}
          />

          <div className="flex gap-2">
            <SelectForm
              name={"type"}
              title={"Tipo de Documento de Identidad"}
              optionDefault={false}
              size={"w-44"}
              register={register}
              errors={errors.type}
              rules={{
                required: {
                  value: true,
                  message: "El Tipo de  Documento de Identidad es requerido!",
                },
              }}
              arrayData
              data={typeIdentificationCard}
            />

            <InputForm
              name={"identification_number"}
              title={"Tipo de Documento de Identidad"}
              register={register}
              errors={errors.identification_number}
              rules={{
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
                  message: "El número de cédula solo puede contener números!",
                },
              }}
            />
          </div>

          <div className="flex gap-2">
            <SelectForm
              name={"code_phone"}
              title={"Código de Número de Télefono"}
              size={"w-26"}
              register={register}
              optionDefault={false}
              errors={errors.code_phone}
              rules={{
                required: {
                  value: true,
                  message: "El Código de Número de Télefono es requerido!",
                },
              }}
              arrayData
              data={phoneCodes}
            />

            <InputForm
              name={"phone_number"}
              title={"Número de Télefono"}
              register={register}
              errors={errors.phone_number}
              rules={{
                required: {
                  value: true,
                  message: "El número de télefono es requerido!",
                },
                pattern: {
                  value: /^[0-9]+$/,
                  message: "El número de télefono solo puede contener números!",
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
              }}
            />
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

          <TextareaForm
            name={"address"}
            title={"Dirección"}
            register={register}
            errors={errors.address}
            rules={{
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
                message: "La dirección no debe tener más de 120 caracteres!",
              },
            }}
          />
        </div>

        <div className="flex items-start">
          <div className="flex items-center h-5">
            <input
              id="terms"
              aria-describedby="terms"
              type="checkbox"
              className="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
              required
            />
          </div>
          <div className="ml-3 text-sm">
            <label htmlFor="terms" className="font-light dark:text-gray-300">
              Acepto los
              <a className="link-primary" href="#">
                Terminos y Condiciones
              </a>
            </label>
          </div>
        </div>
        <div className="my-9 text-center">
          <button type="submit" className="btn-primary">
            Crear cuenta
          </button>
        </div>
        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">
          Ya tienes un cuenta?{" "}
          <a href={route("login")} className="link-primary">
            Entra aquí
          </a>
        </p>
      </form>
    </>
  );
}

export default App;
