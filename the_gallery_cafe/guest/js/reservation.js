// functions for error handling
document.getElementById('reservation-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const time = document.getElementById('time').value.trim();
    const persons = document.getElementById('guests').value.trim();
    const errors = [];


    if (name === '') {
        errors.push('Name is required.');
    }

    if (email === '') {
        errors.push('Email is required.');
    } else if (!validateEmail(email)) {
        errors.push('Email is not valid.');
    }

    if (phone === '') {
        errors.push('Phone number is required.');
    } else if (!validatePhone(phone)) {
        errors.push('Phone number must be 10 digits.');
    }

    if (time === '') {
        errors.push('Reservation time is required.');
    }
});

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[0-9]{10}$/;
    return re.test(phone);
}
