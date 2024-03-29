@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-info" href="{{ route('exam.index') }}">All Exams</a>
                    <a class="btn btn-primary" href="{{ route('exam.create') }}">Create Exam</a>
                    <a class="btn btn-success" href="{{ route('question.create') }}">Add new question</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
