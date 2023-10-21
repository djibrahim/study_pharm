<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function index(Request $request,$id){

        $question=Question::find($id);
        $links=array(
            ['name'=>'Les Questions','url'=>url('admin/questions/'.$question->course_id)],
            ['name'=>'Les Réponses','url'=>'#'],
            ['name'=>'La liset des réponses','url'=>url('/admin/answers'.$id)]);
        $name_page='La liste des réponses';


        $answers=Answer::where('question_id',$id)->with(['question'])->orderBy('id','desc')->get();


        return view('admin.answers.index',compact('answers','question','links','name_page'));

    }


    public function store(Request $request){

        $this->validate($request,[
            'response'=>['array','sometime'],
            'is_correct'=>['array','nullable'],
            'question_id'=>['sometime','exists:questions,id']
        ]);


        $data=[];
        for($i=0;$i<count($request->response);$i++){
            $data+=['response'=>$request->response[$i]];
            $data+=['is_correct'=>$request->is_correct[$i]];
            $data+=['question_id'=>$request->question_id];
            $answer=Answer::create($data);
            if (isset($request->image_answer[$i]) AND $request->hasFile('image_answer')){
                $answer->addMedia($request->image_answer[$i])
                    ->toMediaCollection('answers');
            }
            $data=[];
        }

        return redirect()->back()->with('success',"Les réponse ajoutée avec succès");
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'response'=>['string','required'],
            'is_correct'=>['nullable'],
            'question_id'=>['required','exists:questions,id']
        ]);

        if($request->is_correct==null)
            $request->request->add(['is_correct'=>'0']);

        $input=$request->only(['response','is_correct','question_id']);
        $answer=Answer::find($id);
        $answer->update($input);

        if ($request->hasFile('image_answer')){
            $answer->clearMediaCollection('answers');
            $answer->addMedia($request->image_answer)
                ->toMediaCollection('answers');
        }

        return redirect()->back()->with('success',"La réponse a été mis à jour avec succès");
    }

    public function delete($id){
        $answer=Answer::find($id);
        $answer->delete();
        return redirect()->back()->with('success',"La réponse supprimée avec succès");
    }
}
