<x-app-layout>
    <x-main-card :border="true" id="main-card">
        <style>
            .box {
                width: 50px;
                height: 50px;
                margin: 5px;
                display: inline-block;
                cursor: move;
            }
    
            .sortable-container {
                padding: 10px;
                display: flex;
                justify-content: space-around;
            }
        </style>
        <div class="flex justify-center">
            <h2 style="padding-top: 30px; padding-bottom:40px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">F</span>arns<span class="colored-heading">W</span>orth <span class="colored-heading">T</span>est</h2>
        </div>
        <p class="text-center" style=" padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace; font-size:20px;" id="instruction">Rearrange each line from darkest on the left to brightest on the right</p>
        @php
            function generateRandomArray() {
                $numbers = range(1, 10); // Create an array with numbers from 1 to 10
                $randomArray = [];

                while (count($numbers) > 0) {
                    $randomIndex = array_rand($numbers); // Get a random index from the remaining numbers
                    $randomNumber = $numbers[$randomIndex]; // Get the number at the random index
                    $randomArray[] = $randomNumber; // Add the number to the random array
                    unset($numbers[$randomIndex]); // Remove the number from the remaining numbers
                    $numbers = array_values($numbers); // Re-index the remaining numbers
                }

                return $randomArray;
            }
        @endphp

        @for ($k = 0; $k < 3; $k++)
        @php
        $colors = ['purple', 'red', 'blue'];
        $shadeVariation = 10;

        $randomArray = generateRandomArray();
        $contId = 'sortable-container' . $k;

        @endphp
        <div id="{{$contId}}" class="sortable-container">
            @foreach ($randomArray as $i)
                @php
                    $boxId = "box-{$k}-{$i}";
                    $j =  ($i + 5)/4;
                    $shade = $j * $shadeVariation;
                    $hls = 20 + 100*$k;
                    $backgroundColor = "hsl({$hls}, 100%, {$shade}%)";
                @endphp
                <div id="{{ $boxId }}" class="box" draggable="true" ondragstart="dragStart(event)" data-color="{{ $colors[0] }}" ans = "{{ $i }}" style="background-color: {{ $backgroundColor }};">
                </div>
            @endforeach
        </div>
        @endfor
        <div class="row py-4">
            <div class="col">
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
            <div class="col">
                <x-primary-button class="float-end mx-5" onclick="saveResult()">Finish</x-primary-button>
            </div>
        </div>
        <script defer>
            let draggable;
            let dropareas = document.querySelectorAll('.sortable-container');
            function dragStart(event) {
                draggable = event.target;
                event.dataTransfer.setData("text/plain", "");
            }

            function getDragAfterElement(container, y) {
                const draggableElements = [...container.querySelectorAll('.box:not(.dragging)')];

                return draggableElements.reduce((closest, child) => {
                    const box = child.getBoundingClientRect();
                    const offset = y - box.left - box.width / 2;
                    if (offset < 0 && offset > closest.offset) {
                        return { offset: offset, element: child };
                    } else {
                        return closest;
                    }
                }, { offset: Number.NEGATIVE_INFINITY }).element;
            }

            dropareas.forEach(droparea => {
                droparea.addEventListener('dragover', e => {
                e.preventDefault();
                const draggableBox = document.querySelector('.dragging');
                if (!draggableBox.nextElementSibling) {
                    droparea.appendChild(draggableBox);
                }
            });

            droparea.addEventListener('dragstart', e => {
                e.target.classList.add('dragging');
            });

            droparea.addEventListener('dragend', e => {
                e.target.classList.remove('dragging');
            });

            droparea.addEventListener('drop', e => {
                e.preventDefault();
                const afterElement = getDragAfterElement(droparea, e.clientX);
                const draggableBox = document.querySelector('.dragging');
                if (afterElement == null) {
                    droparea.appendChild(draggableBox);
                } else {
                    droparea.insertBefore(draggableBox, afterElement);
                }
            });
            });

             
            function saveResult() {
                let red, green, blue;
                for (let i = 0; i < 3; i++) {
                    let h = "sortable-container" + i;
                    let cont = document.getElementById(h);
                    const divs = Array.from(cont.children);
                    let count = 0;

                    for (let j =0; j < divs.length; j++) {
                        const div = divs[j];
                        const ans = parseInt(div.getAttribute('ans'));
                        
                        // Check if the div is in the correct position
                        if (j+1 === ans) {
                        count++;
                        }
                        
                        switch(i) {
                            case 0:
                                red = count;
                                break;
                            case 1:
                                green = count;
                                break;
                            default:
                                blue = count;
                                break; 
                        }
                    }
                }

                document.getElementById("results_test_type").value = "farnsworth"
                document.getElementById("results_result").value = 
                    `You have a dificiency of:
                    ${(10 - red) * 100 / 10}% in differentiating shades of red
                    ${(10 - green) * 100 / 10}% in differentiating shades of green
                    ${(10 - blue) * 100 / 10}% in differentiating shades of blue`
                document.getElementById("results_score").value = `${Math.ceil((red + green + blue) * 10 / 30)}`
                document.getElementById("results_save").click();
            }


        </script>
    </x-main-card>
    <div class="modal fade" id="tutorialModal" tabindex="-1" role="dialog" aria-labelledby="tutorialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 style="font-weight:bold; font-size:24px;" class="modal-title" id="tutorialModalLabel"><span class="colored-heading">T</span>utorial</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p style="padding-top: 5px; padding-bottom:5px; font-size:18px;"><span class="colored-heading">Y</span>ou will be shown 3 lines of colored squares. You goal is to drag and drop each one such that the squares go from darkest on the left to brightest on the right in each line (Increase screen brightness for best results)<br>
              Click on Finish when you think you have ordered the lines.</p>
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