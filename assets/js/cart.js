function addToCart(productId) {
    const quantity = document.querySelector('select[name="quantity"]').value;
    
    fetch('/shop/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            productId: productId,
            quantity: parseInt(quantity)
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartCounter(data.cartCount);
            showNotification('Product added to cart');
        }
    });
}

function updateCartCounter(count) {
    const counter = document.getElementById('cart-counter');
    if (counter) {
        counter.textContent = count;
    }
}

// Export functions if using modules
export { addToCart, updateCartCounter };
