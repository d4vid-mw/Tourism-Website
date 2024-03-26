document.querySelector('form[name="booking"]').addEventListener('submit', function(event) {
  event.preventDefault();
  validateForm();
});

function validateForm() {
  const fullName = document.querySelector('input[name="full name"]').value;
  const email = document.querySelector('input[name="Email"]').value;
  const phoneNumber = document.querySelector('input[name="contactNumber"]').value;
  const tourPackage = document.querySelector('select').value;

  const errors = [];

  if (!/^[a-zA-Z]+$/.test(fullName)) {
    errors.push('<span class="error">Invalid full name. Please use only alphabets.</span>');
  }

  if (!/^\d{10}$/.test(phoneNumber)) {
    errors.push('<span class="error">Invalid phone number. Please enter a 10-digit number.</span>');
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    errors.push('<span class="error">Invalid email address. Please enter a valid email.</span>');
  }

  if (errors.length > 0) {
    document.getElementById('signupForm').insertAdjacentHTML('beforeend', '<p>' + errors.join('</p><p>') + '</p>');
  } else {
    alert('Booking successful for ' + fullName + '.');
    document.querySelector('form[name="booking"]').submit();
  }
}
