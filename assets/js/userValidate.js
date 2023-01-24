

let signupForm = document.getElementById("signupForm");
let fnameError = document.getElementById("fnameError");
let lnameError = document.getElementById("lnameError");
let emailError = document.getElementById("emailError");
let passwordError = document.getElementById("passwordError");

let fname = document.getElementById("firstName");
let lname = document.getElementById("lastName");
let email = document.getElementById("email");
let password = document.getElementById("password");



signupForm.addEventListener('submit', (e)=>{
    // e.preventDefault();
    console.log(lname.value);
    console.log(email.value);
    console.log(password.value);
    
    if(fname.value == ""){
      e.preventDefault();
      fnameError.innerText = "This input is required";
    }else if(fname.value <= 2){
      e.preventDefault();
      fnameError.innerText = "This name is too short";
    }else if(fname.value.includes(" ")){
        e.preventDefault();
        fnameError.innerText = "This input shoud not include space";
    }


    if(lname.value == ""){
        e.preventDefault();
        lnameError.innerText = "This input is required";
    }else if(lname.value <= 2){
        e.preventDefault();
        lnameError.innerText = "This name is too short";
    }else if(fname.value.includes(" ")){
        e.preventDefault();
        fnameError.innerText = "This input shoud not include space";
    }

    if(password.value == ""){
        e.preventDefault();
        passwordError.innerText = "This input is required";
    }else if(password.value <= 6){
        e.preventDefault();
        passwordError.innerText = " password should contain at leat 8 caracters";
    } else if(fname.value.includes(" ")){
        e.preventDefault();
        fnameError.innerText = "This input shoud not include space";
    }

    if(email.value == ""){
        e.preventDefault();
        emailError.innerText = "This input is required";
    }else if(!email.value.includes("@gmail.com")){
        e.preventDefault();
        emailError.innerText = "an email should end with a @gmail.com";
    }else if(fname.value.includes(" ")){
        e.preventDefault();
        fnameError.innerText = "This input shoud not include space";
    }
     

})