// Get the canvas element and its context
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const inst = document.getElementById('instruction');
const listenedletter = document.getElementById('letter-listened');
const testbtn = document.getElementById('testButton');
const FPS =24;
let buffer = [];
let cameradone = false;

// Create a video element and add it to the document
const video = document.createElement('video');
video.autoplay = true;

function speak(text) {
    const synth = window.speechSynthesis;
    const utterance = new SpeechSynthesisUtterance(text);
    utterance.pitch = 2;
    synth.speak(utterance);
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

createFileFromUrl = function (path, url, callback) {
    let request = new XMLHttpRequest();
    request.open('GET', url, true);
    request.responseType = 'arraybuffer';
    request.onload = function (ev) {
        if (request.readyState === 4) {
            
            if (request.status === 200) {
                let data = new Uint8Array(request.response);
                cv.FS_createDataFile('/', path, data, true, false, false);
                callback();
            } else {
                alert('Failed to load ' + url + ' status: ' + request.status);
            }
        }
    };
    request.send();
};

// Create a function to measure the distance of a face from the camera
function measureDistance() {
    video.style.display = "block";
    // Get the user's camera stream
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (stream) {
            
            speak('make the distance from the camera 50');
            inst.innerHTML = "Make the distance from the camera 50."

            // Attach the stream to the video element
            video.srcObject = stream;
            // Wait for the video to load
            video.addEventListener('loadedmetadata', function () {
                // Set the canvas dimensions to match the video dimensions
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;

                // Create a face detector using OpenCV
                const classifier = new cv.CascadeClassifier();
                
                let faceCascadeFile = '../haarcascade_frontalface_default.xml'; // path to xml
                createFileFromUrl(faceCascadeFile, faceCascadeFile, () =>  {
                    classifier.load(faceCascadeFile);
                });

                // Loop through the video frames and detect the face
                let intervalId = setInterval(function () {
                    // Draw the current video frame on the canvas
                    ctx.drawImage(video, 0, 0);

                    // Convert the canvas image to a matrix
                    const img = cv.imread(canvas);

                    // Convert the image to grayscale
                    cv.cvtColor(img, img, cv.COLOR_RGBA2GRAY);

                    // Detect the face in the image
                    const faces = new cv.RectVector();
                    classifier.detectMultiScale(img, faces);

                    // If a face is detected, measure the distance
                    if (faces.size() > 0) {
                        // Get the coordinates of the first detected face
                        const face = faces.get(0)

                        // Calculate the face position and distance
                        const faceSize = face.width + face.height;

                        // Calculate the distance based on the face size
                        const distance = Math.round(16 * (canvas.width + canvas.height) / faceSize); // assumes face size is 16cm

                        // Draw a rectangle around the face on the canvas
                        ctx.beginPath();
                        ctx.rect(face.x, face.y, face.width, face.height);
                        ctx.lineWidth = 2;
                        ctx.strokeStyle = 'blue';
                        if (distance > 49 & distance < 51) {
                            ctx.strokeStyle = 'green';
                        }
                        ctx.stroke();
                        
                        buffer.push(distance);
                        ctx.font = 'bold 24px Arial';
                        ctx.fillStyle = 'purple';
                        ctx.fillText(distance, face.x + face.width, face.y - 5)

                        
                        
                        if (buffer.length == 5) {
                            sum = 0;
                            for (let i = 0; i < 5; i++) {
                                sum += buffer[i];
                            }
                            let avgdistance = sum / 5;
                            // Print the distance to the console
                            console.log('Distance from face to camera:', avgdistance);
                            buffer = [];
                            if (avgdistance > 49 & avgdistance < 51) {
                                cameradone = true;
                            }
                        }


                    }

                    // Release the resources
                    faces.delete();
                    img.delete();

                    async function clearint() {
                        clearInterval(intervalId);
                        cameradone = true;
                        canvas.style.display = "none";
                        video.remove();
                        stream.getTracks().forEach(track => track.stop());
                        await displayLetter();
                    }

                    // Exit the loop if the user stops the measurement
                    if (!video.srcObject) clearInterval(intervalId);
                    if (cameradone) clearint();
                }, 1000 / FPS);
            });
        })
        .catch(function (error) {
            console.error(error);
        });
}


async function displayLetter() {
    var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    var answers = [];
    let numCorrect = 0;
    var currentLetterIndex = 0;

    function pickRandomLetter() {
        const randomIndex = Math.floor(Math.random() * letters.length);
        answers.push(letters[randomIndex])
        return letters[randomIndex];
    }

    for (let i = 0; i < 12; i++) {
        inst.innerHTML = "Read the letter aloud";

        result.innerHTML = `<p class="text-center" style="height: 200px; padding-top:30px; font-size:${30 - 3.2 * currentLetterIndex + 0.1 * currentLetterIndex * currentLetterIndex}px">${pickRandomLetter()}</p>`;
        
        const spokenLetterPromise = recognizeAlphabet();
        const spokenLetter = await Promise.race([
            spokenLetterPromise,
            new Promise(resolve => setTimeout(resolve, 7000)) // Wait for 7 seconds
        ]);

        if (spokenLetter && spokenLetter.toUpperCase() === answers[currentLetterIndex]) {
            numCorrect++;

            //speak(`Correct! You said the letter ${letter}`);
            
        } else {
            //speak(`Incorrect! The correct letter was ${letter}`);

        }
        currentLetterIndex++;
    }
    console.log(`You got ${numCorrect} out of 12 letters correct.`);
    result.innerHTML = `<p class="text-center" style="height: 200px; padding-top:30px; font-size:30px">You got ${numCorrect} out of 10 letters correct.</p>`;
    inst.innerHTML = "Take the test multiple times to get accurate results.";
    testbtn.disabled = true;
    document.getElementById("results_test_type").value = "eyesight"
    document.getElementById("results_result").value = 
        `The chance your eyesight is weak is ${Math.round(((12 - numCorrect) * 100 / 12) * 100) / 100}%`
    document.getElementById("results_score").value = `${Math.ceil(numCorrect * 10 / 12)}`
    document.getElementById("results_save").click();

}

async function recognizeAlphabet() {
    let recognition = new window.webkitSpeechRecognition();
    console.log("listening");
    
    recognition.lang = 'en-US';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;
  
    recognition.start();
  
    let alphabet = await new Promise((resolve, reject) => {
      setTimeout(() => {
        recognition.stop();
    }, 7000);
  
      recognition.onresult = (event) => {
        let speechResult = event.results[0][0].transcript;
        let match = speechResult.match(/[a-zA-Z]/i);

        
        if (match) {
          resolve(match[0].toUpperCase());
        }
        listenedletter.innerHTML = `You spoke ${match[0].toUpperCase()}`;
      }
  
      recognition.onerror = (event) => {
        reject(new Error(`Recognition error: ${event.error}`));
      }
    });   
    recognition.stop();
    console.log('you spoke' + alphabet)
    return alphabet;

}
  
  

async function start() {
    measureDistance();
    testbtn.innerHTML = "Test Again";
    testbtn.onclick = "windows.location.reload()";
}
