@extends('layouts.adminapp')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-header">
			 <div class="float-right">		 
		    	<a href="{{url('tambah/spdp')}}" class="btn btn-primary" ><i class="fa fa-plus"></i> Tambah Spdp</a>
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
	              <th>Nomor</th>
	              <th>Tersangka</th>             
	              <th>Tanggal SPDP</th>
	              <th>Tanggal Terima</th>
	              <th>Jenis Perkara</th>
	              <th>Action</th>
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
@stop
@section('footer')
@endsection