@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create exam</div>

                <div class="card-body">
                    <form action="{{ route('exam.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Exam Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter exam name">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Schedule Date</label>
                                    <input name="schedule_date" type="date" class="form-control" placeholder="Enter exam name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Schedule time</label>
                                    <input name="schedule_time" type="time" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Exam Duration</label>
                                    <input name="duration" type="number" class="form-control" placeholder="Enter in minutes">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
