<?php
include 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data from the previous form
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $department_id = $_POST['department'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    $physicallyDisabled = $_POST['physicallyDisabled'];

    // Fetch courses from the selected department
    $sql = "SELECT * FROM courses WHERE department_id = '$department_id'";
    $result = mysqli_query($con, $sql);

    // Fetch department name and faculty_id from the department table
    $dept_sql = "SELECT department_name, faculty_id FROM departments WHERE department_id = '$department_id'";
    $dept_result = mysqli_query($con, $dept_sql);
    $dept_row = mysqli_fetch_assoc($dept_result);
    $department_name = $dept_row['department_name'];
    $faculty_id = $dept_row['faculty_id'];

    // Fetch faculty name from the faculty table
    $faculty_sql = "SELECT faculty_name FROM faculties WHERE faculty_id = '$faculty_id'";
    $faculty_result = mysqli_query($con, $faculty_sql);
    $faculty_row = mysqli_fetch_assoc($faculty_result);
    $faculty_name = $faculty_row['faculty_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Entry Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Academic Details</h2>

        <form action="submit_form.php" method="post">
            <!-- Hidden inputs to pass previous form data -->
            <div class="row mb-3">
                <div class="col">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" readonly>
                </div>
                <div class="col">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo $middleName; ?>" readonly>
                </div>
                <div class="col">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" readonly><?php echo $address; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="physicallyDisabled" class="form-label">Physically Disabled</label>
                <input type="text" class="form-control" id="physicallyDisabled" name="physicallyDisabled" value="<?php echo $physicallyDisabled; ?>" readonly>
            </div>
            <input type="hidden" name="department_id" value="<?php echo $department_id; ?>">
            <input type="hidden" name="faculty" value="<?php echo $faculty_name; ?>">
            
            <input type="hidden" name="faculty_id" value="<?php echo $faculty_id; ?>">

            <div class="mb-3">
                <label for="departmentName" class="form-label">Department Name</label>
                <input type="text" class="form-control" id="departmentName" name="departmentName" value="<?php echo $department_name; ?>" readonly>
            </div>
            
            <!-- Department dropdown -->
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <select class="form-select" id="course" name="course" required>
                    <option value="">Select your Course</option>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value='" . $row['course_id'] . "' data-program-level='" . $row['program_level'] . "'>" . $row['course_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="programLevel" name="programLevel">

            <!-- WBJEE Fields -->
            <div id="wbjeeFields" class="border border-dark p-3 rounded mb-4 shadow-sm" style="display: none;">
                <h5 class="text-center mb-3">WBJEE Details</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="wbjeeScore" class="form-label">WBJEE Score</label>
                        <input type="number" class="form-control" id="wbjeeScore" name="wbjeeScore">
                    </div>
                    <div class="col">
                        <label for="wbjeeGmr" class="form-label">WBJEE GMR</label>
                        <input type="number" class="form-control" id="wbjeeGmr" name="wbjeeGmr">
                    </div>
                    <div class="col">
                        <label for="wbjeeCategoryRank" class="form-label">WBJEE Category Rank</label>
                        <input type="number" class="form-control" id="wbjeeCategoryRank" name="wbjeeCategoryRank">
                    </div>
                </div>
            </div>

            <!-- GATE Fields -->
            <div id="gateFields" class="border border-dark p-3 rounded mb-4 shadow-sm" style="display: none;">
                <h5 class="text-center mb-3">GATE Details</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="gateScore" class="form-label">GATE Score</label>
                        <input type="number" class="form-control" id="gateScore" name="gateScore">
                    </div>
                    <div class="col">
                        <label for="gateRank" class="form-label">GATE Rank</label>
                        <input type="number" class="form-control" id="gateRank" name="gateRank">
                    </div>
                </div>
            </div>

            <!-- GPAT Fields -->
            <div id="gpatFields" class="border border-dark p-3 rounded mb-4 shadow-sm" style="display: none;">
                <h5 class="text-center mb-3">GPAT Details</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="gpatScore" class="form-label">GPAT Score</label>
                        <input type="number" class="form-control" id="gpatScore" name="gpatScore">
                    </div>
                    <div class="col">
                        <label for="gpatRank" class="form-label">GPAT Rank</label>
                        <input type="number" class="form-control" id="gpatRank" name="gpatRank">
                    </div>
                </div>
            </div>

            <!-- CGPA Fields -->
            <div id="cgpaFields" class="border border-dark p-3 rounded mb-4 shadow-sm" style="display: none;">
                <h5 class="text-center mb-3">Graduation Details</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="obtainedCgpa" class="form-label">Obtained CGPA</label>
                        <input type="number" class="form-control" id="obtainedCgpa" name="obtainedCgpa" step="0.01">
                    </div>
                    <div class="col">
                        <label for="totalCgpa" class="form-label">Total CGPA</label>
                        <input type="number" class="form-control" id="totalCgpa" name="totalCgpa" step="0.01">
                    </div>
                </div>
            </div>
            
            <!-- Marks Fields -->
            <div id="marksFields" class="border border-dark p-3 rounded mb-4 shadow-sm">
                <h5 class="text-center mb-3">XII Details</h5>
                <div class="row mb-3" id="scienceMarks" style="display: none;">
                    <div class="col">
                        <label for="physicsMarks" class="form-label">Physics Marks</label>
                        <input type="number" class="form-control" id="physicsMarks" name="physicsMarks" required>
                    </div>
                    <div class="col">
                        <label for="chemistryMarks" class="form-label">Chemistry Marks</label>
                        <input type="number" class="form-control" id="chemistryMarks" name="chemistryMarks" required>
                    </div>
                    <div class="col">
                        <label for="mathMarks" class="form-label">Math Marks</label>
                        <input type="number" class="form-control" id="mathMarks" name="mathMarks" required>
                    </div>
                </div>
                <div class="row mb-3" id="artsMarks" style="display: none;">
                    <div class="col">
                        <label for="firstLanguageMarks" class="form-label">First Language Marks</label>
                        <input type="number" class="form-control" id="firstLanguageMarks" name="firstLanguageMarks">
                    </div>
                    <div class="col">
                        <label for="secondLanguageMarks" class="form-label">Second Language Marks</label>
                        <input type="number" class="form-control" id="secondLanguageMarks" name="secondLanguageMarks">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="total" class="form-label">Obtained Total</label>
                        <input type="number" class="form-control" id="total" name="total" required>
                    </div>
                    <div class="col">
                        <label for="grandTotal" class="form-label">Grand Total</label>
                        <input type="number" class="form-control" id="grandTotal" name="grandTotal" required>
                    </div>
                    <div class="col">
                        <label for="percentage" class="form-label">Percentage</label>
                        <input type="text" class="form-control" id="percentage" name="percentage" readonly>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3 md-3">Submit Marks</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Event listener for course selection change
        document.getElementById('course').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var programLevel = selectedOption.getAttribute('data-program-level');
            var wbjeeFields = document.getElementById('wbjeeFields');
            var gateFields = document.getElementById('gateFields');
            var gpatFields = document.getElementById('gpatFields');
            var cgpaFields = document.getElementById('cgpaFields');
            var scienceMarks = document.getElementById('scienceMarks');
            var artsMarks = document.getElementById('artsMarks');
            var facultyName = "<?php echo $faculty_name; ?>";
            
            // Show/hide fields based on faculty and program level
            if (facultyName === 'Engineering & Technology') {
                if (programLevel === 'UG') {
                    wbjeeFields.style.display = 'block';
                    gateFields.style.display = 'none';
                    gpatFields.style.display = 'none';
                    cgpaFields.style.display = 'none';
                } else if (programLevel === 'PG') {
                    wbjeeFields.style.display = 'none';
                    gateFields.style.display = 'block';
                    gpatFields.style.display = 'none';
                    cgpaFields.style.display = 'block';
                } else {
                    wbjeeFields.style.display = 'none';
                    gateFields.style.display = 'none';
                    gpatFields.style.display = 'none';
                    cgpaFields.style.display = 'none';
                }
                scienceMarks.style.display = 'flex';
                artsMarks.style.display = 'none';
            } else if (facultyName === 'Pharmaceutical Technology') {
                if (programLevel === 'UG') {
                    wbjeeFields.style.display = 'block';
                    gateFields.style.display = 'none';
                    gpatFields.style.display = 'none';
                    cgpaFields.style.display = 'none';
                } else if (programLevel === 'PG') {
                    wbjeeFields.style.display = 'none';
                    gateFields.style.display = 'none';
                    gpatFields.style.display = 'block';
                    cgpaFields.style.display = 'block';
                } else {
                    wbjeeFields.style.display = 'none';
                    gateFields.style.display = 'none';
                    gpatFields.style.display = 'none';
                    cgpaFields.style.display = 'none';
                }
                scienceMarks.style.display = 'flex';
                artsMarks.style.display = 'none';
            } else if (facultyName === 'Science') {
                wbjeeFields.style.display = 'none';
                gateFields.style.display = 'none';
                gpatFields.style.display = 'none';
                cgpaFields.style.display = (programLevel === 'PG') ? 'block' : 'none';
                scienceMarks.style.display = 'flex';
                artsMarks.style.display = 'none';
            } else if (facultyName === 'Arts') {
                wbjeeFields.style.display = 'none';
                gateFields.style.display = 'none';
                gpatFields.style.display = 'none';
                cgpaFields.style.display = (programLevel === 'PG') ? 'block' : 'none';
                scienceMarks.style.display = 'none';
                artsMarks.style.display = 'flex';
            } else {
                wbjeeFields.style.display = 'none';
                gateFields.style.display = 'none';
                gpatFields.style.display = 'none';
                cgpaFields.style.display = 'none';
                scienceMarks.style.display = 'flex';
                artsMarks.style.display = 'none';
            }
        });

        // Event listeners for total and grand total input fields to calculate percentage
        document.getElementById('total').addEventListener('input', calculatePercentage);
        document.getElementById('grandTotal').addEventListener('input', calculatePercentage);

        // Function to calculate percentage
        function calculatePercentage() {
            var total = parseFloat(document.getElementById('total').value);
            var grandTotal = parseFloat(document.getElementById('grandTotal').value);
            var percentageField = document.getElementById('percentage');

            if (!isNaN(total) && !isNaN(grandTotal) && grandTotal > 0) {
                var percentage = (total / grandTotal) * 100;
                percentageField.value = percentage.toFixed(2);
            } else {
                percentageField.value = '';
            }
        }

        // Form submission event listener for validation
        document.querySelector('form').addEventListener('submit', function(event) {
            var course = document.getElementById('course').value.trim();
            var wbjeeScore = document.getElementById('wbjeeScore').value.trim();
            var wbjeeGmr = document.getElementById('wbjeeGmr').value.trim();
            var gateScore = document.getElementById('gateScore').value.trim();
            var gateRank = document.getElementById('gateRank').value.trim();
            var gpatScore = document.getElementById('gpatScore').value.trim();
            var gpatRank = document.getElementById('gpatRank').value.trim();
            var obtainedCgpa = document.getElementById('obtainedCgpa').value.trim();
            var totalCgpa = document.getElementById('totalCgpa').value.trim();
            var physicsMarks = document.getElementById('physicsMarks').value.trim();
            var chemistryMarks = document.getElementById('chemistryMarks').value.trim();
            var mathMarks = document.getElementById('mathMarks').value.trim();
            var firstLanguageMarks = document.getElementById('firstLanguageMarks').value.trim();
            var secondLanguageMarks = document.getElementById('secondLanguageMarks').value.trim();
            var total = document.getElementById('total').value.trim();
            var grandTotal = document.getElementById('grandTotal').value.trim();
            
            // Flag to track validation status
            var isValid = true;

            // Validate course selection
            if (course === "") {
                alert("Please select a course.");
                isValid = false;
            }

            // Validate WBJEE fields if shown
            var wbjeeFields = document.getElementById('wbjeeFields').style.display;
            if (wbjeeFields === 'block' && (wbjeeScore === "" || wbjeeGmr === "")) {
                alert("Please fill in WBJEE details.");
                isValid = false;
            }

            // Validate GATE fields if shown
            var gateFields = document.getElementById('gateFields').style.display;
            if (gateFields === 'block' && (gateScore === "" || gateRank === "")) {
                alert("Please fill in GATE details.");
                isValid = false;
            }

            // Validate GPAT fields if shown
            var gpatFields = document.getElementById('gpatFields').style.display;
            if (gpatFields === 'block' && (gpatScore === "" || gpatRank === "")) {
                alert("Please fill in GPAT details.");
                isValid = false;
            }

            // Validate CGPA fields if shown
            var cgpaFields = document.getElementById('cgpaFields').style.display;
            if (cgpaFields === 'block' && (obtainedCgpa === "" || totalCgpa === "")) {
                alert("Please fill in CGPA details.");
                isValid = false;
            }

            // Validate Science Marks if shown
            var scienceMarks = document.getElementById('scienceMarks').style.display;
            if (scienceMarks === 'flex' && (physicsMarks === "" || chemistryMarks === "" || mathMarks === "")) {
                alert("Please fill in Science subject marks.");
                isValid = false;
            }

            // Validate Arts Marks if shown
            var artsMarks = document.getElementById('artsMarks').style.display;
            if (artsMarks === 'flex' && (firstLanguageMarks === "" || secondLanguageMarks === "")) {
                alert("Please fill in Arts subject marks.");
                isValid = false;
            }

            // Validate total and grand total
            if (total === "" || grandTotal === "") {
                alert("Please fill in the obtained total and grand total.");
                isValid = false;
            }

            // If any validation fails, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>