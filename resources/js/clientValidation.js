const registerBtn = document.getElementById('onRegisterBtn');

if(registerBtn){
registerBtn.addEventListener('click', (event) => {
    event.preventDefault()
    const nameInput = document.getElementById('name');
    const mailInput = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('password-confirm');
    const restaurantName = document.getElementById('restaurant_name');
    const vat = document.getElementById('vat');
    const userAddress = document.getElementById('user_address');
    const types = document.querySelectorAll('input[type="checkbox"]');
    const onFormsubmit = document.getElementById('onFormSubmit');
    const errorDiv = document.getElementById('errorDiv');
    const errors = [];
    errorDiv.innerHTML = '';

    //name

    if (nameInput.value === '') {
        errors.push('Il nome è obbligatorio');
        errorDiv.innerHTML = errors.join('<br>');
    } else {
        const nameParts = nameInput.value.split(' ');
        if (nameParts.length < 2) {
            errors.push('Inserire sia il nome che il cognome');
            errorDiv.innerHTML = errors.join('<br>');
        }
    }



    // email

    if (mailInput.value === '') {
        errors.push('la mail è obbligatoria')
        errorDiv.innerHTML = errors.join('<br>');

    } else if (!mailInput.value.includes('@')) {
        errors.push('La mail deve contenere la "@"')
        errorDiv.innerHTML = errors.join('<br>');
    }

    //password

    if (password.value === '') {
        errors.push('la password è obbligatoria')
        errorDiv.innerHTML = errors.join('<br>');
    } else if (password.value.length < 8) {
        errors.push('la password dev\'essere almeno di 8 caratteri')
        errorDiv.innerHTML = errors.join('<br>');
    }

    //confirm_password

    if (confirmPassword.value !== password.value) {
        errors.push('la password dev\'essere la stessa')
        errorDiv.innerHTML = errors.join('<br>');
    }



    //restaurant name

    if (restaurantName.value === '') {
        errors.push('Il nome del ristorante è obbligatorio')
        errorDiv.innerHTML = errors.join('<br>');
    } else if (!restaurantName.value[0].match(/[A-Z]/)) {
        errors.push('Il nome del ristorante deve cominciare con la maiuscola')
        errorDiv.innerHTML = errors.join('<br>');
    }

    //vat 

    if (vat.value === '') {
        errors.push('il vat è obbligatorio')
        errorDiv.innerHTML = errors.join('<br>');
    } else if (vat.value.length != 11) {
        errors.push('il vat dev\'essere almeno di 11 caratteri')
        errorDiv.innerHTML = errors.join('<br>');
    } else if (isNaN(vat.value)) {
        errors.push('Il VAT deve contenere solo caratteri numerici');
        errorDiv.innerHTML = errors.join('<br>');
    }

    //user_address

    if (userAddress.value === '') {
        errors.push('L\'indirizzo è obbligatorio')
        errorDiv.innerHTML = errors.join('<br>');
    }


    //types
    let checked = false;
    types.forEach(function (type) {
        if (type.checked) {
            checked = true;
        }
    })

    if (!checked) {
        errors.push('Inserire almeno un tipo')
        errorDiv.innerHTML = errors.join('<br>');
    }




    if (errorDiv.innerHTML === '') {
        onFormsubmit.submit();
    }

})
}
