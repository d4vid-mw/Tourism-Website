document.getElementById('contactForm').addEventListener('submit', function(event) {
  var name = document.getElementById('name').value.trim();
  var email = document.getElementById('email').value.trim();
  var message = document.getElementById('message').value.trim();

  if (name === '' || email === '' || message === '') {
    alert('Please fill in all fields');
    event.preventDefault();
  }
});

document.getElementById('signupForm').addEventListener('submit', function(event) {
  var fullname = document.getElementById('fullname').value.trim();
  var email = document.getElementById('email').value.trim();
  var contact = document.getElementById('contact').value.trim();
  var tourpackage = document.getElementById('tourpackage').value;
  
  if (fullname === '' || email === '' || contact === '' || tourpackage === 'disabled') {
    alert('Please fill in all fields');
    event.preventDefault();
  }
});
