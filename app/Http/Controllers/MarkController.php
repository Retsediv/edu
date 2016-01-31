<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MarkController extends Controller
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

    public function forTest($lessonId, $mark)
    {
        $mark = Mark::where('user_id', '=', Auth::user()->id)->where('lesson_id', '=', $lessonId);
        if (!$mark) {
            Mark::firstOrCreate([
                'user_id' => Auth::user()->id,
                'lesson_id' => $lessonId,
                'mark' => $mark,
                'description' => 'За проходження тестування за урок'
            ]);
        }
    }
}
