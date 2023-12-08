<?php
include_once "src/Kernel.php";

include_once "./views/header.php";
?>
    <div id="user" class="user container text-center hide">
        <div class="welcome row text-start">
            <h1 id="welcomeMessage">Welcome Back</h1>
            <hr>
        </div>
        <div class="row row-cols-auto">
            <div class="row row-cols-auto">
                <div class="col">
                    <button class="btn btn-primary" onclick="window.location.href='/'">Home</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" onclick="window.location.href='vote.php'">Voting</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" onclick="logout()">Logout</button>
                </div>
            </div>
        </div>
    </div>

    <div id="jumbo" class="index container text-center hide">
        <div class="row">
            <div class="col">
                <h1 class="ffs">Welcome to the VOTING App</h1>
            </div>
        </div>
    </div>

    <div id="index" class="index container text-center hide">
        <div class="row">
            <div class="col">
                <h3>Login</h3>
                <p>If you already have an account, login here.</p>
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div id="loginError" class="error"></div>
                    <button type="submit" id="loginButton" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col">
                <h3>Register</h3>
                <p>If this is your first time, and you would like to vote, you should register here.</p>

                <form id="registerUserForm">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="registerUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" aria-describedby="passwordHelp" required>
                        <div id="passwordHelp" class="form-text">At least 8 characters, 1 uppercase letter, 1 special character.</div>
                    </div>
                    <div id="registerError" class="error"></div>
                    <button type="submit" id="registerUserButton" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>

    <div id="vote" class="vote container text-center hide">
        <div class="row">
            <div class="col">
                <h3>VOTE</h3>
                <p>Vote on your favorite polls <a href="/vote.php">here</a>.</p>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>

<?php
include_once "./views/footer.php";
?>