const cbTest = {
    "trial1": {
        "image": "../images/colorblindnesstest/1.png",
        "answer": "2"
    },
    "trial2": {
        "image": "../images/colorblindnesstest/2.png",
        "answer": "6"
    },
    "trial3": {
        "image": "../images/colorblindnesstest/3.png",
        "answer": "2"
    },
    "trial4": {
        "image": "../images/colorblindnesstest/4.png",
        "answer": "6"
    },
    "trial5": {
        "image": "../images/colorblindnesstest/5.png",
        "answer": "6"
    },
    "trial6": {
        "image": "../images/colorblindnesstest/6.png",
        "answer": "6"
    },
    "trial7": {
        "image": "../images/colorblindnesstest/7.png",
        "answer": "5"
    },
    "trial8": {
        "image": "../images/colorblindnesstest/8.png",
        "answer": "1"
    },
    "trial9": {
        "image": "../images/colorblindnesstest/9.png",
        "answer": "5"
    },
    "trial10": {
        "image": "../images/colorblindnesstest/10.png",
        "answer": "6"
    },
    "trial11": {
        "image": "../images/colorblindnesstest/11.png",
        "answer": "5"
    },
    "trial12": {
        "image": "../images/colorblindnesstest/12.png",
        "answer": "7"
    },
    "trial13": {
        "image": "../images/colorblindnesstest/13.png",
        "answer": "9"
    },
    "trial14": {
        "image": "../images/colorblindnesstest/14.png",
        "answer": "3"
    },
    "trial15": {
        "image": "../images/colorblindnesstest/15.png",
        "answer": "3"
    },
    "trial16": {
        "image": "../images/colorblindnesstest/16.png",
        "answer": "3"
    },
    "trial17": {
        "image": "../images/colorblindnesstest/17.png",
        "answer": "1"
    },
    "trial18": {
        "image": "../images/colorblindnesstest/18.png",
        "answer": "9"
    },
    "trial19": {
        "image": "../images/colorblindnesstest/19.png",
        "answer": "9"
    },
    "trial20": {
        "image": "../images/colorblindnesstest/20.png",
        "answer": "1"
    },
    "trial21": {
        "image": "../images/colorblindnesstest/21.png",
        "answer": "9"
    },
    "trial22": {
        "image": "../images/colorblindnesstest/22.png",
        "answer": "4"
    },
    "trial23": {
        "image": "../images/colorblindnesstest/23.png",
        "answer": "3"
    },
    "trial24": {
        "image": "../images/colorblindnesstest/24.png",
        "answer": "8"
    },
    "trial25": {
        "image": "../images/colorblindnesstest/25.png",
        "answer": "2"
    },
    "trial26": {
        "image": "../images/colorblindnesstest/26.png",
        "answer": "4"
    },
    "trial27": {
        "image": "../images/colorblindnesstest/27.png",
        "answer": "3"
    },
    "trial28": {
        "image": "../images/colorblindnesstest/28.png",
        "answer": "1"
    },
    "trial29": {
        "image": "../images/colorblindnesstest/29.png",
        "answer": "1"
    },
    "trial30": {
        "image": "../images/colorblindnesstest/30.png",
        "answer": "1"
    },
    "trial31": {
        "image": "../images/colorblindnesstest/31.png",
        "answer": "2"
    },
    "trial32": {
        "image": "../images/colorblindnesstest/32.png",
        "answer": "8"
    },
    "trial33": {
        "image": "../images/colorblindnesstest/33.png",
        "answer": "2"
    },
    "trial34": {
        "image": "../images/colorblindnesstest/34.png",
        "answer": "7"
    },
    "trial35": {
        "image": "../images/colorblindnesstest/35.png",
        "answer": "3"
    },
}

const numTrials = 20;
let trialIndex = 0;
let correctans = 0;
const trialsArray = Object.entries(cbTest);
const imageDiv = document.getElementById("testimage");

// Shuffle the array using the Fisher-Yates algorithm
for (let i = trialsArray.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [trialsArray[i], trialsArray[j]] = [trialsArray[j], trialsArray[i]];
}

let trial = trialsArray[trialIndex][1];
let image = trial.image;
let ans = trial.answer;

imageDiv.innerHTML = `<img src="${image}" alt="Fun fact image" width="300px" style="align-items: center" class="mx-auto">`;


function giveAns(value) {
    if (trialIndex < numTrials) {
        const progressBar = document.getElementById('progress-bar');
        const currentWidth = parseInt(progressBar.style.width);
        const newWidth = currentWidth + 5;
        progressBar.style.width = newWidth + '%';
        progressBar.setAttribute('aria-valuenow', newWidth);
        if ( value == ans)  correctans++;
        console.log(correctans)
        trial = trialsArray[++trialIndex][1];
        imagepath = trial.image;
        ans = trial.answer;
         changeImg(imagepath);
    }
    else saveResult();
}

function changeImg(image) { 
    imageDiv.innerHTML = `<img src="${image}"  width="300px" style="align-items: center" class="mx-auto">`;
}

function saveResult() {
    document.getElementById("results_test_type").value = "color blindness"
    document.getElementById("results_result").value = `${(20 - correctans) * 100 / 20}% chance of color blindness`;
    document.getElementById("results_score").value = `${Math.ceil(correctans / 2)}`
    document.getElementById("results_save").click();
}


