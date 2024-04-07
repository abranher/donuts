const inputFile = document.getElementById("inputFile");
const ElementIMG = document.getElementById("ElementIMG");
const ElementBtn = document.getElementById("ElementBtn");

const imageOld = ElementIMG.getAttribute("src");

inputFile.addEventListener("change", (e) => {
  let ar = e.target.files[0];
  if (ar != undefined) {
    const reader = new FileReader();
    reader.readAsDataURL(ar);
    reader.addEventListener("load", (e) => {
      let url = URL.createObjectURL(ar);
      ElementIMG.setAttribute("src", url);
    });
    ElementBtn.classList.add("flex");
    ElementBtn.classList.remove("hidden");
  } else {
    ElementIMG.setAttribute("src", imageOld);
    ElementBtn.classList.add("hidden");
    ElementBtn.classList.remove("flex");
  }
});
