<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-4">
    <form action="submit.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
      </div>
      <div class="mb-3">
        <label for="signature" class="form-label">Signature</label>
        <input type="file" class="form-control" id="signature" name="signature">
      </div>
      <div class="mb-3">
        <label for="adhar" class="form-label">Adhar Card</label>
        <input type="text" class="form-control" id="adhar" name="adhar">
      </div>
      <div class="mb-3">
        <label for="father" class="form-label">Father's Name</label>
        <input type="text" class="form-control" id="father" name="father">
      </div>
      <div class="mb-3">
        <label for="mother" class="form-label">Mother's Name</label>
        <input type="text" class="form-control" id="mother" name="mother">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address"></textarea>
      </div>
      <h3>Academic Qualification</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Exam Name</th>
            <th>Obtained Marks</th>
            <th>Full Marks</th>
            <th>Percentage</th>
            <th>Board Name</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Madhyamik</td>
            <td><input type="number" class="form-control" name="madhyamik_obtained"></td>
            <td><input type="number" class="form-control" name="madhyamik_full"></td>
            <td><input type="number" class="form-control" name="madhyamik_percentage"></td>
            <td>
<select class="form-select" name="madhyamik_board">
<option value="">--Select Board--</option>
<option value="WBBSE">WBBSE</option>
<option value="CBSE">CBSE</option>
<option value="ICSE">ICSE</option>
<option value="Other">Other</option>
</select>
</td>
</tr>
<tr>
<td>Higher Secondary</td>
<td><input type="number" class="form-control" name="hs_obtained"></td>
<td><input type="number" class="form-control" name="hs_full"></td>
<td><input type="number" class="form-control" name="hs_percentage"></td>
<td>
<select class="form-select" name="hs_board">
<option value="">--Select Board--</option>
<option value="WBCHSE">WBCHSE</option>
<option value="CBSE">CBSE</option>
<option value="ISC">ISC</option>
<option value="Other">Other</option>
</select>
</td>
</tr>
</tbody>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
