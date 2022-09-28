<!DOCTYPE html>
<html>
<head>
 <title>Student Follow Up</title>
 <style>
    .card{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
 </style>
</head>
<body>
    <div class="container">
        <div class="card" style="background-color: #BBD7E0; padding: 15px;  width: 60%; margin: auto; border: 2px solid #BBD7E0">
            <h2 style="text-align: center; padding: 0px; border-radius: 5px;">{{$first_name}} {{$last_name}}</h2>
            <h4 style="text-align: left; border-radius: 5px;">Here is email from social affair team to follow-up you from today until ou are better.</h4>
            <h2>Tutor</h2>
            <h3 style="text-align: left; background-color: #fff;  padding: 8px">{{$tutor}}</h3>
            <h2>Reason</h2>
            <h4 style="text-align: left; background-color: #fff;  padding: 10px">{{$reasons}}</h4>
            <h3>Email: {{$email}}</h3>
            <h3>Password: 1234567</h3> 
            <h2 style="text-align: center; background-color: #fff;  padding: 8px">Student Follow-Up System</h2>
        </div>
    </div>
</body>
</html>
