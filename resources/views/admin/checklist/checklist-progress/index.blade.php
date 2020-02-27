@extends('layouts.admin.app')
@section('content')
    <div class="content-header ri2-block ri2-bgwhite1 ri2-paddingleft20 ri2-paddingright20">
        <div class="ri2-table ri2-fullwidth ri2-fullheight">
            <div class="ri2-cell ri2-vmid ri2-fit ri2-paddingright10">
                <div class="ri2-table ri2-font18 ri2-semibold">
                    <div class="ri2-cell ri2-paddingright10 ri2-borderright1 ri2-bordergrey2">
                        <a href="{{ url('/checklist') }}" class="ri2-tooltip ri2-nowrap ri2-relative"><span
                                class="ri2-righttooltiptext">Halaman Sebelum</span><i
                                class="fas fa-chevron-circle-left ri2-txblack5 ri2-linkhover"></i></a>
                    </div>
                    <div class="ri2-cell ri2-paddingleft10">
                        Progress Detail
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="ri2-block ri2-relative ri2-fullwidth ri2-box ri2-boxpad10">
            <div class="ri2-flex ri2-relative ri2-cell-end1">
                <div class="ri2-block ri2-relative new-content-cellspace ri2-box ri2-cell-end1" style="width: 300px;">
                    <div class="ri2-block ri2-relative">
                        <div
                            class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                        <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                        <div class="ri2-block ri2-relative">
                            <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                                Informasi Petugas
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box">
                            <div
                                class="ri2-block ri2-relative ri2-borderbottom1 ri2-borderwhite3 ri2-marginbottom20 ri2-paddingbottom10">
                                <div class="ri2-table ri2-relative">
                                    <div class="ri2-cell ri2-relative ri2-vmid ri2-paddingright20">
                                        <img src="{{ $checkListProgress->checkListUser->photo }}"
                                             class="ri2-inlineblock ri2-relative ri2-vmid new-user-mthumbnail ri2-circle">
                                    </div>
                                    <div class="ri2-cell ri2-relative ri2-vmid">
                                        <a href=""
                                           class="ri2-inlineblock ri2-relative ri2-font18 ri2-txblack3 ri2-linkhover ri2-marginbottom3">
                                            {{ $checkListProgress->checkListUser->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="ri2-block ri2-relative ri2-font14 ri2-semibold ri2-txblack3 ri2-marginbottom10">
                                {{ $checkListProgress->location->name }}, <span
                                    class="ri2-normal">{{ (new Helper)->tanggal_indo(date('Y-m-d', strtotime($checkListProgress->date))) }}</span>
                            </div>
                            @if(date('Y-m-d') === date('Y-m-d', strtotime($checkListProgress->date)))
                                <input type="hidden" id="tugasNoteId" value="{{ $checkListProgress->id }}">
                                <div class="ri2-block ri2-relative ri2-margintop20">
                                <textarea id="note"
                                          class="ri2-textarea100 ri2-boxpad10 ri2-box ri2-font14 ri2-txblack3 ri2-fullwidth ri2-bgwhite2 ri2-borderfull1 ri2-borderwhite5 ri2-borderradius2 ri2-noresize"
                                          placeholder="Berikan catatan/perintah kepada {{ $checkListProgress->checkListUser->name }}"
                                >{{ $checkListProgress->note ?? '' }}</textarea>
                                    <div class="ri2-block ri2-relative ri2-margintop10">
                                        <button id="modaltugasnoteedit"
                                                class="ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">
                                            Kirim
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="ri2-block ri2-relative ri2-margintop20">
                                <textarea
                                    class="ri2-textarea100 ri2-boxpad10 ri2-box ri2-font14 ri2-txblack3 ri2-fullwidth ri2-bgwhite2 ri2-borderfull1 ri2-borderwhite5 ri2-borderradius2 ri2-noresize"
                                    placeholder="Berikan catatan/perintah kepada {{ $checkListProgress->checkListUser->name }}"
                                    disabled>{{ $checkListProgress->note ?? ''}}</textarea>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="ri2-flex1 ri2-relative new-content-cellspace ri2-box ri2-cell-end1">
                    <div class="ri2-block ri2-relative">
                        <div
                            class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                        <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                        <div class="ri2-block ri2-relative">
                            <div class="ri2-block ri2-font16 ri2-txblack5 ri2-semibold ri2-bgwhite3 ri2-boxpad7">
                                Laporan
                            </div>
                        </div>
                        <div class="ri2-block ri2-relative ri2-boxpad20 ri2-box">
                            <div class="ri2-block ri2-relative ri2-font12 ri2-txgrey2 ri2-marginbottom10">
                                Selesai {{ $checkListProgress->activeCheckListProgressDetail }}
                                dari {{ $checkListProgress->check_list_progress_detail_count }} Tugas
                            </div>
                            <div class="ri2-table ri2-relative ri2-fullwidth new-zebratable ri2-font16 ri2-txblack3">
                                @foreach($checkListProgress->checkListProgressDetail as $checkList)
                                    <div class="ri2-row">
                                        @if($checkList->status == 1)
                                            <div class="ri2-cell ri2-fit ri2-boxpad10">
                                                <i class="far fa-check-square"></i>
                                            </div>
                                        @else
                                            <div class="ri2-cell ri2-fit ri2-boxpad10">
                                                <i class="far fa-square"></i>
                                            </div>
                                        @endif
                                        <div class="ri2-cell ri2-boxpad10">
                                            {{ $checkList->checkList->name}}
                                            @if($checkList->picture)
                                                <div class="new-checklist-gallery">
                                                    <?php $i = 0;?>
                                                    @foreach(json_decode($checkList->picture) as $picture)
                                                        <div class="items"
                                                             onclick="openModal({{$checkList->picture}});currentSlide({{++$i}})">
                                                            <img src="{{ $picture }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                            @if($checkList->note)
                                                <p>
                                                    <i class="far fa-comment-dots"></i> {{ $checkList->note }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ri2-fixed ri2-lightbox ri2-fullwidth ri2-fullheight">
    <span class="ri2-absolute ri2-txwhite1 ri2-font20 ri2-lightbox-close ri2-linkhover ri2-pointer"
          onclick="closeModal()"><i class="fas fa-times"></i></span>
        <div class="ri2-table ri2-relative ri2-fullwidth ri2-fullheight">
            <div class="ri2-cell ri2-fullwidth ri2-fullheight ri2-vmid ri2-center" id="picturePost">

            </div>
            <a class="ri2-lightbox-prev ri2-absolute ri2-pointer ri2-txwhite1" onclick="plusSlides(-1)"><i
                    class="fas fa-angle-left ri2-linkhover"></i></a>
            <a class="ri2-lightbox-next ri2-absolute ri2-pointer ri2-txwhite1" onclick="plusSlides(1)"><i
                    class="fas fa-angle-right ri2-linkhover"></i></a>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        // lightbox
        var simpan = {
            text: '<i class="far fa-comment-alt ri2-paddingright7"></i>Success Add Note',
            timeout: 1500,
            type: 'success',
            theme: 'relax',
            layout: 'topRight',
            closeWith: ['click'],
            maxVisible: 10,
            animation: {
                open: 'animated bounceInRight', // Animate.css class names
                close: 'animated bounceOutRight', // Animate.css class names
                easing: 'swing', // unavailable - no need
                speed: 100 // unavailable - no need
            }
        };

        // missing options such as Theme!!
        $('.noty-button').click(function (e) {
            noty(simpan);
        });

        var hapus = {
            text: '<i class="far fa-comment-alt ri2-paddingright7"></i>Message',
            timeout: 1500,
            type: 'warning',
            theme: 'relax',
            layout: 'topRight',
            closeWith: ['click'],
            maxVisible: 10,
            animation: {
                open: 'animated bounceInRight', // Animate.css class names
                close: 'animated bounceOutRight', // Animate.css class names
                easing: 'swing', // unavailable - no need
                speed: 100 // unavailable - no need
            }
        };

        // missing options such as Theme!!
        $('.noty-button-hapus').click(function (e) {
            console.log(hapus);
            e.preventDefault();
            noty(hapus);
        });

        function openModal(picture) {
            $(".ri2-lightbox").slideDown();
            $(".ri2-lightbox").css('display', 'block');
            $("body").css('overflow', 'hidden');
            let pic = '';
            for (var i in picture) {
                let j = parseInt(i) + parseInt(1);
                pic = pic + '<div class="ri2-lightbox-slide">' +
                    '<div class="ri2-lightbox-number ri2-absolute ri2-txwhite1 ri2-font18">' + j + '/ ' + picture.length + '</div>' +
                    '<img src="' + picture[i] + '" class="ri2-lightbox-image">' +
                    '</div>'
            }
            $('#picturePost').html(pic);
        }

        function closeModal() {
            $(".ri2-lightbox").slideUp();
            $("body").css('overflow', 'auto');
        }

        var slideIndex = 1;

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("ri2-lightbox-slide");
            var dots = document.getElementsByClassName("ri2-lightbox");
            //var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "inline-block";
            //dots[slideIndex-1].className += " active";
            //captionText.innerHTML = dots[slideIndex-1].alt;
        }

        $("#modaltugasnoteedit").click(function () {
            const note = $("#note").val();
            const id = $("#tugasNoteId").val();
            $.ajax({
                type: 'put',
                url: "{{url('/editCheckListProgress') }}/" + id,
                data: {
                    '_token': "{{  csrf_token() }}",
                    'note': note,
                },
                success: function (data) {
                    popUpMessage();
                },
            });
        });
        function popUpMessage()
        {
            noty(simpan);
        }
    </script>
@endsection
