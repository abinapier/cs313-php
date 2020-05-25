function addIngredientEntry(){
    let addButton = document.getElementById("addIngredient");
    let amountInput = document.getElementsByClassName("amount")[0];
    let ingredientInput = document.getElementsByClassName("ingredient")[0];
    let cloneAmount = amountInput.cloneNode(true);
    let cloneIngredient = amountInput.cloneNode(true);
    cloneAmount.firstChild.value = '';
    cloneIngredient.firstChild.value = '';

    addButton.insertBefore(cloneAmount, addButton);
    addButton.insertBefore(cloneIngredient, addButton);
}