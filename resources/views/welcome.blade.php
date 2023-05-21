<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans text-gray-700 antialiased bg-white">
    <div class="h-24 z-50 relative container mx-auto px-6 grid grid-cols-3">
        <div x-data="{showMenu: false}" class="flex items-center"><button x-on:click="showMenu = true"><svg
                    class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg></button>
            <div x-show="showMenu" x-transition class="fixed inset-0 w-full h-full bg-white z-50 text-yellow-900">
                <div
                    class="container h-full mx-auto px-6 py-8 relative z-10 flex flex-col items-center justify-center text-2xl uppercase font-bold tracking-widest space-y-6">
                    <button x-on:click="showMenu = false" class="absolute top-0 left-0 mt-8 ml-6"><svg class="w-8 h-8"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg></button> <a href="/"
                        class="inline-block border-b-4 border-transparent hover:border-yellow-900">Home</a> <a
                        href="/pages/about-us"
                        class="inline-block border-b-4 border-transparent hover:border-yellow-900">About</a> <a
                        href="/blog" class="inline-block border-b-4 border-transparent hover:border-yellow-900">Blog</a>
                    <a href="/contact-us"
                        class="inline-block border-b-4 border-transparent hover:border-yellow-900">Contact</a>
                </div>
                <div class="absolute inset-0 w-full h-full bg-yellow-900 bg-opacity-20"></div>
            </div>
        </div>
        <div class="flex items-center justify-center"><a href="/"
                class="text-white uppercase font-bold text-2xl tracking-widest">Bartin</a></div>
        <div class="flex items-center justify-end">
          
            @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
              <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                      <button
                          class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                          <div>{{ Auth::user()->name }}</div>

                          <div class="ml-1">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 20 20">
                                  <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                              </svg>
                          </div>
                      </button>
                  </x-slot>

                  <x-slot name="content">
                      <x-dropdown-link :href="route('profile.edit')">
                          {{ __('Profile') }}
                      </x-dropdown-link>

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                              this.closest('form').submit();">
                              {{ __('Log Out') }}
                          </x-dropdown-link>
                      </form>
                  </x-slot>
              </x-dropdown>
            </div>
          @endauth
            @guest
                
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                      
                        <span  class="text-white cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                              </svg>
                              
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('login')">
                            {{ __('Giris Yap') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('register')">
                            {{ __('Uye ol') }}
                        </x-dropdown-link>

                    </x-slot>
                </x-dropdown>
            </div>
            @endguest

        </div>
    </div>
    <div class="w-full h-24 bg-yellow-900 bg-opacity-95 absolute top-0 left-0"></div>
    <div class="-mt-24 relative w-full py-12 px-12 bg-yellow-900">
        <div class="relative z-10 text-center py-24 md:py-48">
            <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-display font-bold mb-12">
                Bartın'ın Güzel Tatil Rotası Turu
                <p class="mx-auto text-lg">(Namu Makwembo)</p>
            </h1>
            <a href="/reservation"
                class="inline-block bg-yellow-800 text-white uppercase text-sm tracking-widest font-heading px-8 py-4">
                Tur rezervasyonu
            </a>
        </div>
        <div
            class="relative z-10 mx-auto max-w-4xl flex justify-between uppercase text-white font-heading tracking-widest text-sm">
            <a href="{{route('about-us')}}" class="border-b border-white">Daha fazla bilgi</a>
            <a href="{{route('contact')}}" class="border-b border-white">Bize ulasin</a>
        </div>
        <img src="https://blog.biletbayi.com/wp-content/uploads/2019/09/amasra-tarihi-yerler-1068x650-1.jpg" {{--
            src="https://storage.kucukoteller.com.tr/2018/12/10/1544445690649713.jpg" --}}
            class="w-full h-full absolute inset-0 object-cover opacity-70">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="bg-white p-12 md:p-24 flex justify-end items-center"><a href="/blog/this-is-latest-post/"><img
                    src="https://images.unsplash.com/photo-1501631259223-89d4e246ed23?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1960&amp;q=80"
                    class="w-full max-w-md"></a></div>
        <div class="bg-gray-100 p-12 md:p-24 flex justify-start items-center">
            <div class="max-w-md">
                <div class="w-24 h-2 bg-yellow-800 mb-4"></div>
                <h2 class="font-display font-bold text-2xl md:text-3xl lg:text-4xl mb-6">Bartin Nasil Bir Sehir</h2>
                <p class="font-light text-gray-600 text-sm md:text-base mb-6 leading-relaxed">Bartin, Türkiye'nin
                    Karadeniz Bölgesi'nde bulunan güzel bir şehirdir. Bu bölge, yeşil ormanları, temiz havası ve doğal
                    güzellikleri ile ünlüdür. Bartın şehri de bölgenin en önemli şehirlerinden biridir. Peki, Bartın
                    nasıl bir şehir?</p><a href="{{route('blog1')}}"
                    class="inline-block border-2 border-yellow-800 font-light text-yellow-800 text-sm uppercase tracking-widest py-3 px-8 hover:bg-yellow-800 hover:text-white">
                    Daha Oku</a>
            </div>
        </div>
    </div>

    {{-- Header --}}
    <section>
        <img src="https://images.unsplash.com/photo-1501901609772-df0848060b33?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80"
            class="w-full h-screen object-cover">

    </section>


    {{-- Steps section --}}
    <section>
        <div class="max-w-xl mx-auto text-center py-24 md:py-32 ">
            <div class="w-24 h-2 bg-yellow-800 mb-4 mx-auto"></div>
            <h2 class="font-display font-bold text-3xl md:text-4xl lg:text-5xl mb-6">Gezmeyi seviyoruz</h2>
            <p class="font-light text-gray-600 mb-6 leading-relaxed">Gezmeyi sevmek, hayatın rutininden kurtulup, farklı
                yerler keşfetmek ve unutulmaz anılar biriktirmek için harika bir yoldur</p>
        </div>


   
        <div class="flex flex-wrap bg-black"><a href="/blog/inkumu"
                class="bg-black relative w-full md:w-auto md:flex-1 flex items-center justify-center h-72 font-heading text-white uppercase tracking-widest hover:opacity-75">
                <div class="relative z-10">Inkumu</div><img
                    src="https://images.unsplash.com/photo-1528855275993-0f4a23fedd62?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80"
                    class="absolute inset-0 w-full h-full object-cover opacity-50">
            </a><a href="/blog/bartin"
                class="bg-black relative w-full md:w-auto md:flex-1 flex items-center justify-center h-72 font-heading text-white uppercase tracking-widest hover:opacity-75">
                <div class="relative z-10">Bartin</div><img
                    src="https://images.unsplash.com/photo-1449495169669-7b118f960251?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80"
                    class="absolute inset-0 w-full h-full object-cover opacity-50">
            </a><a href="/blog/amasra"
                class="bg-black relative w-full md:w-auto md:flex-1 flex items-center justify-center h-72 font-heading text-white uppercase tracking-widest hover:opacity-75">
                <div class="relative z-10">Amasra</div><img
                    src="https://storage.kucukoteller.com.tr/2018/12/10/1544445786453954.jpg"
                    class="absolute inset-0 w-full h-full object-cover opacity-50">
            </a>
        </div>
    </section>







    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="bg-white p-12 md:p-24 flex justify-start items-center"><a href="/blog/program"><img
                    src="https://images.unsplash.com/photo-1471079222144-ee7466f9b7ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1374&q=80"
                    class="w-full max-w-md"></a></div>
        <div class="md:order-first bg-gray-100 p-12 md:p-24 flex justify-end items-center">
            <div class="max-w-md">
                <div class="w-24 h-2 bg-yellow-800 mb-4"></div>
                <h2 class="font-display font-bold text-2xl md:text-3xl lg:text-4xl mb-6">5 Gün Boyunca Doğayla İç İçe: Bartın, Amasra ve İnkumu Tur Programı</h2>
                <p class="font-light text-gray-600 text-sm md:text-base mb-6 leading-relaxed">İlk günümüzde Bartın'da, bu büyüleyici şehri keşfedeceğiz ve güzel hava keyfi süreceğiz. Bartın Kalesi ve Safranbolu Evleri gibi tarihi yerleri ziyaret edeceğiz ve lezzetli yerel yemeklerin tadını çıkaracağız...
                    </p>
                    <a href="/blog/program"
                    class="inline-block border-2 border-yellow-800 font-light text-yellow-800 text-sm uppercase tracking-widest py-3 px-8 hover:bg-yellow-800 hover:text-white">
                    Tumumu Gor
                </a>
            </div>
        </div>
    </div>
    <div class="relative w-full py-12 px-12">
        <div class="relative z-10 text-center py-12 md:py-24">
            <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-display font-bold mb-6">
                Büyük yürekli küçük şehir</h1>
            <p class="text-white mb-10 text-base md:text-lg font-bold max-w-xl mx-auto">
                Bu şehir küçük olabilir, ancak içinde yaşayanların yürekleri büyüktür. Sıcakkanlı insanları, hoşgörülü
                kültürü ve doğal güzellikleriyle unutulmaz bir deneyim sunar.
            </p><a href="/reservation"
                class="inline-block bg-yellow-800 text-white uppercase text-sm tracking-widest font-heading px-8 py-4">
                Tur rezervasyonu</a>
        </div><img
            src="https://images.unsplash.com/photo-1503516459261-40c66117780a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1949&amp;q=80"
            class="w-full h-full absolute inset-0 object-cover">
    </div>

    @include('layouts.footer')
</body>

</html>