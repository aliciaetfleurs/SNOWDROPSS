import { eventListeners } from "@popperjs/core";
let start;

document.addEventListener('DOMContentLoaded', function(){
	console.log('playing');
	let path = location.protocol + location.host + location.pathname;
	console.log(path);
	start = document.getElementsByClassName('start');
	let playingImg = document.getElementById('playingImg');
	let playingSongName = document.getElementById('playingSongName');
	let playingUserName = document.getElementById('playingUserName');

	const playTimeCurrent = document.getElementById('playTimeCurrent');
	const playTimeDuration = document.getElementById('playTimeDuration');
	const progress = document.getElementById("progress");
	const playBtn = document.getElementById("playBtn");
	const pauseBtn = document.getElementById("pauseBtn");
	let playtimer = null;

	const convertTime = function(time_position) {
    
		time_position = Math.floor(time_position);
		var res = null;
	
		if( 60 <= time_position ) {
		  res = Math.floor(time_position / 60);
		  res += ":" + Math.floor(time_position % 60).toString().padStart( 2, '0');
		} else {
		  res = "0:" + Math.floor(time_position % 60).toString().padStart( 2, '0');
		}
	
		return res;
	};

	
	for(var i = 0; i < start.length; i++){
	    start[i].addEventListener('click', function(){
	        let fileName = this.value;			
	        let play = document.getElementById('playingMusic');
	        play.setAttribute('src' ,'storage/music/' + fileName);

			playBtn.style.display = "none";
			pauseBtn.style.display = "flex";

			play.onloadedmetadata = (e) => {

				playTimeCurrent.textContent = convertTime(play.currentTime);
    			playTimeDuration.textContent = convertTime(play.duration);
			}

			// 音声ファイルが最後まで再生されたときに実行
			play.addEventListener("ended", e => {
				stopTimer();
				playBtn.style.display = "flex";
				pauseBtn.style.display = "none";
			});
			
			// 再生ボタンが押されたときに実行
			playBtn.addEventListener("click", e => {
				play.play();
				startTimer();
				playBtn.style.display = "none";
				pauseBtn.style.display = "flex";
			});
			
			// 一時停止ボタンが押されたときに実行
			pauseBtn.addEventListener("click", e => {
				play.pause();
				stopTimer();
				playBtn.style.display = "flex";
				pauseBtn.style.display = "none";
			});
			
			// プログレスバーが操作されたときに実行（メモリを動かしているとき）
			progress.addEventListener("input", e => {
				stopTimer();
				play.currentTime = progress.value;
			});
			
			// プログレスバーが操作完了したときに実行
			progress.addEventListener("change", e => {
				startTimer();
			});

			const startTimer = function(){
				playtimer = setInterval(function(){
				  	playTimeCurrent.textContent = convertTime(play.currentTime);
				  	progress.max = Math.ceil(play.duration);
				  	progress.value = Math.floor( (play.currentTime / play.duration) * play.duration);
				  	progress.style.backgroundSize = Math.floor( (play.currentTime / play.duration) * 100) + '% 100%';
				}, 500);
			};

			// 停止したときに実行
  			const stopTimer = function(){
  			  	clearInterval(playtimer);
  			  	playTimeCurrent.textContent = convertTime(play.currentTime);
  			};

			startTimer();

			let footerImg = this.getAttribute('imgName');
			playingImg.setAttribute('src' , footerImg);
			let songName = this.getAttribute('songName');
			playingSongName.innerHTML = songName;
			let userName = this.getAttribute('userName');
			playingUserName.innerHTML = userName;
	    });
	}
/* 
	document.getElementById('playingMusic').volume = 0;
	volumeOn.addEventListener('click', function(){
	  document.getElementById('playingMusic').volume = 0;
	  volumeOn.style.display = "none";
	  volumeOff.style.display = "block";
	});
	volumeOff.addEventListener('click', function(){
	  document.getElementById('playingMusic').volume = 0;
	  volumeOn.style.display = "block";
	  volumeOff.style.display = "none";
	}); */

});