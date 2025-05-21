<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Fake reCAPTCHA</title>
  <style>
    .fake-recaptcha {
  display: inline-flex;
  flex-direction: column;
  border: 1px solid #d3d3d3;
  border-radius: 4px;
  padding: 10px;
  width: 300px;
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  user-select: none;
}

.fake-recaptcha > .recaptcha-main {
  display: flex;
  align-items: center;
  width: 100%;
}

.fake-recaptcha > .recaptcha-main > .checkbox-box {
  width: 20px;
  height: 20px;
  border: 2px solid #999;
  margin-right: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  background-color: white;
  position: relative;
}

.fake-recaptcha > .recaptcha-main > .checkbox-box > .checkmark {
  display: none;
  color: green;
  font-size: 16px;
  font-weight: bold;
}

.fake-recaptcha > .recaptcha-main > .checkbox-box > .loading-spinner {
  display: none;
  width: 14px;
  height: 14px;
  border: 2px solid #ccc;
  border-top: 2px solid #888;
  border-radius: 50%;
  animation: spin 1s linear infinite;
}

.fake-recaptcha.loading > .recaptcha-main > .checkbox-box > .loading-spinner {
  display: inline-block;
}

.fake-recaptcha.done > .recaptcha-main > .checkbox-box > .checkmark {
  display: inline;
}

.fake-recaptcha > .recaptcha-main > .captcha-text {
  font-size: 14px;
}

.fake-recaptcha > .recaptcha-main > .recaptcha-logo {
  margin-left: auto;
}

.fake-recaptcha > .recaptcha-main > .recaptcha-logo > img {
  width: 48px;
  height: auto;
}

.fake-recaptcha > .recaptcha-footer {
  margin-top: 5px;
  width: 100%;
  text-align: right;
  font-size: 9px;
  color: #555;
  line-height: 1.2;
}

.fake-recaptcha > .recaptcha-footer > .recaptcha-brand {
  font-size: 9px;
  color: #555;
}

.fake-recaptcha > .recaptcha-footer > a {
  color: #555;
  text-decoration: none;
  margin-left: 4px;
}

.fake-recaptcha > .recaptcha-footer > a:hover {
  text-decoration: underline;
}

/* Animation Keyframe */
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  </style>
</head>
<body>

<div class="fake-recaptcha" id="recaptcha">
  <div class="recaptcha-main">
    <div class="checkbox-box" id="checkbox">
      <span class="checkmark">✔</span>
      <div class="loading-spinner" id="spinner"></div>
    </div>
    <div class="captcha-text" id="captchaText">I'm not a robot</div>
    <div class="recaptcha-logo">
      <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA">
    </div>
  </div>
  <div class="recaptcha-footer">
    <div class="recaptcha-brand">reCAPTCHA</div>
  </div>
</div>

<script>
  const recaptcha = document.getElementById("recaptcha");
  const checkbox = document.getElementById("checkbox");
  const spinner = document.getElementById("spinner");
  const checkmark = document.querySelector(".checkmark");
  const captchaText = document.getElementById("captchaText");

  checkbox.addEventListener("click", () => {
    if (recaptcha.classList.contains("done")) return;

    recaptcha.classList.add("loading");
    captchaText.textContent = "Checking...";
    spinner.style.display = "inline-block";
    checkmark.style.display = "none";

    setTimeout(() => {
      recaptcha.classList.remove("loading");
      recaptcha.classList.add("done");
      spinner.style.display = "none";
      checkmark.style.display = "inline";
      captchaText.textContent = "You are verified";
    }, 2000);
  });
</script>

</body>
</html>
