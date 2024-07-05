const registerFrom = document.querySelector('.registration-form')
const password = document.querySelector('.password')
const confirmPassword = document.querySelector('.confirmPassword')
const registerCont = document.querySelector('.register-container')
const error = document.querySelector('.error')
const registerBtn = document.querySelector('.register-btn')
console.log(password.value)
console.log(confirmPassword.value)


registerBtn.addEventListener('click', function() {
    if (password.value != confirmPassword.value) {
    error.innerHTML = '<p>Password does not Match</p>'
    error.style.color = 'red'
    error.style.margin = '0'
    } 
    else {
        error.innerHTML = ''
        error.style.color = ''
        error.style.margin = '' 
    }
    
})

