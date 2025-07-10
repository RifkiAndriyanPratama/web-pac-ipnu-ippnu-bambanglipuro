<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent text-white">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-2.5">
    <a href="#" class="flex items-center space-x-3">
        <img src="{{ asset('images/logo/pacipnuippnumbali.png') }}" class="h-8" alt="PAC Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap">PAC Bambanglipuro</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button"
      class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden"
      aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor"
             viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul id="navbar-list" class="flex flex-col md:flex-row md:space-x-8 font-semibold 
                 bg-white md:bg-transparent 
                 text-gray-800 md:text-white 
                 p-4 md:p-0 mt-4 md:mt-0 
                 rounded-lg md:rounded-none 
                 shadow md:shadow-none transition-colors duration-300">
        @foreach (['Home' => '/', 'Program' => '#', 'About' => '#', 'News' => '#', 'Sekretariatan Digital' => '/admin'] as $label => $url)
          <li>
            <a href="{{ $url }}" class="block relative py-2 px-4 group hover:text-green-500 transition-colors duration-300">
              {{ $label }}
              <span class="absolute left-4 bottom-1 w-[calc(100%-2rem)] h-0.5 bg-green-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>
