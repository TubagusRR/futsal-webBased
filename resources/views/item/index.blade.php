	@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if (Request::is('item'))
        		@include('item.create')
        	@else
        		@include('item.edit')
            @endif
            <div class="panel panel-default">
            	<div class="panel-heading">Item List</div>
            	<div class="panel-body">
            		<table class="table table-bordered" id="datatables">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Kode Lapangan</th>
            					<th>Nama Lapangan</th>
            					<th>Jenis</th>
            					<th>Harga</th>
            					<th>Aksi</th>	
            				</tr>
            			</thead>
            			<tbody>
            			@foreach($items as $r)
            				<tr>
            					<td>{{ $loop->iteration }}</td>
            					<td>{{ $r->kd_lapangan }}</td>
            					<td>{{ $r->nama_lapangan }}</td>
            					<td>{{ $r->jenis_lapangan }}</td>
            					<td>{{ $r->harga }}</td>
            					<td>
            						<div class="btn-group">
	            						<a href="{{ route('item.edit',$r->id) }}" class="btn btn-link">Edit</a>
		            					<form action="{{route('item.destroy', $r->id)}}" method="post">
		            						{{csrf_field()}}
		            						{{ method_field('DELETE') }}

		            						<button type="submit" class="btn btn-link" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">Delete</button>
		            					</form>
            						</div>
            					</td>
            				</tr>
            			@endforeach
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
