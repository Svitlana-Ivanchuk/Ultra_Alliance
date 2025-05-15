(() => {
 const refs = {
  openModalBtn: document.querySelector("[data-modal-open]"),
  closeModalBtn: document.querySelector("[data-modal-close]"),
  modal: document.querySelector("[data-modal]"),
 };

 refs.openModalBtn.addEventListener("click", toggleModal);
 refs.closeModalBtn.addEventListener("click", toggleModal);
 refs.modal.addEventListener("click", onBackdropClick);
 document.addEventListener("keydown", onEscPress);

 function toggleModal() {
  refs.modal.classList.toggle("is-hidden");
 }

 function onBackdropClick(event) {
  if (event.target === refs.modal) {
   toggleModal();
  }
 }

 function onEscPress(event) {
  if (event.key === "Escape" && !refs.modal.classList.contains("is-hidden")) {
   toggleModal();
  }
 }
})();

function setFontSize(size) {
 const html = document.documentElement;
 html.setAttribute("data-font-size", size);

 let fontSize;
 switch (size) {
  case "100%":
   fontSize = "1.1rem";
   break;
  case "200%":
   fontSize = "1.5rem";
   break;
  default:
   fontSize = "1rem";
 }

 html.style.fontSize = fontSize;

 localStorage.setItem("font-size", size);
}

function setColorTheme(theme) {
 const html = document.documentElement;
 html.setAttribute("data-color-theme", theme);

 localStorage.setItem("color-theme", theme);
}

function setImagesTheme(pic) {
 const html = document.documentElement;
 html.setAttribute("data-img-theme", pic);

 localStorage.setItem("img-theme", pic);
}

// Додаємо слухачі подій на кнопки після завантаження сторінки
document.addEventListener("DOMContentLoaded", function () {
 // Встановлюємо значення з localStorage (якщо воно є)
 const savedFontSize = localStorage.getItem("font-size");
 if (savedFontSize) {
  setFontSize(savedFontSize);
 }
 const savedColorTheme = localStorage.getItem("color-theme");
 if (savedColorTheme) {
  setColorTheme(savedColorTheme);
 }
 const savedImagesTheme = localStorage.getItem("img-theme");
 if (savedImagesTheme) {
  setImagesTheme(savedImagesTheme);
 }

 // Кнопки для зміни розміру шрифту
 document
  .getElementById("btn-100")
  .addEventListener("click", () => setFontSize("100%"));
 document
  .getElementById("btn-200")
  .addEventListener("click", () => setFontSize("200%"));
 document.getElementById("btn-reset").addEventListener("click", () => {
  const html = document.documentElement;
  html.removeAttribute("data-font-size"); // Видаляємо атрибут data-font-size
  html.style.fontSize = ""; // Скидаємо font-size, щоб повернути стандартний
  localStorage.removeItem("font-size"); // Видаляємо збережене значення з localStorage
 });

 // Кнопки для зміни теми
 document
  .getElementById("btn-black-white")
  .addEventListener("click", () => setColorTheme("bw"));

 document
  .getElementById("btn-white-black")
  .addEventListener("click", () => setColorTheme("wb"));
 document
  .getElementById("btn-contrast")
  .addEventListener("click", () => setColorTheme("contrast"));
 document.getElementById("btn-reset-theme").addEventListener("click", () => {
  const html = document.documentElement;
  html.removeAttribute("data-color-theme");
  localStorage.removeItem("color-theme");
 });

 // Кнопки для зміни картинок
 document
  .getElementById("btn-wb-img")
  .addEventListener("click", () => setImagesTheme("img-bw"));
 document
  .getElementById("btn-without-img")
  .addEventListener("click", () => setImagesTheme("no-img"));
 document.getElementById("btn-reset-img").addEventListener("click", () => {
  const html = document.documentElement;
  html.removeAttribute("data-img-theme");
  localStorage.removeItem("img-theme");
 });

 // Кнопки скидання всіх тем
 document.getElementById("btn-reset-all").addEventListener("click", () => {
  const html = document.documentElement;
  html.removeAttribute("data-color-theme");
  localStorage.removeItem("color-theme");
  html.removeAttribute("data-font-size");
  html.style.fontSize = "";
  localStorage.removeItem("font-size");
  html.removeAttribute("data-img-theme");
  localStorage.removeItem("img-theme");
 });
});
