<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rodenttube</title>
    <script src="jsmediatags.min.js"></script>
    <link rel="stylesheet" href="layout.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #video-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }
        #audioenvideo {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px;
        }
        #button-container {
            display: flex;
            flex-direction: column;
        }
        #button-container a {
            margin: 5px 0;
            font-size: xx-large;
            font-weight: bolder;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1 style="color: #654321; -webkit-text-stroke: 3.5px darkgreen; text-align: center; font-size: 50px;">Rodenttube</h1>
    <div id="video-container">
        <video id="audioenvideo" autoplay controls>
            <source src="" type="video/mp4">
            Your browser does not support the video format.
        </video>
        <div id="button-container">
            <a id="play" onclick="playAudio()">Play</a>
            <a id="next" onclick="nextAudio()">Next</a>
            <a onclick="pauseAudio()">Pause</a>
            <a onclick="resetAudio()">Reset</a>
            <a onclick="playVideo()">Video</a>
            <a onclick="Reclame()">Reclames</a>
            <a onclick="Playlist()">Playlist</a>
        </div>
    </div>
    <script>
        let audioElement = document.getElementById("audioenvideo");
        let currentIndex = 0;
        let audioList = [
            "music/Bart de Bever heeft een bos.mp3",
            "music/DitisRodenttube.mp3",
            "music/eetsla.mp3",
            "music/Genietvanhetleven.mp3",
            "music/Hetregentpijpestelen.mp3",
            "music/Ikbeneen1zamebever.mp3",
            "music/Ikknaaghoutvoor.mp3",
            "music/Ikleefondereensteen.mp3",
            "music/Ik wens je veel beukennoten.mp3",
            "music/Kerstbever.mp3",
            "music/Knagen.mp3",
            "music/Knagenthout.mp3",
            "music/NibbleAgain.mp3",
            "music/Nightmare.mp3",
            "music/OBeverburcht.mp3",
            "music/RodenttubeRap.mp3",
            "music/Uiteindelijkmaaktgeldniksuit.mp3",
            "music/Wedden.mp3",
            "music/Wood.mp3"
        ];

        // Remove duplicates from audioList
        audioList = Array.from(new Set(audioList));

        // Function to save currentIndex to localStorage
        function saveCurrentIndex() {
            localStorage.setItem('currentIndex', currentIndex);
        }

        // Function to play the last played song when the page reloads or when autoplay is triggered
        function playLastPlayedSong() {
            if (audioList.length === 0) {
                alert("The audio list is empty.");
                return;
            }
            let lastPlayedIndex = localStorage.getItem('currentIndex');
            if (lastPlayedIndex !== null && lastPlayedIndex >= 0 && lastPlayedIndex < audioList.length) {
                currentIndex = parseInt(lastPlayedIndex);
            } else {
                currentIndex = 0;
            }
            audioElement.src = audioList[currentIndex];
            audioElement.play();
        }

        // Event listener to play the last played song when the page reloads
        window.addEventListener('load', playLastPlayedSong);

        // Function to play audio
        function playAudio() {
            if (audioList.length === 0) {
                alert("The audio list is empty.");
                return;
            }
            audioElement.play();
        }

        // Function to pause audio
        function pauseAudio() {
            if (audioList.length === 0) {
                alert("The audio list is empty.");
                return;
            }
            audioElement.pause();
        }

        // Function to reset audio
        function resetAudio() {
            if (audioList.length === 0) {
                alert("Geen nummers meer over. DJ speelt ze nu af in een andere volgorde");
                return;
            }
            audioElement.currentTime = 0;
            audioElement.play();
        }

        // Function to play the next audio
        function nextAudio() {
            if (audioList.length === 0) {
                alert("The audio list is empty.");
                return;
            }
            currentIndex = (currentIndex + 1) % audioList.length;
            audioElement.src = audioList[currentIndex];
            audioElement.play();
            saveCurrentIndex();
        }
    </script>
</body>
</html>
