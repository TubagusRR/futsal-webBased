<div class="panel panel-default">
    <div class="panel-heading">Edit Data Lapangan</div>

    <div class="panel-body"> 
       
        <form action="{{ route('item.update', $item->id) }}" method="post">
            {{csrf_field()}}    
            {{ method_field('PUT') }} method
            <div class="form-group">
                <label>Kode Lapangan : </label>
                <input type="text" name="kd_lapangan" class="form-control" required value="{{$item->kd_lapangan}}" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Nama Lapangan : </label>
                <input type="text" name="nama_lapangan" class="form-control" required value="{{$item->nama_lapangan}}">
            </div>
            <div class="form-group">
                <label>Jenis : </label>
                <select name="jenis_lapangan" class="form-control">
                <option value="{{ $item->jenis_lapangan }}" selected->{{$item->jenis_lapangan}}</option>
                    <option value="vinyl">vinyl</option>
                    <option value="parquette">parquette</option>
                    <option value="teraflex">teraflex</option>
                    <option value="karet plastik">Karet Plastik</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga : </label>
                <input type="number" name="harga" class="form-control" required value="{{$item->harga}}">
            </div>
            <p></p>
        <div class="float-right">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="submit" class="btn btn-link">Reset</button>
        </div>
        </form>
    </div>
</div>