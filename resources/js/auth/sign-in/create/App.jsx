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
    console.log(data);
    e.target.submit();
  });

  return (
    <>
      <form
        className="space-y-4 md:space-y-6 flex flex-col gap-3"
        action={route("login.sign-in")}
        onSubmit={onSubmit}
        method="POST"
      >
        <input type="hidden" name="_token" value={csrfToken} />

        <InputForm
          name={"username"}
          title={"Nombre de Usuario/Correo Electrónico"}
          register={register}
          errors={errors.username}
          rules={{
            required: {
              value: true,
              message: "El Nombre de Usuario/Correo Electrónico es requerido!",
            },
            minLength: {
              value: 4,
              message:
                "El Nombre de Usuario/Correo Electrónico de tener al menos 4 caracteres!",
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

        <div className="flex items-center justify-between flex-wrap">
          <div className="flex items-start">
            <div className="flex items-center h-5">
              <input
                id="remember"
                name="remember"
                aria-describedby="remember"
                type="checkbox"
                className="w-4 h-4 border border-gray-300 rounded bg-gray-50 checked:bg-violet-600 focus:bg-violet-600 focus:text-violet-600 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
              />
            </div>
            <div className="ml-3 text-sm">
              <label
                htmlFor="remember"
                className="text-gray-500 dark:text-gray-300"
              >
                Recuérdame
              </label>
            </div>
          </div>
          <a href={route("password.request")} className="link-primary">
            ¿Olvidaste tu contraseña?
          </a>
        </div>

        <div className="flex items-center justify-end flex-wrap">
          <a href={route("user-unlock.request")} className="link-primary">
            Desbloqueo de Usuario
          </a>
        </div>

        <div className="my-9 text-center">
          <button type="submit" className="btn-primary">
            Iniciar sesión
          </button>
        </div>
        <p className="text-sm font-medium text-gray-500 dark:text-gray-400">
          No tienes una cuenta todavía?{" "}
          <a href={route("signup")} className="link-primary">
            Registrate
          </a>
        </p>
      </form>
    </>
  );
}

export default App;
