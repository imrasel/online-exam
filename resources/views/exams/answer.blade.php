@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Answers</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item['question'] }}</td>
                                    <td>{{ $item['answer'] }}</td>
                                    <td>
                                        @if($item['status'] == 'Incorrect')
                                            <span class="badge badge-danger">{{ $item['status'] }}</span>
                                        @else 
                                        <span class="badge badge-success">{{ $item['status'] }}</span>
                                        @endif
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
