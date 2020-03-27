@extends('layouts.adminapp')
@section('header')
 <link rel="stylesheet" href="{{asset('asset')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@stop
@section('content')
<div class="content-wrapper">
	<div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h1 class="card-titl">Tambah SPDP</h1>
            <form class="cmxform" id="saveSpdp" action="#" novalidate="novalidate" onsubmit="event.preventDefault();simpanSpdp()" enctype="multipart/form-data">
              <fieldset>
              	<div class="row">
              		<div class="form-group col-md-6">
                      <label for="nomor">Nomor</label>
                      <input id="nomor" class="form-control form-control-danger" name="nomor" type="text" aria-invalid="true"><label id="firstname-error" class="error mt-2 text-danger nomor" for="firstname"></label> 
                 	</div>
              		<div class="form-group col-md-6">
                  		<label>Tanggal Spdp</label>
                  		<div id="datepicker-popup" class="input-group date datepicker">
                          <input type="text" name="tgl_spdp" class="form-control" id="tgl_spdp" value="{{date('Y-m-d')}}" readonly="">
                          <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                          </span>
                        </div>
                  	</div>
                    <div class="form-group col-md-6">
                      <label for="terima">Tanggal Terima</label>
                         <div id="datepicker-popups" class="input-group date datepickers">
	                          <input type="text" name="terima" id="terima" class="form-control" value="{{date('Y-m-d')}}" readonly="">
	                          <span class="input-group-addon input-group-append border-left">
	                            <span class="mdi mdi-calendar input-group-text"></span>
	                          </span>
	                      </div>
                        <label id="lastname-error" class="error mt-2 text-danger terima" for="lastname"></label>
                     </div>
                    <div class="form-group col-md-6">
                      <label for="perkara">Jenis Perkara</label>
                      <select class="cari form-control" name="perkara" id="perkara"></select>
                      <label id="username-error" class="error mt-2 text-danger perkara" for="username"></label> 
                  	</div>
                    <div class="form-group col-md-6">
                      <label for="tersangka">Tambah Tersangka</label>
                      <button type="button" class="btn btn-success btn-sm mb-3" id="btn-modal-tersangka"><i class="fa fa-plus"></i></button>
                      <div id="tersangka-input" class="mb-3"></div>
                  	</div>
                    <div class="form-group col-md-6 ">
                      <label for="pasal">Melanggar Pasal</label>
                      <textarea id="pasal" class="form-control form-control-danger" name="pasal" ></textarea>
                      <label id="confirm_password-error" class="error mt-2 text-danger pasal" for="confirm_password"></label>
                    </div>
                    <div class="form-group col-md-6 ">
                      <label for="uraian">Uraian Kasus</label>
                      <textarea id="uraian" class="form-control form-control-danger" name="uraian" type="text"></textarea>
                      <label id="email-error" class="error mt-2 text-danger uraian" for="email"></label> 
                  	</div>
                  	<div class="form-group col-md-6">
                      <label for="nolp">No lp</label>
                      <input id="nolp" class="form-control form-control-danger" name="nolp" type="text" ><label id="firstname-error" class="error mt-2 text-danger nolp" for="firstname"></label> 
                 	</div>
                 	<div class="form-group col-md-6">
                      <label for="tgl_lp">Tanggal LP</label>
                      <div id="datepicker-popupss" class="input-group date datepickers">
	                          <input type="text" name="tgl_lp" id="tgl_lp" class="form-control" value="{{date('Y-m-d')}}" readonly="">
	                          <span class="input-group-addon input-group-append border-left">
	                            <span class="mdi mdi-calendar input-group-text"></span>
	                          </span>
	                      </div>
                        <label id="lastname-error" class="error mt-2 text-danger tgl_lp" for="lastname"></label>
                 	</div>
                   	 <button class="btn btn-primary col-md-12" type="button" onclick="simpanSpdp()">Simpan</button>
                  </div>	
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-tersangka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" name="saveTersangka" id="saveTersangka" onsubmit="event.preventDefault();tambahTersangka()" enctype="multipart/form-data">
		@csrf
		 <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Tambah Tersangka</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body row">
		       	<div class="form-group col-md-6 ">
		       		<input type="hidden" name="id" id="id">
		       		<label>Status</label>
		       		<select class="form-control" name="status" id="status">
		       			<option value="Anak - Anak">Anak - Anak</option>
						<option value="Dewasa">Dewasa</option>
						<option value="Lansia">Lansia</option>
					 </select>
					 <label id="firstname-error" class="error mt-2 text-danger status" ></label>
		       	</div>
		       	<div class="form-group col-md-6">
		       		<label>Nama</label>
		       		<input type="text" class="form-control" name="nama" id="nama">
		       		 <label id="firstname-error" class="error mt-2 text-danger nama" ></label>
		       	</div>
		       	<div class="form-group col-md-6">
		       		<label>Tempat Lahir</label>
		       		<input type="text" class="form-control" name="tempat" id="tempat">
		       		 <label id="firstname-error" class="error mt-2 text-danger tempat" ></label>
		       	</div>
		       	<div class="form-group col-md-6">
		       		<label>Umur/tanggal Lahir</label>
		       		<input type="text" class="form-control" name="umur" id="umur">
		       		 <label id="firstname-error" class="error mt-2 text-danger umur" ></label>
		       	</div>
		       	<div class="form-group col-md-6">
		       		<div class="row">
		       			  <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
		                    <div class="col-sm-">
		                      <div class="form-radio">
		                        <label class="form-check-label">
		                          <input type="radio" class="form-check-input" name="kelamin" id="laki" value="1" checked=""> Laki-Laki <i class="input-helper"></i><i class="input-helper"></i></label>
		                      </div>
		                    </div>
		                    <div class="col-sm-5">
		                      <div class="form-radio">
		                        <label class="form-check-label">
		                          <input type="radio" class="form-check-input" name="kelamin" id="perempuan" value="2"> Perempuan <i class="input-helper"></i><i class="input-helper"></i></label>
		                      </div>
		                    </div>
		       		</div>
                  </div>
                  <div class="form-group col-md-6">
		       		<label>Kewarganegaraan</label>
		       		<input type="text" class="form-control" name="warga" id="warga">
		       		 <label id="firstname-error" class="error mt-2 text-danger warga" ></label>
		       	</div>
		       	<div class="form-group col-md-6">
		       		<label>Tempat Tinggal</label>
		       		<input type="text" class="form-control" name="tempat" id="tempat">
		       		 <label id="firstname-error" class="error mt-2 text-danger tempat" ></label>
		       	</div>
		       	<div class="form-group col-md-6 ">
		       		<label>Agama</label>
		       		<select class="form-control" name="agama" id="agama">
		       			<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Katholik">Katholik</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
						<option value="Kong hu chu">Kong hu chu</option>
					 </select>
					 <label id="firstname-error" class="error mt-2 text-danger agama" ></label>
		       	</div>
		       	 <div class="form-group col-md-6">
		       		<label>Pekerjaan</label>
		       		<input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
		       		 <label id="firstname-error" class="error mt-2 text-danger pekerjaan" ></label>
		       	</div>
		       	 <div class="form-group col-md-6">
		       		<label>Pendidikan</label>
		       		<input type="text" class="form-control" name="pendidikan" id="pendidikan">
		       		 <label id="firstname-error" class="error mt-2 text-danger pendidikan" ></label>
		       	</div>
		       	<div class="form-group col-md-6">
                    <label>Foto Tersangka</label>
                    <input type="file" name="img" id="img" class="form-control">
                 </div>
                 <div class="form-group col-md-6">
		       		<label>Lain - Lain</label>
		       		<input type="text" class="form-control" name="lain" id="lain">
		       		 <label id="firstname-error" class="error mt-2 text-danger lain" ></label>
		       	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary btn-simpan " id="btn-simpan-tersangka" onclick="tambahTersangka()">Simpan</button>
		      </div>
		    </div>
		  </div>
	</form>
</div>
@stop
@section('footer')
<script src="{{asset('asset')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
	function hapusvalidasi(key) 
	{
		let pesan=$('#'+key).parent();
		let text=$('.'+key);
		pesan.removeClass('has-danger'); 
		text.text(null);
	}	
	function simpanSpdp()
	{
		let form=$('#saveSpdp')[0];
		let formData=new FormData(form);
		$.ajax({
			 url : "{{route('simpan.spdp')}}",
		      method:'POST',
		      headers: {
		       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
		      data :formData,
		      cache: false,
		      contentType: false,
		      processData: false,
		      dataType:'JSON',
		       beforeSend: function () {
		        loading();
		      },
		      success:function(data) {
		      	matikanLoading();
		      	if ($.isEmptyObject(data.errors)) {
			      	 $.each(data.success,function(key){
		                hapusvalidasi(key);
		              });
	               swal({
						  title: "Anda Telah berhasil menambahkan Spdp ",
						  text: "apa anda ingin ke halaman data spdp ?",
						  icon: "warning",
						  buttons: true,
						  dangerMode: true,
						})
						.then((willDelete) => {
						  if (willDelete) {
							location.href="{{url('spdp')}}";			  
							}
						  else {
						    swal("Silahkan isi data spdp");
						    $('#tersangka-input').children().remove();		
						  }
						});
	                form.reset();

		      	}
		      	else{
		      		$.each(data.errors, function (key, value) {
		      		console.log(key+'.'+ value)
		            hapusvalidasi(key);
		            let pesan = $(`#`+key).parent();
		            let text= $('.'+key);
		            pesan.addClass('has-danger');
		            text.text(value);

		          });
	           		swal({
		                title: "Pesan!",
		                text: "dimohon untuk mengisi data dengan benar !",
		                icon: "error",
		                });
			      	}
		      },
		       error:function() {
		      	matikanLoading();
		      	alert('terdapat masalah diserver');
		      }
		})
	}
	function tambahTersangka()
	{
		let form=$('#saveTersangka')[0];
		let formData=new FormData(form);
		$.ajax({
			 url : "{{route('simpan.tersangka')}}",
		      method:'POST',
		      headers: {
		       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        },
		      data :formData,
		      cache: false,
		      contentType: false,
		      processData: false,
		      dataType:'JSON',
		       beforeSend: function () {
		        loading();
		      },
		      success:function(data) {
		      	matikanLoading();
		      	if ($.isEmptyObject(data.errors)) {
			      	 $.each(data.success,function(key){
		                hapusvalidasi(key);
		              });
	                swal({
	                    title: "Pesan!",
	                    text: "Anda Telah Berhasil menyimpan Jenis Tersangka !",
	                    icon: "success",
	                });
	                form.reset();
	                $('#modal-tersangka').modal('hide');
	                $('#tersangka-input').prepend(
	                	`<div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="${data.nama}">
                            <input type="hidden" name="tersangka[]" value="${data.id}"/> 
                            <button type="button" class=" btn btn-danger btn-sm btn-hapus-tersangka" data-id="${data.id}"><i class="fa fa-trash"></i></button>
                          </div>`
	                	);
		      	}
		      	else{
		      		$.each(data.errors, function (key, value) {
		      		console.log(key+'.'+ value)
		            hapusvalidasi(key);
		            let pesan = $(`#`+key).parent();
		            let text= $('.'+key);
		            pesan.addClass('has-danger');
		            text.text(value);

		          });
	           		swal({
		                title: "Pesan!",
		                text: "dimohon untuk mengisi data dengan benar !",
		                icon: "error",
		                });
			      	}
		      },
		      error:function() {
		      	matikanLoading();
		      	alert('terdapat masalah diserver');
		      }
		})
}
	$(document).ready(function(){
	 $('#datepicker-popup').datepicker({
	      enableOnReadonly: true,
	      todayHighlight: true,
	      format: 'yyyy-mm-dd'
	 });
	 $('#datepicker-popups').datepicker({
	      enableOnReadonly: true,
	      todayHighlight: true,
	      format: 'yyyy-mm-dd'
	 });
	 $('#btn-modal-tersangka').click(function(){
	 	$('#modal-tersangka').modal({backdrop:'static'})
	 });

	 $('body').on('click','.btn-hapus-tersangka',function(){
	 	let id = $(this).data('id');
	 	let self = $(this);
		swal({
		  title: "Anda Yakin ?",
		  text: "anda akan menghapus data tersangka!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	fetch(`{{url("hapus/tersangka/")}}/${id}`,{
		  		method:"GET",
		  		headers : {
					'Content-type' : 'application/json'
				},
		  	})
		  	.then((res) => {
		  		loading();
		  		 res.json()
		  	})
		  	.then((data) => {
		  		console.log(self)
		  		setTimeout(function(){
			  		matikanLoading();
			  		swal("Data Telah terhapus");
			  		self.parent().remove();	
			  	},1000);

		  	});
		  } else {
		    swal("Anda telah membatalkan menghapus data");
		  }
		});
	 });

	  $('.cari').select2({
	    placeholder: 'Cari Sesuai Nama Perkara ',
	    ajax: {
	      url: '{{url("cari/perkara")}}',
	      dataType: 'json',
	      delay: 250,
	       data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
	      processResults: function (data) {
	        return {
	          results:  $.map(data, function (item) {
	            return {
	              text: item.kategori+'-'+item.nama_perkara,
	              id: item.id
	            }
         	 })
	        };
	      },
	      cache: true
	    }
	  });
	})
</script>
@endsection