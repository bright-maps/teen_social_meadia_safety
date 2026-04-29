var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slide");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000);
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

const appDivs = document.querySelectorAll('.app');

appDivs.forEach(appDiv => {
    appDiv.addEventListener('mouseenter', () => {
        appDiv.classList.add('shaking');
    });

    appDiv.addEventListener('mouseleave', () => {
        setTimeout(() => {
            appDiv.classList.remove('shaking');
        }, 500);
    });
});


//Paypal
let donatedAmount = 20.00;
    let campaignId = null;

    document.addEventListener('DOMContentLoaded', function() {
      const donationFormContainer = document.getElementById('donation-form-container');
      const donationForm = document.createElement('form');
      donationForm.id = 'donation-form';
      donationForm.innerHTML = `
        <input type="text" id="donation-amount" name="donation-amount" pattern="[0-9]*" required />
      `;
      donationFormContainer.appendChild(donationForm);

      document.getElementById('donation-amount').addEventListener('blur', function() {
        const donationAmountInput = document.getElementById('donation-amount');
        donatedAmount = parseFloat(donationAmountInput.value);
      });

      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('id')) {
          campaignId = urlParams.get('id');
      } else {
          console.error('Campaign ID not found in the URL');
      }

      const userId = localStorage.getItem('userId');

      function initializePayPalButton() {
        const payload = {
          donatedAmount: donatedAmount,
          campaignId: campaignId,
          userId: userId
        };

        const jsonData = JSON.stringify(payload);

        const existingPayPalButton = document.getElementById('paypal-button-container');
        if (existingPayPalButton) {
          existingPayPalButton.innerHTML = '';
        }

        paypal.Buttons({
          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [{
                amount: {
                  value: donatedAmount.toFixed(2)
                }
              }]
            });
          },
          onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {

              alert('Thank you for your donation, ' + details.payer.name.given_name + '! You donated: $' + donatedAmount);

              $.ajax({
                type: "POST",
                url: "donationTracking.php", 
                data: jsonData, 
                contentType: "application/json", 
                success: function(response) {
                  console.log("Data inserted successfully");
                },
                error: function(xhr, status, error) {
                  console.error("Error inserting data: " + error);
                }
              });

            });
          }
        }).render('#paypal-button-container');
      }

      document.getElementById('donate-button').addEventListener('click', function() {
        const donationAmountInput = document.getElementById('donation-amount');
        if (donationAmountInput.value !== '') {
          initializePayPalButton();
        } else {
          alert('Please enter a donation amount.');
        }
      });
    });
