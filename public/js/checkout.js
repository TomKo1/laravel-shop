// //Stripe.setPublishableKey('pk_test_7Fftps5esv8GZmxgRqHg566q');
// var stripe = Stripe('pk_test_7Fftps5esv8GZmxgRqHg566q');

// var form = $('#checkout-form');

// form.submit(function(event) {
//   $('#charge-error').addClass('hidden');

//   var elements = stripe.elements();
//   // card.mount('#card-element');

//   var card = elements.create('card', {
//     cardNumber: $('#card-number').val(),
//     cardCvc: $('#card-cvc').val(),
//     cardExpiry: $('#card-expiry-month').val() + '/' + $('#card-expiry-year').val()
//   });

//   var promise = stripe.createToken(card);

//   promise.then(function(result){
//     console.log('  serdecznie');

//       if(response.error) {
//         console.log( 'bardzo ');

//         $('#charege-error').removeClass('hidden');
//         $('#charge-error').text(response.error.message);
//         form.find('button').prop('disabled', true);
//       } else {
//          // Get the token ID:
//          var token = response.id;

//          console.log('zegnam');

//          // Insert the token into the form so it gets submitted to the server:
//          form.append($('<input type="hidden" name="stripeToken" />').val(token));

//          // Submit the form:
//          form.get(0).submit();
//       }
//   });

//   return false;
// });

// Create a Stripe client.
var stripe = Stripe('pk_test_7Fftps5esv8GZmxgRqHg566q');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
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

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}




// form.submit(function(event){
//   console.log('witam bardzo serdecznie');

//   $('#charge-error').addClass('hidden');
//   form.find('button').prop('disabled', true);
//   Stripe.card.createToken({
//     number: $('#card-number').val(),
//     cvc: $('#card-cvc').val(),
//     exp_month: $('#card-expiry-month').val(),
//     exp_year: $('#card-expiry-year').val(),
//     name: $('#card-name').val()
//   }, stripeResponseHandler);

//   return false;
// });

// function stripeResponseHandler(status, response) {
//   console.log('  serdecznie');

//   if(response.error) {
//     console.log( 'bardzo ');

//     $('#charege-error').removeClass('hidden');
//     $('#charge-error').text(response.error.message);
//     form.find('button').prop('disabled', true);
//   } else {
//      // Get the token ID:
//      var token = response.id;

//      console.log('zegnam');

//      // Insert the token into the form so it gets submitted to the server:
//      form.append($('<input type="hidden" name="stripeToken" />').val(token));

//      // Submit the form:
//      form.get(0).submit();
//   }
// }
