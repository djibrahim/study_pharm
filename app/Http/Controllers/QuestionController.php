<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Module;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request){

        $links=array(['name'=>'Accueil','url'=>url('/')],
            ['name'=>'Les Questions','url'=>'#'],
            ['name'=>'La liset des questions','url'=>url('/admin/questions')]);
        $name_page='La liste des questions';
        $courses=Course::withoutTrashed()->get();

        $questions=Question::with(['course'])->orderBy('id','desc')->get();


        return view('admin.questions.index',compact('courses','questions','links','name_page'));

    }

    public function questions_by_course(Request $request,$id){

        $course=Course::find($id);
        $links=array(
            ['name'=>'Les Cours','url'=>url('admin/courses/'.$course->module_id)],
            ['name'=>'Les Questions','url'=>'#'],
            ['name'=>'La liset des questions','url'=>url('/admin/questions')]);
        $name_page='La liste des questions';


        $questions=Question::where('course_id',$id)->with(['course'])->orderBy('id','desc')->get();


        return view('admin.questions.index',compact('course','questions','links','name_page'));

    }

    public function create(Request $request){
        $links=array(['name'=>'Accueil','url'=>url('/')],
            ['name'=>'Les Questions','url'=>'#'],
            ['name'=>'La liset des questions','url'=>url('/admin/questions')],
            ['name'=>'Ajouter une questions','url'=>'#']);
        $name_page='Ajouter une questions';
        $courses=Course::withoutTrashed()->get();
        return view('admin.questions.create',compact('courses','links','name_page'));

    }
    public function create_by_course(Request $request,$id){
        $links=array(['name'=>'Accueil','url'=>url('/')],
            ['name'=>'Les Questions','url'=>'#'],
            ['name'=>'La liset des questions','url'=>url('/admin/questions/'.$id)],
            ['name'=>'Ajouter une questions','url'=>'#']);
        $name_page='Ajouter une questions';
        $course=Course::find($id);
        return view('admin.questions.create',compact('course','links','name_page'));

    }

    public function store(Request $request){

        $this->validate($request,[
            'title'=>['string','required'],
            'emd'=>['required','string'],
            'year'=>['required','string','max_digits:4','min_digits:4'],
            'ratt'=>['sometimes'],
            'course_id'=>['required','exists:courses,id'],
            'response'=>['array','sometimes'],
            'is_correct'=>['array','nullable'],
            'question_id'=>['sometimes','exists:questions,id']
        ]);

        $input=$request->only(['title','emd','course_id','year','ratt']);
        $question=Question::create($input);

        if ($request->hasFile('images_question')){
            foreach ($request->images_question as $image){
                $question->addMedia($image)
                    ->toMediaCollection('questions');
            }
        }

        $data=[];
        $j=0;
        for($i=0;$i<count($request->response);$i++){
            $data+=['response'=>$request->response[$i]];
            if($request->is_correct[$j]==$i){
                $data+=['is_correct'=>'1'];
                $j++;
            }
            else
                $data+=['is_correct'=>'0'];
            $data+=['question_id'=>$question->id];
            $answer=Answer::create($data);
            if (isset($request->image_answer[$i]) AND $request->hasFile('image_answer')){
                $answer->addMedia($request->image_answer[$i])
                    ->toMediaCollection('answers');
            }
            $data=[];
        }

        return redirect()->back()->with('success',"La question et les réponses ajoutées avec succès");
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>['string','required'],
            'emd'=>['required','string'],
            'year'=>['required','string','max_digits:4','min_digits:4'],
            'ratt'=>['sometimes'],
            'course_id'=>['required','exists:courses,id']
        ]);

        $input=$request->only(['title','emd','course_id','year','ratt']);
        $question=Question::find($id);
        $question->update($input);

        if ($request->hasFile('images_question')){
            foreach ($request->images_question as $image){
                $question->clearMediaCollection('questions');
                $question->addMedia($image)
                    ->toMediaCollection('questions');
            }
        }

        return redirect()->back()->with('success',"La question a été mis à jour avec succès");
    }

    public function delete($id){
        $question=Question::find($id);
        $question->delete();
        return redirect()->back()->with('success',"La question supprimée avec succès");
    }
}
