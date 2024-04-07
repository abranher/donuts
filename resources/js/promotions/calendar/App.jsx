import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import esLocale from "@fullcalendar/core/locales/es";

export default function App() {
  const handleDateClick = (arg) => {
    alert(arg.dateStr);
  };

  return (
    <FullCalendar
      plugins={[dayGridPlugin, interactionPlugin]}
      events={promotions}
      dateClick={handleDateClick}
      eventClick={() => {
        console.log("jola");
      }}
      locale={esLocale}
    />
  );
}
