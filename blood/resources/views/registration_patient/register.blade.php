<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v2 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style2.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('img/bg-registration-form-2.jpg');">
			<div class="inner">
				<form action="{{route('patient.store')}}" method="POST">
                @csrf
                @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
					<h3>Blood Donor Sign up</h3>
                    <div class="form-wrapper">
						<label for="Name">Name</label>
						<input type="text" class="form-control" name="b_d_n_name">
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="phone">Phone</label>
							<input type="number" class="form-control" name="b_d_n_phone">
						</div>
						<div class="form-wrapper">
							<label for="Address">Address</label>
							<input type="text" class="form-control" name="b_d_n_address">
						</div>
					</div>
                    <div class="form-group">
						<div class="form-wrapper">
							<label for="age">Age</label>
							<input type="number" class="form-control" name="b_d_n_age">
						</div>
						<div class="form-wrapper">
							<select class="form-control" name="b_d_blood_type" >
                                <option value="">select blood type</option>
                                @foreach ($type as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                                </select>
						</div>
					</div>
                      <div class="form-check-inline">
                        <span>Gender:</span>

                            <select class="form-select" name="b_d_n_gender" >
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                      </div>
                    <br>
					<div class="form-wrapper">
						<label for="Email">Email</label>
						<input type="text" class="form-control" name="b_d_n_email">
					</div>
					<div class="form-wrapper">
						<label for="Password">Password</label>
						<input type="password" class="form-control" name="b_d_n_password">
					</div>
					{{-- <div class="form-wrapper">
						<label for="C_pass">Confirm Password</label>
						<input type="password" class="form-control" name="b_d_n__c_password">

					</div> --}}
					<button>Register Now</button>
				</form>
			</div>
		</div>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
