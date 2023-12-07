console.info("Loaded Vote Script");

/**
 * Login
 */
const loginForm = document.getElementById('loginForm');
const loginButton = document.getElementById('loginButton');

loginForm.addEventListener('submit', function (event) {
    event.preventDefault();
    let username = loginForm.querySelector('input#username').value;
    let password = loginForm.querySelector('input#password').value;

    // Submit the information to the form endpoint.
    $.ajax({
        method: "POST",
        url: "/test/auth_user.php",
        data: {
            username: username,
            password: password
        }
    })
    .done(function (result) {
        localStorage.setItem("user", result);
        console.info(result);
    })
    .fail(function () {
        alert("Cannot log you in. Confirm your details and try again.");
    });
});

function hasAuth() {
    const user = localStorage.getItem("user");
    return !!user;
}

/**
 * Register
 */
const registerButton = document.getElementById('registerUserButton');
const registerUserForm = document.getElementById("registerUserForm");

registerUserForm.addEventListener('submit', function (event) {
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

let isAuthenticated = hasAuth();
const welcomeBox = document.getElementById('user');
const loginBox = document.getElementById("index");

console.log('auth:' + isAuthenticated);

if (!isAuthenticated) {
    welcomeBox.classList.add('hide');
    loginBox.classList.remove('hide');
}
