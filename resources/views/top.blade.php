<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Link -->
    <link rel="shortcut icon" type="image/favicon.ico" href="{{asset('/favicon.png')}}">
    <link rel="stylesheet" href="./css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&family=Rozha+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>HOME | {{ config('app.name') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-barba="wrapper">
    @section('title', 'HOME')
    <!-- <div id="backLogo">SNOWDROPSS</div> -->
    <nav id="topNav">
        <section class="flexTop">
            <section class="home-section">
                <div class="home-content">
                    <svg class='bx bx-menu-alt-left' xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path></svg>
                    <span class="text">DASHBOARD</span>
                </div>
            </section>
            <div id="uploadItem">
                <div class="navMessage">
                    <i class='bx bx-message-dots'></i>
                </div>
                <a id="upload" href="{{ route('upload') }}"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.611 5.757 9.15 3.609 9.792 2 11.82 2 14c0 2.757 2.243 5 5 5h11c2.206 0 4-1.794 4-4a4.01 4.01 0 0 0-3.056-3.888zM13 14v3h-2v-3H8l4-5 4 5h-3z"></path></svg>UPLOAD</a>
            </div>
        </section>
    </nav>
    <div class="sidebar close">
        <div class="logo-details">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 100 100">
                <defs>
                  <linearGradient id="linear-gradient" x1="0.635" y1="0.37" x2="0.24" y2="0.911" gradientUnits="objectBoundingBox">
                    <stop offset="0" stop-color="#5aa6da"/>
                    <stop offset="1" stop-color="#80deb2"/>
                  </linearGradient>
                </defs>
                <g id="グループ_52" data-name="グループ 52" transform="translate(324 251)">
                  <g id="グループ_2" data-name="グループ 2" transform="translate(-135 -212)">
                    <circle id="楕円形_4" data-name="楕円形 4" cx="50" cy="50" r="50" transform="translate(-189 -39)" fill="url(#linear-gradient)"/>
                    <g id="楕円形_2" data-name="楕円形 2" transform="translate(-179 -30)" fill="none" stroke="#fff" stroke-width="7">
                      <circle cx="40.5" cy="40.5" r="40.5" stroke="none"/>
                      <circle cx="40.5" cy="40.5" r="37" fill="none"/>
                    </g>
                    <path id="パス_1" data-name="パス 1" d="M-114.275-135.095l15.8-4.291,5.7-36.17,5.421,36.17,16.079,4.291-16.079,5.954-5.421,34.506-5.7-34.506" transform="translate(-46.225 146.095)" fill="#fff"/>
                    <g id="楕円形_3" data-name="楕円形 3" transform="translate(-160 -10)" fill="none" stroke="#fff" stroke-width="2">
                      <circle cx="21" cy="21" r="21" stroke="none"/>
                      <circle cx="21" cy="21" r="20" fill="none"/>
                    </g>
                  </g>
                </g>
            </svg>
            <span class="logo_name">SNOWDROPSS</span>
        </div>
        <ul class="nav-links">
            <div class="nav-over">
                <li class="nav-search">
                    <div class="icon-link">
                        <a href="{{ route('search') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path></svg>
                            <form>
                                @csrf    
                                <input type="text" class="search">
                            </form>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path></svg>
                            <span class="link_name">DASHBOARD</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="/intern/musicdistributionsite/public/library">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.806 5 19s.55-.988 1.012-1H21V4c0-1.103-.897-2-2-2zm0 14H5V5c0-.806.55-.988 1-1h13v12z"></path></svg>
                            <span class="link_name">LIBRARY</span>
                        </a>
                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="#">ALBUMS<svg class="sidearrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg></a></li>
                        <li><a href="#">SONGS<svg class="sidearrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg></a></li>
                        <li><a href="#">PLAYLIST<svg class="sidearrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg></a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="{{ route('favorite') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path></svg>
                            <span class="link_name">FAVORITE</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 8v5h5v-2h-3V8z"></path><path d="M21.292 8.497a8.957 8.957 0 0 0-1.928-2.862 9.004 9.004 0 0 0-4.55-2.452 9.09 9.09 0 0 0-3.626 0 8.965 8.965 0 0 0-4.552 2.453 9.048 9.048 0 0 0-1.928 2.86A8.963 8.963 0 0 0 4 12l.001.025H2L5 16l3-3.975H6.001L6 12a6.957 6.957 0 0 1 1.195-3.913 7.066 7.066 0 0 1 1.891-1.892 7.034 7.034 0 0 1 2.503-1.054 7.003 7.003 0 0 1 8.269 5.445 7.117 7.117 0 0 1 0 2.824 6.936 6.936 0 0 1-1.054 2.503c-.25.371-.537.72-.854 1.036a7.058 7.058 0 0 1-2.225 1.501 6.98 6.98 0 0 1-1.313.408 7.117 7.117 0 0 1-2.823 0 6.957 6.957 0 0 1-2.501-1.053 7.066 7.066 0 0 1-1.037-.855l-1.414 1.414A8.985 8.985 0 0 0 13 21a9.05 9.05 0 0 0 3.503-.707 9.009 9.009 0 0 0 3.959-3.26A8.968 8.968 0 0 0 22 12a8.928 8.928 0 0 0-.708-3.503z"></path></svg>
                            <span class="link_name">HISTORY</span>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"></path><path d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"></path></svg>
                            <span class="link_name">SETTING</span>
                        </a>
                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z"></path></svg>
                    </div>
                    <ul class="sub-menu">
                        <li><a href="#" href="#">GENERAL<svg class="sidearrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg></a></li>
                        <li><a href="#" href="#">ACCESSIBILITY<svg class="sidearrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg></a></li>
                    </ul>
                </li>
            </div>
            <li id="profile">
                <div class="profile-details">
                    <!-- ゲスト -->
                    @guest
                    @if (Route::has('login'))
                        <div class="name-job login-str">
                            <div class="profile_name">{{ __('LOGIN') }}</div>
                        </div>
                        <a href="{{ route('login') }}" class="login-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="m10.998 16 5-4-5-4v3h-9v2h9z"></path><path d="M12.999 2.999a8.938 8.938 0 0 0-6.364 2.637L8.049 7.05c1.322-1.322 3.08-2.051 4.95-2.051s3.628.729 4.95 2.051S20 10.13 20 12s-.729 3.628-2.051 4.95-3.08 2.051-4.95 2.051-3.628-.729-4.95-2.051l-1.414 1.414c1.699 1.7 3.959 2.637 6.364 2.637s4.665-.937 6.364-2.637C21.063 16.665 22 14.405 22 12s-.937-4.665-2.637-6.364a8.938 8.938 0 0 0-6.364-2.637z"></path></svg>
                        </a>
                    @endif
                    @else
                    <div class="profile-content">
                        <a href="{{ asset( Auth::user()->id )}}"><img src="{{ asset('storage/user_primary_img/'.Auth::user()->primary_img)}}" alt="profileImg"></a>
                    </div>
                    <div class="name-job">
                        <div class="profile_name">{{ Auth::user()->name }}</div>
                        <div class="job">Give me widow_maker</div>
                    </div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg"><path d="M19.002 3h-14c-1.103 0-2 .897-2 2v4h2V5h14v14h-14v-4h-2v4c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.898-2-2-2z"></path><path d="m11 16 5-4-5-4v3.001H3v2h8z"></path></svg>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nonVisi">
                        @csrf
                    </form>
                    @endguest
                </div>
            </li>
        </ul>
    </div>
    <main id="top" data-barba="container" data-barba-namespace="top">
        <div id="middleArea">
            <div class="blueBg"></div>
            <div class="whiteBlur"></div>

            @guest
            @if (Route::has('login'))

            @endif
            @else
            <section id="dashboard">
                <div class="dashboardImg">
                    <img src="{{ asset('storage/user_primary_img/'.Auth::user()->primary_img)}}" alt="profileImg">
                </div>
                <div class="dashboardName">
                    <div class="dashboardGreeting">Hello {{ Auth::user()->name }}.</div>
                    <div class="dashboardComment">What are you up too?</div>
                </div>
            </section>
            @endguest

            <div class="albumTop">
                <h3 class="sectionTitle1">
                    FIND ALL
                    <hr class="sectionBorder">
                </h3>
                <section class="albumList swiper">
                    <ul class="swiper-wrapper Liken">
                        @forelse($albumList as $albumId => $album)
                        <li class="swiper-slide">
                            <div>
                                <div href="#" class="albumListImg">
                                    <img class="albumImg" src="{{ asset('storage/albums/'.$album->getAlbumImg()) }}" alt="{{$album->getAlbumName()}}">
                                    <button class="start" songName="{{$album->getAlbumName()}}" userName="{{$album->getUserName()}}" imgName="{{ asset('storage/albums/'.$album->getAlbumImg()) }}" type="button" value="{{$album->getFileName()}}.{{$album->getFileExt()}}" >
                                        <div class="buttonV"><svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" viewBox="0 0 24 24" style="fill: white;"><path d="M7 6v12l10-6z"></path></svg></div>
                                    </button>
                                </div>
                                <div class="albumListContent">
                                    <div class="albumLeft">
                                        <p class="albumName"><a href="#">{{$album->getAlbumName()}}</a></p>
                                        <p class="artistName"><a href="{{ asset( $album->getAlbumArtistId() ) }}">{{$album->getUserName()}}</a></p>
                                    </div>
                                    @auth
                                        @if(in_array($album->getSongId(), $songIdArray))
                                    <song-like-component :song_id="{{$album->getSongId()}}" :is_like="true"></song-like-component>
                                        @else
                                    <song-like-component :song_id="{{$album->getSongId()}}" :is_like="false"></song-like-component>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </li>
                        @empty
                        <li>
                            <td>該当データは存在しません。</td>
                        </li>
                        @endforelse
                    </ul>
    
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </section>
            </div>
            <section>
            <ul>
                @if(!empty($songlikes))
                    @forelse($songLikes as $songLike)
                    <li>{{ $songLike->song_id }} | {{ $songLike->user_id }}</li>
                    @empty
                    <li>EMPTY</li>
                    @endforelse
                @endif
            </ul>     
        </section>
        </div>
    </main>
    <footer>
        <div class="footerLeft">
            <audio id="playingMusic" style="display: none;" autoplay controls src="" preload="metadata"></audio>
            <svg id="prev" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="m16 7-7 5 7 5zm-7 5V7H7v10h2z"></path></svg>
            <div id="playBtn"><svg id="start" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M7 6v12l10-6z"></path></svg></div>
            <div id="pauseBtn"><svg id="pause" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8 7h3v10H8zm5 0h3v10h-3z"></path></svg></div>
            <svg id="next" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path d="M7 7v10l7-5zm9 10V7h-2v10z"></path></svg>
            <div class="playStatus">
                <time id="playTimeCurrent">0:00</time>
                <input type="range" id="progress" value="0" min="0" step="0.1">
                <time id="playTimeDuration">0:00</time>
            </div>
        </div>
        <div class="footerRight">
            <div id="volumeBtn">
                <svg id="volumeOn" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 24"><path d="M16 21c3.527-1.547 5.999-4.909 5.999-9S19.527 4.547 16 3v2c2.387 1.386 3.999 4.047 3.999 7S18.387 17.614 16 19v2z"></path><path d="M16 7v10c1.225-1.1 2-3.229 2-5s-.775-3.9-2-5zM4 17h2.697L14 21.868V2.132L6.697 7H4c-1.103 0-2 .897-2 2v6c0 1.103.897 2 2 2z"></path></svg>
                <svg id="volumeOff" style="display: none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m7.727 6.313-4.02-4.02-1.414 1.414 18 18 1.414-1.414-2.02-2.02A9.578 9.578 0 0 0 21.999 12c0-4.091-2.472-7.453-5.999-9v2c2.387 1.386 3.999 4.047 3.999 7a8.13 8.13 0 0 1-1.671 4.914l-1.286-1.286C17.644 14.536 18 13.19 18 12c0-1.771-.775-3.9-2-5v7.586l-2-2V2.132L7.727 6.313zM4 17h2.697L14 21.868v-3.747L3.102 7.223A1.995 1.995 0 0 0 2 9v6c0 1.103.897 2 2 2z"></path></svg>
            </div>
            <input type="range" id="volume" min="0" max="1" step="0.01" value="0.5">
            <img id="playingImg" src="{{ asset('storage/none.jpg') }}" alt="">
            <div class="playingContent">
                <div id="playingSongName"></div>
                <a href="#" id="playingUserName"></a>
            </div>
        </div>
    </footer>
</body>
</html>