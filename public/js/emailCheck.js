class EmailCheck{
    emailCheck= () =>{
        var signUpButton = document.querySelector('#subscribe');
        signUpButton.addEventListener(`click`, function(){
            var name = document.querySelector('#username');

            var password = document.querySelector('.password');
            var confirmPassword = document.querySelector('.confirmPassword');

            var email = document.querySelector('.email');
            var emailValue = email.value;

            var formData = new FormData();
            formData.append("action", "emailCheck");
            formData.append("email", emailValue);

            var xhr = new XMLHttpRequest()
            xhr.open(`POST`, `index.php`);
            xhr.addEventListener("load", () => {
                if (xhr.status === 200) {
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
                        if(password.value != confirmPassword.value){
                            if(oldPassError){
                                oldPassError.remove();
                                var passwordError = document.createElement('p');
                                passwordError.className = "passwordError";
                                passwordError.style = "text-align: center; color: #FF3864; font-size: .5em;";
                                var passwordErrorText = document.createTextNode('passwords do not match');
                                var form = document.querySelector('form');
                                passwordError.appendChild(passwordErrorText);
                                form.insertBefore(passwordError, form.lastChild);
                                var check = false; 
                            }else{   
                                var passwordError = document.createElement('p');
                                passwordError.className = "passwordError";
                                passwordError.style = "text-align: center; color: #FF3864; font-size: .5em;";
                                var passwordErrorText = document.createTextNode('passwords do not match');
                                var form = document.querySelector('form');
                                passwordError.appendChild(passwordErrorText);
                                form.insertBefore(passwordError, form.lastChild);
                                var check = false; 
                            }
                        }else{
                            if(oldPassError){
                                oldPassError.remove();
                            }
                            var check = true;
                        } 
                    }
                    if(xhr.responseText.trim() == "true"){
                        if(email){
                            if(email.value.length != 0){
                                    var emailError = document.createElement('p');
                                    emailError.className = "emailError";
                                    emailError.style= "text-align: center; color: #FF3864; font-size: .5em;";
                                    var emailErrorText = document.createTextNode('email already exists, please try again.');
                                    var form = document.querySelector('form');
                                    emailError.appendChild(emailErrorText);
                                    form.insertBefore(emailError, form.lastChild);
                                    var check = false; 
                                }
                            }
                        }
                      
                    }
                    console.log(check);
                    if(check == true){
                        var form = document.querySelector('form');
                        form.submit();  
                        var oldEmailError = document.querySelector('.emailError');
                        oldEmailError.remove();
                    }
                    
                
            });
            
            xhr.send(formData);
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

