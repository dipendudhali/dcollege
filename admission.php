<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Admission Form</h2>
        <form id="admissionForm" action="admission_2.php" method="post" onsubmit="return validateForm()">
            <div class="row mb-3">
                <!-- First Name Field -->
                <div class="col">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required>
                    <div id="firstNameError" class="text-danger"></div>
                </div>
                <!-- Middle Name Field -->
                <div class="col">
                    <label for="middleName" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Enter your middle name">
                    <div id="middleNameError" class="text-danger"></div>
                </div>
                <!-- Last Name Field -->
                <div class="col">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required>
                    <div id="lastNameError" class="text-danger"></div>
                </div>
            </div>
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                <div id="emailError" class="text-danger"></div>
            </div>
            <!-- Phone Number Field -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                <div id="phoneError" class="text-danger"></div>
            </div>
            <!-- Date of Birth Field -->
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
                <div id="dobError" class="text-danger"></div>
            </div>
            <!-- Address Field -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
                <div id="addressError" class="text-danger"></div>
            </div>
            <!-- Category Dropdown -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="">Select your category</option>
                    <option value="General">General</option>
                    <option value="OBC-A">OBC-A</option>
                    <option value="OBC-B">OBC-B</option>
                    <option value="SC">SC</option>
                    <option value="ST">ST</option>
                </select>
                <div id="categoryError" class="text-danger"></div>
            </div>
            <!-- Physically Disabled Field -->
            <div class="mb-3">
                <label for="physicallyDisabled" class="form-label">Physically Disabled</label>
                <select class="form-select" id="physicallyDisabled" name="physicallyDisabled" required>
                    <option value="">Select an option</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
                <div id="physicallyDisabledError" class="text-danger"></div>
            </div>
            <!-- Department Dropdown -->
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-select" id="department" name="department" required>
                    <option value="">Select your department</option>
                    <?php
                        // Fetch departments from the database
                        $sql = "SELECT * FROM departments";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['department_id'] . "'>" . $row['department_name'] . "</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation function
        function validateForm() {
            let isValid = true;

            // Validate first name
            const firstName = document.getElementById('firstName').value;
            if (firstName.trim() === '') {
                document.getElementById('firstNameError').innerText = 'First name is required';
                isValid = false;
            } else {
                document.getElementById('firstNameError').innerText = '';
            }

            // Validate last name
            const lastName = document.getElementById('lastName').value;
            if (lastName.trim() === '') {
                document.getElementById('lastNameError').innerText = 'Last name is required';
                isValid = false;
            } else {
                document.getElementById('lastNameError').innerText = '';
            }

            // Validate email
            const email = document.getElementById('email').value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                document.getElementById('emailError').innerText = 'Invalid email address';
                isValid = false;
            } else {
                document.getElementById('emailError').innerText = '';
            }

            // Validate phone number
            const phone = document.getElementById('phone').value;
            const phonePattern = /^\d{10}$/;
            if (!phonePattern.test(phone)) {
                document.getElementById('phoneError').innerText = 'Phone number must be 10 digits';
                isValid = false;
            } else {
                document.getElementById('phoneError').innerText = '';
            }

            // Validate date of birth
            const dob = document.getElementById('dob').value;
            if (dob.trim() === '') {
                document.getElementById('dobError').innerText = 'Date of birth is required';
                isValid = false;
            } else {
                document.getElementById('dobError').innerText = '';
            }

            // Validate address
            const address = document.getElementById('address').value;
            if (address.trim() === '') {
                document.getElementById('addressError').innerText = 'Address is required';
                isValid = false;
            } else {
                document.getElementById('addressError').innerText = '';
            }

            // Validate category
            const category = document.getElementById('category').value;
            if (category.trim() === '') {
                document.getElementById('categoryError').innerText = 'Category is required';
                isValid = false;
            } else {
                document.getElementById('categoryError').innerText = '';
            }

            // Validate physically disabled
            const physicallyDisabled = document.getElementById('physicallyDisabled').value;
            if (physicallyDisabled.trim() === '') {
                document.getElementById('physicallyDisabledError').innerText = 'This field is required';
                isValid = false;
            } else {
                document.getElementById('physicallyDisabledError').innerText = '';
            }

            return isValid;
        }
    </script>
</body>
</html>