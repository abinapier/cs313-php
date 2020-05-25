var count = 1;

function addIngredientEntry(){
    count = count+1;
    let addButton = document.getElementById("addIngredient");
    let amountInput = document.getElementsByClassName("amount")[0];
    let ingredientInput = document.getElementsByClassName("ingredient")[0];
    let cloneAmount = amountInput.cloneNode(true);
    let cloneIngredient = ingredientInput.cloneNode(true);
    cloneAmount.children[1].value = '';
    cloneIngredient.children[1].value = '';
    cloneAmount.children[1].name= "amount"+count;
    cloneIngredient.children[1].name= "ingredient"+count;

    let ingredientArea = document.getElementById("ingredientArea");

    ingredientArea.insertBefore(cloneAmount, addButton);
    ingredientArea.insertBefore(cloneIngredient, addButton);
    
}