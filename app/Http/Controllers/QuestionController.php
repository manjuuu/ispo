<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\UserGroup;
use Auth;
use App\Group;
use App\QuestionType;
use App\OptionGroup;
use App\Question;

class QuestionController extends Controller
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
    public function create(Request $request)
    {
        if (Auth::user()->admin == 1) {
            $form = Form::where('id', $request->form_id)->first();
        } else {
            $group_id = UserGroup::where('can_edit', 1)->where('user_id', Auth::id())->select('group_id')->get();
            $form = Form::where('id', $request->form_id)->whereIn('group_id', $group_id)->first();
        }
        $question_types = QuestionType::all();
        $option_groups = OptionGroup::where('group_id', $form->group_id)->get();
        $option_groups = $option_groups->pluck('title', 'id')->put(0, 'None');

        return view('editor.question.create', compact('question_types', 'option_groups', 'form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new Question;
        $question->form_id = decrypt($request->form_id);
        $question->question_type_id = $request->question_type_id;
        $question->option_group_id = $request->option_group_id;
        $question->title = $request->title;
        $question->save();
        return redirect()->action('FormController@edit', [decrypt($request->form_id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $form = Form::find($question->form_id);
        $question_types = QuestionType::all();
        $option_groups = OptionGroup::where('group_id', $form->group_id)->get();
        $option_groups = $option_groups->pluck('title', 'id')->put(0, 'None');
        dd($option_groups);
        return view('editor.question.edit', compact('question_types', 'option_groups', 'form', 'question'));
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
        $question = Question::find($id);
        $question->question_type_id = $request->question_type_id;
        $question->option_group_id = $request->option_group_id;
        $question->title = $request->title;
        $question->save();
        return redirect()->action('FormController@edit', [$question->form_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $form_id = $question->form_id;
        $question->delete();
        return redirect()->action('FormController@edit', [$question->form_id]);
    }
}
