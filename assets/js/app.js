// INEZAYIJURU Brigitte Reg No: 25/30689

/**
 * Vanilla JS to calculate Total = Quantity * Price instantly as user types
 */

document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const priceInput = document.getElementById('price');
    const totalInput = document.getElementById('total');

    /**
     * Calculate total from quantity and price
     */
    function calculateTotal() {
        const quantity = parseFloat(quantityInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        const total = quantity * price;
        totalInput.value = total.toFixed(2);
    }

    // Add event listeners for real-time calculation
    quantityInput.addEventListener('input', calculateTotal);
    priceInput.addEventListener('input', calculateTotal);

    // Calculate initial total on page load
    calculateTotal();
});

