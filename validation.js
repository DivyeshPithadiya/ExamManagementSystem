$(document).ready(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#myForm").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
	  nname: 
	  {
        minlength: 6,
	  },
	  npassword:
	  {
        minlength: 6,
		useSpecial :true,
		useUppercase :true,
	  },
	//information.php page validation  
	  ID:{
		  number: true,
		  minlength:10,
	  },
	  Fname: 
	  { 		 
        minlength: 2,
	  },
	   Lname: 
	  {
        minlength: 3,
	  },
	  college: 
	  {
        minlength: 3,
	  },
	 Ename: 
	  {
        minlength:5,
	  }
	},
	
    // Specify validation error messages
    messages: {
	  nname: "New Username too short minimum length must be 6",
      npassword: 
	  {
        minlength: "Your password must be at least 6 characters long",
      },
	  
	  //information.php page validation  
	  ID: 
	  { 
	    number: "Please enter valid 10 digit number",
        minlength: "Minimum length must be 10 ",
	  },
	  Fname: 
	  {
        minlength:"Name is too short",
	  },
      Lname: 
	  {
        minlength:"Last name is too short",
	  },
      college:
	  {
        minlength:"College name is too short ",
	  },
	  Ename: 
	  {
        minlength:"Name is too short",
	  }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    
	submitHandler: function (form) {
      form.submit();
    },
  });
});