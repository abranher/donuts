import axios from "axios";

if ("geolocation" in navigator) {
  const watchID = navigator.geolocation.watchPosition((position) => {
    const sendRequest = async () => {
      try {
        const response = await axios.post(route("geolocations.store"), {
          user_id: userID,
          latitude: position.coords.latitude,
          longitude: position.coords.longitude,
        });

        console.log("Respuesta de la API:", response);
      } catch (error) {
        console.error("Error al enviar la solicitud:", error);
      }
    };

    sendRequest();
  });
} else {
  console.log("geolocation is NOT available");
}
