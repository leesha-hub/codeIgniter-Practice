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

<?php
//echo 2222;
?>
<!--preload="auto"-->

<audio id="myAudio"
       autoplay="autoplay"
       muted
       src="https://music.gettyimagesbank.com/sample/202210/JMT102200558.mp3"
       controls
       style="width: 100%;"
</audio>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        /* Javascript 코드 */
        const myAudio = document.getElementById("myAudio") // Audio객체 취득
        //console.log(myAudio);
        myAudio.play(); // 음원 재생
        myAudio.pause(); // 일시 정지
    });
</script>