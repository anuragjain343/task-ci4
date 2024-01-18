<? php 
   <!DOCTYPE html>
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
        <title> Forgot Password</title>
    </head>
    <body>
     <div class="form-body">
        <div class="row">  
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Forgot Password</h3>
                        
                        <form class="requires-validation" method="POST"  action="<?php echo base_url('/doForgotPassword')?>" id="forgot_form" >

                            
                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" >
                                <input type="hidden"  id="redirectUrl1" value="<?php echo base_url('/')?>"> 
                                 
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                                 
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="rePassword" placeholder="Re-password" >
                                 
                            </div>
                            <div class="col-md-12" style="margin-top: 20px;">
                                
                       
                            </div>

                            <div class="form-button mt-3">
                                 <input type="submit"  id="login_form1" class="btn btn-primary" value="Save">
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
    
   


?>
