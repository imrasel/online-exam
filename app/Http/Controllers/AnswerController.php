<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Answer;
use App\Option;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $exam_id)
    {
        // return $request->answer;
        $exam = Exam::find($exam_id);

        if ($request->has('answer')) {
            foreach($request->answer as $key => $answer) {
                Answer::create([
                    'exam_id' => $exam->id,
                    'user_id' => Auth::user()->id,
                    'question_id' => $key,
                    'option_id' => $answer
                ]);
            }
        } else {
            return 'No data inserted';
        }

        return redirect()->route('answer.show', [ 'exam_id' => $exam_id, 'user_id' => Auth::user()->id]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id, $user_id)
    {
        $answers = Answer::where('exam_id', $exam_id)
                        ->where('user_id', $user_id)
                        ->get();

        $questions = Question::where('exam_id', $exam_id)->get();

        $data = [];

        foreach($questions as $question) {
            foreach($answers as $answer) {
                // return $question->id;
                if ($answer->question_id == $question->id) {
                    // return $question->correct_answer == $answer->option_id;
                    $option = Option::find($answer->option_id);
                    $data[] = [
                        'question' => $question->title,
                        'answer' => $option->title ?? '',
                        'status' => $question->correct_answer == $option->option_id ? 'Correct' : 'Incorrect'
                    ];
                }
            }
        }
        
        // return $data;

        return view('exams.answer', compact('data'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
