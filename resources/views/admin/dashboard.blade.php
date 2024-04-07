<x-layout title="Panel de control" :vite="['js/flowbite.min.js']" react notifications>

  <x-main.admin>
    <x-title title="Panel de control" />

    {{-- information of sales --}}
    <section class="flex-wrap flex justify-center items-center gap-8">
      <div class="conta">
        <div
          class="car w-11/12 sm:w-96 flex justify-around items-center bg-white dark:bg-dark-card rounded-lg shadow-lg hover:shadow-none">
          <div class="flex justify-center items-start flex-col">
            <span class="bg-[#04fc43] w-10 h-10 flex justify-center items-center rounded-full mb-3">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                  d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zm96 96c0-17.7 14.3-32 32-32l192 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32zm32 64H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
              </svg>
            </span>
            <p class="text-lg">Total de ventas</p>
            <h3 class="text-2xl font-bold">$25, 024</h3>
            <p class="mt-8">Últimas 24 Horas</p>
          </div>
          <div class="percent" style="--clr:#04fc43;--num:85;">
            <div class="dot"></div>
            <svg>
              <circle class="dark:stroke-gray-600 stroke-slate-400" cx="70" cy="70" r="70"></circle>
              <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
              <h2 class="text-gray-600 dark:text-slate-400 font-medium">85 <span>%</span></h2>
            </div>
          </div>
        </div>

        <div
          class="car w-11/12 sm:w-96 flex justify-around items-center bg-white dark:bg-dark-card rounded-lg shadow-lg hover:shadow-none">
          <div class="flex justify-center items-start flex-col">
            <span class="bg-[#06ccff] w-10 h-10 flex justify-center items-center rounded-full mb-3">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                  d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zm96 96c0-17.7 14.3-32 32-32l192 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32zm32 64H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
              </svg>
            </span>
            <p class="text-lg">Total de ventas</p>
            <h3 class="text-2xl font-bold">$25, 024</h3>
            <p class="mt-8">Últimas 24 Horas</p>
          </div>
          <div class="percent" style="--clr:#06ccff;--num:23;">
            <div class="dot"></div>
            <svg>
              <circle class="dark:stroke-gray-600 stroke-slate-400" cx="70" cy="70" r="70"></circle>
              <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
              <h2 class="text-gray-600 dark:text-slate-400 font-medium">23 <span>%</span></h2>
            </div>
          </div>
        </div>

        <div
          class="car w-11/12 sm:w-96 flex justify-around items-center bg-white dark:bg-dark-card rounded-lg shadow-lg hover:shadow-none">
          <div class="flex justify-center items-start flex-col">
            <span class="bg-[#ff00be] w-10 h-10 flex justify-center items-center rounded-full mb-3">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                  d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zm96 96c0-17.7 14.3-32 32-32l192 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32zm32 64H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
              </svg>
            </span>
            <p class="text-lg">Total de ventas</p>
            <h3 class="text-2xl font-bold">$25, 024</h3>
            <p class="mt-8">Últimas 24 Horas</p>
          </div>
          <div class="percent" style="--clr:#ff00be;--num:60;">
            <div class="dot"></div>
            <svg>
              <circle class="dark:stroke-gray-600 stroke-slate-400" cx="70" cy="70" r="70"></circle>
              <circle cx="70" cy="70" r="70"></circle>
            </svg>
            <div class="number">
              <h2 class="text-gray-600 dark:text-slate-400 font-medium">60 <span>%</span></h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- charts --}}
    <section class="flex justify-center items-center gap-8 flex-wrap">
      {{-- chart sales --}}
      <div
        class="w-11/12 bg-white dark:bg-dark-card flex justify-center items-center flex-col rounded-lg shadow-lg hover:shadow-none">
        {{-- header --}}
        <div class="w-full p-4 flex justify-between items-center text-2xl">
          <h2 class="text-2xl">Ventas</h2>
          <a class="link-primary text-lg" href="#">Ver Reporte</a>
        </div>
        {{-- titles --}}
        <div class="w-full p-4 flex justify-between items-center">
          <div class="flex justify-center items-start flex-col text-xl">
            <h3 class="font-bold">$18,230.00</h3>
            <p>A lo largo del tiempo</p>
          </div>
          <div class="flex justify-center items-end flex-col text-xl">
            <p class="text-green-500">33,1%</p>
            <p>Desde el mes pasado</p>
          </div>
        </div>
        {{-- chart --}}
        <div class="w-full p-4">
          <canvas id="chartSales"></canvas>
        </div>
        {{-- footer titles --}}
        <div class="w-full p-4 flex justify-end items-center">
          <div class="flex gap-3 text-lg">
            <p>Este año</p>
            <p>El año pasado</p>
          </div>
        </div>
      </div>

      <div
        class="w-11/12 bg-white dark:bg-dark-card flex justify-center items-center flex-col rounded-lg shadow-lg hover:shadow-none">
        {{-- header --}}
        <div class="w-full p-4 flex justify-between items-center text-2xl">
          <h2 class="text-2xl">Ventas</h2>
          <a class="link-primary text-lg" href="#">Ver Reporte</a>
        </div>
        {{-- titles --}}
        <div class="w-full p-4 flex justify-between items-center">
          <div class="flex justify-center items-start flex-col text-xl">
            <h3 class="font-bold">$18,230.00</h3>
            <p>A lo largo del tiempo</p>
          </div>
          <div class="flex justify-center items-end flex-col text-xl">
            <p class="text-green-500">33,1%</p>
            <p>Desde el mes pasado</p>
          </div>
        </div>
        {{-- chart --}}
        <div class="w-full p-4">
          <canvas id="chart"></canvas>
        </div>
        {{-- footer titles --}}
        <div class="w-full p-4 flex justify-end items-center">
          <div class="flex gap-3 text-lg">
            <p>Este año</p>
            <p>El año pasado</p>
          </div>
        </div>
      </div>
    </section>

    {{-- table recent orders --}}
    <div class="w-11/12 p-4 bg-white dark:bg-dark-card rounded-lg shadow-lg hover:shadow-none">
      <!-- Card header -->
      <div class="items-center justify-between lg:flex">
        <div class="mb-4 lg:mb-0">
          <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Transacciones</h3>
          <span class="text-base font-normal text-gray-500 dark:text-gray-400">Esta es una lista
            de
            las
            últimas
            transacciones</span>
        </div>
        <div class="items-center sm:flex">
          <div class="flex items-center">
            <button id="dropdownDefault" data-dropdown-toggle="dropdown"
              class="mb-4 sm:mb-0 mr-4 inline-flex items-center text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
              type="button">
              Filtrar por estatus
              <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
              <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                Category
              </h6>
              <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                <li class="flex items-center">
                  <input id="apple" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                  <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Completada (56)
                  </label>
                </li>

                <li class="flex items-center">
                  <input id="fitbit" type="checkbox" value="" checked
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                  <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    Cancelada (56)
                  </label>
                </li>

                <li class="flex items-center">
                  <input id="dell" type="checkbox" value=""
                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />

                  <label for="dell" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                    En progreso (56)
                  </label>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Table -->
      <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead
                  class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                  <tr>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Transacción
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Fecha y hora
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Monto
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      N° de referencia
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Metodo de pago
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Estatus
                    </th>
                    <th scope="col"
                      class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                      Detalles
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                  <tr
                    class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                    <td class="p-4 whitespace-nowrap">
                      Payment from <span class="font-semibold">Bonnie Green</span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      Apr 23 ,2021
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      $2300
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      0047568936
                    </td>
                    <td
                      class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      Pago movil
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Completada</span>
                    </td>
                    <td>...</td>
                  </tr>
                  <tr
                    class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                    <td class="p-4 whitespace-nowrap">
                      Payment refund to <span class="font-semibold">#00910</span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      Apr 23 ,2021
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      -$670
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      0078568936
                    </td>
                    <td
                      class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      Pago movil
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Completada</span>
                    </td>
                  </tr>
                  <tr
                    class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                    <td class="p-4 whitespace-nowrap">
                      Payment failed from <span class="font-semibold">#087651</span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      Apr 18 ,2021
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      $234
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      0088568934
                    </td>
                    <td
                      class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      Pago movil
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      <span
                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-red-100 dark:border-red-400 dark:bg-gray-700 dark:text-red-400">Cancelada</span>
                    </td>
                  </tr>
                  <tr
                    class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                    <td class="p-4 whitespace-nowrap">
                      Payment from <span class="font-semibold">Lana Byrd</span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      Apr 15 ,2021
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      $5000
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      0018568911
                    </td>
                    <td
                      class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      Pago movil
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      <span
                        class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">In
                        progress</span>
                    </td>
                  </tr>
                  <tr
                    class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                    <td class="p-4 whitespace-nowrap">
                      Payment from <span class="font-semibold">Jese Leos</span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      Apr 15 ,2021
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      $2300
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      0045568939
                    </td>
                    <td
                      class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      transferencia
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Completada</span>
                    </td>
                  </tr>
                  <tr
                    class="h-14 text-start text border-b border-slate-200 dark:border-slate-500 text-slate-500 dark:text-slate-300">
                    <td class="p-4 whitespace-nowrap">
                      Refund to <span class="font-semibold">THEMESBERG LLC</span>
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      Apr 11 ,2021
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      -$560
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      0031568935
                    </td>
                    <td
                      class="inline-flex items-center p-4 space-x-2 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                      Pago movil
                    </td>
                    <td class="p-4 whitespace-nowrap">
                      <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">Completada</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Card Footer -->
      <div class="flex items-center justify-between pt-5 sm:pt-6">
        <div>
          <a href="#" class="link-primary">Ver Todo</a>
        </div>
      </div>
    </div>
  </x-main.admin>

  <script src="chart.js"></script>
  <script>
    const ctx = document.getElementById("chartSales");
    const ctx2 = document.getElementById('chart')
    const names = ["Carlos", "Pedro", "Maria", "Rosa", "Juan"];
    const ages = [24, 10, 54, 51, 15];

    const chartSales = new Chart(ctx, {
      type: "bar",
      data: {
        labels: names,
        datasets: [{
          label: "Edad",
          data: ages,
          fill: false,
          lineTension: 0.1,
          borderWidth: 1,
        }],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    const chart = new Chart(ctx2, {
      type: "line",
      data: {
        labels: names,
        datasets: [{
          label: "Edad",
          data: ages,
          fill: false,
          lineTension: 0.1,
          borderWidth: 1,
        }],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</x-layout>
