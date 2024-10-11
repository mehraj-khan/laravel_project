
<form action="{{ route('ava_store') }}" method="POST">
 @csrf 

    <!-- <label for="doctor">Select Doctor:</label>
    <select name="doctor_id" id="doctor" required>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
        @endforeach
    </select> -->

    <!-- <label for="type">Select Availability Type:</label>
    <select name="type" id="type" required>
        <option value="day">Day</option>
        <option value="week">Week</option>
        <option value="month">Month</option>
    </select> -->

<label for="days">Select Available </label><br>
    <input type="checkbox" name="days[]" value="Monday"> Monday<br>
    <input type="checkbox" name="days[]" value="Tuesday"> Tuesday<br>
    <input type="checkbox" name="days[]" value="Wednesday"> Wednesday<br>
    <input type="checkbox" name="days[]" value="Thursday"> Thursday<br>
    <input type="checkbox" name="days[]" value="Friday"> Friday<br>
    <input t    ype="checkbox" name="days[]" value="Saturday"> Saturday<br>
    <input type="checkbox" name="days[]" value="Sunday"> Sunday<br>

    <label for="date_from">From (optional):</label>
    <input type="time" name="start_time" value="{{ old('start_time')" id="start_time">

    <label for="date_to">To (optional):</label>
    <input type="time" value="{{ old('end_time')" name="end_time" id="end_time">
    
    <label for="location">(location):</label>
    <input type="text" :value="{{ old('location')" name="location" id="location">

    <button type="submit">Update Availability</button>
</form>

