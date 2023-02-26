<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Link -->
    <link rel="shortcut icon" type="image/x-icon"  href="/favicon.png">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&family=Rozha+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>MUSIC LIBRARY | {{ config('app.name') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body data-barba="wrapper">
@section('title', 'MUSIC LIBRARY')
<nav id="topNav">
    <section class="flexTop">
        <a class="leftTop" href="/intern/musicdistributionsite/public/">
            <div class="leftLogo">
                <div id="snowdropLogo"></div>
                <h2>
                    SNOWDROPSS
                </h2>
            </div>
            <button id="btnBack" class="controlBtn"></button>
        </a>
        <form action="/intern/musicdistributionsite/public/search" method="get" class="rightTop">
            <div class="topControlButtons">
                <button id="btnForward" class="controlBtn"></button>
            </div>
            <button class="navSearchButton" type="submit"></button>
            <input type="text" id="navSearch" name="navSearch" placeholder="SEARCH" value="" autocomplete="off">
        </form>
        <div>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
            </div>
        </section>    
    </nav>
    @section('title', 'MUSIC LIBRARY')
    <article id="top" data-barba="container">
        <nav id="topNav">
                <section class="flexTop">
                    <a class="leftTop" href="/intern/musicdistributionsite/public/">
                        <div class="leftLogo">
                            <div id="snowdropLogo"></div>
                            <h2>
                                SNOWDROPSS
                            </h2>
                        </div>
                        <button id="btnBack" class="controlBtn"></button>
                    </a>
                    <form action="/intern/musicdistributionsite/public/search" method="get" class="rightTop">
                        <div class="topControlButtons">
                            <button id="btnForward" class="controlBtn"></button>
                        </div>
                        <button class="navSearchButton" type="submit"></button>
                        <input type="text" id="navSearch" name="navSearch" placeholder="SEARCH" value="" autocomplete="off">
                    </form>
                </section>
            </nav>
            <div id="middleArea">
                <nav id="leftNav">
                    <section class="leftNavArea">
                        <ul>
                            <li>
                                <a href="#" class="leftInfo">
                                    INFORMATION
                                </a>
                            </li>
                            <li>
                                <a href="./musicLibrary" class="leftLibrary">
                                    MUSIC LIBRARY
                                </a>
                            </li>
                            <li>
                                <a href="./artists" class="leftUsers">
                                    ARTISTS
                                </a>
                            </li>
                        </ul>
                        <div class="underController">
                            <p class="login"><a href="#">LOGIN</a></p>
                        </div>
                    </section>
                    <div class="bottomBorder"></div>
                </nav>
                <div id="rightContent">
                    <main>
                        <section id="topAlbumList">
                            <div class="topHead"><h3>NEW RELEASE ALBUMS</h3><hr></div>
                            <ul>
                                @forelse($albumNewList as $albumId => $albumNew)
                                <li>
                                    <a href="#" class="albumListImg"><img src="storage/{{$albumNew->getAlbumImg()}}" alt="{{$albumNew->getAlbumName()}}"></a>
                                    <p class="albumName"><a href="./album/{{$albumId}}">{{$albumNew->getAlbumName()}}</a></p>
                                    <p class="artistName"><a href="#">{{$albumNew->getUserName()}}</a></p>                                        
                                    <div class="albumTypeContent">
                                        <div class="albumType">{{$albumNew->getGenreName()}}</div>
                                    </div>
                                </li>
                                @empty
                                <li>
                                    <td>該当データは存在しません。</td>
                                </li>
                                @endforelse
                            </ul>
                        </section>
                        <div class="middleHead"><h3>MUSIC LIBRARY</h3><hr></div>
                        <table id="middleAlbumList">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Genre</th>
                                    <th>Date</th>
                                    <th>Type</th>
                                    <th>Track</th>
                                    <th>Disc</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($albumList as $albumId => $album)
                                <tr>
                                    <td class="tdImg"><img src="storage/{{$album->getAlbumImg()}}" alt="{{$albumNew->getAlbumName()}}"></td>
                                    <td class="tdName">
                                        <a href="./album/{{$albumId}}">{{$album->getAlbumName()}}</a>
                                        <span class="tdArtist">{{$album->getUserName()}}</span>
                                    </td>
                                        <td class="tdGenre">{{$album->getGenreName()}}</td>
                                    <td class="tdDate">{{$album->getAlbumDateYear()}}.{{$album->getAlbumDateMonth()}}.{{$album->getAlbumDateDay()}}</td>                                    
                                    <td class="tdType">
                                        <span class="{{$album->getAlbumExplicitClass()}}">E</span>                                    
                                    </td>                                    
                                    <td class="tdTrack">{{$album->getAlbumTrackTotal()}}</td>
                                    <td class="tdDisc">{{$album->getAlbumDiscTotal()}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>該当データは存在しません。</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </article>
        <footer>
            <audio id="playingMusic" autoplay controls src=""></audio>
        </footer>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    </body>
</html>

