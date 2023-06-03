<?php
//http://localhost/codeIgniter-practice/public/index.php
//echo 1111;
?>
<!--crossorigin="use-credentials"-->
<!--crossorigin="anonymous"-->
<!--<audio-->
<!--       preload="auto"-->
<!--       src="https://music.gettyimagesbank.com/sample/202210/JMT102200558.mp3"-->
<!--       controls-->
<!--       style="width: 100%;"-->
<!--</audio>-->

<!--preload="auto"-->

<style>
    @font-face { 
        font-family: 'font-1';
        src: url('http://localhost/codeIgniter-practice/test.ttf') format('woff');
        font-weight: normal;
        font-style: normal; 
    }

    @font-face { 
        font-family: 'font-2';
        src: url('http://localhost/codeIgniter-practice/1162478.woff2') format('woff2');
        font-weight: normal;
        font-style: normal; 
    }
</style>

<textarea class="fontInputBlockText" value="" style="font-family:font-1">ttf 적용</textarea>
<textarea class="fontInputBlockText" value="" style="font-family:font-2">woff2 적용</textarea>

<audio id="myAudio"
       autoplay="autoplay"
       muted
       src="https://music.gettyimagesbank.com/sample/202210/JMT102200558.mp3"
       controls
       style="width: 100%;"
>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        /* Javascript 코드 */
        const myAudio = document.getElementById("myAudio") // Audio객체 취득
        //console.log(myAudio);
        myAudio.play(); // 음원 재생
        myAudio.pause(); // 일시 정지
    });
</script> -->