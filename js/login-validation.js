
// getting elements

 const  userNameElement = document.getElementById("Login-Username");
 const  passwordElement = document.getElementById("Login-Password");
 const  btnLoginElement = document.getElementById("btnLogin");
 const frmElement =document.querySelector(".login-form")

  let name = "gjgjkg".length;



 btnLoginElement.addEventListener("click",validate);



 function validate(){
   if(userNameElement.value ==="" ){
  
    userNameElement.style="border-color:red"

   }else if(passwordElement.value==="" ){
 
    passwordElement.style="border-color:red"
   
   }else {

    
   }

 }

