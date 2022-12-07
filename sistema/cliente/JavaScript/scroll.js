//Scroll up
function scrollUp() {
    const scrollup = document.getElementById("scroll-up");
    if (this.scrollY >= 460) scrollup.classList.add("show-scroll");
    else scrollup.classList.remove("show-scroll");
  }
  window.addEventListener("scroll", scrollUp);  