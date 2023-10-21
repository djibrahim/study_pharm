<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class YearController extends Controller
{
    public function index(Request $request){

    $links=array(['name'=>'Accueil','url'=>url('/')],
                 ['name'=>'Les années','url'=>'#'],
                 ['name'=>'La liset des années','url'=>url('/admin/years')]);
    $name_page='La liste des années';
    $data=Year::query()->orderBy('id','desc');
    $years=Year::orderBy('id','desc')->get();

   if ($request->ajax()){

       return  DataTables::of($data)
           ->addColumn('actions',function ($year){
               return view('admin.years.actions.btn',compact('year'));
           })
           ->editColumn('created_at',function ($data){
               return Carbon::parse($data->created_at)->format('Y-m-d H:i');
           })->rawColumns(['actions'])->make(true);
   }

    return view('admin.years.index',compact('years','links','name_page'));

    }


    public  function store(Request $request){

        $this->validate($request,[
            'name'=>['required','string'],
            'description'=>['nullable','string','max:5000'],
        ]);

        $input=$request->all();
        $year=Year::create($input);
        return redirect()->route('years.index')->with('success',"L'année ajoutée avec succès");

    }


    public function update(Request $request,$id){

        $this->validate($request,[
            'name'=>['required','string'],
            'description'=>['nullable','string','max:5000'],
        ]);
        $year=Year::find($id);
        $input=$request->only('name','description');
        $year->update($input);
        return redirect()->route('years.index')->with('success',"L'année a été mis à jour avec succès");


    }

    public function delete(Request $request,$id){

        $year=Year::find($id);
        $year->delete();
        return redirect()->route('years.index')->with('success',"L'année supprimée avec succès");


    }
}
