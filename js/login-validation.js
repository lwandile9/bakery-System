// Getting elements
const userNameElement = document.getElementById("Login-Username");
const passwordElement = document.getElementById("Login-Password");
const btnLoginElement = document.getElementById("btnLogin");
const frmElement = document.querySelector(".login-form");

const redBorder = "border-color: red";
const removeBorder = "border-color: none";

function validateForm() {
  let name = userNameElement.value;
  let password = passwordElement.value;

  // Validate username and password
  const isNameValid = validateField(name, userNameElement);
  const isPasswordValid = validateField(password, passwordElement);

  if (!isNameValid || !isPasswordValid) {
    alert("Please fill in all required fields with valid data.");
    return false;
  }

  return true;
}

function validateField(value, element) {
  if (value.trim() === "") {
    element.style.cssText = redBorder;
    return false;
  } else {
    element.style.cssText = removeBorder;
    return true;
  }
}
