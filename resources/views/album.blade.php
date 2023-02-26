<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Teppei Hayakawa">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/destyle.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>SNOWDROPSS - ALBUM_DETAIL</title>
    </head>
    <body>
        <article id="top">
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
                                <a href="/intern/musicdistributionsite/public/musicLibrary" class="leftLibrary">
                                    MUSIC LIBRARY
                                </a>
                            </li>
                            <li>
                                <a href="/intern/musicdistributionsite/public/artists" class="leftArtists">
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
                        <section id="topAlbumDetail">                          
                                <div class="albumDetailPrimary">
                                    <p class="albumDetails albumImg"><img src="/intern/musicdistributionsite/public/storage/{{$album->getAlbumImg()}}" alt="{{$album->getAlbumName()}}"></p>
                                    <div class="albumDetailLeft">
                                        <p class="albumDetails albumName">
                                        {{$album->getAlbumName()}}
                                        @forelse($artistList as $artistId => $artist)
                                            @if($artistId == $album->getArtistId())
                                            <span class="albumDetails albumArtist">{{$artist->getArtistName()}}</span>
                                            @endif
                                        @empty
                                            <span class="albumDetails albumArtist">N/A</span>
                                        @endforelse
                                        </td>
                                        @forelse($genreList as $genreId => $genre)
                                            @if($genreId == $album->getGenreId())
                                            <p class="albumDetails albumGenre">{{$genre->getGenreName()}}</p>
                                            @endif
                                        @empty
                                            <p class="albumDetails albumGenre">N/A</p>
                                        @endforelse
                                        <p class="albumDetails albumDate">{{$album->getAlbumDateYear()}}.{{$album->getAlbumDateMonth()}}.{{$album->getAlbumDateDay()}}</p>
                                    </div>
                                </div>
                                    <p class="albumDetails albumType">
                                        {{$album->getAlbumTypeString()}}
                                        <span class="{{$album->getAlbumExplicitClass()}}">E</span>                                    
                                    </p>                                    
                                    <p class="albumDetails albumTrack">{{$album->getAlbumTrackTotal()}}</p>
                                    <p class="albumDetails albumDisc">{{$album->getAlbumDiscTotal()}}</p>
                        </section>
                        <div class="middleHead"><h3>MUSIC LIBRARY</h3><hr></div>
                    </main>
                </div>
            </div>
        </article>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    </body>
</html>

