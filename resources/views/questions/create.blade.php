@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a question</div>

                <div class="card-body">
                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Select an exam</label>
                                    <select name="exam_id" id="" class="form-control">
                                        @foreach ($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Question</label>
                            <input name="question" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Option <strong>1</strong></label>
                                    <input name="options[]" type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Option <strong>2</strong></label>
                                    <input name="options[]" type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input name="correct_answer" type="number" class="form-control" placeholder="Enter option number">
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
