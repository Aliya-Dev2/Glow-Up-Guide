
// setting constructor with  target variables as parameters
function Product(name, price) {
    this.name = name;
    this.price = price;
}

// use set the array named cart and save the items using localStorage
let cart = localStorage.getItem("cart");


if (cart == null) {
    cart = [];
} else {
    //  set the items to objects (type) after storing in localStorage
    cart = JSON.parse(cart);
}

// create array includes all buttons of class addCart

var buttons = document.querySelectorAll(".addCart");

buttons.forEach(function(btn) {

    // activate the following function whenever the button clicked

    btn.addEventListener("click", function () {

        // use closest method to access all elements in the card container 
        var card = btn.closest(".card");

        // set item name from the card 

        var name = card.querySelector(".card-title").innerText;

        // price is set to be the second index of the same class  (card-titl)
        var price = parseFloat(card.querySelectorAll(".card-title")[1].innerText);

        // new object named product includes name and price
        var product = new Product(name, price);

        //add products with their info to the card 
        cart.push(product);


        // turn data to string to store them in local storage
        localStorage.setItem("cart", JSON.stringify(cart));

        alert("Item added to cart");
    });

});