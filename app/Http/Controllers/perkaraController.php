<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\perkara;
use DataTables,Auth,Validator;
class perkaraController extends Controller
{
    public function index()
    {
    	return view('admin.perkara.perkara_view');
    }
    protected static function validator(array $array)
    {
    	return Validator($array,[
    		'kategori'=>'required',
    		'perkara'=>'required'
    	]);
    }
    public function table()
    {
	    $model=perkara::query();
	    return DataTables::of($model)
	    ->addColumn('action',function($model) {
	         return view('admin.perkara.action',[
                'model'=>$model,
            ]);
	    })
	    ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }
    public function simpan(Request $request)
    {
    	$validator = self::validator($request->all());
    	if ($validator->fails()) {
    		return response()->json(['errors'=>$validator->errors()]);
    	}
    	if ($request->id != null) {
    		$perkara = perkara::findOrFail($request->id);
    	}
    	else{
    		$perkara = new perkara();
    	}
    	$perkara->kategori = $request->kategori;
    	$perkara->nama_perkara = $request->perkara;
    	$perkara->save();
    	return response()->json(['success'=>$request->all()]);
    }
    public function hapus ($id)
    {
    	$perkara = perkara::findOrFail($id);
    	$perkara->delete();
    	return response()->json(['success'=>'anda telah berhasil menghapus data ini'],200);
    }
}
