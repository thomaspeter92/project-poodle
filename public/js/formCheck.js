const formCheck = () => {
    //making sure passwords match
    const password = document.querySelector(`.password`);
    const confirmPassword = document.querySelector(`.confirmPassword`);
    const email = document.querySelector(`.email`);

    if(confirmPassword){
        confirmPassword.addEventListener(`keyup`, function(){
            if(confirmPassword.value === password.value.trim()){
                password.className=`blue`;
                confirmPassword.className=`blue`;
            }else{
                password.className=`red`;
                confirmPassword.className=`red`;
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
            if(password.value === confirmPassword.value.trim()){
                password.className=`blue`;
                confirmPassword.className=`blue`;
            }else {
                password.className=`red`;
                confirmPassword.className=`red`;
            }
        });
    }

    //email check
    // var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    // var emailVerify = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(email.value);
    var emailVerify = emailRegex.test(email.value);

   
    if(email){
        email.addEventListener(`keyup`, function(){
            console.log(email.value);
            console.log(emailVerify);
            if(emailVerify == true){
                email.className = `blue`;
            }else if(emailVerify == false){
                email.className = `red`;
            }
        });
      
    }

   const required = document.querySelector(`required`);
   if(required){
    required.addEventListener(`keyup`, function(){
        console.log(required);
        if(required.value.length > 0){
            email.className = `blue`;
        }else{
            email.className = `red`;
        }
    });
  
}
    //empty input check
    var input = document.querySelector(`input[required]`);
    // if(input){
    //     input.addEventListener(`keyup`, function(){
    //         if(input.value.length > 0){
    //             input.className = `blue`;
    //         }else if(input.value.length = 0){
    //             input.className = `red`;
    //         }
    //     });
    // }
}
formCheck();