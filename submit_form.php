<?php
session_start();
include 'config.php'; // Database connection

$is_pwd = false;
$pwd = $_POST['physicallyDisabled'];
if ($pwd == 'Yes') {
    $is_pwd = true;
}

// $cgpa = $_POST['obtainedCgpa'];
// echo $cgpa;
// die();
$percentage = $_POST['percentage'];
$category = $_POST['category'];
$min_percentage = 60;
$min_subject_percentage = 60;
switch($category) {
    case 'OBC-A':
    case 'OBC-B':
        $min_percentage = 55;
        $min_subject_percentage = 55;
        break;
    case 'SC':
    case 'ST':
        $min_percentage = 45;
        $min_subject_percentage = 45;
        break;
    default:
        $min_percentage = 60;
        $min_subject_percentage = 60;
}

if ($is_pwd) {
    $min_percentage = 40;
    $min_subject_percentage = 40;
}

$total = $_POST['total'];
$grand_total = $_POST['grandTotal'];

if ($percentage < $min_percentage) {
    echo "<div style='text-align: center; padding: 50px;'>
            <img src='error_image.png' alt='Error' style='width: 100px;'>
            <h2>You are not eligible for this course! Please check eligibility criteria...</h2>
          </div>";
    header("refresh:8;url=index.php");
    exit();
}

$faculty = $_POST['faculty']; // Faculty (Engineering, Science, etc.)

if($faculty === 'Engineering & Technology' || $faculty === 'Science' || $faculty === 'Pharmaceutical Technology') {
    $physics = $_POST['physicsMarks'];
    $chemistry = $_POST['chemistryMarks'];
    $math = $_POST['mathMarks'];
    $subject_sum = ($physics + $chemistry + $math)/3;
    if ($subject_sum < $min_subject_percentage) {
        echo "<div style='text-align: center; padding: 50px;'>
                <img src='error_image.png' alt='Error' style='width: 100px;'>
                <h2>You are not eligible for this course! Please check eligibility criteria...</h2>
              </div>";
        header("refresh:8;url=index.php");
        exit();
    }
} elseif ($faculty === 'Arts') {
    $first_language = $_POST['firstLanguageMarks'];
    $second_language = $_POST['secondLanguageMarks'];
    $subject_sum = ($first_language + $second_language)/2;
    if ($subject_sum < $min_subject_percentage) {
        echo "<div style='text-align: center; padding: 50px;'>
                <img src='error_image.png' alt='Error' style='width: 100px;'>
                <h2>You are not eligible for this course! Please check eligibility criteria...</h2>
              </div>";
        header("refresh:8;url=index.php");
        exit();
    }
}

$course_id = $_POST['course'];

// Fetch the program level from the courses table
$sql_course = "SELECT program_level FROM courses WHERE course_id = '$course_id'";
$course_result = mysqli_query($con, $sql_course);
$course_row = mysqli_fetch_assoc($course_result);
$program_level = $course_row['program_level'];

if ($program_level === 'PG') {
    $cgpa = $_POST['obtainedCgpa'];
    if ($cgpa < 7.0) {
        echo "<div style='text-align: center; padding: 50px;'>
                <img src='error_image.png' alt='Error' style='width: 100px;'>
                <h2>You are not eligible for this course! Please check eligibility criteria...</h2>
              </div>";
        header("refresh:8;url=index.php");
        exit();
    }
}

$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$faculty_id    = $_POST['faculty_id'];
$department_id = $_POST['department_id'];

function generateAdmissionID($con, $table, $prefix) {
    // Query to find the last admission_id starting with the given prefix
    $last_id_query = "SELECT admission_id FROM `$table` WHERE admission_id LIKE '$prefix%' ORDER BY admission_id DESC LIMIT 1";
    $last_id_result = mysqli_query($con, $last_id_query);
    $last_id_row = mysqli_fetch_assoc($last_id_result);

    if ($last_id_row) {
        $last_admission_id = $last_id_row['admission_id'];

        // Extract the numeric part and increment it
        $numeric_part = intval(substr($last_admission_id, strlen($prefix))); // Skip the prefix part
        $new_numeric_part = str_pad($numeric_part + 1, 6, '0', STR_PAD_LEFT);
    } else {
        // If no IDs exist with the given prefix, start with the initial ID
        $new_numeric_part = str_pad(1, 6, '0', STR_PAD_LEFT);
    }

    // Create the new admission ID
    $admission_id = $prefix . $new_numeric_part;
    return $admission_id;
}

if($faculty === 'Engineering & Technology') {
    if ($program_level === 'UG') {
        $wbjeeScore = $_POST['wbjeeScore'];
        $wbjeeGmr = $_POST['wbjeeGmr'];
        $wbjeeCategoryRank = $_POST['wbjeeCategoryRank'];
        // Create the new admission ID
        $prefix = 'UGET';
        $admission_id = generateAdmissionID($con, 'engineering_admissions', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `engineering_ug_admission` (
                    `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
                    `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
                    `program_level`, `wbjee_score`, `wbjee_gmr`, `category_gmr`,  `physics_marks`,
                    `chemistry_marks`, `math_marks`, `total_marks`, `grand_total`, `percentage`
                ) VALUES (
                    '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
                    '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
                    '$program_level', '$wbjeeScore', '$wbjeeGmr', '$wbjeeCategoryRank', '$physics', 
                    '$chemistry', '$math', '$total', '$grand_total', '$percentage'
                )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    elseif ($program_level === 'PG') {
        $gateScore = $_POST['gateScore'];
        $gateRank = $_POST['gateRank'];
        // Fetch the last admission ID from the database
        $prefix = 'PGET';
        $admission_id = generateAdmissionID($con, 'engineering_pg_admission', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `engineering_pg_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`, `gate_score`, `gate_rank`, `obtained_cgpa`, `total_cgpa`, 
            `physics_marks`, `chemistry_marks`, `math_marks`, `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$gateScore', '$gateRank', '$cgpa', '10', 
            '$physics', '$chemistry', '$math', '$total', '$grand_total', '$percentage'
        )";


        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
elseif ($faculty === 'Science') {
    if ($program_level === 'UG') {
        // Fetch the last admission ID from the database
        $prefix = 'UGSC';
        $admission_id = generateAdmissionID($con, 'science_ug_admission', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `science_ug_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`,  `physics_marks`,`chemistry_marks`, `math_marks`,
            `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$physics', '$chemistry', '$math', '$total', '$grand_total',
            '$percentage'
        )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    elseif($program_level === 'PG') {
        // Fetch the last admission ID from the database
        $prefix = 'PGSC';
        $admission_id = generateAdmissionID($con, 'science_pg_admission', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `science_pg_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`, `obtained_cgpa`, `total_cgpa`, `physics_marks`,
            `chemistry_marks`, `math_marks`, `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$cgpa', '10', '$physics', '$chemistry', '$math', '$total',
            '$grand_total', '$percentage'
        )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
elseif ($faculty === 'Pharmaceutical Technology') {
    if ($program_level === 'UG') {
        $wbjeeScore = $_POST['wbjeeScore'];
        $wbjeeGmr = $_POST['wbjeeGmr'];
        $wbjeeCategoryRank = $_POST['wbjeeCategoryRank'];
        // Fetch the last admission ID from the database
        $prefix = 'UGPT';
        $admission_id = generateAdmissionID($con, 'pharmaceutical_ug_admission', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `pharmaceutical_ug_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`, `wbjee_score`, `wbjee_gmr`, `category_gmr`,  `physics_marks`,
            `chemistry_marks`, `math_marks`, `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$wbjeeScore', '$wbjeeGmr', '$wbjeeCategoryRank', '$physics', 
            '$chemistry', '$math', '$total', '$grand_total', '$percentage'
        )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    elseif ($program_level === 'PG') {
        $gpatScore = $_POST['gpatScore'];
        $gpatRank = $_POST['gpatRank'];
        // Fetch the last admission ID from the database
        $prefix = 'PGPT';
        $admission_id = generateAdmissionID($con, 'pharmaceutical_ug_admission', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `pharmaceutical_pg_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`, `gpat_score`, `gpat_rank`, `obtained_cgpa`, `total_cgpa`, 
            `physics_marks`, `chemistry_marks`, `math_marks`, `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$gpatScore', '$gpatRank', '$cgpa', '10', 
            '$physics', '$chemistry', '$math', '$total', '$grand_total', '$percentage'
        )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
elseif ($faculty === 'Arts') {
    if ($program_level === 'UG') {
        // Fetch the last admission ID from the database
        $prefix = 'UGAR';
        $admission_id = generateAdmissionID($con, 'arts_ug_admission', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `arts_ug_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`,  `first_language_marks`,`second_language_marks`,
            `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$first_language', '$second_language', '$total', '$grand_total',
            '$percentage'
        )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    elseif ($program_level === 'PG') {
        // Fetch the last admission ID from the database
        $prefix = 'PGAR';
        $admission_id = generateAdmissionID($con, 'arts_admissions', $prefix);

        // Insert the form data into the admissions table
        $sql = "INSERT INTO `science_pg_admission` (
            `admission_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `dob`, 
            `address`, `category`, `physically_disabled`, `faculty_id`, `department_id`, `course_id`, 
            `program_level`, `obtained_cgpa`, `total_cgpa`, `first_language_marks`,
            `second_language_marks`, `total_marks`, `grand_total`, `percentage`
        ) VALUES (
            '$admission_id', '$firstName', '$middleName', '$lastName', '$email', '$phone', '$dob', 
            '$address', '$category', '$pwd', '$faculty_id', '$department_id', '$course_id', 
            '$program_level', '$cgpa', '10', '$first_language', '$second_language', '$total',
            '$grand_total', '$percentage'
        )";

        if ($con->query($sql) === TRUE) {
            echo "<div style='text-align: center; padding: 50px;'>
                    <h2>Form submitted successfully!</h2>
                  </div>";
            header("refresh:5;url=index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>