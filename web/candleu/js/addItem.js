function addItemToCart(name, price, image, link){
    $.ajax({ url: '/candleu/common/addToCart.php',
            data: {'function2call': 'addToCart', 'name':name, 'price':price, 'image':image, 'link':link},
            type: 'post',
            success: function(output) {
                
            }
    });
}


function removeItemFromCart(key){
    $.ajax({ url: '/candleu/common/addToCart.php',
            data: {'function2call': 'addToCart', 'name':name, 'price':price, 'image':image, 'link':link},
            type: 'post',
            success: function(output) {
                
            }
    });
}