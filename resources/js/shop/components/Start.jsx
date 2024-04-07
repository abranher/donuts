import React from "react";

function Start({ color, big = false }) {
  let colorStart = "";
  if (big) {
    colorStart =
      color == "blue"
        ? "w-7 h-7 text-blue-600 mr-1 fill-current"
        : "w-7 h-7 text-gray-400 mr-1 fill-current";
  } else {
    colorStart =
      color == "blue"
        ? "w-4 h-4 text-blue-600 mr-1 fill-current"
        : "w-4 h-4 text-gray-400 mr-1 fill-current";
  }

  return (
    <>
      <svg
        className={colorStart}
        xmlns="http://www.w3.org/2000/svg"
        fill="currentColor"
        aria-hidden="true"
        viewBox="0 0 16 16"
      >
        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
      </svg>
    </>
  );
}

export default Start;
