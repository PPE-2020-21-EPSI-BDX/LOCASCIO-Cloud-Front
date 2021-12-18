// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('pk_test_51IccnyHHq6fdZswDoaGovrpjYvL8wanzhQUFGp310uGjiHEqPsVNrWFyHn2hZ2O2Bi8529KQmFvoMSq37RRQ1pTd00KpUfjy4K');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        marginBottom: '20px',
        padding: '10px 18px 10px 18px',
        border: '1px solid #2b3553',
        borderRadius: '.4285rem',
        fontSize: '.75rem',
        fontFamily: 'inherit',
        display: 'block',
        width: '100%',
        fontWeight: '400',
        lineHeight: '1.428571',
        backgroundColor: 'transparent',
        backgroundClip: 'padding-box',
        boxShadow: 'none',
        boxSizing: 'border-box',
        ':focus' : {
            borderColor: '#e14eca',
            boxShadow: 'none',
            outline: '0'
        }
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
	
    // Submit the form
    form.submit();
}