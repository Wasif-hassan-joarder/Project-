function validateLogin() {
  const username = document.querySelector('[name="username"]').value;
  const password = document.querySelector('[name="password"]').value;

  if (username === "" || password === "") {
    alert("Please fill in all fields");
    return false;
  }
  return true;
}

function validateRegister() {
  const username = document.querySelector('[name="username"]').value;
  const email = document.querySelector('[name="email"]').value;
  const password = document.querySelector('[name="password"]').value;

  if (username === "" || email === "" || password === "") {
    alert("Please fill in all fields");
    return false;
  }
  return true;
}
