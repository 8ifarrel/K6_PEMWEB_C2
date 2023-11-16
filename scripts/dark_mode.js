const darkModeToggle = document.getElementById("dark-mode-toggle");

function enableDarkMode() {
  document.body.classList.add("dark-mode");
  const inputs = document.querySelectorAll(
    'input[type="text"], input[type="date"], textarea, input[type="email"]'
  );
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].style.backgroundColor = "#161616";
    inputs[i].style.color = "#fff";
    inputs[i].style.borderColor = "#505050";
  }
}

function disableDarkMode() {
  document.body.classList.remove("dark-mode");
  const inputs = document.querySelectorAll(
    'input[type="text"], input[type="date"], textarea, input[type="email"]'
  );
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].style.backgroundColor = "#fff";
    inputs[i].style.color = "#000";
    inputs[i].style.borderColor = "#ccc";
  }
}

function toggleDarkMode() {
  if (document.body.classList.contains("dark-mode")) {
    disableDarkMode();
  } else {
    enableDarkMode();
  }
}

darkModeToggle.addEventListener("click", toggleDarkMode);