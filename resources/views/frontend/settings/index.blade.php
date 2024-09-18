@extends('frontend.layouts.master')
@section('is_navbar_hided', true)
@section('content')
    <div style="margin-top: 70px;" class="container-fluid">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Settings</h4>
            </div>
            <div class="card-body">
                <div class="mb-3 form-switch" style="display: flex; align-items: center;justify-content: space-between;width: 200px;">
                    <label class="form-check-label" for="schedulePostSwitch">Schedule Post</label>
                    <x-frontend.form.switch  id="schedulePostSwitch" />
                </div>

                <div id="scheduleOptions" style="display:none;" >
                    <div class="mb-3">
                        <label for="scheduleDate" class="form-label">Date</label>
                        <input type="date" class="form-control" id="scheduleDate">
                    </div>
                    <div class="mb-3">
                        <label for="scheduleTime" class="form-label">Time</label>
                        <input type="time" class="form-control" id="scheduleTime">
                    </div>
                </div>

                <!-- Feature: Likes and Views -->
                <div class="mb-3 px-0 mx-0">
                    <a href="#" class="btn px-0">Likes and Views</a>
                </div>

                <!-- Feature: Comments -->
                <div class="mb-3">
                    <a href="#" class="btn px-0">Comments</a>
                </div>

                <!-- Feature: Turn off Commenting -->
                <div class="mb-3" style="display: flex; align-items: center;justify-content: space-between;width: 225px; ">
                    <label class="form-check-label" for="turnOffCommenting">Turn off Commenting</label>
                    <x-frontend.form.switch  id="turnOffCommenting" />
                </div>

                <!-- Feature: Tag People -->
                <div class="mb-3">
                    <a href="#" class="btn px-0">Tag People</a>
                </div>

                <!-- Feature: Add Location -->
                <div class="mb-3">
                    <label for="location" class="form-label">Add Location</label>
                    <input type="text" class="form-control" id="location" >
                </div>

                <!-- Feature: Add Message Button -->
                <div class="mb-3 px-2">
                    <a href="#" class="btn btn-primary py-1">Message Button</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('schedulePostSwitch').addEventListener('click', function () {
            const scheduleOptions = document.getElementById('scheduleOptions');
            if (this.classList.contains('on')) {
                scheduleOptions.style.display = 'none';
            } else {
                scheduleOptions.style.display = 'block';
            }
        });
    </script>
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
@endsection
