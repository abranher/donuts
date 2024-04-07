import { Icon } from "leaflet";
import { Marker, Popup } from "react-leaflet";

function DeliveryMarkers({ deliveryMen }) {
  const SvgIcon = new Icon({
    iconUrl: "../icons/delivery/delivery.png",
    iconSize: [60, 60],
  });

  return (
    <>
      {deliveryMen.map(({ name, geolocation, id }) => {
        const location = {
          lat: geolocation.latitude,
          lng: geolocation.longitude,
        };
        return (
          location.lat != "0.00000000" && (
            <Marker position={location} icon={SvgIcon} key={id}>
              <Popup>{name}</Popup>
            </Marker>
          )
        );
      })}
    </>
  );
}

export default DeliveryMarkers;
