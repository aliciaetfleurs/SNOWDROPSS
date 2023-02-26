<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Teppei Hayakawa">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/destyle.css">
        <link rel="stylesheet" href="./css/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>SNOWDROPSS - ARTISTS</title>
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
                        <button id="btnBack" class="controlBtn"><</button>
                    </a>
                    <form action="/intern/musicdistributionsite/public/search" method="get" class="rightTop">
                        <div class="topControlButtons">
                            <button id="btnForward" class="controlBtn">></button>
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
                            <li><a href="#" class="leftInfo">INFORMATION</a></li>
                            <li><a href="./musicLibrary" class="leftLibrary">MUSIC LIBRARY</a></li>
                            <li><a href="./artists" class="leftArtists">ARTISTS</a></li>
                        </ul>
                        <div class="underController">
                            <p class="login"><a href="#">LOGIN</a></p>
                        </div>
                    </section>
                    <div class="bottomBorder"></div>
                </nav>
                <div id="rightContent">
                    <main>
                        <div class="artistsHead"><h3>ARTISTS</h3><hr></div>
                        <section id="artistsGroup">
                        @forelse($artistList as $artistId => $artist)
                            <a href="#" class="artists">
                                <div class="artistsImg"><img src="storage/artists/{{$artist->getArtistImg()}}" alt="{{$artist->getArtistName()}}"></div>
                                <div class="artistsName">{{$artist->getArtistName()}}</div>
                            </a>
                        @empty
                            <p></p>該当のアーティストは存在しません。
                        @endforelse
                        </section>
                    </main>
                </div>
            </div>
        </article>
    </body>
</html>

