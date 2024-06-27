<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="navMobile">
        <nav style="position: relative" class="nav2">
            <a class="logo" href="{{ route('home') }}">
                <h1>THE|NEWS</h1>
            </a>
            <div class="centroNav">
                <div class="upNav">
                    <div onclick="NohideNavMobile()" class="menuMobile">
                        <svg style="color: #C62828;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                          </svg>
                    </div>
                    <div class="logoMobile">
                        <a style="color: white" href="{{ route('home') }}">
                            <h1>THE|NEWS</h1>
                        </a>
                    </div>
                    <form  onclick="hideNavMobileSearch()" class="search" method="GET" action="{{ route('article.search') }}">
                        <div style="display: flex;align-items: center;">
                            @csrf
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                           
                        </div>
                </div>
                </form>
            </div>
        </nav>
        <div class="containerMobileNav">
            {{-- DROPDOWN ARTICOLI NAV MOBILE --}}
            <div style="width: auto;margin:0px;padding-bottom:0px " id="navItemMobile">
             
           
                    <a style="margin-bottom: 0px" href="{{ route('article.index') }}">ARTICOLI</a>
                    @auth
                        @if (Auth::user()->is_writer)
                            <a style="margin-bottom: " href="{{ route('article.create') }}">CREA IL TUO ARTICOLO</a>
                        @endif
                    @endauth
              
            </div>
            @auth
                @if (Auth::user()->is_admin || Auth::user()->is_revisor || Auth::user()->is_writer)
                    <div style="width: auto;margin:0px;padding-bottom:0px;padding-top:0px" id="navItemMobile">
                      
                      
                            @if (Auth::user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}">DASHBOARD ADMIN</a>
                            @endif
                            @if (Auth::user()->is_revisor)
                                <a href="{{ route('revisor.dashboard') }}">DASHBOARD REVISORE</a>
                            @endif
                            @if (Auth::user()->is_writer)
                                <a href="{{ route('writer.dashboard') }}">DASHBOARD REDATTORE</a>
                            @endif
                       
                    </div>
                @endif
            @endauth
            <a href="{{ route('careers') }}"> LAVORA CON NOI</a>
            @auth
                <a style="border-right: 0px solid white; display:flex;   align-items: center; margin-top:0px ">
                    <span style="color: white">BENTORNATO <strong
                        style="color: rgba(255, 255, 255, 0.476)">{{ strtoupper(Auth::user()->name) }}</strong></span>
                    <form class="formHoverAccount" action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                        <button style="padding-bottom: 8px" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                          </svg>
                        </button>
                    </form>
                </a>
            @endauth
            @guest
                <a style="border-right: 0px solid white;" href="{{ route('login') }}">
                    <span>ACCEDI</span></a>
            @endguest
        </div>
       
    </div>

    <div class="searchContainerMobile">
        <nav style="position: relative;background-color: white; box-shadow: 0 4px 30px rgb(255, 255, 255);"
            class="nav2">
            <a class="logo" href="{{ route('home') }}">
                <h1>THE|NEWS</h1>
            </a>
            <div style="background-color: white" class="centroNav">
                <div style="background-color: white" class="upNav">
                    <div class="menuMobile">
                        <svg style="color: white;cursor:default" xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path
                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </div>
                    <div class="logoMobile">
                        <a style="color: white" href="{{ route('home') }}">
                            <h1>THE|NEWS</h1>
                        </a>
                    </div>
                    <div onclick="NohideNavMobileSearch(),NohideNavMobile()" class="menuMobile">
                        <svg style="color: #C62828;cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="20"
                            height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path
                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </div>
                </div>
        </nav>
        <div class="formMobileSearch">
            <form method="GET" action="{{ route('article.search') }}">
                <div style="display: flex;align-items: center;">
                    @csrf
                    <input type="search" aria-label="Search" placeholder="CERCA UN ARTICOLO" name="query">
                </div>
            </form>
            <div class="searchMenuCategori">
              <a href=" {{route('article.byCategory', ['category' => '4'])}}">  <button>SPORT</button>
            </a>
            <a href="{{route('article.byCategory', ['category' => '2'])}}"> <button>ECONOMIA</button>
            </a>
              <a href="{{route('article.byCategory', ['category' => '6'])}}">  <button>TECH</button>
            </a>
                <a href="{{route('article.byCategory', ['category' => '1'])}}"><button>POLITICA</button>
                </a>
            </div>
            <div class="searchMenuCategori">
                <a href="{{route('article.byCategory', ['category' => '5'])}}"> <button>INTRATTENIMENTO</button>
                </a>
            
               <a href="{{route('article.byCategory', ['category' => '3'])}}"> <button>FOOD&DRINK</button>
            </a>

            </div>


        </div>

    </div>




    <nav class="nav2">
        <a class="logo" href="{{ route('home') }}">
            <h1> THE|NEWS</h1>
        </a>

        <div class="centroNav">
            <div class="upNav">
                <div onclick="hideNavMobile()" class="menuMobile">
                    <svg style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </div>
                <div class="logoMobile">
                    <a style="color: white" href="{{ route('home') }}">
                        <h1> THE|NEWS</h1>
                    </a>
                </div>
                <form class="search" method="GET" action="{{ route('article.search') }}">
                    <div style="display: flex;align-items: center;">
                        @csrf
                      <span onclick="hideNavMobileSearch()" class="searchDesktop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                      </span>

                        <input type="search" aria-label="Search" placeholder="Cerca un articolo" name="query">
                    </div>
            </div>
            </form>

            <div class="BoxNavItem">
                <div class="navItem" id="navItem">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-newspaper" viewBox="0 0 16 16">
                        <path
                            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                        <path
                            d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
                    </svg>
                    <span>
                        ARTICOLI
                    </span>
                    <div class="handmadeDropdown">
                        <a href="{{ route('article.index') }}">TUTTI GLI ARTICOLI</a>
                        @auth
                            @if (Auth::user()->is_writer)
                                <a href="{{ route('article.create') }}">CREA IL TUO ARTICOLO</a>
                            @endif
                        @endauth
                    </div>
                </div>
                @auth
                    @if (Auth::user()->is_admin || Auth::user()->is_revisor || Auth::user()->is_writer)
                        <div class="navItem" id="navItem">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-card-list" viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                <path
                                    d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                            </svg>
                            <span>
                                DASHBOARD
                            </span>
                            <div class="handmadeDropdown">
                                @if (Auth::user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}">DASHBOARD ADMIN</a>
                                @endif
                                @if (Auth::user()->is_revisor)
                                    <a href="{{ route('revisor.dashboard') }}">DASHBOARD REVISORE</a>
                                @endif
                                @if (Auth::user()->is_writer)
                                    <a href="{{ route('writer.dashboard') }}">DASHBOARD REDATTORE</a>
                                @endif
                            </div>
                        </div>
                    @endif
                @endauth
                <a class="navItem" href="{{ route('careers') }}"><svg xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" fill="currentColor" class="bi bi-briefcase-fill"
                        viewBox="0 0 16 16">
                        <path
                            d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5" />
                        <path
                            d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z" />
                    </svg>
                    <span>LAVORA CON NOI</span></a>
                @auth
                    <a style="border-right: 0px solid white;" class="navItem">
                        <form class="formHoverAccount" action="{{ route('logout') }}" id="logout-form" method="POST">
                            @csrf
                            <button type="submit"><svg style="display: block" xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-door-open-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                                </svg></button>
                        </form>

                        <span>BENTORNATO <strong
                                style="color: rgba(255, 255, 255, 0.476)">{{ strtoupper(Auth::user()->name) }}</strong></span>

                    </a>
                @endauth
                @guest
                    <a style="border-right: 0px solid white;" class="navItem" href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg><span>ACCEDI</span></a>
                @endguest
            </div>
        </div>

        <div class="Boxsocial">
            <div class="social">
                <div>
                   <a href="https://www.instagram.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg>
                   </a>
                  <a href="https://www.facebook.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg>
                  </a>
                </div>
                <div>
                    <a href="https://it.pinterest.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-pinterest" viewBox="0 0 16 16">
                            <path
                                d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0" />
                        </svg>
                    </a>
                    <a href="https://x.com/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-twitter-x" viewBox="0 0 16 16">
                            <path
                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                        </svg>
                    </a>
                </div>



            </div>

            
        </div>
    </nav>
    <div style=" width:100%;;height:auto;position: absolute;top:100px;">     <x-session />
    </div>

    <script>
        function hideNavMobile() {
            var navMobile = document.querySelector('.navMobile');
            navMobile.style.display = 'block';
        }

        function NohideNavMobile() {
            var navMobile = document.querySelector('.navMobile');
            navMobile.style.display = 'none';
        }

        function hideNavMobileSearch() {
            var searchContainerMobile = document.querySelector('.searchContainerMobile');
            searchContainerMobile.style.display = 'block';
        }

        function NohideNavMobileSearch() {
            var searchContainerMobile = document.querySelector('.searchContainerMobile');
            searchContainerMobile.style.display = 'none';
        }


    </script>

</body>

</html>
