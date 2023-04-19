<div id="jquery_jplayer_1" class="jp-jplayer"></div>

<div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
    <div class="jp-type-single">
        <div class="jp-gui jp-interface">
            <div class="jp-volume-controls">
                <button class="jp-mute" role="button" tabindex="0">mute</button>
                <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                </div>
            </div>
            <div class="jp-controls-holder">
                <div class="jp-controls">
                    <button class="jp-play" role="button" tabindex="0">play</button>
                    <button class="jp-stop" role="button" tabindex="0">stop</button>
                </div>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                <div class="jp-toggles">
                    <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                </div>
            </div>
        </div>
        <div class="jp-details">
            <div class="jp-title" aria-label="title">&nbsp;</div>
        </div>
        <div class="jp-no-solution">
            <span>Update Required</span>
            To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
        </div>
    </div>
</div>

<script src="/resource/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/jPlayer-2.9.2/dist/jplayer/jquery.jplayer.min.js"></script>
<!--<script type="text/javascript" src="/jPlayer-2.9.2/dist/skin/blue.monday/css/jplayer.blue.monday.css"></script>-->
<script type="text/javascript" src="/jPlayer-2.9.2/dist/skin/pink.flag/css/jplayer.pink.flag.css"></script>

<script>

    $(document).ready(function() {

        $("#jquery_jplayer_1").jPlayer({
            ready: function(event) {
                $(this).jPlayer("setMedia", {
                    title: "Bubble",
                    m4a: "http://jplayer.org/audio/mp3/Miaow-07-Bubble.mp3",
                    oga: "http://jplayer.org/audio/ogg/Miaow-07-Bubble.ogg"
                });
            },
            swfPath: "http://jplayer.org/latest/dist/jplayer",
            supplied: "mp3, oga",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true,
            remainingDuration: true,
            toggleDuration: true
        });

    });
</script>