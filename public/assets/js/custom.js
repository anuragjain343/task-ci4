var signUp = $("#signUp_form");
  signUp.validate({
  rules: {
   
    firstName: {
      required: true,
      minlength: 4,
    },
     lastName: {
      required: true,
      minlength: 4,
    },
    email: {
      required: true
    },
    password: {
      required: true,
       minlength: 6,
    },
     profilePic: {
      required: true,
    },
     dob: {
      required: true,
    },
    gender: {
      required: true,
    }
   
  }
});

 



$("#signUp_form").submit(function(e){
  e.preventDefault();  
  if(signUp.valid()===false){
    toastr.error('Please fill all fields properly.');
    return false;
  }
   
    var _that = $(this), 
    form = _that.closest('form'),      
    formData = new FormData(form[0]),
    f_action = form.attr('action');
    $.ajax({
        type: "POST",
        url: f_action,
        data: formData, //only input
        processData: false,
        contentType: false,
        dataType: "JSON", 
        beforeSend: function () { 
        $('#loading').show();    
        },
        success: function (data, textStatus, jqXHR) {  
        console.log(data.msg);
         $('#loading').hide(); 
        if(data.status==0){
          toastr.error(data.msg);
        }else{
          toastr.success(data.msg);
          location.href = '/';
        }   
        },
    });       
         
  });


/* login js*/
var urlto = $("#redirectUrl").val();
//alert(urlto);
var loginfrm = $("#login_form");
  loginfrm.validate({
  rules: {
   
    email: {
      required: true
    },
    password: {
      required: true,
       minlength: 6,
    }
  },
  
});

 

$("#login_form").submit(function(e){
  e.preventDefault();  
  if(loginfrm.valid()===false){
    toastr.error('Please fill all fields properly.');
    return false;
  }
   
    var _that = $(this), 
    form = _that.closest('form'),      
    formData = new FormData(form[0]),
    f_action = form.attr('action');
    $.ajax({
        type: "POST",
        url: f_action,
        data: formData, //only input
        processData: false,
        contentType: false,
        dataType: "JSON", 
        beforeSend: function () { 
        $('#loading').show();    
        },
        success: function (data, textStatus, jqXHR) {  
        console.log(data.msg);
         $('#loading').hide(); 
        if(data.status==0){
          toastr.error(data.msg);
        }else{
          toastr.success(data.msg);
          setTimeout(function () {
          window.location = urlto;
          }, 2000);
        }   
        },
    });       
         
  });
/* forgot password js*/
var urltoo = $("#redirectUrl1").val();
var forgatfrm = $("#forgot_form");
  forgatfrm.validate({
  rules: {
   
    email: {
      required: true
    },
    password: {
      required: true,
      minlength: 6,
    },
    rePassword: {
      required: true,
      minlength: 6,
      equalTo: "#password"
    }
  },
  
});


$("#forgot_form").submit(function(e){
  e.preventDefault();  
  if(forgatfrm.valid()===false){
    toastr.error('Please fill all fields properly.');
    return false;
  }
   
    var _that = $(this), 
    form = _that.closest('form'),      
    formData = new FormData(form[0]),
    f_action = form.attr('action');
    $.ajax({
        type: "POST",
        url: f_action,
        data: formData, //only input
        processData: false,
        contentType: false,
        dataType: "JSON", 
        beforeSend: function () { 
        $('#loading').show();    
        },
        success: function (data, textStatus, jqXHR) {  
        console.log(data.msg);
         $('#loading').hide(); 
        if(data.status==0){
          toastr.error(data.msg);
        }else{
          toastr.success(data.msg);
          setTimeout(function () {
          window.location = urltoo;
          }, 2000);
        }   
        },
    });       
         
  });
