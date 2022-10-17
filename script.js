var nameError = document.getElementById("name-error");
var emailError = document.getElementById("email-error");
var phoneError = document.getElementById("phone-error");
var passwordError = document.getElementById("password-error");
var cpasswordError = document.getElementById("cpassword-error");
var submitError = document.getElementById("submit-error");

function validateName(){
    var name = document.getElementById('contact-name').value;
    if(name.length ===""){
        nameError.innerHTML ='Name is required';
        return false;
    }
    if(!name.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)){
        nameError.innerHTML ='<i class="fa fa-exclamation-circle" aria-hidden="true"></i>'; 
        return false; 
    }
    nameError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
    return true;
}

function validatePhone(){
    var phone = document.getElementById('contact-phone').value;

    if(phone.length ===""){
        phoneError.innerHTML = 'Phone number is required';
        return false;
    }
    if(phone.length !==10){
        phoneError.innerHTML ='<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
        return false;
    }
    if(!phone.match(/^[0-9]{10}$/)){
        phoneError.innerHTML = 'Only digits please';
        return false;
    }
    phoneError.innerHTML ='<i class="fa fa-check-circle" aria-hidden="true"></i>';
    return true;
}

function validateEmail(){
    var email = document.getElementById('contact-email').value;
    if(email.length ===""){
        emailError.innerHTML = 'Email is required';
        return false;
    }
    if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailError.innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
        return false;
    }
    emailError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
    return true;
}

function validatePassword(){
    var password = document.getElementById('contact-password').value; 
    if(password.length ==="") {
		passwordError.innerHTML='Password is required';
        return false;
	} 
    if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)){
        passwordError.innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
        return false;    
}
    passwordError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
    return true;

}

function validateCpassword(){
    var cpassword = document.getElementById('contact-cpassword').value; 
    var password = document.getElementById('contact-password').value; 
    if(cpassword.length ==="") {
		passwordError.innerHTML= 'Please confirm your password';
        return false;
	} 
     if(password !== cpassword) {
		cpasswordError.innerHTML= 'Passwords does not match';
        return false;
	}
     
	cpasswordError.innerHTML = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
    return true;
}

function validateForm(){
    if(!validateName() || !validatePhone() || !validateEmail() || !validatePassword() || !validateCpassword()){
       submitError.style.display = 'block';
      submitError.innerHTML ='Fills must not be empty !';
      setTimeout(function(){submitError.style.display = 'none';}, 3000);
      return false;
    }
}