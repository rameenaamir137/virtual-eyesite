<x-app-layout>
  <x-main-card :border="true">
    <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px; text-align:center"><span class="colored-heading">R</span>eports</h2>
    <p class="text-center" style=" padding-top: 6px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace; font-size:20px;" id="instruction">
      Use the score for each report as rough guide for whether a visit to a eye clinic is nessessary.<br>
      Eyesight results hold more significance for day to day life as compared to the other test.<br>
      If taking the test multiple times results in a test score of below 5 than you might want to get a check up.
    </p>
    @if(count($reports) == 0)
      <div class="m-4 p-3 border rounded">
        <p>No reports to show<br><br></p>
        <x-primary-button onclick="window.location.href='{{ route('eyetest') }}'">Take tests</x-primary-button>
      </div>
    @else
      @foreach($reports as $report) 
      <x-main-card class="motion-safe:hover:scale-[1.01] transition-all duration-250 border shadow-sm" vert_space="1" padding="3">
          
        <div class="container mb-2">
          <h3 class="text-xl py-1" style="display: inline-block; font-weight: bold; color: var(--main-color);">{{ucfirst($report->test_type)}} test</h3>

          <button id="delete-button" class="btn btn-danger float-end" onclick="setReportId('{{$report->id}}')" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="white"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="white"></path> </svg>
          </button>

        </div>
        <div class="container mx-4">
        <p class="text-base transform -translate-x-1/2">
          @php
          echo nl2br($report->result)
          @endphp
          <br><br>
          Score: {{$report->score}}/10
        </p>
        </div>
        <p class="text-xs text-right">Date: {{$report->updated_at}}</p>

      </x-main-card>
      @endforeach
    @endif
  </x-main-card>

  <!-- Confirmation modal -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confrimDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 style="font-weight:bold; font-size:24px;" class="modal-title" id="confirmDeleteModalLabel"><span class="colored-heading">D</span>elete the <span class="colored-heading">r</span>eport?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p style="padding-top: 5px; padding-bottom:5px; font-size:18px;"><span class="colored-heading">A</span>re you sure you want to delete?<br>The deleted report will be removed permanently.</p>
          <div class="row mt-4 justify-content-center">
            <div class="col-6 text-center">
            <x-primary-button data-bs-dismiss="modal">
              No
            </x-primary-button>
            </div>
            <div class="col-6 text-center">
              <form id="deletion-form" method="POST" action="/reports/">
                @csrf
                @method('DELETE')
                <button class="p-button inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150" data-bs-dismiss="modal">
                  Yes
                </button>
              </form>
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
    function setReportId(id) {
      document.getElementById("deletion-form").action += id;
    }
  </script>
  
</x-app-layout>
  
