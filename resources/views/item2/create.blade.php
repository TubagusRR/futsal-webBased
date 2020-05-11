@extends('layouts.app')
@section('content')
<div class="container">
    <div class="panel-heading">Input Data Transaksi</div>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="panel-body">
<?php
    echo " " . date("d/m/Y h:i:");
 
    $con = mysqli_connect("localhost","root","","db_ujikelayakan");
    $query = "SELECT max(kd_booking) as maxKode FROM transaksis";
    $hasil = mysqli_query($con, $query);
    $data  = mysqli_fetch_array($hasil);
    $kodeBarang = $data['maxKode'];
    $noUrut = (int) substr($kodeBarang, 3, 3);
    $noUrut++;
    $char = "TR";
    $newID = $char . sprintf("%03s", $noUrut);
?>

         <form action="/transaksi" method="post">     
        {{csrf_field()}}
        <div class="form-group">
            <label>Kode Booking</label>
            <input type="text" name="kd_booking" value="<?php echo $newID;?>" class="form-control" required readonly="readonly">
        </div>
        <div class="form-group">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Penyewa</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <label>Pilih Lapangan</label>  
    			<?php $jsArray = "var prdName = new Array();"; ?>
            <select onchange="document.getElementById('a').value = prdName[this.value];" class="form-control" name="lapangan">
                <option disabled selected name="lapangan">Choose</option>
                @foreach($r as $data)
                <option>{{$data->nama_lapangan}}</option>
                <?php
                $jsArray .= "prdName['".$data->nama_lapangan."'] = '".addslashes($data->harga)."'; ";
                ?>
                @endforeach
            </select>
            <tr>
                <td></td>
            </tr>
            <script>function kurang(){
            var b1 = parseFloat(document.getElementById('lama_sewa').value);
            var b2 = parseFloat(document.getElementById('a').value);
            var b3 = b1 * b2;
            document.getElementById("total").value = b3;
            var b5 = parseFloat(document.getElementById('bayar').value);
            var b7 = b5 - b3;
            document.getElementById("kembalian2").value = b7;
            document.getElementById("kembalian").value = b7;
    }</script>
        <label>Harga</label>
        
        <input type="text" name="harga" class="form-control" id="a" readonly="readonly">
            <script type="text/javascript">
            <?php echo $jsArray; ?>
            </script>
        <div class="form-group">
            <label>Lama Sewa</label>
            <input type="text" name="lama_sewa" class="form-control" id="lama_sewa"  onkeyup="kurang();"required placeholder="Durasi per Jam">
            
        </div>
        <div class="form-group">
            <label>Total</label>
            <input type="text" name="total" class="form-control" id="total" readonly="readonly" >
        </div> 
        <div class="form-group">
            <label>Bayar</label>
            <input type="text" name="bayar" id="bayar" onkeyup="kurang();" placeholder="" class="form-control" min="0">
        </div> 
        <div class="form-group">
            <label>Kembalian</label>
            <input type="number" class="form-control" id="kembalian2" required min="0" disabled>
            <input type="hidden" name="kembalian" class="form-control" id="kembalian" required min="0">
        </div> 
        <button class="btn btn-primary" type="submit">Simpan Data</button>               
        </form>  
    </div>   
</div>

@if (Session::has('message'))
    <script>alert("{{ Session::get('message') }}")</script>
@endif

@endsection