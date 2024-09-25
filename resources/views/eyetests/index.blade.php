<x-app-layout>    
    <style>
        .modal-dialog {
            max-width: 500px;
            z-index: 100;
        }
    </style>
    <x-main-card :border="true">
        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px; text-align:center"> <span class="colored-heading">E</span>ye <span class="colored-heading">H</span>ealth <span class="colored-heading">T</span>ests</h2>
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center scale-100 p-6 bg-white rounded-lg" style="min-height:75vh">
            <div class="order-md-first">
                <img src="{{ asset('images/eyesighttest.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 order-md-last mb-3 mb-md-0 md:py-10" style="margin-left: 20px !important">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">E</span>ye-<span class="colored-heading">S</span>ight <span class="colored-heading">T</span>est</h2>
                        <p style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">Eyesight weakness refers to the condition where an individual experiences difficulties in seeing clearly. It is a common issue that affects millions of people worldwide, varying in severity from mild blurriness to complete blindness. Eyesight weakness can result from various factors, including refractive errors, age-related conditions like presbyopia, eye diseases, and certain systemic health conditions.</p>
                        <x-primary-button type="button" class="btn btn-primary" data-toggle="modal" data-target="#testSelectionModal">
                            {{__('Take test')}}
                        </x-primary-button>                        

                        <!-- Modal popup -->


                        <!-- Bootstrap JS -->
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center scale-100 p-6 bg-white rounded-lg" style="min-height:75vh">
            <div class="order-md-last">
                <img src="{{ asset('images/colorblindnesstest.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 order-md-first mb-3 mb-md-0 md:py-10" style="margin-left: 20px !important">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">C</span>olor-<span class="colored-heading">B</span>lindness <span class="colored-heading">T</span>est</h2>
                        <p style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">Colorblindness, also known as color vision deficiency, is a condition characterized by the inability to perceive colors in the same way as most people. While individuals with normal color vision can distinguish and identify a wide range of colors, those with colorblindness have difficulty distinguishing certain colors or may perceive them differently. This condition is typically caused by an inherited genetic mutation. </p>
                        <x-primary-button onclick="window.location.href='{{ route('colorblindnesstest') }}'">
                            {{__('Take test')}}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center scale-100 p-6 bg-white rounded-lg" style="min-height:75vh">
            <div class="order-md-first">
                <img src="{{ asset('images/farnsworthtest.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 order-md-last mb-3 mb-md-0 md:py-10" style="margin-left: 20px !important">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"> <span class="colored-heading">F</span>arns<span class="colored-heading">W</span>orth <span class="colored-heading">T</span>est</h2>
                        <p style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">Farnsworth Munsell 100 hue test (also called arrangement test) is one of the most famous color vision test. The famous test in this group is the Farnsworth D15 arrangement test. write a basic html and js app that shows 10 boxes with different huevalue of a color and the user have to drag and drop the boxes at appropriate position so that they are sorted .</p>
                        <x-primary-button onclick="window.location.href='{{ route('farnsworthtest') }}'">
                            {{__('Take test')}}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </x-main-card>
    <div class="modal fade" id="testSelectionModal" tabindex="-1" role="dialog" aria-labelledby="testSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:20px;" class="modal-title" id="testSelectionModalLabel">Test Selection</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="padding-top: 5px; padding-bottom:5px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:18px;">Instructions:</p>
                    <ul>
                        <li style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">If you have a calm environment and a good front camera with a microphone, choose the <strong>Webcam and Microphone Test</strong>.</li>
                        <li style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">If you prefer to take an input-based test without using the webcam or microphone, choose the <strong>Input-based Test</strong>.</li>
                    </ul>
                    <p style="padding-top: 5px; padding-bottom:5px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:18px;">Please select the test type:</p>
                    <div class="text-center">
                        <x-primary-button onclick="window.location.href='{{ route('eyesighttest0') }}'">
                            {{__('Webcam and Microphone Test')}}
                        </x-primary-button>
                        <x-primary-button onclick="window.location.href='{{ route('eyesighttest1') }}'">
                            {{__('Input-based Test')}}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
