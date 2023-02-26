
import {Howl} from 'howler';

/* let start = document.querySelectorAll('.start'); */

let start = document.getElementsByClassName('start');
for(var i = 0; i < start.length-1; i++){
  start[i].addEventListener('click',function(){
    var j = 0;
    j++;
    console.log(j);
    let fileName = this.value;

    console.log(fileName);
    console.log(i);

    const music = new Howl({
      src: 'storage/music/' + fileName,
      autoplay: false,
      volume: 0.5,
      loop: false,
      preload: false,
      onplay: () =>{console.log('Playing')},
      onend: () =>{console.log('End')}
    });

    music.load();
    if (music.playing()) {
      music.stop();
    } else {
      music.play();
    }      
  });
}