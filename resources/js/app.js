import "./bootstrap";

/** this is the object for localstorage */

const storage = {
  get(key) {
    const val = window.localStorage.getItem(key);
    if (!val) {
      return null;
    }

    return JSON.parse(val);
  },

  set(key, val) {
    window.localStorage.setItem(key, JSON.stringify(val));
  },

  remove(key) {
    window.localStorage.removeItem(key);
  },

  clear() {
    window.localStorage.clear();
  },
};

// cada vez que se recargue pregunatara si existe el tema

let theme = storage.get("theme");
if (theme == "dark") {
  document.documentElement.classList.add("dark");
} else if (theme == "") {
  document.documentElement.classList.remove("dark");
}

/** this is the function for to active the dark mode */

if (document.getElementById("buttonTheme")) {
  const buttonTheme = document.getElementById("buttonTheme");

  buttonTheme.addEventListener("click", (e) => {
    e.preventDefault();
    document.documentElement.classList.toggle("dark");
    if (document.documentElement.classList.contains("dark")) {
      storage.set("theme", "dark");
      return;
    }
    storage.set("theme", "");
  });
}

/** this is the function for o'clock */

if (document.getElementById("fechaReloj")) {
  let actualizarHora = function () {
    let fecha = new Date(),
      horas = fecha.getHours(),
      ampm,
      minutos = fecha.getMinutes(),
      segundos = fecha.getSeconds(),
      diaSemana = fecha.getDay(),
      dia = fecha.getDate(),
      mes = fecha.getMonth(),
      year = fecha.getFullYear();

    let pHoras = document.getElementById("horas"),
      pAMPM = document.getElementById("ampm"),
      pMinutos = document.getElementById("minutos"),
      pSegundos = document.getElementById("segundos"),
      pDiaSemana = document.getElementById("diaSemana"),
      pDia = document.getElementById("dia"),
      pMes = document.getElementById("mes"),
      pYear = document.getElementById("year");

    let semana = [
      "Domingo",
      "Lunes",
      "Martes",
      "Miercoles",
      "Jueves",
      "Viernes",
      "Sabado",
    ];
    pDiaSemana.textContent = semana[diaSemana];
    pDia.textContent = dia;

    let meses = [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre",
    ];
    pMes.textContent = meses[mes];
    pYear.textContent = year;

    if (horas >= 12) {
      horas = horas - 12;
      ampm = "PM";
    } else {
      ampm = "AM";
    }

    if (horas == 0) {
      horas = 12;
    }
    pHoras.textContent = horas;

    if (minutos < 10) {
      minutos = "0" + minutos;
    }
    pMinutos.textContent = minutos;

    if (segundos < 10) {
      segundos = "0" + segundos;
    }
    pSegundos.textContent = segundos;
    pAMPM.textContent = ampm;
  };
  actualizarHora();

  setInterval(actualizarHora, 1000);
}
