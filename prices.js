


let cart = localStorage.getItem("cart");

if (cart == null) {
    cart = [];
} else {
    cart = JSON.parse(cart);
}

function displayCart() {

    // set values to display later
    let total = 0;
    let discount = 0;
    let finalCost = 0;


    // get table id from the external calculator page and initilize it

    let table = document.getElementById("cartTable");


    table.innerHTML = "";

    // use loop to display items in rows

    for (let i = 0; i < cart.length; i++) {

        //set item variable to be a product with its info in the cart

        let item = cart[i];

        table.innerHTML +=
            "<tr>" +
            // display the item of type name
                "<td>" + item.name + "</td>" +
                // display the item of type price
                "<td>" + item.price + "</td>" +
                "<td>" +
                // add remove btn with index 
                    "<button onclick='removeItem(" + i + ")' class='btn btn-danger'>remove</button>" +
                "</td>" +
            "</tr>";
// set total number
        total += Number(item.price);
    }
// set 15% discount for items 20 omr or more 
    if (total > 19) {
        discount = Math.round(total * 0.15 * 100) / 100;
    }
// calculate final cost
    finalCost =Math.round((total - discount)*100)/100;

    // display values
    document.getElementById("discount").innerHTML =
        "Worth discount = " + discount + " OMR";

    document.getElementById("total").innerText =
        "Total Cost = " + finalCost + " OMR";
}

// remove item function 
function removeItem(index) {

    // delete a row of the button index
    cart.splice(index, 1);

    // update the cart 

    localStorage.setItem("cart", JSON.stringify(cart));

    // display the new cart
    displayCart(); 
}

displayCart();