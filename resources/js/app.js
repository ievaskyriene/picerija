console.log("js veikia");

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
