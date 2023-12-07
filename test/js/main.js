console.info("Loaded Vote Script");

const welcomeBox = document.getElementById('user');
const loginBox = document.getElementById("index");
const voteBox = document.getElementById("vote");

/**
 * Login
 */
const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', function (event) {
    event.preventDefault();
    let username = loginForm.querySelector('input#username').value;
    let password = loginForm.querySelector('input#password').value;

    // Submit the information to the form endpoint.
    $.ajax({
        method: "POST",
        url: "/auth_user.php",
        data: {
            username: username,
            password: password
        }
    })
    .done(function (result) {
        localStorage.setItem("user", JSON.stringify(result));
        const username = result.username;
        const welcomeMessage = document.getElementById("welcomeMessage");
        welcomeMessage.innerHTML = `Welcome Back ${username}`;
        loginBox.classList.add('hide');
        welcomeBox.classList.remove('hide');
        voteBox.classList.remove('hide');
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
        url: "/register_user.php",
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

if (!isAuthenticated) {
    loginBox.classList.remove('hide');
} else {
    const result = localStorage.getItem("user");

    const name = JSON.parse(result).user.name;
    const welcomeMessage = document.getElementById("welcomeMessage");
    welcomeMessage.innerHTML = `Welcome Back ${name}`;
    welcomeBox.classList.remove('hide');
    voteBox.classList.remove('hide');
}
