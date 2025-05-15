const iconBase = ultraData.spriteUrl + "#";

document.querySelectorAll("details.products_block").forEach((details) => {
 const useElement = details.querySelector("summary use");
 if (!useElement) return;

 const updateIcon = () => {
  const iconId = details.open ? "pointer_up" : "pointer_down";
  useElement.setAttribute("href", iconBase + iconId);
  useElement.setAttribute("xlink:href", iconBase + iconId); // для Safari
 };

 updateIcon();
 details.addEventListener("toggle", updateIcon);
});
