import axios from "axios";
import React, { useEffect, useState } from "react";
import NotificationItem from "./components/NotificationItem";

function App() {
  const [view, setView] = useState(false);
  const [notifications, setNotifications] = useState([]);

  useEffect(() => {
    const getData = async () => {
      const response = await axios.get(
        route("api-notifications.index", userID)
      );
      setNotifications(response.data.data);
    };
    getData();
  }, []);

  const unreadNotifications = notifications.filter(
    (notification) => notification.read_at == null
  );

  const readNotifications = notifications.filter(
    (notification) => notification.read_at != null
  );

  return (
    <>
      <button
        className="relative inline-flex items-center w-10 h-10 z-[140] justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-50 dark:hover:bg-opacity-5 dark:focus:ring-gray-600"
        type="button"
        onClick={() => {
          setView(true);
        }}
      >
        <svg
          className="w-9 h-9"
          fill="currentColor"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 448 512"
        >
          <path d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
        </svg>

        {unreadNotifications.length !== 0 && (
          <span className="absolute w-6 h-6 text-white bg-red-500 border-2 border-white rounded-full top-0 right-0 flex justify-center items-center dark:border-gray-900 text-[10px]">
            {unreadNotifications.length}
          </span>
        )}
      </button>

      {/* dropdown */}
      <div
        className={
          view
            ? "fixed top-0 right-0 w-full h-full bg-white dark:bg-dark-card z-[140] flex justify-center items-center flex-col transition-transform duration-100 transform-none"
            : "fixed top-0 right-0 w-full h-full bg-white dark:bg-dark-card z-[140] flex justify-center items-center flex-col transition-transform duration-100 -translate-x-full"
        }
      >
        <button
          onClick={() => setView(false)}
          type="button"
          className="fixed top-6 left-6 z-[145] cursor-pointer inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-50 dark:hover:bg-opacity-5 dark:focus:ring-gray-600"
        >
          <svg
            className="w-7 h-7 text-gray-700 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600"
            fill="currentColor"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
          >
            <path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
          </svg>
        </button>

        <div className="fixed inset-x-0 z-[140] top-0 w-full bg-white px-4 py-8 text-2xl font-bold text-center dark:text-white rounded-t-lg dark:bg-dark">
          Notificaciones
        </div>

        <section className="w-full py-24 h-full bg-white text-gray-700 dark:bg-dark dark:text-white overflow-y-auto">
          {notifications.length === 0 ? (
            <div className="w-full text-gray-600 bg-white px-4 py-8 text-2xl font-bold text-center dark:text-white rounded-t-lg dark:bg-dark">
              Aun no tienes notificaciones
            </div>
          ) : (
            <>
              {unreadNotifications.length !== 0 && (
                <>
                  <p className="text-xl font-bold px-5 py-4">Nuevas</p>
                  <div>
                    {unreadNotifications.map((notification) => (
                      <NotificationItem
                        key={notification.id}
                        {...notification}
                      />
                    ))}
                  </div>
                </>
              )}

              {readNotifications.length !== 0 && (
                <>
                  <p className="text-lg font-bold px-5 py-4">Anteriores</p>
                  {readNotifications.map((notification) => (
                    <NotificationItem {...notification} />
                  ))}
                </>
              )}
            </>
          )}
        </section>
      </div>
    </>
  );
}

export default App;
