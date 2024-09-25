<x-app-layout>
    <x-main-card :border="true">
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center scale-100 p-6 bg-white rounded-lg " style="min-height:75vh">
            <div class="order-md-first">
                <img src="{{ asset('images/eyeforsite.png') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 order-md-last mb-3 mb-md-0 md:py-10" style="margin-left: 20px !important">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px;"><span class="colored-heading">E</span>ye <span class="colored-heading">S</span>ite</h2>
                        <p style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">Welcome to Eye Site, the online platform for testing your eye health! With our simple and easy-to-use system, you can test your eyesight from the comfort of your own home.<br> Can't believe, take the test now!</p>
                        <x-primary-button onclick="window.location.href='{{ route('eyetest') }}'" class="page-link">
                            {{__('Take test')}}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </x-main-card>
</x-app-layout>
