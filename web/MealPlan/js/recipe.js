function addIngredientEntry(){
    let addButton = document.getElementById("addIngredient");
    let amountInput = document.getElementsByClassName("amount")[0];
    let ingredientInput = document.getElementsByClassName("ingredient")[0];
    let cloneAmount = amountInput.cloneNode(true);
    let cloneIngredient = amountInput.cloneNode(true);
    cloneAmount.firstChild.value = '';
    cloneIngredient.firstChild.value = '';

    let ingredientArea = document.getElementById("ingredientArea");

    ingredientArea.insertBefore(cloneAmount, addButton);
    ingredientArea.insertBefore(cloneIngredient, addButton);
}