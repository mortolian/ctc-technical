/**
 * Logout
 */

function logout() {
    localStorage.removeItem("user");
    window.location.href="/logout.php";
}