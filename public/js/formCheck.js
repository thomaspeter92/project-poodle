class FormCheck {

formCheck = () => {
    var password = document.querySelector(`.password`); 
    var confirmPassword = document.querySelector(`.confirmPassword`);
    var email = document.querySelector(`.email`);
    var requiredInputs = document.querySelectorAll(`.required`);    
    

    if(confirmPassword){
        confirmPassword.addEventListener(`keyup`, function(){
            if(confirmPassword.value === password.value.trim()){
                password.classList.remove(`red`);
                password.classList.add(`blue`);
                confirmPassword.classList.remove(`red`);
                confirmPassword.classList.add(`blue`);
            }else{
                password.classList.remove(`blue`);
                password.classList.add(`red`);
                confirmPassword.classList.remove(`blue`);
                confirmPassword.classList.add(`red`);
            }
        });
    }
    //making sure password has at least 8 characters, 1 special char, 1 number, 1 lowercase, and 1 uppercase
    // const passwordRegex = /^.*(?=.{8,})((?=.*[!@#$%^&*()\-_=+{};:,<.>]){1})(?=.*\d)((?=.*[a-z]){1})((?=.*[A-Z]){1}).*$/g
    //https://www.regextester.com/95447
//     const passwordVerify = password.value.search(passwordRegex);
//     if(password){
//         password.addEventListener(`keyup`, function(){
//             if(password.value === confirmPassword.value.trim() && passwordVerify != -1){
//                 password.className=`blue`;
//                 confirmPassword.className=`blue`;
//             }else {
//                 password.className=`red`;
//                 confirmPassword.className=`red`;
//             }
//         });
// }

    //only makes sure both passwords match
  
    if(password){
        password.addEventListener(`keyup`, function(){
            if(password.value === confirmPassword.value.trim() && password.value.length > 0){
                password.classList.remove(`red`);
                password.classList.add(`blue`);
                confirmPassword.classList.remove(`red`);
                confirmPassword.classList.add(`blue`);
            }else {
                password.classList.remove(`blue`);
                password.classList.add(`red`);
                confirmPassword.classList.remove(`blue`);
                confirmPassword.classList.add(`red`);
            }
        });
    }

    //email check
    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    if(email){
        email.addEventListener(`keyup`, function(){
            // console.log(email.value);
            var emailVerify = emailRegex.test(email.value);
            if(emailVerify == true){
                email.classList.remove(`red`);
                email.classList.add(`blue`);
            }else if(emailVerify == false){
                email.classList.remove(`blue`);
                email.classList.add(`red`);
            }
        });
      
    }

    //making sure required input fields are not empty
    for(var i=0;i<requiredInputs.length;i++){
        requiredInputs[i].addEventListener(`keyup`, function(){
            for(var j=0;j<requiredInputs.length;j++){
                var inputLength = requiredInputs[j].value.length;
                console.log(inputLength);
                console.log
                if(inputLength == 0){
                    requiredInputs[j].classList.remove(`blue`);
                    requiredInputs[j].classList.add(`red`);
                }else{
                    requiredInputs[j].classList.remove(`red`);
                    requiredInputs[j].classList.add(`blue`);
                    }
            }
        });
        
    }
   
    var signUpButton = document.querySelector('.subSection>#subscribe');
    if(signUpButton){
        signUpButton.addEventListener(`click`, function(){
            var redClasses = document.querySelector(`.red`);
            if(redClasses){
                return false;
            }else{
                return true;
            }
        })
    }
}


}


