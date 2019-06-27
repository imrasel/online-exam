@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Attending Exam
                    <div class="duration float-right">
                        Duration: <span id="">{{ $exam->duration }}</span> minutes
                    </div>
                </div>

                <div class="card-body">
                        
                        <div class="countdown">
                            Time Left: <span id="time">{{ $exam->duration }}</span> seconds!
                        </div>
                    {{-- {{ json_encode($exam) }} --}}
                    
                    <form id="regForm" action="{{ route('answer.store', $exam->id) }}" method="POST">
                        <!-- One "tab" for each step in the form: -->
                        @csrf

                        @foreach ($exam->questions as $question)
                        <div class="tab"><h4>{{ $question->title }}</h4>
                            @foreach ($question->options as $option)
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer[{{ $question->id }}]" value="{{ $option->id }}">
                                <label class="form-check-label" for="exampleRadios1">
                                    {{ $option->title}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        
                        <div style="overflow:auto;">
                          <div style="float:right;">
                            <button class="btn btn-info" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button class="btn btn-danger" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                          </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;display:none;">
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                          <span class="step"></span>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        console.log('hello', n);
        if (n === 4) {
            // return;
        }
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
    }

    function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    // x[n].className += " active";
    }

    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var countdown = setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                // timer = 0;÷
                document.getElementById("regForm").submit();
                clearInterval(countdown);
            }
            // console.log(seconds);
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 10,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>
@endsection
