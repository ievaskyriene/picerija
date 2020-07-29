const productPhotoInput =
    '<hr><br><input type="file" name="photo[]"></input> <br> ';
// Alt photo name<input type="text" name="alt[]" id=""></input>
const addPhotoButton = document.querySelector("#add-product-photo");

console.log(addPhotoButton);
const productPhotoInputsArea = document.querySelector(
    "#product-photo-inputs-area"
);

if (addPhotoButton) {
    addPhotoButton.addEventListener("click", () => {
        console.log("lalla");
        const input = document.createElement("span");
        input.innerHTML = productPhotoInput;
        productPhotoInputsArea.appendChild(input);
    });
}
