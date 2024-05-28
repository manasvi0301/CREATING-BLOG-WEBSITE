function validateForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    if (username === '' || password === '') {
        errorMessage.textContent = 'All fields are required';
        return false;
    }

    if (password.length < 6) {
        errorMessage.textContent = 'Password must be at least 6 characters long';
        return false;
    }

    errorMessage.textContent = '';
    return true;
}
