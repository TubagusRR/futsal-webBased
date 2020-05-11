@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-8">List Penyewa</div>
					<div class="col-md-4"><?php echo " " . date("d/m/Y");?></div>
				</div>
			</div>
			<div class="panel-body">
				@auth
                    @if (Auth::user()->jabatan == "MANAGER")
                <form action="/export-laravel">
                <button type="submit" class="btn btn-primary">Cetak Excel</button>
					@endif
				@endauth
            		<table class="table table-bordered" id="datatables">
            			<thead>
            				<tr>
            					<th>No</th>
            					<th>Kode Booking</th>
                                <th>waktu</th>
            					<th>Nama</th>
            					<th>Lama Sewa</th>
            					<th>lapangan</th>
                                <th>harga</th>
								<th>total</th>
								<th>bayar</th>
								<th>kembalian</th>
            					
            				</tr>
            			</thead>
            			<tbody>
            			@foreach($items as $r)
            				<tr>
            					<td>{{ $loop->iteration }}</td>
            					<td>{{ $r->kd_booking }}</td>
            					<td>{{ $r->waktu }}</td>
            					<td>{{ $r->nama }}</td>
            					<td>{{ $r->lama_sewa}}</td>
                                <td>{{ $r->lapangan}}</td>
                                <td>{{ $r->harga}}</td>
								<td>{{ $r->total}}</td>
								<td>{{ $r->bayar}}</td>
								<td>{{ $r->kembalian}}</td>
            					
            				</tr>
            			@endforeach
            			</tbody>
            		</table>
                    </form>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection
