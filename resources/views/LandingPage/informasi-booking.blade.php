@extends('LandingPage.index')
@push('styles')
    @livewireStyles
@endpush
@push('script')
    @livewireScripts
@endpush
@section('isi')
       <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">

                        <h2 class="mb-0">Infromasi Booking</h2>
                    </div>

                </div>
            </div>
        </header>


        <section class="latest-podcast-section section-padding pb-0" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-10 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Jadwal Bokingan</h4>
                        </div>

                        <div class="table table-responsive">
                            @livewire('landing-page.table')
                        </div>
                    </div>

                </div>
            </div>
        </section>

@endsection
