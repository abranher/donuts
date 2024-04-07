import { MapContainer, Marker, TileLayer } from "react-leaflet";
import React, { useEffect, useState } from "react";
import "leaflet/dist/leaflet.css";
import { places } from "./assets/data.json";
import Markers from "./Markers";

function MapView() {
  const [position, setPosition] = useState({
    lat: 0,
    lng: 0,
  });

  useEffect(() => {
    const interval = setInterval(() => {
      // Obtiene la posición actual del usuario
      navigator.geolocation.getCurrentPosition(
        (position) => {
          console.log(position);
          setPosition({
            lng: position.coords.longitude,
            lat: position.coords.latitude,
          });
        },
        (error) => {
          console.log(error);
        },
        {
          enableHighAccuracy: true,
        }
      );
    }, 5000);

    // Elimina el intervalo al salir de la aplicación
    return () => clearInterval(interval);
  }, []);

  return (
    <MapContainer center={position} zoom={13} scrollWheelZoom={false}>
      <TileLayer
        attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      />
      <Markers places={places} />
      <Marker position={position} />
    </MapContainer>
  );
}

export default MapView;
