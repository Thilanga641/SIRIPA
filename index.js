// DOM Elements
const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");
const switchToRegister = document.getElementById("switchToRegister");
const switchToLogin = document.getElementById("switchToLogin");
const accountButton = document.getElementById("accountButton");

const signupButton = document.getElementById("signupButton");
const signupForm = document.getElementById("signupForm");

// Toggle Navigation Menu
menuBtn.addEventListener("click", () => {
  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-menu-line" : "ri-close-line");

  if (isOpen) {
    navLinks.classList.add("close");
    navLinks.addEventListener(
      "animationend",
      () => {
        navLinks.classList.remove("open", "close");
      },
      { once: true }
    );
  } else {
    navLinks.classList.add("open");
  }
});

navLinks.addEventListener("click", () => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});

// ScrollReveal Animations
const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

ScrollReveal().reveal(".header__container .section__subheader", { ...scrollRevealOption });
ScrollReveal().reveal(".header__container .section__header", { ...scrollRevealOption, delay: 500 });
ScrollReveal().reveal(".header__container .scroll__btn", { ...scrollRevealOption, delay: 1000 });
ScrollReveal().reveal(".header__container .header__socials", { ...scrollRevealOption, origin: "left", delay: 1500 });

ScrollReveal().reveal(".about__image-1, .about__image-3 , .about__image-5", { ...scrollRevealOption, origin: "right" });
ScrollReveal().reveal(".about__image-2", { ...scrollRevealOption, origin: "left" });
ScrollReveal().reveal(".about__content .section__subheader", { ...scrollRevealOption, delay: 500 });
ScrollReveal().reveal(".about__content .section__header", { ...scrollRevealOption, delay: 1000 });
ScrollReveal().reveal(".about__content p", { ...scrollRevealOption, delay: 1500 });
ScrollReveal().reveal(".about__content .about__btn", { ...scrollRevealOption, delay: 2000 });

// Form Toggle Logic
switchToRegister.addEventListener("click", () => {
  toggleForms("register");
});

switchToLogin.addEventListener("click", () => {
  toggleForms("login");
});

function toggleForms(formType) {
  if (formType === "register") {
    loginForm.style.display = "none";
    registerForm.style.display = "block";
    document.getElementById("accountModalLabel").innerText = "Register";
  } else {
    registerForm.style.display = "none";
    loginForm.style.display = "block";
    document.getElementById("accountModalLabel").innerText = "Login";
  }
}

// Login Form Submission
loginForm.addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent form submission

  const username = document.getElementById("usernameInput").value;

  if (username) {
    accountButton.textContent = username;
    accountButton.setAttribute("data-bs-toggle", ""); // Remove modal trigger

    const modal = document.getElementById("accountModal");
    const modalInstance = bootstrap.Modal.getInstance(modal);
    modalInstance.hide();
  }
});

// Signup Form Submission with Success Message
signupButton.addEventListener("click", async function () {
  const formData = new FormData(signupForm);

  try {
    const response = await fetch("account_handler.php", {
      method: "POST",
      body: formData,
    });

    const result = await response.json();
    if (result.success) {
      showSuccessMessage("Sign up successfully!");
      toggleForms("login");
    } else {
      alert(result.message || "Signup failed. Please try again.");
    }
  } catch (error) {
    console.error("Error during signup:", error);
    alert("An error occurred. Please try again later.");
  }
});

// Function to display a success message at the top of the page
function showSuccessMessage(message) {
  const messageContainer = document.createElement("div");
  messageContainer.style.position = "fixed";
  messageContainer.style.top = "0";
  messageContainer.style.left = "0";
  messageContainer.style.width = "100%";
  messageContainer.style.backgroundColor = "#28a745";
  messageContainer.style.color = "#fff";
  messageContainer.style.padding = "10px";
  messageContainer.style.textAlign = "center";
  messageContainer.style.zIndex = "9999";
  messageContainer.textContent = message;

  document.body.appendChild(messageContainer);

  // Remove the message after 4 seconds
  setTimeout(() => {
    messageContainer.remove();
  }, 4000);
}
