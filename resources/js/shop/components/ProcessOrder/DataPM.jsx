import React from "react";

function DataPM({ dato, value }) {
  return (
    <>
      <div className="text-xl">
        <p className="text-gray-700 dark:text-gray-200 font-medium">{dato}</p>
        <p className="font-medium">{value}</p>
      </div>
    </>
  );
}

export default DataPM;
