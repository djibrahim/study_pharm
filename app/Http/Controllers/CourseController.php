<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request){

        $links=array(['name'=>'Accueil','url'=>url('/')],
            ['name'=>'Les Cours','url'=>'#'],
            ['name'=>'La liset des cours','url'=>url('/admin/courses')]);
        $name_page='La liste des cours';
        $modules=Module::withoutTrashed()->get();

        $courses=Course::with(['module'])->orderBy('id','desc')->get();


        return view('admin.courses.index',compact('courses','modules','links','name_page'));

    }

    public function courses_by_module(Request $request,$id){

        $module=Module::find($id);
        $links=array(
            ['name'=>'Les Modules','url'=>url('/admin/modules/'.$module->year_id)],
            ['name'=>'Les Cours','url'=>'#'],
            ['name'=>'La liset des cours','url'=>url('/admin/courses')]);
        $name_page='La liste des cours';


        $courses=Course::where('module_id',$id)->with(['module'])->orderBy('id','desc')->get();


        return view('admin.courses.index',compact('courses','module','links','name_page'));

    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>['string','required','max:50'],
            'description'=>['nullable','min:10'],
            'module_id'=>['required','exists:modules,id']
        ]);

        $input=$request->only(['title','description','module_id']);
        $course=Course::create($input);

        return redirect()->back()->with('success',"Le cours ajouté avec succès");
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>['string','required','max:50'],
            'description'=>['nullable','min:10'],
            'module_id'=>['required','exists:modules,id']
        ]);

        $input=$request->only(['title','description','module_id']);
        $course=Course::find($id);
        $course->update($input);

        return redirect()->back()->with('success',"Le module a été mis à jour avec succès");
    }

    public function delete($id){
        $course=Course::find($id);
        $course->delete();
        return redirect()->back()->with('success',"Le module supprimé avec succès");
    }
}
