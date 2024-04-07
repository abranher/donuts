import React, { useEffect, useState } from "react";
import { APP_URL } from "../../APP_URL";

function Slider() {
  const [currentImage, setCurrentImage] = useState(0);

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentImage((prevImage) => (prevImage + 1) % advertisements.length);
    }, 8000);

    return () => {
      clearInterval(interval);
    };
  }, []);

  const handleDotClick = (index) => {
    setCurrentImage(index);
  };

  return (
    <>
      {advertisements.length != 0 && (
        <section className="mb-3">
          <div className="m-5 rounded-2xl overflow-hidden shadow">
            <div className="rounded-2xl relative w-full flex flex-col items-center justify-center">
              <div className="absolute z-10 flex flex-col gap-4 justify-center text-center items-center text-white">
                <div className="text-5xl font-bold">
                  {advertisements[currentImage]?.title}
                </div>
                <div className="text-4xl font-medium">
                  {advertisements[currentImage]?.description}
                </div>
                <p className="text-4xl my-5 text-center font-bold md:text-7xl text-orange-500">
                  {parseInt(
                    advertisements[currentImage]?.promotion.discount * 100
                  )}{" "}
                  % OFF{" "}
                </p>
              </div>
              <img
                src={`${APP_URL}/storage/advertisements/${advertisements[currentImage]?.image}`}
                alt="Slider Image"
                className="w-full object-cover aspect-video h-96"
              />
              <div className="absolute top-0 right-0 bottom-0 left-0 bg-gray-900 opacity-40"></div>
            </div>
          </div>

          <div className="flex justify-center mt-4">
            {advertisements.map((_, index) => (
              <span
                key={index}
                className={`h-3 w-3 border border-violet-600 cursor-pointer rounded-full mx-1 ${
                  index === currentImage
                    ? "bg-violet-500"
                    : "bg-gray-100 dark:bg-dark-card"
                }`}
                onClick={() => handleDotClick(index)}
              ></span>
            ))}
          </div>
        </section>
      )}
    </>
  );
}

export default Slider;
