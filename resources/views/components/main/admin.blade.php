<x-nav.nav-admin />
<x-menu-mobile.menu-m-admin />

{{-- Alerts --}}
<x-message-errors />
<x-message-status />

{{-- bottom navigation --}}
<x-bottom-navigation />

<!-- cuerpo de la pagina -->
<main class="h-full md:flex dark:bg-dark xl:border-x dark:border-gray-700 xl:m-auto max-w-[1450px]">
  {{-- esta es la seccion del navbar --}}
  <x-menu-desktop.menu-d-admin />

  {{-- esta es la seccion central --}}
  <section
    class="py-24 md:px-10 gap-10 flex justify-start items-center flex-col text-slate-500 dark:text-slate-400 border-l border-gray-200 dark:border-gray-700 lg:w-[77%] w-full">
    {{ $slot }}
  </section>
</main>
