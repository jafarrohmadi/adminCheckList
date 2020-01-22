@extends('layouts.user.app')
@section('content')
    <header>
        <div class="fd-container-full">
            <div class="fd-wrapper">
                <div class="fd-slot">
                    <span>Welcome, <strong>{{ $user->name }}</strong></span>
                    <figure>
                        <img src="{{ $user->photo ?? asset('/admin/image/user1.jpg')}}" alt="">
                    </figure>
                </div>
                <div class="fd-slot" id='noteWarning'>
                    <a
                        href="#"
                        class="bell-notif" id="bell-notif">
                        @if($noteWarning)
                            <div class="fd-badge"></div>
                        @endif
                        <img src="{{ asset('user/images/icons/large-bell.png') }}" alt="">
                    </a>
                    <!-- <a href="#">
                      <img src="images/icons/large-share-job.png" alt="">
                    </a> -->
                </div>

            </div>
        </div>
        <div class="date-n-time">
            <div class="fd-wrapper">
                <div class="fd-slot">
                    <img src="{{ asset('user/images/icons/small-calendar.png') }}" alt="">
                    <p><strong>{{ ucfirst((new \App\Helpers\Helper())->getThisDay()) }}
                            ,</strong>{{ (new \App\Helpers\Helper())->tanggal_indo(date('Y-m-d'), false) }}</p>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="activity">
            <?php $operTugas = $mainTugas = 0;?>
            @foreach($checkListProgress as $checkList)
                <div class="fd-container-full">
                    @if(!isset($checkList->check_list_oper_tugas_id))
                        <div class="fd-wrapper">
                            <div class="activity-caption">
                                @if($mainTugas == 0)
                                    <h4>Tugas utama</h4>
                                    <?php $mainTugas++;?>
                                @endif
                                <small>{{ $checkList->location->name }}</small>
                            </div>
                            <div class="activity-content">
                                <div class="fd-accordion">
                                    @foreach($checkList->checkListProgressDetail as $checkListProgressDetail)
                                        <div class="fd-accordion-item" data-id="{{ $checkListProgressDetail->id }}">
                                            <div class="fd-accordion-header">
                                                <div class="check">
                                                    <div class="fd-checkbox-custom">
                                                        <label class="toggleButton">
                                                            <input type="checkbox" name="checkListId" id="checkListId"
                                                                   data-id="{{ $checkListProgressDetail->id }}"
                                                                   @if($checkListProgressDetail->status ===1) checked @endif/>
                                                            <div>
                                                                <svg viewBox="0 0 44 44">
                                                                    <path
                                                                        d="M14,24 L21,31 L39.7428882,11.5937758 C35.2809627,6.53125861 30.0333333,4 24,4 C12.95,4 4,12.95 4,24 C4,35.05 12.95,44 24,44 C35.05,44 44,35.05 44,24 C44,19.3 42.5809627,15.1645919 39.7428882,11.5937758"
                                                                        transform="translate(-2.000000, -2.000000)"></path>
                                                                </svg>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <h4 @if($checkListProgressDetail->status === 1) style="color: rgb(221, 221, 221); text-decoration: line-through;" @endif>{{$checkListProgressDetail->checkList->name}}</h4>
                                                        <time id="{{ $checkListProgressDetail->id }}">
                                                            Last Modified : {{ date('d/m/Y H:i', strtotime($checkListProgressDetail->updated_at)) }}
                                                        </time>
                                                    </div>
                                                </div>
                                                <div class="groupBtn">
                                                    <input type="hidden">
                                                    @if($checkListProgressDetail->picture)
                                                        <figure class="photo-thumb" style="display: block">
                                                            <img src="{{ asset($checkListProgressDetail->picture)}}" alt="" id="photo{{$checkListProgressDetail->id}}">
                                                        </figure>
                                                        <div class="takePic" data-id="{{$checkListProgressDetail->id}}" style="display: none">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    @else
                                                        <figure class="photo-thumb" >
                                                            <img src="" alt="" id="photo{{$checkListProgressDetail->id}}">
                                                        </figure>
                                                        <div class="takePic" data-id="{{$checkListProgressDetail->id}}">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    @endif
                                                    <div class="comment">
                                                        <i class="fas <?php echo $checkListProgressDetail->note ? 'fa-comment-dots':'fa-pencil-alt' ;?>" <?php echo $checkListProgressDetail->note ? "style='color: #26BEDB'":''; ?>></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fd-accordion-body">
                                            <textarea rows="5" cols="50" placeholder='Type here..'
                                                      class="textarea-custom"@if($checkListProgressDetail->note) disabled @endif>{{ $checkListProgressDetail->note ?? '' }}</textarea>
                                                <ul class="group-btn">
                                                    <li>
                                                        <button data-rel="save"
                                                                data-id="{{  $checkListProgressDetail->id }}"
                                                                @if($checkListProgressDetail->note) disabled @endif>
                                                            <i class="far fa-save"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button data-rel="edit" type="button"
                                                                data-id="{{ $checkListProgressDetail->id}}"
                                                                @if(!$checkListProgressDetail->note) disabled @endif>
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button data-rel="erase" type="button"
                                                                data-id="{{$checkListProgressDetail->id}}"
                                                                @if(!$checkListProgressDetail->note) disabled @endif>
                                                            <i class="fas fa-eraser"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="fd-wrapper">
                            <div class="activity-caption">
                                @if($operTugas == 0)
                                    <h4>Tugas Tambahan</h4>
                                    <?php $operTugas++;?>
                                @endif
                                <small>{{ $checkList->location->name }}</small>
                            </div>
                            <div class="activity-content">
                                <div class="fd-accordion">
                                    @foreach($checkList->checkListProgressDetail as $checkListProgressDetail)
                                        <div class="fd-accordion-item" data-id="{{ $checkListProgressDetail->id }}">
                                            <div class="fd-accordion-header">
                                                <div class="check">
                                                    <div class="fd-checkbox-custom">
                                                        <label class="toggleButton">
                                                            <input type="checkbox" name="checkListId" id="checkListId"
                                                                   data-id="{{ $checkListProgressDetail->id }}"
                                                                   @if($checkListProgressDetail->status ===1) checked @endif/>
                                                            <div>
                                                                <svg viewBox="0 0 44 44">
                                                                    <path
                                                                        d="M14,24 L21,31 L39.7428882,11.5937758 C35.2809627,6.53125861 30.0333333,4 24,4 C12.95,4 4,12.95 4,24 C4,35.05 12.95,44 24,44 C35.05,44 44,35.05 44,24 C44,19.3 42.5809627,15.1645919 39.7428882,11.5937758"
                                                                        transform="translate(-2.000000, -2.000000)"></path>
                                                                </svg>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <h4 @if($checkListProgressDetail->status === 1) style="color: rgb(221, 221, 221); text-decoration: line-through;" @endif>{{$checkListProgressDetail->checkList->name}}</h4>
                                                        <time id="{{ $checkListProgressDetail->id }}">
                                                            Last Modified : {{ date('d/m/Y H:i', strtotime($checkListProgressDetail->updated_at)) }}
                                                        </time>
                                                    </div>
                                                </div>
                                                <div class="groupBtn">
                                                    <input type="hidden">
                                                    @if($checkListProgressDetail->picture)
                                                    <figure class="photo-thumb" style="display: block">
                                                        <img src="{{ asset($checkListProgressDetail->picture)}}" alt="" id="photo{{$checkListProgressDetail->id}}">
                                                    </figure>
                                                    <div class="takePic" data-id="{{$checkListProgressDetail->id}}" style="display: none">
                                                        <i class="fas fa-camera"></i>
                                                    </div>
                                                    @else
                                                        <figure class="photo-thumb" >
                                                            <img src="" alt="" id="photo{{$checkListProgressDetail->id}}">
                                                        </figure>
                                                        <div class="takePic" data-id="{{$checkListProgressDetail->id}}">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    @endif
                                                    <div class="comment">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fd-accordion-body">
                                                <textarea rows="5" cols="50" placeholder='Type here..'
                                                          class="textarea-custom"
                                                          @if($checkListProgressDetail->note) disabled @endif>{{ $checkListProgressDetail->note ?? '' }}</textarea>
                                                <ul class="group-btn">
                                                    <li>
                                                        <button data-rel="save"
                                                                data-id="{{$checkListProgressDetail->id}}"
                                                                @if($checkListProgressDetail->note) disabled @endif>
                                                            <i class="far fa-save"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button data-rel="edit" type="button"
                                                                data-id="{{$checkListProgressDetail->id}}"
                                                                @if(!$checkListProgressDetail->note) disabled @endif>
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <button data-rel="erase" type="button"
                                                                data-id="{{$checkListProgressDetail->id}}"
                                                                @if(!$checkListProgressDetail->note) disabled @endif>
                                                            <i class="fas fa-eraser"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </section>
    </main>
    <div class="modal" id="photo-capture">
        <div class="modal-content">
            <span class="close fd-zIndex2"> × </span>
            <form action="">
                <div class="take-photo">
                    <label for="photo-proof">
                        <i class="fas fa-camera"></i>
                        <span>Ambil Foto</span>
                    </label>
                    <input type="file" name="photo-proof" id="photo-proof" accept="image/*">
                </div>
                <div class="result-photo">
                    <figure>
                        <img src="" alt="" data-photo="get-photo">
                    </figure>
                    <div>
                        <button class="btn fd-line-light-blue reTakePhoto">Ganti Foto</button>
                        <button class="btn btn-light-blue savePhoto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" id="re-capture">
        <div class="modal-content">
            <span class="close fd-zIndex2"> × </span>
            <form action="">
                <div class="take-photo">
                    <label for="photo-proof">
                        <i class="fas fa-camera"></i>
                        <span>Ambil Foto</span>
                    </label>
                    <input type="file" name="photo-proof" id="photo-proof" accept="image/*">
                </div>
                <div class="result-photo">
                    <figure>
                        <img src="" alt="" data-photo="get-photo">
                    </figure>
                    <div>
                        <button class="btn fd-line-light-blue reTakePhoto">Ganti Foto</button>
                        <button class="btn btn-light-blue reSavePhoto">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        @if ($noteWarning)
        $('#bell-notif').click(function () {
                swal("{!! $noteWarning !!}", {icon: 'warning'});
            }
        );
        @endif
        setInterval('refresh()', 30000);

        function refresh() {
            let html = '';
            $.ajax({
                type: 'get',
                url: "{{ url('/site/getNoteThisDayByUserLogin/')}}",
                success: function (data) {
                    if (data) {
                        html = html + '<a href="#" class="bell-notif" onclick="swalClick(\''+data+'\')"> <div class="fd-badge"></div> <img src="{{ asset('user/images/icons/large-bell.png') }}" alt=""> </a>';
                    } else {
                        html = html + '<a href="#" class="bell-notif" id="bell-notif"> <img src="{{ asset('user/images/icons/large-bell.png') }}" alt="">';
                    }
                    $('#noteWarning').html(html);
                },
            });
        }

        function swalClick(data) {
            swal(data,{icon: "warning"});
        }
    </script>
@endsection
