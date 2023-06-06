<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>
    <link rel="stylesheet" href="{{asset('cssfile/student.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="logout" style="text-align: end">
           <a href="{{url('login')}}">Logout</a>
        </div>
        <h1>Admin Panel</h1>

        <div class="dashboard-menu">
            <button class="active" id="student-btn">Student Dashboard</button>
            <button id="teacher-btn">Teacher Dashboard</button>
        </div>

        <div class="student-dashboard">
            <h2 style="font-family: 'Times New Roman', Times, serif">Student</h2>

            <form action="{{url('filter-student')}}" class="filter-form">
                @csrf

                <label for="class-filter">Filter by Class:</label>
                <select name="class" id="class-filter">
                    <option value="">All</option>
                    <option value="1" {{ old('class') == '1' ? 'selected' : '' }}>Class 1</option>
                    <option value="2" {{ old('class') == '2' ? 'selected' : '' }}>Class 2</option>
                    <option value="3" {{ old('class') == '3' ? 'selected' : '' }}>Class 3</option>
                    <option value="4" {{ old('class') == '4' ? 'selected' : '' }}>Class 4</option>
                    <option value="5" {{ old('class') == '5' ? 'selected' : '' }}>Class 5</option>
                    <option value="6" {{ old('class') == '6' ? 'selected' : '' }}>Class 6</option>
                    <option value="7" {{ old('class') == '7' ? 'selected' : '' }}>Class 7</option>
                    <option value="8" {{ old('class') == '8' ? 'selected' : '' }}>Class 8</option>
                    <option value="9" {{ old('class') == '9' ? 'selected' : '' }}>Class 9</option>
                    <option value="10" {{ old('class') == '10' ? 'selected' : '' }}>Class 10</option>
                </select>

                <label for="gender-filter">Filter by Gender:</label>
                <select name="gender" id="gender-filter">
                    <option value="">All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <button type="submit" class="btn btn-outline-success">Filter</button>
                <a href="{{url('add-student')}}" style="margin-left:450px;" class="btn btn-info">Add Student</a>
            </form>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Email</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $x)
                    <tr>
                        <td><img src="{{ asset('uploads/students/'. $x->image)}}" alt="" height="50px" width="50px"></td>
                        <td><a href="{{url('student-page/'.$x->id)}}">{{$x->name}}</a></td>
                        <td>{{$x->gender}}</td>
                        <td>{{$x->class}}</td>
                        <td>{{$x->email}}</td>
                        <td><a href="{{url('edit-student/'.$x->id)}}" class="btn btn-primary">Edit</a> | 
                            <a href="{{url('delete-student/'.$x->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                    <!-- Add more student rows here -->
                </tbody>
            </table>
        </div>

        <div class="teacher-dashboard" style="display: none;">
            <h2>Teacher List</h2>

            <form action="{{url('filter-teacher')}}" class="filter-form">
                <label for="course-filter">Filter by Course:</label>
                <select name="subject" id="course-filter">
                    <option value="">All</option>
                    <option value="math">Math</option>
                    <option value="bangla">Bangla</option>
                    <option value="english">English</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="islam">Islam</option>
                </select>
                <button type="submit" id = "teabtn" class="btn btn-outline-success">Filter</button>
                <a href="{{url('add-teacher')}}" style="margin-left:550px;" class="btn btn-info">Add Teacher</a>
            </form>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $t)
                    <tr>
                        <td><img src="{{ asset('uploads/teachers/'. $t->image)}}" alt="" height="50px" width="50px"></td>
                        <td>{{$t->name}}</td>
                        <td>{{$t->designation}}</td>
                        <td>{{$t->subject}}</td>
                        <td>{{$t->email}}</td>
                        <td><a href="{{url('edit-teacher/'.$t->id)}}" class="btn btn-primary">Edit</a> | 
                            <a href="{{url('delete-teacher/'.$t->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
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
        var teabtn = document.getElementById('teabtn');
        var studentBtn = document.getElementById('student-btn');
        var teacherBtn = document.getElementById('teacher-btn');
        var studentDashboard = document.querySelector('.student-dashboard');
        var teacherDashboard = document.querySelector('.teacher-dashboard');

        studentBtn.addEventListener('click', function () {
            studentBtn.classList.add('active');
            teacherBtn.classList.remove('active');
            studentDashboard.style.display = 'block';
            teacherDashboard.style.display = 'none';
        });

        teabtn.addEventListener('click', function () {
            studentBtn.classList.add('active');
            teacherBtn.classList.remove('active');
            studentDashboard.style.display = 'none';
            teacherDashboard.style.display = 'block';
        });

        teacherBtn.addEventListener('click', function () {
            teacherBtn.classList.add('active');
            studentBtn.classList.remove('active');
            teacherDashboard.style.display = 'block';
            studentDashboard.style.display = 'none';
        });
    </script>
</body>

</html>
