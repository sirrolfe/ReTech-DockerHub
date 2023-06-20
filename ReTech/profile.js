window.onload = function() {
  // Fetch profile data
  fetch('getProfile.php')
  .then(response => response.json())
  .then(data => {
    // Set user data
    document.getElementById('fullName').value = data.FullName;
    document.getElementById('email').value = data.Email;
    document.getElementById('phoneNumber').value = data.PhoneNumber;
    document.getElementById('city').value = data.City;
    // Set profile pic if exists
    if (data.ProfilePic) {
        document.getElementById('profilePic').src = data.ProfilePic;
    }
  })
  .catch((error) => {
    console.error('Error:', error);
  });

  // Handle profile pic changes
  document.getElementById('picUpload').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePic').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
  });

  // Form submission event
  document.getElementById('profileForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    fetch('updateProfile.php', {
      method: 'POST',
      body: new FormData(this)
    })
    .then(response => response.text())
    .then(result => {
      alert(result);
      location.reload();
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  });
}
