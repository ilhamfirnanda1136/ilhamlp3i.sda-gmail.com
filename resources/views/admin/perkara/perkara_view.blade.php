@extends('layouts.adminapp')
@section('content')
<div class="content-wrapper">
<div class="card">
	<div class="card-header">
		 <div class="float-right">
		 	@if(Auth::user()->level==2)
	    	<button class="btn btn-primary" id="button-tambah"><i class="fa fa-plus"></i> Tambah Perkara</button>
	    	@endif
	    </div>
	</div>
  <div class="card-body">
    <h4 class="card-title">Tabel Jenis Perkara</h4>
    <div class="row">
      <div class="col-12 table-responsive">
        <table id="table-perkara" class="table table-striped table-hover responsive text-center">
          <thead>
            <tr>
              <th>No #</th>
              <th>Jenis Perkara</th>
              <th>Nama Perkara</th>
              @if(Auth::user()->level==2)
              <th>Actions</th>
              @endif
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-perkara" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form method="post" name="savePerkara" id="savePerkara" onsubmit="event.preventDefault();tambahPerkara()">
		@csrf
		 <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       	<div class="form-group ">
		       		<input type="hidden" name="id" id="id">
		       		<label>Kategori</label>
		       		<select class="form-control" name="kategori" id="kategori">
		       			<option value="OHARDA">OHARDA</option>
						<option value="KAMNEGTIMUB & TPUL">KAMNEGTIMUB & TPUL</option>
						<option value="NARKOTIKA">NARKOTIKA</option>
						<option value="TERORISME">TERORISME</option>
					 </select>
					 <label id="firstname-error" class="error mt-2 text-danger kategori" ></label>
		       	</div>
		       	<div class="form-group">
		       		<label>Nama Perkara</label>
		       		<input type="text" class="form-control" name="perkara" id="perkara">
		       		 <label id="firstname-error" class="error mt-2 text-danger perkara" ></label>
		       	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary btn-simpan " id="btn-simpan">Simpan</button>
		      </div>
		    </div>
		  </div>
	</form>
</div>
@stop
@section('footer')
<script type="text/javascript">
function hapusPerkara(self){
	let id = $(self).data('id');
	let url = $(self).data('url');
	swal({
	  title: "Are you sure?",
	  text: "Once deleted, you will not be able to recover this imaginary file!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	  	fetch(`{{url("hapus/perkara/")}}/${id}`,{
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
	  		setTimeout(function(){
		  		matikanLoading();
		  		 $('#table-perkara').DataTable().ajax.reload();
		  		swal("Data Telah terhapus");	
		  	},1000);
	  		
	  	});
	  } else {
	    swal("Anda telah membatalkan menghapus data");
	  }
	});
}
function hapusvalidasi(key) 
{
	let pesan=$('#'+key).parent();
	let text=$('.'+key);
	pesan.removeClass('has-danger'); 
	text.text(null);
}
function editPerkara()
{
	let form=$('#savePerkara')[0];
	let formData=new FormData(form);
	$.ajax({
		 url : "{{route('edit.simpan.perkara')}}",
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
                    text: "Anda Telah Berhasil mengubah Jenis Perkara !",
                    icon: "success",
                });
                form.reset();
              
                $('#table-perkara').DataTable().ajax.reload();
                $('#modal-perkara').modal('hide');
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
	})
}
function tambahPerkara()
{
	let form=$('#savePerkara')[0];
	let formData=new FormData(form);
	$.ajax({
		 url : "{{route('simpan.perkara')}}",
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
                    text: "Anda Telah Berhasil menyimpan Jenis Perkara !",
                    icon: "success",
                });
                form.reset();
                $('#table-perkara').DataTable().ajax.reload();
                $('#modal-perkara').modal('hide');
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
	})
}

	$(document).ready(function(){
		$('#table-perkara').DataTable({
		  responsive:true,
	      processing:true,
	      serverSide:true,
	      ajax:"{{route('table.perkara')}}",  
	       columns:[
	          {data:'DT_RowIndex',name:'id'},
	          {data:'kategori',name:'kategori'},
	          {data:'nama_perkara',name:'nama_perkara'},
	          @if(Auth::user()->level==2)
	          {data:'action',name:'action'},
	          @endif
	      ],
	       "order": [[ 0, "desc" ]], 
		});

		$('#button-tambah').click(function(){
			  $('#id').val('');
			$('.btn-simpan').attr('id','btn-simpan');
			$('.modal-title').text('Tambah Perkara');
			$('#modal-perkara').modal({backdrop:'static'});
		});
		$('body').on('click','#btn-simpan',function(){
			tambahPerkara();
		});
		$('body').on('click','#btn-simpan-edit',function(){
			editPerkara();
		});

		$('body').on('click','.btn-edit',function(){
			$('.btn-simpan').attr('id','btn-simpan-edit');
			$('.modal-title').text('Edit Perkara');
			$('#kategori').val($(this).data('kategori'));
			$('#perkara').val($(this).data('nama'));
			$('#id').val($(this).data('id'));
			$('#modal-perkara').modal({backdrop:'static'});
		});
	});
</script>
@endsection