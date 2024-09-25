<x-app-layout>
    <x-main-card :border="true">
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center scale-100 p-6 bg-white rounded-lg " style="min-height:75vh">
            <div class="order-md-first">
                <div class="home_img"></div>
            </div>
            <div class="col-md-6 order-md-last mb-3 mb-md-0 md:py-10" style="margin-left: 20px !important">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px;"><span class="colored-heading">E</span>ye <span class="colored-heading">S</span>ite</h2>
                        <p style="padding-top: 10px; padding-bottom:20px; font-family:'Fredoka', Courier, monospace;">Welcome to Eye Site, the online platform for testing your eye health! With our simple and easy-to-use system, you can test your eyesight from the comfort of your own home.<br> Can't believe, take the test now!</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="font-family: 'Fredoka'; color: var(--main-color); text-align:center; font-weight:20px" class="py-5 px-5"> <span style="font-size: 30px; color:black" >Healthy Eyes</span> are like a clear sky, offering you endless possibilities and a world full of breathtaking sights <br> <span style="color:black">-"A/S/U"</span></div>
        <div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                <x-main-card class="cool-link motion-safe:hover:scale-[1.01] transition-all duration-250">
                    <div>
                        <h2 class="mt-6 text-xl font-semibold text-gray-900"><span style="color: var(--main-color)">A</span>rticles</h2>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            Research exploring children's and their teachers' perceptions of eye health is lacking. This paper reports for the first time on perceptions of primary schoolchildren and their teachers of healthy and diseased eyes, things that keep eyes healthy and damage them, and what actions ........
                        </p>
                        <x-primary-button class="my-3 mx-auto" onclick="window.location.href='{{ route('articles') }}'">
                            {{__('Read Articles')}}
                        </x-primary-button>
                    </div>
                </x-main-card>
                <h2 style="padding-top: 30px; padding-bottom:30px; font-family:'Fredoka', Courier, monospace; font-weight:bold; font-size:50px; text-align:center"><span class="colored-heading">E</span>ye <span class="colored-heading">T</span>est <span class="colored-heading">C</span>atagories</h2>

                <div class="d-flex flex-column flex-md-row justify-content-around">
                    <x-main-card class="cool-link motion-safe:hover:scale-[1.01] transition-all duration-250">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 text-center">Eye-Sight Test</h2>
                            <img src="{{ asset('images/eyesighttest.png') }}" alt="Image" class="img-fluid" style="min-width: 250px">
                        </div>
                    </x-main-card>

                    <x-main-card class="cool-link motion-safe:hover:scale-[1.01] transition-all duration-250">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 text-center">Color Blindness Test</h2>
                            <img src="{{ asset('images/colorblindnesstest.png') }}" alt="Image" class="img-fluid" style="min-width: 250px">
                        </div>
                    </x-main-card>

                    <x-main-card class="cool-link motion-safe:hover:scale-[1.01] transition-all duration-250">
                        <div>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 text-center">Farnsworth Test</h2>
                            <img src="{{ asset('images/farnsworthtest.jpg') }}" alt="Image" class="img-fluid" style="min-width: 250px">
                        </div>
                    </x-main-card>
                </div>
                <div style="align-content: center" class="mx-auto">
                    <x-primary-button class="my-3 mx-auto" style="font-size: 20px; padding: 3px" onclick="window.location.href='{{ route('eyetest') }}'">
                        {{__('Take Tests')}}
                    </x-primary-button>
                </div>
                <x-main-card class="cool-link motion-safe:hover:scale-[1.01] transition-all duration-250">
                    <div>
                        <h2 class="mt-6 text-xl font-semibold text-gray-900"><span style="color: var(--main-color)">H</span>ospitals</h2>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            We can help you find the best and the most fesible hospitals for your eye checkup and.
                        </p>
                        <x-primary-button class="my-3 mx-auto" onclick="window.location.href='{{ route('hospitals') }}'">
                            {{__('Find Hospitals')}}
                        </x-primary-button>
                    </div>
                </x-main-card>

            </div>
        </div>
    </x-main-card>
</x-app-layout>
