import React, { useEffect, useState } from "react";
import Start from "../Start";
import { useSelectedProduct } from "../../hooks/useSelectedProduct";
import { APP_URL } from "../../../APP_URL";
import { useForm } from "react-hook-form";
import ShowAlertReact from "../../../ShowAlertReact";
import ConfirmAlert from "../../../ConfirmAlert";
import initialStars from "../mocks/initialStars";
import CommentItem from "./CommentItem";

function Valorations() {
  const { selectedProduct, setSelectedProduct, productView, setProductView } =
    useSelectedProduct();
  const [productValorations, setProductValorations] = useState([]);
  const [user, setUser] = useState(null);
  const [writeComment, setWriteComment] = useState(false);
  const [showInfoComment, setShowInfoComment] = useState(false);
  const [quantityStars, setQuantityStars] = useState(0);
  const [changeLikes, setChangeLikes] = useState({});

  const {
    register,
    handleSubmit,
    formState: { errors },
    reset,
  } = useForm();

  useEffect(() => {
    getData();
  }, [selectedProduct, changeLikes]);

  const getData = async () => {
    try {
      const response = await axios.get(
        route("api-product-valorations.index", selectedProduct.id)
      );
      const resUsers = await axios.get(route("api-users.show", userID));
      setProductValorations(response.data.data);
      setUser(resUsers.data.data);
    } catch (error) {
      console.log(error);
    }
  };

  const selectedStars = initialStars.map((star) =>
    star.number <= quantityStars ? { ...star, color: "blue" } : star
  );

  const discardValoration = (e) => {
    e.preventDefault();
    const alert = ConfirmAlert(
      "¿Estas seguro de descartar tu comentario?",
      "Descartar"
    );
    alert.then((result) => {
      if (result.isConfirmed) {
        setQuantityStars(0);
        reset();
        setWriteComment(false);
      }
    });
  };

  const onSubmit = handleSubmit((data, e) => {
    e.preventDefault();
    if (quantityStars == 0)
      return ShowAlertReact("Selecciona la valoración!", "info");

    const sendData = async () => {
      try {
        const response = await axios.post(
          route("api-product-valorations.store"),
          {
            product_id: selectedProduct.id,
            user_id: userID,
            valoration: quantityStars,
            ...data,
          }
        );

        if (response.data.status) {
          getData();
          setQuantityStars(0);
          reset();
          setWriteComment(false);
        }
      } catch (error) {
        ShowAlertReact(error.response.data.message, error.response.data.type);
        setQuantityStars(0);
        reset();
        setWriteComment(false);
      }
    };
    sendData();
  });

  return (
    <>
      <section className="my-20">
        <div>
          <h2 className="text-2xl font-bold my-3">Califica este producto</h2>
          {productValorations.length === 0 && (
            <h2 className="text-blue-600 text-lg mb-2">
              ¡Se el primero en comentar el producto!
            </h2>
          )}
          <p>Comparte tu opinión con otros usuarios</p>
        </div>
        {writeComment || (
          <div className="w-full my-4">
            <button
              className="link-primary"
              onClick={() => setWriteComment(true)}
            >
              Escribe tu opinión
            </button>
          </div>
        )}

        {writeComment && (
          <section className="mx-2 my-7">
            <form onSubmit={onSubmit}>
              <div className="mx-7 mb-4 flex justify-center flex-col">
                <p className="font-semibold my-2">{user.name}</p>
                <p className="font-normal">
                  Al comentar, aceptas que se muestre información de tu perfil,
                  como tu nombre de usuario y foto, junto a tu comentario.{" "}
                  <button
                    type="button"
                    className="link-primary"
                    onClick={() => setShowInfoComment(true)}
                  >
                    Más información...
                  </button>
                </p>
              </div>
              <span className="text-6xl my-8 w-full flex flex-col items-center">
                <div className="flex items-center gap-6 text-xl">
                  {selectedStars.map((star) => (
                    <span
                      key={star.number}
                      onClick={() => {
                        setQuantityStars(star.number);
                      }}
                    >
                      <Start color={star.color} big={true} />
                    </span>
                  ))}
                </div>
              </span>

              <div className="relative z-0 w-full">
                <textarea
                  type="text"
                  rows="1"
                  id="comment"
                  className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-violet-600 focus:outline-none focus:ring-0 focus:border-violet-600 peer"
                  placeholder=" "
                  {...register("comment", {
                    maxLength: {
                      value: 255,
                      message:
                        "Haz alcanzado el máximo de 255 caracteres permitidos!",
                    },
                  })}
                ></textarea>
                <label
                  htmlFor="comment"
                  className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-violet-600 peer-focus:dark:text-violet-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                >
                  Escribe aquí tu comentario *
                </label>
                {errors.comment && (
                  <p className="mt-2 text-sm text-red-600 dark:text-red-500">
                    <span className="font-medium">
                      Ups! {errors.comment.message}
                    </span>
                  </p>
                )}
              </div>

              <div className="my-9 w-full flex justify-between">
                <button
                  type="button"
                  className="link-secondary"
                  onClick={discardValoration}
                >
                  Descartar
                </button>
                <button className="link-primary">Publicar</button>
              </div>
            </form>

            {showInfoComment && (
              <>
                <div className="my-9 w-full flex flex-col gap-5">
                  <p className="font-semibold">
                    ¿Por qué es importante mostrar la información de tu perfil?
                  </p>
                  <p>
                    Mostrar la información del perfil, como el nombre de usuario
                    y la foto, es importante por las siguientes razones:
                  </p>
                  <ul className="w-full px-10 flex flex-col gap-3">
                    <li className="list-disc">
                      <span className="font-semibold">Identidad: </span>Permite
                      a otros usuarios identificarte y saber quién está detrás
                      del comentario.
                    </li>
                    <li className="list-disc">
                      <span className="font-semibold">Confianza: </span>Genera
                      confianza al mostrar una identidad real y verificable.
                    </li>
                    <li className="list-disc">
                      <span className="font-semibold">Comunidad: </span>Crea una
                      comunidad más abierta y transparente al conectar a las
                      personas con sus comentarios.
                    </li>
                    <li className="list-disc">
                      <span className="font-semibold">Responsabilidad: </span>
                      Fomenta la responsabilidad al asociar los comentarios con
                      un perfil real.
                    </li>
                  </ul>
                </div>

                <div className="my-9 w-full flex">
                  <button
                    type="button"
                    className="link-secondary"
                    onClick={() => setShowInfoComment(false)}
                  >
                    Entendido
                  </button>
                </div>
              </>
            )}
          </section>
        )}
      </section>
      {productValorations.length !== 0 && (
        <section className="my-20">
          <h2 className="text-2xl font-bold my-3">
            Calificaciones y opiniones
          </h2>
          <div className="flex flex-col gap-2 my-7">
            <span className="text-6xl">4.8</span>
            <span className="text-6xl">
              <div className="flex items-center gap-2 text-xl">
                <Start color={"blue"} big={true} />
                <Start color={"blue"} big={true} />
                <Start color={"blue"} big={true} />
                <Start color={"blue"} big={true} />
                <Start big={true} />
              </div>
            </span>
            <span className="text-xl font-bold">
              {productValorations.length}
            </span>
          </div>

          <div>
            <ul>
              {productValorations.map((valoration) => (
                <CommentItem
                  changeLikes={changeLikes}
                  setChangeLikes={setChangeLikes}
                  key={valoration.id}
                  valoration={valoration}
                />
              ))}
            </ul>
          </div>
        </section>
      )}
    </>
  );
}

export default Valorations;
