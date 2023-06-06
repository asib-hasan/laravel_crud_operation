<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            padding: 10px;
            margin-bottom: 10px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top:20px">
        <div class="row">
            <div class="col-md-12">
                <h2>Add New Student</h2>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="post" action="{{url('save-student')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label class="from-lebel">School</label>
                        <input type="text" class="form-control" name="school"
                        value="Sherpur Govt. Victoria Academy" readonly>
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Name</label>
                        <input type="text" class="form-control" name="name"
                        placeholder="Enter name:">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Femaile">Female</option>
                        </select>
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Father Name</label>
                        <input type="text" class="form-control" name="fathername"
                        placeholder="Enter father name:">
                        @error('fathername')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Mother Name</label>
                        <input type="text" class="form-control" name="mothername"
                        placeholder="Enter mother name:">
                        @error('mothername')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                        @error('mothername')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label for="class">Select Class:</label>
                        <select class="form-control" id="class" name="class">
                        <option value="1">Class 1</option>
                        <option value="2">Class 2</option>
                        <option value="3">Class 3</option>
                        <option value="4">Class 4</option>
                        <option value="5">Class 5</option>
                        <option value="6">Class 6</option>
                        <option value="7">Class 7</option>
                        <option value="8">Class 8</option>
                        <option value="9">Class 9</option>
                        <option value="10">Class 10</option>
                        </select>
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Photo</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Email</label>
                        <input type="text" class="form-control" name="email"
                        placeholder="Enter email:">
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Phone</label>
                        <input type="text" class="form-control" name="phone"
                        placeholder="Enter phone number:">
                        @error('phone')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Year</label>
                        <input type="text" class="form-control" name="year"
                        placeholder="Enter Year: ">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Blood Group</label>
                        <input type="text" class="form-control" name="blood"
                        placeholder="Enter Blood Group: ">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Admission Date</label>
                        <input type="date" id="date" name="date" class="form-control">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Password</label>
                        <input type="password" class="form-control" name="password"
                        placeholder="Make password: ">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Address</label>
                        <textarea class="form-control" name="address"
                        placeholder="Enter address:"></textarea>
                        @error('address')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('admin')}}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        var today = new Date();
        var formattedDate = today.toISOString().substr(0, 10);
        document.getElementById("date").value = formattedDate;
    </script>
</body>
</html>