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
     * Testing view(page)
     *
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
     * Return a array of all questions
     *
     * @param $id
     * @return Test
     */
    public function getQuestions($id){
        $test = new Test();
        $question = $test->find($id)->questions()->get();
        return $question;
    }

    /**
     * Return a array with answers to one question
     * @param $id
     * @return TestQuestion
     */
    public function getAnswersToQuestion($id){
        $answers = new TestQuestion();
        $answers = $answers->find($id)->answers()->get();
        return $answers;
    }

    /**
     * Return a array with all answers for questions: [1] => [],[],[]
     *                                                [2] => [],[],[]
     * @param $id
     * @return array
     */
    public function getAllAnswersToTest($id)
    {
        $answers = [];

        $test = Test::find($id);
        $questions = $test->questions()->get();

        foreach($questions as $question){
            $answers[$question->id] = $question->answers()->get()->toArray();
        }

        return $answers;
    }
}
