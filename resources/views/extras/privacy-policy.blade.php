<x-layout title="Home">

  <style>
    /*logo*/
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Fasthand&display=swap');
  </style>
  <style>
    /*titulo*/
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Fasthand&family=Kalam:wght@700&display=swap');
  </style>
  <style>
    /*parrafo*/
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Fasthand&family=Kalam:wght@700&family=Ysabeau+Infant:ital,wght@1,500&display=swap');
  </style>

  <header
    class="fixed top-0 w-full z-50 bg-white dark:bg-dark-card border-b border-gray-200 dark:bg-dark-card dark:border-gray-600">
    <nav class="items-center text-black dark:text-gray-500 py-5 px-5 flex justify-between">

      <section class="flex justify-center items-center gap-5">
        {{-- boton para abrir el navbar --}}
        <button id="toggleButton" type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-50 dark:hover:bg-opacity-5 dark:focus:ring-gray-600">
          <svg
            class="w-7 h-7 text-gray-700 dark:text-gray-50 group-hover:text-violet-600 dark:group-hover:text-violet-600"
            fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path
              d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
          </svg>
        </button>
        <button style="font-family: 'Dancing Script', cursive;font-family: 'Fasthand', cursive;"
          class="flex justify-center items-center text-3xl font-bold tracking-tight cursor-default">
          <img class="inline w-10 h-10 rounded-full" src="{{ asset('img/logo.jpeg') }}" alt="Logo Donuts Maker">
        </button>
      </section>

      <section class="flex justify-center items-center gap-5"></section>
    </nav>
  </header>

  <aside id="sidebar-mobile"
    class="fixed top-20 left-0 z-40 w-64 h-screen overflow-auto bg-slate-900 text-white transform -translate-x-full transition-transform duration-200 ease-in-out"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path
                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
              <path
                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
            </svg>
            <span class="ml-3">Panel</span>
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
              <path
                d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>
            <span
              class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
            <span
              class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-violet-200 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
              <path
                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
              <path
                d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
          </a>
        </li>
      </ul>
      <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 20">
              <path
                d="M7.958 19.393a7.7 7.7 0 0 1-6.715-3.439c-2.868-4.832 0-9.376.944-10.654l.091-.122a3.286 3.286 0 0 0 .765-3.288A1 1 0 0 1 4.6.8c.133.1.313.212.525.347A10.451 10.451 0 0 1 10.6 9.3c.5-1.06.772-2.213.8-3.385a1 1 0 0 1 1.592-.758c1.636 1.205 4.638 6.081 2.019 10.441a8.177 8.177 0 0 1-7.053 3.795Z" />
            </svg>
            <span class="ml-4">Upgrade to Pro</span>
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
              <path
                d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z" />
            </svg>
            <span class="ml-3">Documentation</span>
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-violet-600 dark:hover:text-violet-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-violet-600 dark:group-hover:text-violet-600"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
              <path
                d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
            </svg>
            <span class="ml-3">Ajustes</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>

  <main class="mt-24">
    <div class="bg-gray-100">
      <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Privacy Policy </h1>

        <p class="mb-4">
          This privacy ______ sets out how our _______ uses and protects any ___________ that you give us ____ you
          use
          this
          website.
        </p>

        <h2 class="text-2xl font-bold mb-2">Information We Collect </h2>

        <p class="mb-4">
          We may _______ the following information:
        </p>

        <ul class="list-disc list-inside mb-4">
          <li>Your name and contact ___________ </li>
          <li>Demographic information </li>
          <li>Other information relevant to ________ surveys and/or offers </li>
        </ul>

        <h2 class="text-2xl font-bold mb-2">How We Use the ___________ </h2>

        <p class="mb-4">
          We require ____ information to understand your _____ and provide you with _ better service, and in
          particular
          for
          ___ following reasons:
        </p>

        <ul class="list-disc list-inside mb-4">
          <li>Internal record keeping </li>
          <li>Improving our products and ________ </li>
          <li>Sending promotional emails about ___ products, special offers, or _____ information which we think ___
            may
            find
            interesting </li>
          <li>From time to time, __ may also use your ___________ to contact you for ______ research purposes. We
            may
            _______
            you by email, phone, __ mail. We may use ___ information to customize the _______ according to your
            interests. </li>
        </ul>

        <h2 class="text-2xl font-bold mb-2">Security </h2>

        <p class="mb-4">
          We are _________ to ensuring that your ___________ is secure. In order __ prevent unauthorized access or
          disclosure,
          we have ___ in place suitable physical, __________, and managerial procedures to _________ and secure the
          ___________ we collect online.
        </p>

        <h2 class="text-2xl font-bold mb-2">Cookies </h2>

        <p class="mb-4">
          A cookie __ a small file that ____ permission to be placed __ your computer's hard drive. ____ you agree,
          the
          file
          is added, ___ the cookie helps analyze ___ traffic or lets you ____ when you visit a __________ site.
          Cookies
          _____
          web applications to _______ to you as an __________. The web application can ______ its operations to your
          needs,
          likes, and ________ by gathering and remembering ___________ about your preferences.
        </p>

        <p class="mb-4">
          Overall, cookies ____ us provide you with _ better website by enabling __ to monitor which pages ___ find
          useful
          ___ which you do not. _ cookie in no way _____ us access to your ________ or any information about ___,
          other
          than
          the data you choose __ share with us.
        </p>

        <h2 class="text-2xl font-bold mb-2">Links to Other Websites </h2>

        <p class="mb-4">
          Our website ___ contain links to other ________ of interest. However, once ___ have used these links __
          leave
          our
          site, you should note ____ we do not have ___ control over that other _______. Therefore, we cannot be
          responsible
          for the __________ and privacy of any ___________ which you provide whilst ________ such sites and such
          sites
          are
          ___ governed by this privacy _________. You should exercise caution ___ look at the privacy _________
          applicable
          to
          the website in question.
        </p>

        <h2 class="text-2xl font-bold mb-2">Controlling Your Personal Information </h2>

        <p class="mb-4">
          You may ______ to restrict the collection __ use of your personal ___________ in the following ways:
        </p>

        <ul class="list-disc list-inside mb-4">
          <li>If you have previously ______ to us using your ________ information for direct marketing ________, you
            may
            change your ____ at any time by _______ to or emailing us __ [email protected] </li>
          <li>We will not sell, __________, or lease your personal ___________ to third parties unless __ have your
            permission
            or ___ required by law to __ so. We may use ____ personal information to send ___ promotional
            information
            about
            third _______ which we think you ___ find interesting if you ____ us that you wish ____ to happen. </li>
          <li>You may request details __ personal information which we ____ about you. If you _____ like a copy of
            ___
            information held on you, ______ write to [Your Company ____, Address, City, State, Zip ____] or email
            [email protected] </li>
          <li>If you believe that ___ information we are holding __ you is incorrect or __________, please write to
            or
            _____
            us as soon as ________ at the above address. __ will promptly correct any ___________ found to be
            incorrect.
          </li>
        </ul>

        <p class="mb-4">
          This privacy ______ is subject to change _______ notice.
        </p>
      </div>
    </div>
  </main>

  <footer class="flex flex-col gap-5 justify-center m-5">
    <nav class="flex justify-center flex-wrap gap-6 text-gray-500 dark:text-gray-300 font-medium">
      <a class="hover:text-gray-900 dark:hover:text-gray-400" href="#">Sobre Nosotros</a>
      <a class="hover:text-gray-900 dark:hover:text-gray-400" href="#">Servicios</a>
      <a class="hover:text-gray-900 dark:hover:text-gray-400" href="#">Contacto</a>
    </nav>

    <div class="flex justify-center items-center gap-6">
      <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
        <x-icons.facebook
          class="mb-2 text-gray-500 dark:text-gray-400 group-hover:text-violet-600 hover:text-violet-600 dark:group-hover:text-violet-600 dark:hover:text-violet-600" />
      </a>
      <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer">
        <x-icons.linkedin
          class="mb-2 text-gray-500 dark:text-gray-400 group-hover:text-violet-600 hover:text-violet-600 dark:group-hover:text-violet-600 dark:hover:text-violet-600" />
      </a>
      <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
        <x-icons.instagram
          class="mb-2 text-gray-500 dark:text-gray-400 group-hover:text-violet-600 hover:text-violet-600 dark:group-hover:text-violet-600 dark:hover:text-violet-600" />
      </a>
      <a href="https://messenger.com" target="_blank" rel="noopener noreferrer">
        <x-icons.messenger
          class="mb-2 text-gray-500 dark:text-gray-400 group-hover:text-violet-600 hover:text-violet-600 dark:group-hover:text-violet-600 dark:hover:text-violet-600" />
      </a>
      <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
        <x-icons.x
          class="mb-2 text-gray-500 dark:text-gray-400 group-hover:text-violet-600 hover:text-violet-600 dark:group-hover:text-violet-600 dark:hover:text-violet-600" />
      </a>
    </div>
    <p class="text-center text-gray-800 font-medium dark:text-gray-300">&copy; 2023 Company Donuts Maker.
      {{ __('All rights reserved.') }}</p>
    <br>
  </footer>

</x-layout>
