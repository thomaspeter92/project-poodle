class EmailCheck{
    emailCheck= () =>{
            var signUpButton = document.querySelector('#subscribe');
            signUpButton.addEventListener(`click`, function(){
                var email = document.querySelector('.email');
                var emailValue = email.value;
                var formData = new FormData();
                formData.append("action", "emailCheck");
                formData.append("email", emailValue);
                var xhr = new XMLHttpRequest()
                xhr.open(`POST`, `index.php`);
                xhr.addEventListener("load", () => {
                    if (xhr.status === 200) {
                        if(xhr.responseText.trim() == "true"){
                            var emailError = document.createElement('p');
                            emailError.className = "errorMessage";
                            emailError.style= "text-align: center; color: #FF3864";
                            var emailErrorText = document.createTextNode('email already exists, please try again.');
                            var form = document.querySelector('form');
                            emailError.appendChild(emailErrorText);
                            form.insertBefore(emailError, form.lastChild)
                            // alert("email already exists, please try again.");
                        }else{
                            // new MemberManager().addNewMember($_REQUEST);
                            //  signUpButton.href="index.php?action=registrationInput";
                            var form = document.querySelector('form');
                            form.submit();
                            // signUpButton.submit();
                            // signUpButton.location.href="index.php?action=registrationInput";
                            // window.location.href="index.php?action=registrationInput";
                            //return new FormCheck().formCheck();
                        }
                    }
                });
                
                xhr.send(formData);
            });
    }

}

