<x-app-layout>
    <x-main-card :border="true" style="background-color: rgb(52, 51, 51) !important; color:white">
        <div class="flex justify-center">
            <h2 style="padding-top: 30px; padding-bottom:40px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">C</span>olor-<span class="colored-heading">B</span>lindness <span class="colored-heading">T</span>est</h2>
        </div>
        <p class="text-center" style=" padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace; font-size:20px;" id="instruction">Guess the number you see in the image</p>
        <div class="progress max-w-7xl mx-auto" style="margin-bottom:10px; width:30vw ">
            <div id="progress-bar" class="progress-bar progress-bar-striped" style="background: var(--main-color); width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row">
            <div id="testimage" class="col-md-6 mx-auto" style="align-items: center;">
            </div>
            <div id="results" class="col-md-6 mx-auto" style="align-items: center; display: none;">
                <form method="post" action="/reports" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="test_type" id="results_test_type" value="">
                    <input type="hidden" name="result" id="results_result" value="">
                    <input type="hidden" name="score" id="results_score" value="">
                    <button id="results_save">Save</button>
                </form>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center" > 
                <div class="container pt-md-40">
                    <div class="row justify-content-around my-2">
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(1)">1</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(2)">2</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(3)">3</x-et-button>
                    </div>
                    <div class="row justify-content-around my-2">
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(4)">4</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(5)">5</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(6)">6</x-et-button>
                    </div>
                    <div class="row justify-content-around my-2">
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(7)">7</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(8)">8</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(9)">9</x-et-button>
                    </div>
                    <div class="row justify-content-around my-2">
                        <x-et-button style=" padding-left: 8% !important" onclick="giveAns(-1)">Skip</x-et-button>
                        <x-et-button style=" padding-left: 11% !important" onclick="giveAns(0)">0</x-et-button>
                        <x-et-button style=" padding-left: 8% !important" onclick="window.location.href='{{ route('eyetest') }}'">End</x-et-button>
                    </div>
                </div>
            </div> 
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
              <p style="padding-top: 5px; padding-bottom:5px; font-size:18px;"><span class="colored-heading">Y</span>ou will be shown a circle made up of dots of different but similar colors. The dots make up a digit in the center of each image. Try and guess which number is currently being displayed. (Increase the screen brightness for best results)</p>
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