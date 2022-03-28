const username = document.getElementById("username");
const password = document.getElementById("password");
const repeat = document.getElementById("repeat");

const registerBtn = document.getElementById("registerBtn");
const clearBtn = document.getElementById("clearBtn");

registerBtn.addEventListener("click", verify);
clearBtn.addEventListener("click", clear);

function isValid(input) {

    // The username must be between 6 and 10 characters long, inclusive.
    // The username must contain only letters and digits.
    // The username cannot begin with a digit.
    // The password must be between 6 and 10 characters long, inclusive.
    // The password must contain only letters and digits.
    // The password must have at least one lower case letter, at least one upper case letter, and at least one digit.
    // e.preventDefault();
    
    let regex;

    if (input.id == 'username') {
        
        regex = /^[a-zA-Z][A-Za-z0-9]{5,11}$/;
        return regex.test(input.value);
        
    } else if (input.id == 'password') {
        
        regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[A-Za-z0-9]{5,11}$/;
        return regex.test(input.value);
        
    };
};

function verify(e) {
    
    // The password and the repeat password must match.
    
    console.log(isValid(username), isValid(password), password.value === repeat.value)
    
    if ((isValid(password) && isValid(username)) && password.value == repeat.value) {
        
        alert('User validated');
        
    } else { alert('Invalid username or password'); };
    
    e.preventDefault();
    
};

function clear(e) {
    
    console.log('cleared')
    username.value = '';
    password.value = '';
    repeat.value = '';
    e.preventDefault();
};    
