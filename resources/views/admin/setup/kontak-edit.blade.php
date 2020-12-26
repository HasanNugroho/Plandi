    <input type="hidden" value="{{$data->id}}" id="data_id" name="id">
    <div class="form-group">
        <label for="kontak">Kontak</label>
        <input type="text" class="form-control" id="kontak" value="{{$data->kontak}}" name="kontak"
            aria-describedby="con">
        <div id="con" class="form-text">Gunakan 62xxxxxxxx</div>
    </div>
    <div class="form-group">
        <label for="jenis" class="form-label">Jenis kontak</label>
        <select class="form-select" aria-label="Default select example" name="jenis_kontak">
            <option selected value="{{$data->jenis_kontak}}">{{$data->jenis_kontak}}</option>
                <option value="whatsapp">Whatsapp</option>
                <option value="sms">SMS</option>
                <option value="telephone">Telephone</option>
        </select>
    </div>
