function addItemToCart(name, price, image, link){
    $.ajax({ url: '../common/addToCart.php',
            data: {'function2call': 'addToCart', 'name':name, 'price':price, 'image':image, 'link':link},
            type: 'post',
            success: function(output) {
                alert(output);
            }
    });
}
