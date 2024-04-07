import React from "react";
import { Marker } from "react-leaflet";

function Markers({ places }) {
  const markers = places.map((place, i) => (
    <Marker key={i} position={place.geometry} />
  ));
  return markers;
}

export default Markers;
