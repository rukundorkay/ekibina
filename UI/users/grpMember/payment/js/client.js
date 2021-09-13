
// Create a Stripe client.
var stripe = Stripe('pk_test_51HAxyeJoHpIDTE07AHYb4UArtbPvt7fIKxane0s2VyP7WboBYi8ttdb5IVnynBLPYULRLjRXEPlgfGeL7kwvi7mH00LFxd2mu2');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
//style button with bootstrap
document.querySelector('#payment-form button').classList=" btn btn-warning btn-block mt-4";

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});




var form = document.getElementById('payment-form');
var clientSecret = document.getElementById("submit").getAttribute("data-secret");
var senderName=document.getElementById("senderName").getAttribute("value");

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  var load = document.getElementById("submit");
  load.innerHTML='<i class="fas fa-spinner fa-spin"></i>';

  document.getElementById("submit").disabled = true;




  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: senderName
      }
    }
    
  }).then(function(result) {
   
    if (result.error) {
      document.getElementById("submit").disabled = false;
      var load = document.getElementById("submit");
       load.textContent="submit"
      



      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);

      } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
       var submit=document.getElementById("submit");
       
       submit.textContent="done successfully";
        

        //console.log("done");
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
    }
  });
});
