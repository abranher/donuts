<x-nav.nav-market />
<x-menu-mobile.menu-m-user />

{{-- Alerts --}}
<x-message-errors />
<x-message-status />

{{-- bottom navigation --}}
<x-bottom-navigation />

<!-- cuerpo de la pagina -->
<main class="h-full md:flex dark:bg-dark xl:border-x dark:border-gray-700 xl:m-auto max-w-[1450px]">
  {{ $slot }}
</main>
