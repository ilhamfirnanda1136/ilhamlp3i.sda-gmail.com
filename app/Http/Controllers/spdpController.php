<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Validator,Storage,Auth,Mail;
use App\perkara;
use App\tersangka;
use App\spdp;
use App\User;
use App\Mail\Spdps;
class spdpController extends Controller
{
    public function index()
    {
    	return view('admin.spdp.spdp_view');
    }
    public function cari(Request $request)
    {
    	   $cari = $request->q;
            $data = perkara::select(DB::raw('*'))->where('nama_perkara', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    }
    public function simpanSpdp(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'nomor'=>'required',
    		'tgl_spdp'=>'required',
    		'terima'=>'required',
    		'perkara'=>'required',
    		'pasal'=>'required',
    		'uraian'=>'required',
    		'nolp'=>'required',
    		'tgl_lp'=>'required',
    	]); 
    	if ($validator->fails()) {
    		return response()->json(['errors'=>$validator->errors()]);
    	}
    	$spdp = new spdp();
    	$spdp->nomor = $request->nomor;
    	$spdp->tanggal_spdp = $request->tgl_spdp;
    	$spdp->tanggal_terima = $request->terima;
    	$spdp->perkara_id = $request->perkara;
    	$spdp->users_id = Auth::user()->id;
    	$spdp->pasal = $request->pasal;
    	$spdp->uraian = $request->uraian;
    	$spdp->lp = $request->nolp;
    	$spdp->t_lp = $request->tgl_lp;
    	$spdp->save();
    	for ($i=0; $i < count($request->tersangka) ; $i++) {
    			$spdp->tersangka()->attach($request->tersangka[$i]);
    	}
    	$user1= user::where('level','=',2)->first();
    	$user2= user::where('level','=',3)->first();
    	$isispdp = 'Telah terbit SPDP No.'.$request->nomor.' tanggal '.$request->tgl_spdp.' AN TSK ';
    	$getspdp = spdp::findOrFail($spdp->id);
    	$teks=[];
    	$teks2='';
    	foreach ($getspdp->tersangka as $getspdpTersangka) {
    		$teks[]=strtoupper($getspdpTersangka->nama_tersangka);
	        $teks2=$getspdpTersangka->nama_tersangka;
    	}
    	if (count($teks) > 1) {
          $isispdp.=implode(',',$teks);
        }
        else{
         $isispdp.=$teks2;
        }
    	$emaildata1 = [
    		 'subject'=>'notifikasi SPDP Untuk '.Auth::user()->name,
              'isi'=> $isispdp ,
    	];

    	$emaildata2 = [
    		 'subject'=>'notifikasi SPDP Untuk '.$user1->name,
              'isi'=> $isispdp,
    	];

    	$emaildata3 = [
    		  'subject'=>'notifikasi SPDP Untuk '.$user2->name,
              'isi'=> $isispdp,
    	];
    	Mail::to(Auth::user()->email)->send(new Spdps($emaildata1));
        Mail::to($user1->email)->send(new Spdps($emaildata2));
        Mail::to($user2->email)->send(new Spdps($emaildata3));
    	return response()->json(['success'=>$request->all()]);

    }
    public function simpanTersangka(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'status'=>'required',
    		'nama'=>'required',
    		'tempat'=>'required',
    		'umur'=>'required',
    		'kelamin'=>'required',
    		'warga'=>'required',
    		'tempat'=>'required',
    		'agama'=>'required',
    		'pekerjaan'=>'required',
    		'pendidikan'=>'required',
    		'img'=>'mimes:jpg,jpeg,png',
    		'lain'=>'required'
    	]); 
    	if ($validator->fails()) {
    		return response()->json(['errors'=>$validator->errors()]);
    	}
    	$tersangka = new tersangka();
    	$tersangka->status = $request->status;
    	$tersangka->nama_tersangka = $request->nama;
    	$tersangka->tempat_lahir = $request->tempat;
    	$tersangka->umur_tanggal = $request->umur;
    	$tersangka->kelamin =$request->kelamin;
    	$tersangka->kewarganegaraan = $request->warga;
    	$tersangka->tempat_tinggal = $request->tempat;
    	$tersangka->agama = $request->agama;
    	$tersangka->pendidikan = $request->pendidikan;
    	$tersangka->pekerjaan =  $request->pekerjaan;
    	$tersangka->lain = $request->lain;
    	if ($request->img!='') {
    		 $uploadedFile=$request->file('img');
             $path = Storage::putFile('dokumen/tersangka',$request->file('img'));
             $tersangka->foto=$path;
    	}
    	$tersangka->save();
    	return response()->json(['success'=>$request->all(),'id'=>$tersangka->id,'nama'=>$tersangka->nama_tersangka]);
    }
    public function hapusTersangka($id)
    {
    	$tersangka = tersangka::findOrFail($id);
    	$tersangka->delete();
    	return response()->json(['success'=>'anda telah berhasil menghapus data ini'],200);
    }
}
