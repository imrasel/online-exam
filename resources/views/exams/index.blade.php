@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Exams</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Exam Name</th>
                                <th>Questions</th>
                                <th>Duration</th>
                                <th>Schedule time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $key => $exam)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ count($exam->questions) }}</td>
                                    <td>{{ $exam->duration }} min</td>
                                    <td>{{ $exam->schedule_time }}</td>
                                    <td>
                                        @if(count($exam->questions) > 0 && $exam->schedule_time < date('Y-m-d h:i:s', time()))
                                            <a href="{{ route('exam.attend', $exam->id) }}" class="btn btn-primary btn-sm">Attend Exam</a>
                                        @endif
                                        @if(count($exam->questions) == 0)
                                            No questions added
                                        @endif
                                        {{-- {{ date('Y-d-m h:i:s', time()) }} --}}
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
