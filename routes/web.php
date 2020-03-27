<?php

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth']],function(){
	Route::get('/jenis/perkara','perkaraController@index');
	Route::get('/table/perkara',array('as'=>'table.perkara','uses'=>'perkaraController@table'));
	Route::post('/simpan/perkara',array('as'=>'simpan.perkara','uses'=>'perkaraController@simpan'));
	Route::post('edit/simpan/perkara',array('as'=>'edit.simpan.perkara','uses'=>'perkaraController@simpan'));
	Route::get('hapus/perkara/{id}','perkaraController@hapus');
});

Route::group(['middleware'=>['auth','level:1,4']],function(){
	Route::get('/spdp','spdpController@index');
	Route::get('/tambah/spdp',function(){
		return view('admin.spdp.tambah_spdp');
	});
	Route::get('/cari/perkara','spdpController@cari');
	Route::post('/simpan/tersangka',array('as'=>'simpan.tersangka','uses'=>'spdpController@simpanTersangka'));
	Route::get('/hapus/tersangka/{id}','spdpController@hapusTersangka');
	Route::post('/simpan/spdp',array('as'=>'simpan.spdp','uses'=>'spdpController@simpanspdp'));
});