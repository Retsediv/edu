<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestQuestionAnswer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    /**
     * Show view for polling
     */
    public function index()
    {
        $tests = $this->getAllTests();
        return view('poll.index', ['tests' => $tests]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getTest($id){
        return view('poll.getOne', ['id' => $id]);
    }


    /**
     * @return all tests(polls)
     */
    public function getAllTests(){
        $tests = Test::all();
        return $tests;
    }

    /**
     * @param $id
     * @return Test
     */
    public function getQuestions($id){
        $test = new Test();
        $question = $test->find($id)->questions()->get();
        return $question;
    }

    /**
     * @param $id
     * @return TestQuestion
     */
    public function getAnswersToQuestion($id){
        $answers = new TestQuestion();
        $answers = $answers->find($id)->answers()->get();
        return $answers;
    }

    public function getAllAnswersToTest($id)
    {
        $test = new Test();
        $test = $test->find($id);

        $questions = $test->questions()->get();
        $answers = [];

        foreach($questions as $question){
            $answers[$question->id] = $question->answers()->get()->toArray();
        }

        return $answers;
    }
}
