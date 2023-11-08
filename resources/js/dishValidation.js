const dishBtn = document.getElementById('addDishBtn');

if(dishBtn){
dishBtn.addEventListener('click', (event) => {
    event.preventDefault()
    const divError = document.getElementById('divError');
    const errors = [];
    divError.innerHTML = '';
    const dishSubmit = document.getElementById('onDishSubmit');

    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const price = document.getElementById('price').value;
    const ingredients = document.getElementById('ingredients').value;
    
    

    //title

    if (title === '') {
        errors.push('Il Titolo è obbligatorio');
        divError.innerHTML = errors.join('<br>');
    } 



    // description

    if (description === '') {
        errors.push('La descrizione è obbligatoria')
        divError.innerHTML = errors.join('<br>');

    } 

    //price

    if (price === '') {
        errors.push('Il prezzo è obbligatorio')
        divError.innerHTML = errors.join('<br>');
    }  else if(price <= 0){
        errors.push('Il prezzo deve essere maggiore di 0')
        divError.innerHTML = errors.join('<br>');
    }else if (/^(\d+(\,\d{0,2})?)$/.test(price)) {
        errors.push('Il prezzo deve avere due decimali separati dal punto es. 10.00')
        divError.innerHTML = errors.join('<br>');
    }else if (/^(\d+(\.\d{0,1})?)$/.test(price)) {
        errors.push('Il prezzo deve avere due decimali separati dal punto es. 10.00')
        divError.innerHTML = errors.join('<br>');
    }


    // ingredients
    if (ingredients === '') {
        errors.push('Gli ingredienti sono obbligatori')
        divError.innerHTML = errors.join('<br>');
    } 

    if (divError.innerHTML === '') {
        dishSubmit.submit();
        console.log("dishSubmit")
    }

})
}
