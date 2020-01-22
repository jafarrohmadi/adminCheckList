@extends('layouts.user.app')
@section('content')
    <div class="nav-bar">
        <div class="fd-wrapper">
            <div class="fd-slot">
                <a href="{{ url('site/userChecklist') }}">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="fd-slot">
                <strong>History</strong>
            </div>
            <div class="fd-slot">
                <a href="#">
                    <i class="far fa-calendar-alt"></i>
                </a>
            </div>
        </div>
    </div>
    <main>
        <div class="timepickerBox">

            <div class="fd-group-field">
                <input type="text" name="" id="timepickerHistory" placeholder="YYYY/MM/DD">
            </div>
            <a href="#" class="hidePickerBox">
                <i class="fas fa-angle-double-up"></i>
            </a>
        </div>
        <section class="activity-history" id="searchOutput" style="display: none"></section>
        <section class="activity-history" id="allOutput">
            @include('user.checklist.history_list', ['checkListProgress' => $checkListProgress])
        </section>
    </main>
@endsection
