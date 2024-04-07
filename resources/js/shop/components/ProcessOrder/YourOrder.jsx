import React from "react";
import axios from "axios";
import { useCart } from "../../hooks/useCart";
import { useCartRecipe } from "../../hooks/useCartRecipe";
import { useTotal } from "../../hooks/useTotal";
import { useForm } from "react-hook-form";
import ShowAlertReact from "../../../ShowAlertReact";
import DataPM from "./DataPM";
import { SwalBtnsCustom } from "../../../SwalBtnsCustom";

function YourOrder({ discount, views, setViews }) {
  const { cart } = useCart();
  const { cartRecipe } = useCartRecipe();
  const { total } = useTotal();

  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const onSubmit = handleSubmit((data, e) => {
    SwalBtnsCustom.fire({
      title: "Por favor, Confirma la Operación",
      icon: "info",
      showCancelButton: true,
      confirmButtonText: "Procesar Pedido",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.isConfirmed) {
        const sendData = async () => {
          try {
            const response = await axios.post(
              route("api-invoice-orders.store"),
              {
                user_id: userID,
                cart: cart,
                cartRecipe: cartRecipe,
                total:
                  discount == null
                    ? parseFloat(total.toFixed(2))
                    : parseFloat(
                        (
                          total.toFixed(2) -
                          total.toFixed(2) * discount
                        ).toFixed(2)
                      ),
                discount:
                  discount == null
                    ? discount
                    : parseFloat((total.toFixed(2) * discount).toFixed(2)),
                payment_method: "Pago Móvil",
                ...data,
              }
            );

            if (response.data.status) {
              setViews((prevState) => ({
                ...prevState,
                finishPay: true,
              }));
            }
          } catch (error) {
            return ShowAlertReact(
              error.response.data.message,
              error.response.data.type
            );
          }
        };
        sendData();
      }
    });
  });

  return (
    <>
      <section>
        <article className="flex flex-col gap-4">
          <h1 className="text-gray-700 dark:text-gray-200 font-bold text-2xl">
            Realiza tu pago móvil
          </h1>
          <h2 className="font-medium text-gray-400">
            Sigue los siguientes pasos para formalizar tu pedido
          </h2>
          <p className="dark:text-gray-200 font-medium">
            <span className="font-medium text-xl">1.</span> Realiza el pago
            desde tu entidad bancaria al siguiente beneficiario
          </p>
          <article className="border border-gray-300 rounded-xl">
            <div className="w-full bg-gray-100 dark:bg-gray-700 flex gap-5 flex-col p-6 rounded-xl">
              <DataPM dato={"Telefono beneficiario"} value={"04128974648"} />
              <DataPM dato={"Cédula beneficiario"} value={"31081318"} />
              <DataPM
                dato={"Banco beneficiario"}
                value={"Banco Mercantil S. a Banco Universal"}
              />
              <DataPM
                dato={"Monto"}
                value={
                  discount == null
                    ? `${total.toFixed(2)} Bs.D`
                    : `${(
                        total.toFixed(2) -
                        total.toFixed(2) * discount
                      ).toFixed(2)} Bs.D`
                }
              />
            </div>
          </article>
        </article>

        <article className="my-4 flex flex-col gap-5">
          <p className="dark:text-gray-200 font-medium">
            <span className="font-medium text-xl">2.</span> Ingresa los 6
            últimos digitos de tu comprobante de pago
          </p>

          <div className="flex justify-center items-center flex-col mt-4">
            <form
              className="w-11/12 lg:w-3/4 flex justify-center items-center flex-col gap-7"
              onSubmit={onSubmit}
            >
              <div className="relative z-0 w-full group">
                <input
                  type="text"
                  id="payment_reference"
                  className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                  placeholder=" "
                  {...register("payment_reference", {
                    required: {
                      value: true,
                      message: "El Comprobante es obligatorio!",
                    },
                    pattern: {
                      value: /^[0-9]+$/,
                      message: "El Comprobante solo puede contener números!",
                    },
                    minLength: {
                      value: 6,
                      message:
                        "El Comprobante debe tener al menos 6 caracteres!",
                    },
                    maxLength: {
                      value: 6,
                      message:
                        "El Comprobante no debe tener más de 6 caracteres!",
                    },
                  })}
                />
                <label
                  htmlFor="payment_reference"
                  className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-50 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >
                  Comprobante de Págo *
                </label>
                {errors.payment_reference && (
                  <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span className="font-medium">
                      Ups! {errors.payment_reference.message}
                    </span>
                  </p>
                )}
              </div>

              <div className="w-full flex justify-center">
                <button className="btn-primary-rounded">
                  Completar Pedido
                </button>
              </div>
            </form>
          </div>
        </article>
      </section>
    </>
  );
}

export default YourOrder;
