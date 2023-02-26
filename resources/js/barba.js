
import barba from '@barba/core';
import gsap from "gsap";

gsap.config({
    nullTargetWarn: false,
});
gsap.fromTo(
    '.fadein',
    {
      y: 60,
      autoAlpha: 0
    },
    {
      y: 0,
      autoAlpha: 1, 
      delay: 0.4,
      duration: 0.5,
      ease: 'power2.out'
    }
)

barba.init({
    sync: true,
    transitions: [{
        namespace: '',
        leave(data) {
            return gsap.to(data.current.container, {
                duration: 0.5,
                /* y:"-100%",
                x:"-100%", */
                opacity: 0,
            });
        },   
        enter(data) {
            gsap.from(data.next.container, {
                delay: 0.5,
                duration: 0.5,
                /* y: "100%",
                x:"-100%", */
                opacity: 0,
                ease: "power2.inOut",
            });
        },
        beforeEnter(){
            let now = new Date();
            let h = now.getHours();
            let m = now.getMinutes();
            let s = now.getSeconds();
            let tmp = h.toString() + m.toString() + s.toString();
            //element を作成
            const newJS = document.createElement("script");
            //src属性を設定
            newJS.setAttribute("type","module");
            newJS.setAttribute("src","http://127.0.0.1:5173/resources/js/app.js?v=" + tmp);
            //作成したエレメントを<body>の最後に
            document.querySelector("body").appendChild(newJS);
        },        
    }]
});