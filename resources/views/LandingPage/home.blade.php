@extends('LandingPage.index')
@push('styles')
    @livewireStyles
@endpush
@push('script')
    @livewireScripts
@endpush
@section('isi')
    <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Booking Lapangan Di GG Sport Arena sekarang</h1>

                            <p class="text-white">Booking Lapangan Sesuai Dengan Hobi Kamu Sekarang !!</p>

                            <a href="#arena" class="btn btn-success smoothscroll mt-3" style="--bs-bg-opacity: .5;">Mulai Booking</a>
                        </div>

                        <div class="owl-carousel owl-theme">

                            @foreach ($lapangan as $item)


                            <div class="owl-carousel-info-wrap item">
                                <img src="image/Lapangan/{{$item->gambar}}" class="owl-carousel-image img-fluid"
                                    style="height: 400px" alt="">

                                <div class="owl-carousel-info text-center">
                                    <h4 class="mb-2">
                                        {{$item->namaLapangan}}
                                        {{-- <img src="landingPage/images/verified.png" class="owl-carousel-verified-image img-fluid"
                                            alt=""> --}}
                                    </h4>

                                    <span class="badge">Rp. @rp($item->harga)</span>

                                    <span class="badge"> DP: @rp(20000) </span>
                                </div>

                                <div class="social-share">
                                    <ul class="social-icon">
                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-twitter"></a>
                                        </li>

                                        <li class="social-icon-item">
                                            <a href="#" class="social-icon-link bi-facebook"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="trending-podcast-section section-padding pb-1" id="arena">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Arena</h4>
                        </div>
                    </div>

                    @livewire('landing-page.form-create')



                </div>
            </div>
        </section>

        <section class="topics-section section-padding " id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Event</h4>
                        </div>
                    </div>

                    @foreach ( $event as $item)
                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-overlay">
                                <a href="/event/{{$item}}" class="custom-block-image-wrap">
                                    <img src="image/event/{{$item->gambar}}"
                                        class="custom-block-image img-fluid" alt="">
                                </a>

                                <div class="custom-block-info custom-block-overlay-info">
                                    <h5 class="mb-1">
                                        <a href="#">
                                            {{$item->event}}
                                        </a>
                                    </h5>
                                     <p class="mb-0"></p>
                                    <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>
@endsection
