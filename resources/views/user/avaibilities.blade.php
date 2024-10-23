<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.css')
</head>
<style>
    /* General Styling for the Form Section */
.container.mt-4 {
    max-width: 800px;
    margin: 50px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

/* Header Styling */
h2 {
    font-size: 28px;
    color: #007bff;
    margin-bottom: 30px;
    text-align: center;
    font-weight: 600;
}

/* Label Styling */
label {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
    display: block;
}

/* Doctor Selection Dropdown Styling */
select.form-control {
    padding: 12px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ced4da;
    margin-bottom: 20px;
    transition: border-color 0.3s;
    background-color: #fff;
}

/* Focus Styling for Dropdown */
select.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
}

/* Table Styling */
table.table-bordered {
    width: 100%;
    margin-top: 30px;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

table.table-bordered th, table.table-bordered td {
    padding: 12px;
    text-align: center;
    border: 1px solid #dee2e6;
}

table.table-bordered th {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
}

table.table-bordered tbody tr:hover {
    background-color: #f1f3f5;
}

table.table-bordered td {
    background-color: #ffffff;
    color: #333;
}

/* Mobile Responsive */
@media screen and (max-width: 768px) {
    .container.mt-4 {
        padding: 20px;
    }

    table.table-bordered th, table.table-bordered td {
        font-size: 14px;
        padding: 10px;
    }

    h2 {
        font-size: 24px;
    }
}

</style>

<body>
    @include('user.navbar')

    <!-- Availabilities Section -->
    <div class="container mt-4">
        <h2>Doctor Availabilities</h2>

        <!-- Doctor Selection Dropdown -->
        <label for="doctor">Select Doctor:</label>
<select name="doctor_id" id="doctorSelect" required class="form-control">
    <option value="">Select a Doctor</option>
    @foreach($doctors as $doctor)
        <option value="{{ $doctor->id }}">
            {{ $doctor->name }}
        </option>
    @endforeach
</select>

        <!-- Availability Details -->
        <div class="mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Doctor Name</th>
                        <th>Location</th>
                        <th>Days</th>
                        <th>Available From</th>
                        <th>Available Until</th>
                    </tr>
                </thead>
                <tbody id="availabilityTableBody">
                    <!-- Availability records will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>

    @include('user.footer')
    @include('user.js')

    <!-- JavaScript to dynamically update availability information -->
    <script>
        var availabilities = @json($availabilities); // Pass PHP availabilities to JavaScript

        document.getElementById('doctorSelect').addEventListener('change', function() {
            var selectedDoctorId = this.value;

            // Clear the table body
            var tableBody = document.getElementById('availabilityTableBody');
            tableBody.innerHTML = '';

            // Filter availabilities for the selected doctor
            var filteredAvailabilities = availabilities.filter(function(availability) {
                return availability.doctor && availability.doctor.id == selectedDoctorId;
            });

            // Populate the table with the filtered availabilities
            filteredAvailabilities.forEach(function(availability) {
                var row = `
                    <tr>
                        <td>${availability.doctor.name}</td>
                        <td>${availability.location || 'N/A'}</td>
                        <td>${availability.days || 'N/A'}</td>
                        <td>${availability.start_time || 'N/A'}</td>
                        <td>${availability.end_time || 'N/A'}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        });
    </script>
</body>

</html>
