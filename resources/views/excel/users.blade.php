<table>
    <thead>
        <tr>
            <th><h1>Laporan Transaksi tanggal : <?php echo " " . date("d/m/Y");?></h1></th>
        </tr>
    </thead>
</table>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Booking</th>
            <th>waktu</th>
            <th>Nama</th>
            <th>Lapangan</th>
            <th>Harga</th>
            <th>Lama Sewa</th>
            <th>Total</th>
            <th>Bayar</th>
            <th>Kembalian</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach($users as $user)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $user->kd_booking }}</td>
                <td>{{ $user->waktu }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->lapangan }}</td>
                <td>{{ $user->harga }}</td>
                <td>{{ $user->lama_sewa }}</td>
                <td>{{ $user->total }}</td>
                <td>{{ $user->bayar }}</td>
                <td>{{ $user->kembalian }}</td>
            </tr>
            @endforeach
    </tbody>
</table>