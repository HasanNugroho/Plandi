<input type="hidden" value="{{$data->id}}" id="id_data" name="id">
<div class="form-group">
    <div class="text-center">
        <img src="{{ Storage::url($data->foto)}}" alt="Image Preview" style="width: 50%; height:auto;"
            id="preview">
    </div>
    <div class="custom-file mt-3">
        <input id="foto" class="custom-file-input" type="file" name="foto"
            onchange="loadFile(event)">
        <label for="my-input" class="custom-file-label" id="labelimg">Image</label>
    </div>
</div>
<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama"
        aria-describedby="nama" placeholder="Ahmad" value="{{$data->nama}}">
</div>
<div class="form-group">
    <label for="komentar">Komentar</label>
        <textarea class="form-control" id="komentar" name="komentar" value="{{$data->komentar}}">{{$data->komentar}}</textarea>
</div>