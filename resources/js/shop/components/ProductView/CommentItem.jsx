import React, { useEffect, useState } from "react";
import { APP_URL } from "../../../APP_URL";
import initialStars from "../mocks/initialStars";
import Start from "../Start";
import { useForm } from "react-hook-form";

function CommentItem({ valoration, changeLikes, setChangeLikes }) {
  const [like, setLike] = useState(false);
  const [userLike, setUserLike] = useState();

  const {
    register,
    handleSubmit,
    formState: { errors },
    reset,
  } = useForm();

  useEffect(() => {
    getData();
  }, []);

  const getData = async () => {
    try {
      const response = await axios.get(
        route("api-product-valorations-likes.show", [valoration.id, userID])
      );

      if (response.data.status) {
        setUserLike(response.data.data);
        setLike(true);
      }
    } catch (error) {
      if (error.response.data.status == false) {
        setLike(false);
      }
      console.log(error);
    }
  };

  const onSubmit = handleSubmit((data, e) => {
    e.preventDefault();
    let ACTION = undefined;

    if (like == true) {
      setLike(false);
      ACTION = { action: "delete" };
    } else if (like == false) {
      setLike(true);
      ACTION = { action: "create" };
    }

    const sendData = async () => {
      try {
        const response = await axios.post(
          route("api-product-valorations-likes.store", [valoration.id, userID]),
          ACTION
        );

        if (response.data.status && response.data.message == "create") {
          setChangeLikes({
            change: "like create",
          });
        } else if (response.data.status && response.data.message == "delete") {
          setChangeLikes({
            change: "like delete",
          });
        }
      } catch (error) {
        console.log(error);
      }
    };
    sendData();
  });

  return (
    <>
      <li className="bg-white py-6">
        <article>
          <div>
            <div className="flex space-x-3">
              <div className="flex-shrink-0">
                <img
                  className="h-10 w-10 rounded-full"
                  src={`${APP_URL}/storage/images_profile/${valoration.user.image_profile}`}
                  alt={valoration.user.name}
                />
              </div>
              <div className="min-w-0 flex-1">
                <div className="text-sm font-medium text-gray-900">
                  <div className="text-base">{valoration.user.name}</div>
                  <div className="text-base text-gray-500">
                    {valoration.user.username}
                  </div>
                </div>
                <div className="text-sm flex my-2 gap-2 text-gray-500">
                  <span className="text-6xl">
                    <div className="flex items-center gap-1 text-xl">
                      {initialStars.map((star) =>
                        star.number <= valoration.valoration ? (
                          <span key={star.number}>
                            <Start color={"blue"} />
                          </span>
                        ) : (
                          <span key={star.number}>
                            <Start />
                          </span>
                        )
                      )}
                    </div>
                  </span>
                  <div>
                    <div>{valoration.created}</div>
                  </div>
                </div>
              </div>
              <div className="flex flex-shrink-0 self-center">
                <div className="relative inline-block text-left">
                  <div>
                    <button
                      type="button"
                      className="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                    >
                      <svg
                        className="h-7 w-7 text-gray-600"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                      >
                        <path d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                      </svg>
                    </button>
                  </div>

                  <div className="absolute hidden right-0 z-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div className="py-1">
                      <a
                        href="#"
                        className="text-gray-700 flex px-4 py-2 text-sm"
                      >
                        <svg
                          className="mr-3 h-5 w-5 text-gray-400"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                          fill="currentColor"
                          aria-hidden="true"
                        >
                          <path d="M3.5 2.75a.75.75 0 00-1.5 0v14.5a.75.75 0 001.5 0v-4.392l1.657-.348a6.449 6.449 0 014.271.572 7.948 7.948 0 005.965.524l2.078-.64A.75.75 0 0018 12.25v-8.5a.75.75 0 00-.904-.734l-2.38.501a7.25 7.25 0 01-4.186-.363l-.502-.2a8.75 8.75 0 00-5.053-.439l-1.475.31V2.75z"></path>
                        </svg>
                        <span>Reportar Comentario</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="mt-2 space-y-4 text-sm text-gray-700">
            <div>{valoration.comment}</div>
          </div>
          <div className="mt-6 flex justify-between space-x-8">
            <div className="flex space-x-6">
              <form
                onSubmit={onSubmit}
                className="flex justify-center items-center"
              >
                <button className="flex justify-center items-center text-gray-400 hover:text-gray-500">
                  {like == false ? (
                    <svg
                      className="h-6 w-6"
                      fill="currentColor"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z" />
                    </svg>
                  ) : (
                    <svg
                      className="h-6 w-6 text-blue-700"
                      fill="currentColor"
                      aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z" />
                    </svg>
                  )}
                  <span className="font-semibold text-gray-900 h-6 w-6 flex justify-center items-center">
                    {valoration.product_valoration_likes.length}
                  </span>
                </button>
              </form>
            </div>
          </div>
        </article>
      </li>
    </>
  );
}

export default CommentItem;
