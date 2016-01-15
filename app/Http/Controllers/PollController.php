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
        return view('poll.get', ['id' => $id]);
    }

    /**
     * Create a new test here
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a new test
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $test = new Test([
            'title' => $request->title,
            'description' => $request->description,
            'retry' => $request->retry,
            'per_page' => $request->per_page,
            'allowed' => $request->allowed
        ]);
        $request->user()->tests()->save($test);

        foreach($request->questions as $question){
            $quest = new TestQuestion([
                'body' => $question['name']
            ]);

            $test->questions()->save($quest);

            // Id, of answer that is correct -1
            $answers = [];
            $correct = $question['correct'] - 1;
            foreach ($question['answers'] as $answer) {
                $answers[] = new TestQuestionAnswer([
                    'answer' => $answer
                ]);
            }
            $answers[$correct]->correct = true;
            $answers[$correct]->save();

            $quest->answers()->saveMany($answers);
        }


        return redirect(route('poll'));
    }


    /**
     * @return all tests(polls)
     */
    public function getAllTests(){
        $tests = Test::allowed()->get();
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

        $questions = $test->find($id)->questions()->get()->toArray();
        $test = $test->find($id);
        $perPage = $test->per_page;

        shuffle($questions);

        $questions = array_slice($questions,0,$perPage);

        return $questions;
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
