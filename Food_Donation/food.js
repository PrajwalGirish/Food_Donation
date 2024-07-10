// Mock data for food items
const foodItems = [
    {id: 1,name: "Rice", description: "Steamed white rice", quantity: 50, image: "rice.jpg"},
    {id:2, name: "Bread", description: "Freshly baked bread", quantity: 10, image: "bread.jpg" },
    {id:3,name:"Samosa",description:"Deep Fried pastry filled with spiced potatoes",quantity:10, image: "samosa.jpg"},
    {id:4,name:"Idli",description:"Steamed rize cakes served with chutney and sambar",quantity:10, image: "idli.jpg"},
    {id:5,name:"Lemon Rice",description:"Rice flavored with lemon juice",quantity:10, image: "limerice.jpg"},
    {id:6,name:"Rice Bath",description:"Rice cooked with vegetables and aromatic spices",quantity:10, image: "ricebath.jpg"}
    // Add more food items here
];


const cartItems = [];

// Function to update the cart summary display
function updateCartSummary() {
    const cartSummary = document.getElementById("cart-summary");
    cartSummary.innerHTML = "";

    const summaryText = document.createElement("p");
    summaryText.textContent = "Items in Cart:";
    cartSummary.appendChild(summaryText);

    cartItems.forEach(item => {
        const cartItem = document.createElement("p");
        cartItem.textContent = `${item.selectedQuantity} x ${item.name}`;
        cartSummary.appendChild(cartItem);
    });
}

// Function to update the cart list display
function updateCartList() {
    const cartList = document.getElementById("cart-list");
    cartList.innerHTML = "";

    cartItems.forEach(item => {
        const cartItem = document.createElement("li");
        cartItem.textContent = `${item.selectedQuantity} x ${item.name}`;
        cartList.appendChild(cartItem);
    });
}

// Function to set the quantity of a selected food item
function setQuantity(event) {
    const itemId = parseInt(event.target.getAttribute("data-id"));
    const selectedItem = foodItems.find(item => item.id === itemId);

    if (selectedItem) {
        selectedItem.selectedQuantity = parseInt(event.target.value) || 0;
    }
}

// Function to add items to the cart
function addToCart(event) {
    const itemId = parseInt(event.target.getAttribute("data-id"));
    const selectedItem = foodItems.find(item => item.id === itemId);

    if (selectedItem && selectedItem.selectedQuantity > 0) {
        cartItems.push({ ...selectedItem, selectedQuantity: selectedItem.selectedQuantity });
        selectedItem.selectedQuantity = 0;
         updateCartList();
        updateCartSummary();
    }
}

// Function to display food items dynamically
function displayFoodItems() {
    const foodContainer = document.getElementById("food-container");

    foodItems.forEach(item => {
        const foodItem = document.createElement("div");
        foodItem.className = "food-item";
        foodItem.innerHTML = `
        <img src="${item.image}" alt="${item.name}" class="food-image">
            <h3>${item.name}</h3>
            <p>Description: ${item.description}</p>
            <p>Quantity: ${item.quantity}</p>
            <input type="number" class="quantity-input" min="0" max="10" placeholder="Quantity" data-id="${item.id}" value="${item.selectedQuantity}">
            <button class="add-to-cart" data-id="${item.id}">Add to Cart</button>
        `;
        foodContainer.appendChild(foodItem);
    });
}

// Call the function to display food items
displayFoodItems();

// Event listener for the "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll(".add-to-cart");
addToCartButtons.forEach(button => {
    button.addEventListener("click", addToCart);
});

// Event listener for the quantity input fields
const quantityInputs = document.querySelectorAll(".quantity-input");
quantityInputs.forEach(input => {
    input.addEventListener("change", setQuantity);
});

// Checkout button event listener
const checkoutBtn = document.getElementById("checkout-btn");
checkoutBtn.addEventListener("click", () => {
    if (cartItems.length > 0) {
        let checkoutMessage = "Selected items:\n";

        cartItems.forEach(cartItem => {
            checkoutMessage += `${cartItem.name}: ${cartItem.selectedQuantity}\n`;
        });

        alert(checkoutMessage);
        // Here you can implement further actions, like sending the cart data to a server or processing the checkout.
        
        // Update quantity in food items menu after checkout
        cartItems.forEach(cartItem => {
            const foodItem = foodItems.find(item => item.id === cartItem.id);
            if (foodItem) {
                foodItem.quantity -= cartItem.selectedQuantity;
                foodItem.selectedQuantity = 0;
            }
        });

        updateCartDisplay();
        displayFoodItems();
    } else {
        alert("Your cart is empty. Please add items before checking out.");
    }
});