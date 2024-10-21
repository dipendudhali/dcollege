<!DOCTYPE html>
<html>
<head>
	<title>Form Submission Confirmation</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<!-- Custom CSS -->
	<style>
		.form-data {
			display: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<header class="mb-5">
			<h1 class="text-center">Form Submission Confirmation</h1>
		</header>

		<main>
	<?php
			// Check if form is submitted
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// Retrieve form data
				$name = $_POST['name'];
				$photo = $_FILES['photo']['name'];
				$signature = $_FILES['signature']['name'];
				$adhar_card = $_POST['adhar'];
				$father_name = $_POST['father'];
				$mother_name = $_POST['mother'];
				$address = $_POST['address'];
				$madhyamik_obtained = $_POST['madhyamik_obtained'];
				$madhyamik_full = $_POST['madhyamik_full'];
				$madhyamik_percentage = $_POST['madhyamik_percentage'];
				$madhyamik_board = $_POST['madhyamik_board'];
				$hs_obtained = $_POST['hs_obtained'];
				$hs_full = $_POST['hs_full'];
				$hs_percentage = $_POST['hs_percentage'];
				$hs_board = $_POST['hs_board'];

				// Move uploaded files to uploads directory
				$uploads_dir = 'uploads/';
				move_uploaded_file($_FILES['photo']['tmp_name'], $uploads_dir . $photo);
				move_uploaded_file($_FILES['signature']['tmp_name'], $uploads_dir . $signature);

				// Generate confirmation page
				echo "<h2 class='mb-4'>Thank you for submitting the form!</h2>";
				echo "<p>Please review the information you submitted below:</p>";
				echo "<div class='row form-data'>";
				echo "<div class='col-md-6'>";
				echo "<p><strong>Name:</strong> $name</p>";
				echo "<p><strong>Photo:</strong> <a href='$uploads_dir$photo' target='_blank'>$photo</a></p>";
				echo "<p><strong>Signature:</strong> <a href='$uploads_dir$signature' target='_blank'>$signature</a></p>";
				echo "<p><strong>Adhar Card:</strong> $adhar_card</p>";
				echo "<p><strong>Father's Name:</strong> $father_name</p>";
				echo "<p><strong>Mother's Name:</strong> $mother_name</p>";
				echo "<p><strong>Address:</strong> $address</p>";
				echo "</div>";
				echo "<div class='col-md-6'>";
								echo "<table class='table'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>Exam</th>";
				echo "<th>Obtained Marks</th>";
				echo "<th>Full Marks</th>";
				echo "<th>Percentage</th>";
				echo "<th>Board Name</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				echo "<tr>";
				echo "<td>Madhyamik</td>";
				echo "<td>$madhyamik_obtained</td>";
				echo "<td>$madhyamik_full</td>";
				echo "<td>$madhyamik_percentage</td>";
				echo "<td>$madhyamik_board</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Higher Secondary</td>";
				echo "<td>$hs_obtained</td>";
				echo "<td>$hs_full</td>";
				echo "<td>$hs_percentage</td>";
				echo "<td>$hs_board</td>";
				echo "</tr>";
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
				echo "</div>";
				echo "<p class='mt-5'><a href='#' onclick='window.print()'>Click here to print this page</a></p>";
			}
			else {
				// Display form
				echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post' enctype='multipart/form-data'>";
				echo "<div class='mb-3'>";
				echo "<label for='name' class='form-label'>Name</label>";
				echo "<input type='text' class='form-control' id='name' name='name' required>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='photo' class='form-label'>Photo</label>";
				echo "<input type='file' class='form-control' id='photo' name='photo' accept='image/*' required>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='signature' class='form-label'>Signature</label>";
				echo "<input type='file' class='form-control' id='signature' name='signature' accept='image/*' required>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='adhar_card' class='form-label'>Adhar Card</label>";
				echo "<input type='text' class='form-control' id='adhar_card' name='adhar_card' required>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='father_name' class='form-label'>Father's Name</label>";
				echo "<input type='text' class='form-control' id='father_name' name='father_name' required>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='mother_name' class='form-label'>Mother's Name</label>";
				echo "<input type='text' class='form-control' id='mother_name' name='mother_name' required>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='address' class='form-label'>Address</label>";
				echo "<textarea class='form-control' id='address' name='address' required></textarea>";
				echo "</div>";
				echo "<div class='mb-3'>";
				echo "<label for='madhyamik_obtained' class='form-label'>Madhyamik Obtained Marks</label>";
				echo "<input type='number' class='form-control' id='madhyamik_obtained' name='madhyamik_obtained' required>";
				echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='madhyamik_full' class='form-label'>Madhyamik Full Marks</label>";
echo "<input type='number' class='form-control' id='madhyamik_full' name='madhyamik_full' required>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='madhyamik_percentage' class='form-label'>Madhyamik Percentage</label>";
echo "<input type='number' step='0.01' class='form-control' id='madhyamik_percentage' name='madhyamik_percentage' required>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='madhyamik_board' class='form-label'>Madhyamik Board Name</label>";
echo "<select class='form-select' id='madhyamik_board' name='madhyamik_board' required>";
echo "<option value=''>-- Select Board --</option>";
echo "<option value='WBBSE'>WBBSE</option>";
echo "<option value='CBSE'>CBSE</option>";
echo "<option value='ICSE'>ICSE</option>";
echo "</select>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='hs_obtained' class='form-label'>Higher Secondary Obtained Marks</label>";
echo "<input type='number' class='form-control' id='hs_obtained' name='hs_obtained' required>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='hs_full' class='form-label'>Higher Secondary Full Marks</label>";
echo "<input type='number' class='form-control' id='hs_full' name='hs_full' required>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='hs_percentage' class='form-label'>Higher Secondary Percentage</label>";
echo "<input type='number' step='0.01' class='form-control' id='hs_percentage' name='hs_percentage' required>";
echo "</div>";
echo "<div class='mb-3'>";
echo "<label for='hs_board' class='form-label'>Higher Secondary Board Name</label>";
echo "<select class='form-select' id='hs_board' name='hs_board' required>";
echo "<option value=''>-- Select Board --</option>";
echo "<option value='WBCHSE'>WBCHSE</option>";
echo "<option value='CBSE'>CBSE</option>";
echo "<option value='ISC'>ISC</option>";
echo "</select>";
echo "</div>";
echo "<button type='submit' class='btn btn-primary'>Submit</button>";
echo "</form>";
}

?>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

