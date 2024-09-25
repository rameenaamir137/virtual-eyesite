<x-app-layout>
    <x-main-card :border="true">
        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px; text-align:center"><span class="colored-heading">A</span>bout <span class="colored-heading">U</span>s</h2>

        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center scale-100 p-6 bg-white rounded-lg " style="min-height:75vh">
            <div class="order-md-first">
                <img src="{{ asset('images/aboutus.png') }}" alt="Image" class="img-fluid" id="aboutImg">
            </div>
            <div class="col-md-6 order-md-last mb-3 mb-md-0 md:py-10" style="margin-left: 20px !important">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:40px;"><span class="colored-heading">O</span>ur <span class="colored-heading">M</span>ission</h2>
                        <p style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">
                            At Eye Site, we believe that taking care of your eye health should be convenient and accessible. That's why we offer online tests that allow you to check your eyesight from the comfort of your own home. Our team is dedicated to providing accurate and reliable results, so you can be confident in your eye health. Whether you're looking to monitor your vision or simply curious about the state of your eyes, our tests are a simple and effective way to stay informed.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-around">
            <p class="mt-4 align-center col-md-3" style="text-align: center">
                <span style="color:purple; font-weight:500">Email:</span>  shayan.khan.xyz@gmail.com
            </p>
            <p class="mt-4 align-center col-md-3" style="text-align: center">
                <span style="color:purple; font-weight:500">Contact Number:</span>   +92 333 3333333
            </p>
            <p class="mt-4 align-center col-md-3" style="text-align: center">
                <span style="color:purple; font-weight:500">Address:</span>  NUST H-12, Islamabad
            </p>
        </div>
    </x-main-card>
</x-app-layout>