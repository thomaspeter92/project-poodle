class RegistrationCheck{
    registrationCheck= () =>{
        var formSignUp = document.querySelector('#formSignUp');
        formSignUp.addEventListener("submit", function(e){
            console.log("submit");
            
            var name = document.querySelector('#username');
            var password = document.querySelector('.password');
            var confirmPassword = document.querySelector('.confirmPassword');
            var email = document.querySelector('.email');
            // var redEmail = document.querySelector('.email red');
            var redInputs = document.querySelector('.red');

            var check;
            if(name){
                var oldNameError = document.querySelector('.nameError');
                if(name.value.trim().length == 0){
                    if(oldNameError){
                        oldNameError.remove();
                        var nameError = document.createElement('p');
                        nameError.className = "nameError";
                        nameError.style = "text-align: center; color: #FF3864; font-size: .5em;";
                        var nameErrorText = document.createTextNode('please enter your name');
                        var form = document.querySelector('form');
                        nameError.appendChild(nameErrorText);
                        form.insertBefore(nameError, form.lastChild);
                        var check = false; 
                    }else{
                        var nameError = document.createElement('p');
                        nameError.className = "nameError";
                        nameError.style = "text-align: center; color: #FF3864; font-size: .5em;";
                        var nameErrorText = document.createTextNode('please enter your name');
                        var form = document.querySelector('form');
                        nameError.appendChild(nameErrorText);
                        form.insertBefore(nameError, form.lastChild);
                        var check = false;  
                    }
                }else{
                    if(oldNameError){
                        oldNameError.remove();
                        var check = true;
                    }
                    
                }   
            }
            if(password){
                var oldPassError = document.querySelector('.passwordError');
                if(password.value.trim().length == 0 && confirmPassword.value.trim().length == 0){
                    var passwordError = document.createElement('p');
                    passwordError.className = "passwordError";
                    passwordError.style = "text-align: center; color: #FF3864; font-size: .5em;";
                    var passwordErrorText = document.createTextNode('please fill out both password fields');
                    var form = document.querySelector('form');
                    passwordError.appendChild(passwordErrorText);
                    form.insertBefore(passwordError, form.lastChild);
                    if(oldPassError){
                        oldPassError.remove();
                    }
                    var check = false; 
                }else if(password.value != confirmPassword.value){
                    if(password.value.trim().length != 0){   
                        var passwordError = document.createElement('p');
                        passwordError.className = "passwordError";
                        passwordError.style = "text-align: center; color: #FF3864; font-size: .5em;";
                        var passwordErrorText = document.createTextNode('passwords do not match');
                        var form = document.querySelector('form');
                        passwordError.appendChild(passwordErrorText);
                        form.insertBefore(passwordError, form.lastChild);
                        if(oldPassError){
                            oldPassError.remove();
                        }
                        var check = false; 
                        }else{
                            var oldPassError = document.querySelector('.passwordError');
                            oldPassError.remove();
                        }

                }else{
                    var oldPassError = document.querySelector('.passwordError');
                    if(oldPassError){
                        oldPassError.remove();
                    }
                    var check = true;
                }
            }
            if(email){
                if(email.value.trim().length == 0){
                    var oldEmailError = document.querySelector('.emailError');
                    if(oldEmailError){
                        oldEmailError.remove();
                    }
                    var emptyEmailError = document.createElement('p');
                    emptyEmailError.className = "emailError";
                    emptyEmailError.style= "text-align: center; color: #FF3864; font-size: .5em;";
                    var emailErrorText = document.createTextNode('please enter an email.');
                    var form = document.querySelector('form');
                    emptyEmailError.appendChild(emailErrorText);
                    form.insertBefore(emptyEmailError, form.lastChild);
                    var check = false; 
                }else{
                    var oldEmailError = document.querySelector('.emailError')
                    if(oldEmailError){
                        oldEmailError.remove();
                    }
                    var check = true
                }
            }
            if(redInputs){
                var oldRedError = document.querySelector('.redError');
                if(oldRedError){
                    oldRedError.remove();
                    var redError = document.createElement('p');
                    redError.className = "redError";
                    redError.style= "text-align: center; color: #FF3864; font-size: .5em;";
                    var redErrorText = document.createTextNode('please make sure everthing was entered correctly');
                    var form = document.querySelector('form');
                    redError.appendChild(redErrorText);
                    form.insertBefore(redError, form.lastChild);
                    var check = false; 
                }else{
                    var redError = document.createElement('p');
                    redError.className = "redError";
                    redError.style= "text-align: center; color: #FF3864; font-size: .5em;";
                    var redErrorText = document.createTextNode('please make sure everthing was entered correctly');
                    var form = document.querySelector('form');
                    redError.appendChild(redErrorText);
                    form.insertBefore(redError, form.lastChild);
                    var check = false; 
                }
            }else{
                var oldRedError = document.querySelector('.redError');
                if(oldRedError){
                    oldRedError.remove();
                }
                var check = true;
            }

            console.log("check: " + check);
            if (!check) {
                e.preventDefault();
                return;
            }
            
            var formData = new FormData();
            formData.append("action", "signUp");
            formData.append("username", name.value);
            formData.append("password", password.value);
            formData.append("confirmpass", confirmPassword.value);
            formData.append("email", email.value);

            const failedMsg = "";
            var xhr = new XMLHttpRequest()
            xhr.open(`POST`, `index.php`);
            xhr.addEventListener("load", () => {
                if (xhr.status === 200) {
                    if (IsValidJSONString(xhr.responseText)) {
                        const result = JSON.parse(xhr.responseText);
                        if (result.signedIn) {
                            var oldEmailError = document.querySelector('.emailError');
                            if(oldEmailError){
                                oldEmailError.remove();
                            }
                            alert("Thank you for joining us!!!");
                            window.location.href = "index.php?action=petPreview";
                        }
                        else if (result.alreaySignedUp) {
                            if(email.value.trim().length != 0){
                                var oldEmailError = document.querySelector('.emailError');
                                if(oldEmailError){
                                    oldEmailError.remove();
                                }
                                var emailError = document.createElement('p');
                                emailError.className = "emailError";
                                emailError.style= "text-align: center; color: #FF3864; font-size: .5em;";
                                var emailErrorText = document.createTextNode('The email is already signed up, please sign in.');
                                var form = document.querySelector('form');
                                emailError.appendChild(emailErrorText);
                                form.insertBefore(emailError, form.lastChild);
                                // var check = false;   
                            }
                        }
                        // else showErrorForSignIn(failedMsg);
                    } 
                    // else showErrorForSignIn("Please try it again."); //Error - result is not JSON string    
                } 
                // else showErrorForSignIn("Please try it again."); //Error - about response
            });
            
            xhr.send(formData);
            e.preventDefault();
        });
    }






























    // displayNameError = () =>{
    //     var nameError = document.createElement('p');
    //     nameError.className = "nameError";
    //     nameError.style = "text-align: center; color: #FF3864; font-size: .5em;";
    //     var nameErrorText = document.createTextNode('please enter your name');
    //     var form = document.querySelector('form');
    //     nameError.appendChild(nameErrorText);
    //     form.insertBefore(nameError, form.lastChild);
    // }
    // displayPasswordError = () =>{
    //     var passwordError = document.createElement('p');
    //     passwordError.className = "passwordError";
    //     passwordError.style = "text-align: center; color: #FF3864; font-size: .5em;";
    //     var passwordErrorText = document.createTextNode('passwords do not match');
    //     var form = document.querySelector('form');
    //     passwordError.appendChild(passwordErrorText);
    //     form.insertBefore(passwordError, form.lastChild);
    // }
    // displayEmailError = () =>{
    //     var emailError = document.createElement('p');
    //     emailError.className = "emailError";
    //     emailError.style= "text-align: center; color: #FF3864; font-size: .5em;";
    //     var emailErrorText = document.createTextNode('email already exists, please try again.');
    //     var form = document.querySelector('form');
    //     emailError.appendChild(emailErrorText);
    //     form.insertBefore(emailError, form.lastChild);
    // }
}

