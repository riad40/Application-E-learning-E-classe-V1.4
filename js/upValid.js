// Sign Up form validation

/* ===== grab our DOM elements ===== */

const upName = document.querySelector('#upName')
const upEmail = document.querySelector('#upEmail')
const upPwd = document.querySelector('#upPwd')
const upRpwd = document.querySelector('#upRpwd')
const upForm = document.getElementById('upForm')
const myError = document.getElementById('error')

upForm.addEventListener('submit', (e) => {

    let errors = []

    // check for empty inputs
    if (upName.value == '' || upEmail.value == '' || upPwd.value == '' || upRpwd.value == '') {
        errors.push('Please fill all the fildes')
    }

    // handle password lenght
    if (upPwd.value.length < 4) {
        errors.push('Password must be at least 4 charachter')
    }
    if (upPwd.value.length >= 8) {
        errors.push('Password must be at less than 4 charachter')
    }

    // check for passwords match
    if (upPwd.value !== upRpwd.value) {
        errors.push('Passwords must be the same')
    }

    if (errors.length > 0) {
      e.preventDefault()
      myError.innerHTML = '<div class="alert alert-danger text-center">' + errors.join(', ') + '</div>'
    }
})

