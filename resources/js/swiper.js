// core version + navigation, pagination modules:
import Swiper, { Navigation, Pagination } from 'swiper';
// configure Swiper to use modules
Swiper.use([Navigation, Pagination]);

import 'swiper/swiper-bundle.css';

var mySwiper = new Swiper(".swiper", {

    // オプション設定
    loop: false, // ループ
    speed: 1500, // 切り替えスピード(ミリ秒)。
    slidesPerView: 4, // １スライドの表示数]
    slidesPerGroup: 3,
    spaceBetween: 10, // スライドの余白(px)
    direction: "horizontal", // スライド方向
    effect: "slide", // EFFECT
    allowTouchMove: true,
  
    // スライダーの自動再生設定
    /* autoplay: {
      delay: 1000, // スライドが切り替わるまでの時間(ミリ秒)
      stopOnLast: false, // 自動再生の停止なし
      disableOnInteraction: true, // ユーザー操作後の自動再生停止
    }, */
  
    // ページネーションを有効化
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  
    // ナビゲーションを有効化
    navigation: {
      nextEl: '.swiper-button-next', // 「次へ」ボタン要素のクラス
      prevEl: '.swiper-button-prev', // 「前へ」ボタン要素のクラス
    },
  });