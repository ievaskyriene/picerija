console.log("js veikia");

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

document.querySelectorAll(".add-button").forEach(button => {
    button.addEventListener("click", () => {
        console.log("click");
        const form = button.closest(".form");

        console.log(button.closest(".form"));
        const route = form.querySelector("[name=route]").value;
        const id = form.querySelector("[name=product_id]").value;
        const count = form.querySelector("[name=count]").value;
        form.querySelector("[name=count]").value = 0;
        window.axios = require("axios");
        axios
            .post(route, {
                product_id: id,
                count: count
            })
            .then(function(response) {
                const cart = document.querySelector("#cart-count");
                cart.innerHTML = response.data.html;

                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
    });
});
