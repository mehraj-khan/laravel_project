<form action="/avaibility_store" method="POST">
@csrf
 <label for="doctor">Select Doctor:</label>
    <select name="doctor_id" id="doctor" required>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select>

<label for="days">Select Available </label><br>
    <input type="checkbox" name="days[]" value="Monday"> Monday<br>
    <input type="checkbox" name="days[]" value="Tuesday"> Tuesday<br>
    <input type="checkbox" name="days[]" value="Wednesday"> Wednesday<br>
    <input type="checkbox" name="days[]" value="Thursday"> Thursday<br>
    <input type="checkbox" name="days[]" value="Friday"> Friday<br>
    <input type="checkbox" name="days[]" value="Saturday"> Saturday<br>
    <input type="checkbox" name="days[]" value="Sunday"> Sunday<br>

    <div class="form-group">
                    <label for="Phone">start time</label>
                    <input class="form-control border" placeholder="Eter start_time" value="{{old('start_time') }}" id="start_time" type="time" name="start_time" >
                    @if ($errors->has('start_time'))
                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                    @endif
                    <br>
                  </div>

                  <div class="form-group">
                    <label for="end_time">start time</label>
                    <input class="form-control border" placeholder="Eter end_time" value="{{old('end_time') }}" id="end_time" type="time" name="end_time" >
                    @if ($errors->has('end_time'))
                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                    @endif
                    <br>
                  </div>

    <div class="form-group">
                    <label for="Phone">location</label>
                    <input class="form-control border" placeholder="Eter your location" value="{{old('location') }}" id="location" type="text" name="location" >
                    @if ($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
                    @endif
                    <br>
                  </div>

                <button type="submit">Update Availability</button>

</form>
