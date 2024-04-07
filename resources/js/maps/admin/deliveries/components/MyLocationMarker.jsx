import { Icon } from "leaflet";
import LocationCrosshair from "../../../../icons/LocationCrosshair";
import { Marker, Popup, useMap } from "react-leaflet";
import { useEffect, useState } from "react";

function MyLocationMarker() {
  const [position, setPosition] = useState(null);
  const map = useMap();

  useEffect(() => {
    getMyLocation();
  }, []);

  const SvgIcon = new Icon({
    iconUrl: "../icons/delivery/home.png",
    iconSize: [60, 60],
  });

  const getMyLocation = () => {
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          setPosition([latitude, longitude]);
          map.flyTo([latitude, longitude], map.getZoom());
        },
        (error) => {
          console.error("Error getting location:", error.message);
        }
      );
    } else {
      console.log("geolocation is NOT available");
    }
  };

  return (
    <>
      <button
        className="z-[900] bg-white text-gray-800 absolute bottom-8 right-6 w-12 h-12 rounded-full flex justify-center items-center"
        onClick={() => {
          getMyLocation();
        }}
      >
        <LocationCrosshair size="w-7 h-7" />
      </button>
      {position === null ? null : (
        <Marker position={position} icon={SvgIcon}>
          <Popup>You are here</Popup>
        </Marker>
      )}
    </>
  );
}

export default MyLocationMarker;
