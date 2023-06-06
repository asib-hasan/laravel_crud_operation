<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Teacher</title>
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
                <h2 style="font-family:'Times New Roman', Times, serif">Add New Teacher</h2>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="post" action="{{url('save-teacher')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="md-3">
                        <label class="from-lebel"> Teacher Name</label>
                        <input type="text" class="form-control" name="name"
                        placeholder="Enter name:">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel"> Designation</label>
                        <input type="text" class="form-control" name="designation"
                        placeholder="Enter designation:">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel"> Email</label>
                        <input type="text" class="form-control" name="email"
                        placeholder="Enter email:">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Password</label>
                        <input type="password" class="form-control" name="password"
                        placeholder="Enter password:">
                    </div>
                    <div class="md-3">
                        <label for="subject">Select Subject:</label>
                        <select class="form-control" id="class" name="subject">
                        <option value="Bangla">Bangla</option>
                        <option value="English">English</option>
                        <option value="Math">Math</option>
                        <option value="Physics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="Islam">Islam</option>
                        </select>
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Joining Date</label>
                        <input type="date" class="form-control" name="joiningdate">
                    </div>
                    <div class="md-3">
                        <label class="from-lebel">Photo</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{url('admin')}}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>