
    @foreach ($lapangan as $item)
    <div class="col-lg-4 col-12 mb-2 mb-lg-4" data-bs-toggle="modal" data-bs-target="#data-{{$item->id}}">
        <div class="custom-block custom-block-full">
            <div class="custom-block-image-wrap">
                <p>
                    <img src="image/lapangan/{{$item->gambar}}" class="custom-block-image img-fluid" alt="">
                </p>
            </div>

            <div class="custom-block-info">
                <h5 class="mb-2">
                    <a href="detail-page.html">
                        {{$item->namaLapangan}}
                    </a>
                </h5>

                {{-- <div class="profile-block d-flex">
                                    <img src="landingPage/images/profile/woman-posing-black-dress-medium-shot.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>Elsa
                                        <strong>Influencer</strong>
                                    </p>
                                </div> --}}

                <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                    <a href="#" class="bi bi-cash">
                        <span>@rp($item->harga)</span>
                    </a>

                    <a href="#" class="bi-heart me-1">
                        <span>2.5k</span>
                    </a>

                    <a href="#" class="bi-chat me-1">
                        <span>924k</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @endforeach
