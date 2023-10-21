<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ModuleController extends Controller
{
    public function index(Request $request){

        $links=array(['name'=>'Accueil','url'=>url('/')],
            ['name'=>'Les Modules','url'=>'#'],
            ['name'=>'La liset des modules','url'=>url('/admin/modules')]);
        $name_page='La liste des modules';
        $years=Year::withoutTrashed()->get();

        $modules=Module::with(['year'])->orderBy('id','desc')->get();


        return view('admin.modules.index',compact('modules','years','links','name_page'));

    }

    public function modules_by_year(Request $request,$id){

        $links=array(
            ['name'=>'Les années','url'=>url('/admin/years')],
            ['name'=>'Les Modules','url'=>'#'],
            ['name'=>'La liset des modules','url'=>url('/admin/modules')]);
        $name_page='La liste des modules';
        $years=Year::withoutTrashed()->get();
        $year=Year::find($id);

        $modules=Module::where('year_id',$id)->with(['year'])->orderBy('id','desc')->get();


        return view('admin.modules.index',compact('modules','year','links','name_page'));

    }



    public function store(Request $request){
        $this->validate($request,[
            'name'=>['string','required','max:50'],
            'description'=>['nullable','min:10'],
            'year_id'=>['required','exists:years,id']
        ]);

        $input=$request->only(['name','description','year_id']);
        $module=Module::create($input);

        return redirect()->back()->with('success',"Le module ajouté avec succès");
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>['string','required','max:50'],
            'description'=>['nullable','min:10'],
            'year_id'=>['required','exists:years,id']
        ]);

        $input=$request->only(['name','description','year_id']);
        $module=Module::find($id);
        $module->update($input);

        return redirect()->back()->with('success',"Le module a été mis à jour avec succès");
    }

    public function delete($id){
        $module=Module::find($id);
        $module->delete();
        return redirect()->back()->with('success',"Le module supprimé avec succès");
    }
}
