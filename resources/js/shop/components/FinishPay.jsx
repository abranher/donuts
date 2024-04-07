import React, { useEffect } from "react";
import ShowAlertReact from "../../ShowAlertReact";
import ButtonClose from "./ButtonClose";

function FinishPay({ views, setViews }) {
  useEffect(() => {
    if (views.finishPay) {
      ShowAlertReact("Pedido en Proceso!", "success");
    }
  }, [views]);

  return (
    <>
      <section
        className={
          views.finishPay
            ? "fixed top-0 left-0 w-full h-full bg-white dark:bg-dark-card z-[130] flex justify-center items-center transition-transform duration-100 transform-none"
            : "fixed top-0 left-0 w-full h-full bg-white dark:bg-dark-card z-[130] flex justify-center items-center transition-transform duration-100 -translate-x-full"
        }
      >
        <ButtonClose
          hide={() => {
            window.location = route("shop");
          }}
        />
        {/* esta es la seccion central */}
        <section className="w-3/4 bg-gray-100 border gap-3 flex flex-col justify-center items-center p-10 rounded-2xl">
          <div>
            <img
              src={"img/logo.jpeg"}
              className="rounded-full w-48 h-48"
              alt="logo donuts maker"
            />
          </div>
          <div className="text-2xl text-center font-medium dark:text-gray-600">
            ¡Tu pedido está en proceso de verificación!
          </div>
          <p className="text-xl font-medium text-center dark:text-gray-500">
            Recibiras una notificación cuando tu solicitud se haya verificado.
          </p>
          <section className="my-4 flex flex-col md:flex-row gap-4">
            <a href={route("shop")}>
              <button className="btn-primary-rounded">Seguir Comprando</button>
            </a>
          </section>
        </section>
      </section>
    </>
  );
}

export default FinishPay;
