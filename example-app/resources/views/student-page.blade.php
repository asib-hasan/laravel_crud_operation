<!DOCTYPE html>
<html>
<head>
  <title>Student Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 1000px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    img {
      display: block;
      max-width: 200px;
      height: auto;
      margin: 0 auto;
      margin-bottom: 20px;
      border-radius: 10%;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      color: #555;
    }

    th {
      text-align: left;
    }

    .highlight {
      color: #e84a5f;
      font-weight: bold;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #e84a5f;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #c4293d;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Student Information</h1>
    <img src="{{ asset('uploads/students/'. $data->image)}}" alt="Student Photo">
    <table>
      <tr>
        <th>Name:</th>
        <td id="studentName"></td>
      </tr>
      <tr>
        <th>Gender:</th>
        <td id="studentGender"></td>
      </tr>
      <tr>
        <th>Father's Name:</th>
        <td id="fatherName"></td>
      </tr>
      <tr>
        <th>Mother's Name:</th>
        <td id="motherName"></td>
      </tr>
      <tr>
        <th>Date of Birth:</th>
        <td id="dateOfBirth"></td>
      </tr>
      <tr>
        <th>Class:</th>
        <td id="studentClass"></td>
      </tr>
      <tr>
        <th>Email:</th>
        <td id="studentEmail"></td>
      </tr>
      <tr>
        <th>Phone:</th>
        <td id="studentPhone"></td>
      </tr>
      <tr>
        <th>Blood Group:</th>
        <td id="bloodGroup"></td>
      </tr>
      <tr>
        <th>Admission Date</th>
        <td>{{$data->date}}</td>
      </tr>
      <tr>
        <th>Address:</th>
        <td id="studentAddress"></td>
      </tr>
    </table>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>&copy; 2023 Sherpur Govt Victoria Academy.</p>
        </div>
      </div>
    </div>
  </footer>
  <script>
    // You can replace the values below with dynamic data from a server or database
    document.getElementById("studentName").textContent = "{{$data->name}}";
    document.getElementById("studentGender").textContent = "{{$data->gender}}";
    document.getElementById("fatherName").textContent = "{{$data->fathername}}";
    document.getElementById("motherName").textContent = "{{$data->mothername}}";
    document.getElementById("dateOfBirth").textContent = "{{$data->dob}}";
    document.getElementById("studentClass").textContent = "{{$data->class}}";
    document.getElementById("studentEmail").textContent = "{{$data->email}}";
    document.getElementById("studentPhone").textContent = "{{$data->phone}}";
    document.getElementById("bloodGroup").textContent = "{{$data->blood}}";
    document.getElementById("studentAddress").textContent = "{{$data->address}}";
  </script>
</body>
</html>
