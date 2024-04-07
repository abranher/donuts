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
        action={route("user-unlock.email")}
        onSubmit={onSubmit}
        method="POST"
      >
        <input type="hidden" name="_token" value={csrfToken} />

        <div class="text-lg font-medium text-gray-500 dark:text-gray-300">
          Para desbloquear tu usuario, ingresa el correo electrónico asociado a
          tu cuenta a continuación:
        </div>

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

        <div class="text-lg font-medium text-gray-500 dark:text-gray-300">
          Te enviaremos un enlace para que puedas restablecer tu cuenta y
          acceder nuevamente a ella.
        </div>

        <div class="my-9 text-center">
          <button type="submit" class="btn-primary">
            Enviar enlace
          </button>
        </div>
      </form>
    </>
  );
}

export default App;
