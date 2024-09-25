// Setting up speaker
const synth = window.speechSynthesis;
const element = document.createElement('div');
element.innerHTML = document.getElementById("article-body").innerHTML;
const text = element.innerHTML.replace(/&amp;/g, '&').replace(/&#39;/g, '\'').replace(/&#34;/g, '\"').replace(/&#40;/g, '(').replace(/&#41;/g, ')');
var utterance = new SpeechSynthesisUtterance(text);
utterance.pitch = 2;

function startSpeech() {
    synth.speak(utterance);
    document.getElementById("start-speaking").style.display = "none";
    document.getElementById("while-speaking").style.display = "block";
}

function restartSpeech() {
    synth.cancel();
    synth.speak(utterance);
}

function stopSpeech() {
    synth.cancel();
    document.getElementById("start-speaking").style.display = "block";
    document.getElementById("while-speaking").style.display = "none";
}

function pauseSpeech() {
    if(synth.speaking)
        synth.pause();
}

function resumeSpeech() {
    if(synth.paused)
        synth.resume();
}
