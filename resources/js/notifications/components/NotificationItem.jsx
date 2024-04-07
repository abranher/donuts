import React from "react";

function NotificationItem({ data, created }) {
  return (
    <>
      <a href="#" className="flex px-4 py-3 dark:hover:bg-gray-900">
        <div className="flex-shrink-0">
          <img
            className="rounded-full border w-16 h-16"
            src={data.image}
            alt="Imagen de..."
          />
        </div>
        <div className="w-full ps-3">
          <div className="text-gray-500 text-md font-semibold mb-1.5 dark:text-gray-200">
            Donuts Maker
          </div>
          <div className="text-gray-500 text-sm mb-1.5 dark:text-gray-300">
            {data.message}
          </div>
          <div className="text-xs text-blue-600 dark:text-blue-500">
            {created}
          </div>
        </div>
      </a>
    </>
  );
}

export default NotificationItem;
