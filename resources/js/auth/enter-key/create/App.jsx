import React from "react";
import { useForm } from "react-hook-form";
import InputForm from "../../../components/InputForm";

function App() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const url = new URL(window.location.href);
  const params = url.searchParams;

  const onSubmit = handleSubmit((data, e) => {
    console.log(data);
    e.target.submit();
  });

  return (
    <>
      <form
        className="space-y-4 md:space-y-6 flex flex-col gap-3"
        action={route("unlock-user.update")}
        onSubmit={onSubmit}
        method="POST"
      >
        <input type="hidden" name="_token" value={csrfToken} />
        <input type="hidden" name="email" value={params.get("email")} />

        <div class="text-lg font-medium text-gray-500 dark:text-gray-300">
          Para desbloquear tu usuario, ingresa la clave que te hemos enviado:
        </div>

        <InputForm
          name={"key"}
          title={"Clave Dinámica"}
          register={register}
          errors={errors.key}
          rules={{
            required: {
              value: true,
              message: "La clave es requerida!",
            },
            minLength: {
              value: 12,
              message: "La clave debe tener al menos 12 caracteres",
            },
            maxLength: {
              value: 12,
              message: "La clave no debe tener más de 12 caracteres",
            },
            pattern: {
              value: /^[0-9]+$/,
              message: "La clave solo puede contener números!",
            },
          }}
        />

        <div class="my-9 text-center">
          <button type="submit" class="btn-primary">
            Desbloquear Usuario
          </button>
        </div>
      </form>
    </>
  );
}

export default App;
