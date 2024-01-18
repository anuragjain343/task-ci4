<? php 
	<<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"  href="<?php  echo base_url('assets/css/registerStyle.css');?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	 
	  <!-- Toastr -->
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<title> Sign Up</title>
	</head>
	<body>
	 <div class="form-body">
        <div class="row">  
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Sign Up</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" method="POST"  action="<?php echo base_url('/userRegister')?>" id="signUp_form" enctype="multipart/form-data">

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="firstName" placeholder="First Name" >
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="lastName" placeholder="Last Name" >
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" >
                                 
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="password" placeholder="Password" >
                                 
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="file" name="profilePic" placeholder="Profile" >
                                 
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="date" name="dob" placeholder="DOB" >  
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" >
                                      <option selected disabled value="">Gender</option>
                                      <option value="male">Male</option>
                                      <option value="female">Female</option> 
                               </select>  
                           </div>
                          

                            <div class="form-button mt-3">
                               
                                <input type="submit"  id="signUp_form1" class="btn btn-primary" value="Sign Up" style="margin-top:10px;">
                            </div>
                            <div id="loading">Loading...</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <script src="<?php  echo base_url('assets/js/custom.js');?>"></script>
	</body>
	</html>
	
   


? >