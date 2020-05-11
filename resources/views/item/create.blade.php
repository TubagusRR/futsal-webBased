<div class="panel panel-default">

    <div class="panel-heading">Input Data Lapangan</div>

    <div class="panel-body"> 
       
        <form action="{{ route('item.store') }}" method="post">
            {{csrf_field()}}
            <?php 
                    $con = mysqli_connect("localhost","root","","db_ujikelayakan");
                    $query = "SELECT max(kd_lapangan) as maxKode FROM items";
                    $hasil = mysqli_query($con, $query);
                    $data  = mysqli_fetch_array($hasil);
                    $kodeBarang = $data['maxKode'];
                    $noUrut = (int) substr($kodeBarang, 3, 3);
                    $noUrut++;
                    $char = "LP";
                    $newID = $char . sprintf("%03s", $noUrut);
            ?>
            <div class="form-group">
                <label>Kode Lapangan : </label>
                <input type="text" name="kd_lapangan" class="form-control" value="<?php echo $newID ?>"required readonly='readonly'>
            </div>
            <div class="form-group">
                <label>Nama Lapangan : </label>
                <input type="text" name="nama_lapangan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jenis : </label>
                <select name="jenis_lapangan" class="form-control">
                    <option value="vinyl">vinyl</option>
                    <option value="parquette">parquette</option>
                    <option value="teraflex">teraflex</option>
                    <option value="karet plastik">Karet Plastik</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga : </label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <p></p>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="submit" class="btn btn-link">Reset</button>
        </div>
        </form>
    </div>
</div>