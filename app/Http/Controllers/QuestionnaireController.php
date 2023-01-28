<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function firstPage(){
        return view('question.first_page');
    }

    public function childForm(){
        return view('question.child.firstques');
    }

    public function adultForm(){
        return view('question.adult.firstques');
    }

    public function store(Request $request){
        dd($question);
        // dd($request->all());
    }
}
