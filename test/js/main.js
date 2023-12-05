console.info("Loaded Vote Script");

/**
 * Register
 */
const registerButton = document.getElementById('registerUserForm');
const registerUserForm = document.getElementById("registerUserForm");

registerButton.addEventListener('submit', function (event) {
    event.preventDefault();

    let firstname = registerUserForm.querySelector('input#firstname').value;
    let lastname = registerUserForm.querySelector('input#lastname').value;
    let username = registerUserForm.querySelector('input#registerUsername').value;
    let password = registerUserForm.querySelector('input#registerPassword').value;

    // Submit the information to the form endpoint.
    $.ajax({
        method: "POST",
        url: "/test/register_user.php",
        data: {
            firstname: firstname,
            lastname: lastname,
            username: username,
            password: password

        }
    })
    .done(function (msg) {
        const registerUserForm = document.getElementById("registerUserForm");
        registerUserForm.innerHTML = "Your new user was created and you can now log in.";
    })
    .fail(function () {
        alert("Could not complete the request, please try again later.");
    });
});

/**
 * Login
 */
const loginForm = document.getElementById('loginForm');
const loginButton = document.getElementById('loginButton');

loginButton.addEventListener('submit', function (event) {
    event.preventDefault();
    alert("login");
});
