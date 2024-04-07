import React, { useEffect, useState } from "react";
import getMonitor from "../../dollar-monitor";
import dayjs from "dayjs";

function Monitor() {
  const [dollarBS, setDollarBS] = useState(null);

  useEffect(() => {
    const getDolar = async () => {
      const { bcv } = await getMonitor("null");
      setDollarBS(bcv);
    };
    getDolar();
  }, []);

  return (
    <>
      <div className="bg-gradient-to-br from-violet-700 via-violet-500 to-violet-400 flex flex-col gap-2 text-white rounded-xl shadow-md p-6 bg-gray-200 bg-opacity-30 backdrop-filter backdrop-blur-lg w-full">
        {dollarBS && (
          <>
            <div className="font-semibold text-lg">Hoy $</div>
            <p>{dayjs(dollarBS.lastUpdate).format("DD/MM/YYYY HH:mm a")}</p>
            <div className="font-semibold text-5xl tracking-tight">
              {dollarBS.price} <span className="text-4xl">Bs.D </span>
            </div>
          </>
        )}
        <div className="font-normal">Tasa BCV </div>
      </div>
    </>
  );
}

export default Monitor;
