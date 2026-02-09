# Climate Research Website

A simple PHP/MySQL website for climate research registration.

## Features Implemented:
### ✅ Registration Form with:

Title: **Climate Research Registration**

- First Name & Last Name fields
- Email validation
- Phone number field
- Gender radio buttons `(Male/Female/Other)`
- Age field with validation
- City dropdown with 5 cities
- Password with confirmation
- Secure password hashing `(password_hash())`

## ✅ Login Form with:

- Email and password fields
- Session management
- Secure password verification `(password_verify())`

## ✅ Homepage with:

- Personalized welcome message
- User profile information
- Research project information
- Logout option

## ✅ Security Features:

- Prepared statements to prevent SQL injection
- Password hashing (not stored in plain text)
- Session-based authentication
- Input validation and sanitization

# NB:
Database Security Note: <br>
Passwords are hashed using `password_hash()` and verified using `password_verify()`. This means:
- Original passwords are never stored in the database
- If the database is compromised, passwords cannot be recovered
- Each password gets a unique hash even if two users have the same password
- The system is complete and ready to use! All requirements from the task are implemented.

