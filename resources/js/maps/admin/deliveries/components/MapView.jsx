import React, { useEffect, useState } from "react";
import axios from "axios";
import { MapContainer, TileLayer } from "react-leaflet";
import { attribution, url } from "../../../OpenStreetMap";
import DeliveryMarkers from "./DeliveryMarkers";
import MyLocationMarker from "./MyLocationMarker";
import "leaflet/dist/leaflet.css";

function MapView() {
  const [position, setPosition] = useState({ lat: 8.0, lng: -66.0 });
  const [deliveryMen, setDeliveryMen] = useState([]);

  const getDeliveryMen = async () => {
    try {
      const response = await axios.get(
        route("api-deliveries.indexDeliveryMan")
      );
      setDeliveryMen(response.data.data);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    getDeliveryMen();

    const interval = setInterval(() => {
      getDeliveryMen();
    }, 8000);

    return () => clearInterval(interval);
  }, []);

  return (
    <>
      <MapContainer center={position} zoom={13} scrollWheelZoom={true}>
        <TileLayer attribution={attribution} url={url} />
        <MyLocationMarker />
        <DeliveryMarkers deliveryMen={deliveryMen} />
      </MapContainer>
    </>
  );
}

export default MapView;
