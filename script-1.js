function validate() { 
    const firstNAME=document.getElementById('FirstName').value;
    const lastNAME=document.getElementById('LastName').value;
    const password=document.getElementById('Password').value;
    const id=document.getElementById('ID').value;
    const phoneNUMBER=document.getElementById('Number').value;
    const email=document.getElementById('Email').value;
    var text = document.getElementById("text");

    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    charactersONLY=/^[a-zA-Z]+$/
    var number=/(?=.*\d)/;
    var special=/(?=.*[!@#$%^&*])/;
    var idLIMIT=/([^\d]*\d){8}/;
    var phoneno=/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/;
    matchEMAIL=/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (firstNAME===""){
        event.preventDefault();        
        alert("PLEASE enter your first name.")
        document.getElementById('FirstName').focus();
        document.getElementById('FirstName').select();  
    }
    else if (!firstNAME.match(charactersONLY)){
        event.preventDefault(); 
        alert("Name must have characters only")
        document.getElementById('FirstName').focus();
        document.getElementById('FirstName').select();
    }
    
    else if (lastNAME===""){
        event.preventDefault(); 
        alert("PLEASE enter your last name.")
        document.getElementById('LastName').focus();
        document.getElementById('LastName').select();
       
    }
    else if (!lastNAME.match(charactersONLY)){
        event.preventDefault(); 
        alert("Name must have characters only")
        document.getElementById('LastName').focus();
        document.getElementById('LastName').select();
    }
   
    else if (password.length>10){
        event.preventDefault(); 
        alert("Password must be less than or equal to 10 characters.")
        document.getElementById('Password').focus();
        document.getElementById('Password').select();
    }
    else if (password===""){
        event.preventDefault(); 
        alert("Password is empty.")
        document.getElementById('Password').focus();
        document.getElementById('Password').select();
        
    }
    else if (!password.match(upperCaseLetters)){
        event.preventDefault(); 
        alert("Password must contain one Uppercase letter.")
        document.getElementById('Password').focus();
        document.getElementById('Password').select();
    }
    else if(!password.match(number)){
        event.preventDefault(); 
        alert("Password must have at least one digit.")
        document.getElementById('Password').focus();
        document.getElementById('Password').select();
    }
    else if (!password.match(special)){
        event.preventDefault(); 
        alert("Password must have at least one special character.")
        document.getElementById('Password').focus();
        document.getElementById('Password').select();
    }
    else if (id===""){
        event.preventDefault(); 
        alert("Please enter your ID number.")
        document.getElementById('ID').focus();
        document.getElementById('ID').select();
    }
    else if (!id.match(idLIMIT) || id.length>8 || id.length<8){
        event.preventDefault(); 
        alert("ID must contain 8 digits.")
        document.getElementById('ID').focus();
        document.getElementById('ID').select();
    }
    else if (phoneNUMBER===""){
        event.preventDefault(); 
        alert("Please enter your phone number.")
        document.getElementById('number').focus();
        document.getElementById('number').select();
    }
    else if(!phoneNUMBER.match(phoneno)){
        event.preventDefault(); 
        alert("Please a valid phone number.")
        document.getElementById('number').focus();
        document.getElementById('number').select();
    }
    
    else if(document.getElementById('checkbox').checked==true && email==="") {
        event.preventDefault(); 
        alert("Please enter your email.")
        text.style.display = "inline";
        document.getElementById('Email').focus();
    }
    else if (document.getElementById('checkbox').checked==false){ 
        text.style.display = "none";

    }
    else if(!email.match(matchEMAIL) && document.getElementById('checkbox').checked==true){
        event.preventDefault(); 
        alert("Please enter a valid email.")
        document.getElementById('Email').focus();
    }
    
} 
