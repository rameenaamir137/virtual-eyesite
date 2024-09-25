<x-app-layout>
  <x-main-card :border="true" style="position: relative">
    <h2 class="text-center" style="padding-top: 30px; padding-bottom:40px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">E</span>ye-<span class="colored-heading">S</span>ight <span class="colored-heading">T</span>est</h2>
    <p class="text-center" style=" padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace; font-size:20px;" id="instruction"></p>
    <div style="position: absolute; bottom: 0 ">
      <p class="text-center" style=" font-family:'Fredoka', Courier, monospace; font-size:40px; color: var(--main-color);" id="letter-listened"></p>

    </div>

    <canvas id="canvas" class="max-w-7xl mx-auto" style="border: 2px solid var(--main-color); border-radius:5px;"></canvas>
    <div id="result" class="max-w-7xl mx-auto p-6 lg:p-8"></div>
      <div class="max-w-7xl mx-auto p-6 lg:p-8" style="display: flex;
      justify-content: center;
      align-items: center;">
        <x-primary-button id="testButton" onclick="start()" >Start test</x-primary-button>
      </div>                
    </div>

    <div id="results" class="mx-5" style="display: none;">
      <form method="post" action="/reports" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="test_type" id="results_test_type" value="">
        <input type="hidden" name="result" id="results_result" value="">
        <input type="hidden" name="score" id="results_score" value="">
        <button id="results_save">Save</button>
      </form>
    </div>
    
  </x-main-card>
  <div class="modal fade" id="tutorialModal" tabindex="-1" role="dialog" aria-labelledby="tutorialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="font-weight:bold; font-size:24px;" class="modal-title" id="tutorialModalLabel"><span class="colored-heading">T</span>utorial</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p style="padding-top: 5px; padding-bottom:5px; font-size:18px;"><span class="colored-heading">Y</span>ou will be shown letters from the english alphabet one by one getting progressively smaller. Your goal is to guess which one is currently being displayed. Please keep the distance from your screen 50cm and dont lean in to see the smaller letters.<br>
          For this test a noisy environment or a poor mic has huge impact on accuracy. Please take the other test if voice detection is poor</p>
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