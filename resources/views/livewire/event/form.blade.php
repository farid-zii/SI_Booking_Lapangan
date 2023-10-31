<div>
    <form action="/event" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="">Judul Event</label>
                    <input type="text" class="form-control" name="event" placeholder="Lapangan x" wire:model="event" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Tanggal Pendaftaran</label>
                    <div class="row ">

                        <div class="col-6 col-sm-3">
                            <label class="from-label mb-0 text-xxs">Awal</label>
                            <input type="date" class="form-control" name="tglAwal" wire:model="tglAwal" required>
                        </div>
                        <div class="col-6 col-sm-3">
                            <label class="from-label mb-0">Akhir</label>
                            <input type="date" class="form-control" name="tglAkhir" wire:model="tglAkhir" required>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="">Gambar Event</label>
                    <input type="file" class="form-control" name="gambar" wire:model="gambar">
                </div>

                <div class="form-group mb-0 ms-2">
                    <input class="form-check-input" type="checkbox" name="cek" value="Ya" wire:model="cek">
                     <label class="form-check-label" for="flexCheckChecked">
                        Event Lebih dari Sehari
                    </label>
                </div>

                <div class="form-group mb-1">
                    <label class="form-label">Tanggal Event</label>
                    <div class="row ">
                        @if ($cek == "Ya")
                        <div class="col-6 col-sm-3">
                            <label class="from-label mb-0 text-xxs" >Awal</label>
                            <input type="date" class="form-control" wire:model="tglEvent" name="tglEvent" required>
                        </div>
                        <div class="col-6 col-sm-3">
                            <label class="from-label mb-0">Akhir</label>
                            <input type="date" class="form-control" wire:model="tglEvent2" name="tglEvent2" required>
                        </div>
                        @else
                        <div class="col-6 col-sm-3">
                            <input type="date" class="form-control" wire:model="tglEvent" name="tglEvent" required>
                        </div>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="">Deskripsi Event</label>
                    <textarea class="form-control" name="deskripsi" id="konten" placeholder="" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary"> Tambah </button>
            </div>
    </form>
</div>


    <script>
        tinymce.init({
            selector: 'textarea#konten',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
        });

    </script>

