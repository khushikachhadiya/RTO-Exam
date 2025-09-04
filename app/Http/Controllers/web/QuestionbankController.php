<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use App\Models\QuestionBank;
use App\Models\Sign;
use Illuminate\Http\Request;

class QuestionbankController extends Controller
{
    public function view(Request $request)
    {
        return view('web.questionbank.index');
    }

    public function loadQuestions(Request $request)
    {
        $offset = $request->get('offset', 0);
        $lang = $request->get('lang', 'eng');

        $questions = QuestionBank::where('lang', $lang)
            ->orderBy('id', 'asc')
            ->skip($offset)
            ->take(6)
            ->get();

        $html = view('web.questionbank.data', ['questions' => $questions, 'offset' => $offset])->render();

        return response()->json([
            'html' => $html,
            'count' => $questions->count()
        ]);
    }

     public function loadSigns(Request $request)
    {
        $offset = $request->get('offset', 0);
         $lang = $request->get('lang', 'eng');

        $signs = Sign::where('lang', $lang)
        ->orderBy('id', 'asc')
            ->skip($offset)
            ->take(9)
            ->get();

        $html = view('web.questionbank.signdata', [
            'signs' => $signs,
            'offset' => $offset
        ])->render();

        return response()->json([
            'html' => $html,
            'count' => $signs->count()
        ]);
    }
}
