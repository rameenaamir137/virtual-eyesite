<x-app-layout>
  <style>
    /* CSS to decrease letter size after each attempt */
    .letter {
        font-size: 36px;
    }
    
    .container {
        text-align: center;
    }
  </style>
  <x-main-card>
    <div class="container">
      <h2 style="padding-top: 30px; padding-bottom:40px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">E</span>ye-<span class="colored-heading">S</span>ight <span class="colored-heading">T</span>est</h2>
      <div id="letterContainer" style="display:flex; justify-content:center; height: 200px; align-item:center"></div>
      <input style="margin-top: 50px; margin-bottom:50px; border-radius: 5px;" type="text" id="inputField" onkeyup="checkInput()" autofocus>
      <div id="results" class="mx-5" style="display: none;">
        <form method="post" action="/reports" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="test_type" id="results_test_type" value="">
          <input type="hidden" name="result" id="results_result" value="">
          <input type="hidden" name="score" id="results_score" value="">
          <button id="results_save">Save</button>
        </form>
      </div>
    </div>
  </x-main-card>

  <script>
    var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    var answers = [];
    // Function to pick a random letter from the list
    function pickRandomLetter() {
      const randomIndex = Math.floor(Math.random() * letters.length);
      answers.push(letters[randomIndex])
      return letters[randomIndex];
    }
    var currentLetterIndex = 0;
    var attempts = 0;
    
    function displayNextLetter() {
      var letterContainer = document.getElementById('letterContainer');
      letterContainer.innerHTML = `<p class="letter my-auto" style="font-size: ${30 - 3.2 * currentLetterIndex + 0.1 * currentLetterIndex * currentLetterIndex}px; padding-top:30px">${pickRandomLetter()}</p>`;
    }
    
    function checkInput() {
      var inputField = document.getElementById('inputField');
      var result = document.getElementById('result');
      var input = inputField.value.trim().toUpperCase();
      
      if (input === answers[currentLetterIndex]) {
      attempts++;
      currentLetterIndex++;
      inputField.value = '';
        if(currentLetterIndex < 12){
          displayNextLetter();
        }
      }
      else {
        currentLetterIndex++;
        inputField.value = '';
        if(currentLetterIndex < 12){
          displayNextLetter();
        }
      }
      if (currentLetterIndex === 12) {
        inputField.disabled = true;
        document.getElementById("results_test_type").value = "eyesight"
        document.getElementById("results_result").value = 
            `The chance your eyesight is weak is ${Math.round(((12 - attempts) * 100 / 12) * 100) / 100}%`
        document.getElementById("results_score").value = `${Math.ceil(attempts * 10 / 12)}`
        document.getElementById("results_save").click();
      }
    }
    
    displayNextLetter();
  </script>
  <div class="modal fade" id="tutorialModal" tabindex="-1" role="dialog" aria-labelledby="tutorialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="font-weight:bold; font-size:24px;" class="modal-title" id="tutorialModalLabel"><span class="colored-heading">T</span>utorial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p style="padding-top: 5px; padding-bottom:5px; font-size:18px;"><span class="colored-heading">Y</span>ou will be shown letters from the english alphabet one by one getting progressively smaller. Your goal is to guess which one is currently being displayed. Please keep the distance from your screen 50cm and dont lean in to see the smaller letters</p>
          <div class="row mt-4 justify-content-center">
            <div>
            <x-primary-button class="float-end" data-bs-dismiss="modal">
              Ok
            </x-primary-button>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script>
  $(window).on('load', function() {
    $('#tutorialModal').modal('show');
  });
  </script>
</x-app-layout>