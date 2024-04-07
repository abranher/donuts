import React, { useEffect, useState } from "react";
import { useForm } from "react-hook-form";
import { useCart } from "../hooks/useCart";
import { useCartRecipe } from "../hooks/useCartRecipe";
import { useTotal } from "../hooks/useTotal";
import ButtonClose from "./ButtonClose";
import ShowAlertReact from "../../ShowAlertReact";
import YourOrder from "./ProcessOrder/YourOrder";
import OrderItemRecipe from "./ProcessOrder/OrderItemRecipe";
import OrderItem from "./ProcessOrder/OrderItem";

function ProcessOrder({ views, setViews }) {
  const { cart } = useCart();
  const { cartRecipe } = useCartRecipe();
  const { total } = useTotal();
  const [coupons, setCoupons] = useState([]);
  const [btnLoading, setBtnLoading] = useState(false);
  const [discount, setDiscount] = useState(null);

  useEffect(() => {
    getData();
  }, []);

  const getData = async () => {
    const resCoupons = await axios.get(route("api-coupons.index"));
    // tengo que evaluar si la respuesta estuvo ok, porque el Loading sigue aun asi si la consulta falla
    setCoupons(resCoupons.data);
  };

  const checkCodeExist = ({ code }) => coupons.some((c) => c.code === code);

  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();

  const onSubmit = handleSubmit((data, e) => {
    setBtnLoading(true);
    const existCode = checkCodeExist(data);
    if (!existCode) {
      setBtnLoading(false);
      return ShowAlertReact("Este código no existe!", "info");
    }
    const sendData = async () => {
      try {
        const response = await axios.post(route("api-coupons.store"), {
          user_id: userID,
          code: data.code,
        });

        if (response.data.status) {
          const DISCOUNT = parseFloat(response.data.data.discount);
          setDiscount(DISCOUNT);
        }
        setBtnLoading(false);

        console.log(response.data);
      } catch (error) {
        setBtnLoading(false);
        return ShowAlertReact(
          error.response.data.message,
          error.response.data.type
        );
      }
    };
    sendData();
    console.log(data);
  });

  const setView = () => {
    setViews((prevState) => ({
      ...prevState,
      processPay: false,
    }));
  };

  return (
    <>
      <section
        className={
          views.processPay
            ? "fixed top-0 left-0 inset-x-0 w-full h-full bg-white dark:bg-dark-card z-[120] flex justify-center items-center transition-transform duration-100 transform-none"
            : "fixed top-0 left-0 inset-x-0 w-full h-full bg-white dark:bg-dark-card z-[120] flex justify-center items-center transition-transform duration-100 -translate-x-full"
        }
      >
        <ButtonClose hide={setView} />

        {/* esta es la seccion central */}
        <section className="absolute inset-x-0 top-24 bottom-0 overflow-auto w-full left-0 px-8">
          <section className="lg:grid lg:grid-cols-3 lg:gap-6">
            <section className="lg:order-2">
              {/* Your order */}

              <section>
                <h2 className="text-2xl mb-4 font-medium">Tu Orden</h2>
                <section className="w-full shadow-sm border border-gray-200 dark:border-gray-500 text-gray-700 rounded mb-5 font-medium">
                  <section className="bg-gray-100 py-3 px-4 flex justify-between">
                    <span>Producto</span>
                    <span>Subtotal</span>
                  </section>
                  <section>
                    {cart.map((product) => (
                      <OrderItem key={product.id} product={product} />
                    ))}
                    {cartRecipe.map((recipe) => (
                      <OrderItemRecipe key={recipe.id} recipe={recipe} />
                    ))}
                  </section>

                  <article className="flex flex-col py-3 px-4 gap-2 border-b">
                    <div className="flex justify-between">
                      <span>Subtotal</span>
                      <span>{`${total.toFixed(2)} Bs.D`}</span>
                    </div>
                    <div className="flex justify-between">
                      <span>Delivery</span>
                      <span className="text-green-500">Gratis</span>
                    </div>
                    {discount && (
                      <div className="flex justify-between">
                        <span>Descuento (-)</span>
                        <span>{`(${discount * 100}%) ${(
                          total.toFixed(2) * discount
                        ).toFixed(2)} Bs.D`}</span>
                      </div>
                    )}
                  </article>

                  <article className="py-3 px-4 flex justify-between">
                    <span>Total</span>
                    <span>
                      {discount == null
                        ? `${total.toFixed(2)} Bs.D`
                        : `${(
                            total.toFixed(2) -
                            total.toFixed(2) * discount
                          ).toFixed(2)} Bs.D`}
                    </span>
                  </article>
                </section>
              </section>

              {/* ApplyCoupon */}
              <section className="shadow-sm border border-gray-200 dark:border-gray-500 px-4 py-4 rounded flex justify-center items-center gap-5 flex-col mb-5">
                <h1 className="text-xl text-center dark:text-gray-300 font-medium">
                  ¡Sí tienes un cupón, aplicalo aquí!
                </h1>
                <section className="w-full">
                  <form
                    onSubmit={onSubmit}
                    className="flex justify-center flex-col items-start gap-3"
                  >
                    <div className="mx-3 relative z-0 w-11/12">
                      <input
                        type="text"
                        id="code"
                        className={
                          discount == null
                            ? "block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                            : "block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer opacity-50"
                        }
                        placeholder=""
                        disabled={discount != null}
                        {...register("code", {
                          pattern: {
                            value: /^[0-9A-Z]+$/,
                            message:
                              "El Código solo puede contener mayúsculas y números!",
                          },
                          minLength: {
                            value: 5,
                            message:
                              "El Código debe tener al menos 5 caracteres!",
                          },
                          maxLength: {
                            value: 15,
                            message:
                              "El Código no debe tener más de 15 caracteres!",
                          },
                        })}
                      />
                      <label
                        htmlFor="code"
                        className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-50 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                      >
                        Código de Cupón
                      </label>
                      {errors.code && (
                        <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                          <span className="font-medium">
                            Ups! {errors.code.message}
                          </span>
                        </p>
                      )}
                    </div>

                    <div className="w-full flex">
                      {discount == null ? (
                        btnLoading ? (
                          <button
                            type="submit"
                            className="m-2 inline-block whitespace-nowrap px-5 py-2.5 text-base font-medium text-white active:text-zinc-200 opacity-50 bg-violet-600 rounded active:bg-violet-800 focus:outline-none"
                          >
                            <svg
                              aria-hidden="true"
                              role="status"
                              className="inline w-4 h-4 mr-3 mb-1 text-white animate-spin"
                              viewBox="0 0 100 101"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB"
                              />
                              <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor"
                              />
                            </svg>
                            Aplicando...
                          </button>
                        ) : (
                          <button type="submit" className="btn-primary">
                            Aplicar Código
                          </button>
                        )
                      ) : (
                        <button
                          type="submit"
                          className="m-2 flex justify-center items-center gap-2 whitespace-nowrap px-5 py-2.5 text-base font-medium text-white active:text-zinc-200 bg-green-500 rounded focus:outline-none opacity-75"
                          disabled
                        >
                          Aplicado
                          <svg
                            className="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                            fill="currentColor"
                          >
                            <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                          </svg>
                        </button>
                      )}
                    </div>
                  </form>
                </section>
              </section>
            </section>

            <section className="lg:order-1 col-span-2">
              {/* ProcessOrder */}
              <YourOrder
                discount={discount}
                views={views}
                setViews={setViews}
              />
            </section>
          </section>
        </section>
      </section>
    </>
  );
}

export default ProcessOrder;
