<section class="w-full cinzel-regular flex justify-between items-start max-md:flex-col-reverse max-md:gap-5 max-md:items-end">
  <div class="w-full">
    <h2 class="px-5 text-3xl dark:text-slate-100 font-bold">{{ $title ?? '' }}</h2>
    <p class="px-5 my-3 font-medium dark:text-slate-200">Bienvenido(a) {{ current_user()->name }}
      {{ current_user()->last_conection != '' ? ', Última conexión ' . current_user()->last_conection : '' }}
    </p>
  </div>
  <div id="fechaReloj" class="px-5 flex justify-center items-end flex-col w-2/4 h-full">
    <div class="fecha flex gap-1 dark:text-gray-100 font-medium">
      <p id="diaSemana" class="diaSemana"></p>
      <p id="dia" class="dia"></p>
      <p>de </p>
      <p id="mes" class="mes"></p>
      <p>del </p>
      <p id="year" class="year"></p>
    </div>

    <div class="reloj flex text-end font-medium dark:text-gray-100">
      <p id="horas" class="horas"></p>
      <p>:</p>
      <p id="minutos" class="minutos"></p>
      <p>:</p>
      <div class="caja-segundos flex gap-1">
        <p id="segundos" class="segundos"></p>
        <p id="ampm" class="ampm"></p>
      </div>
    </div>
  </div>
</section>
