function onload(){
    var xhr = new XMLHttpRequest();

    xhr.open("GET", "lor.mp4");
    xhr.responseType = "arraybuffer";
    xhr.onload = function(e){
        var blob = new Blob([xhr.response]);
        var url = URL.createObjectURL(blob);
        console.log(url);
        var video = document.getElementById("vid");
        video.src = url;
        video.load();
        video.onloadeddata = function() {
            video.play();
        }
    }
    xhr.send();


}