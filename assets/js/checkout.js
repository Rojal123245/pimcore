

const stripe = Stripe('your_publishable_key');
const elements = stripe.elements();
const card = elements.create('card');

card.mount('#card-element');

const form = document.getElementById('payment-form');
const clientSecret = form.dataset.secret;

form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const {error, paymentIntent} = await stripe.confirmCardPayment(clientSecret, {
        payment_method: {
            card: card,
            billing_details: {
                name: 'Customer Name'
            }
        }
    });

    if (error) {
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
    } else {
        if (paymentIntent.status === 'succeeded') {
            // Send success to server
            await fetch('/checkout/complete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    payment_intent_id: paymentIntent.id
                })
            });

            window.location.href = '/checkout/success';
        }
    }
});