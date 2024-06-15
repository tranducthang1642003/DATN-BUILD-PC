import "slick-carousel";

$(".one-time").slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
});

let quantity = 0;

document.getElementById("increment").addEventListener("click", () => {
    quantity++;
    document.getElementById("quantity").innerText = quantity;
});

document.getElementById("decrement").addEventListener("click", () => {
    if (quantity > 0) {
        quantity--;
        document.getElementById("quantity").innerText = quantity;
    }
});
// Script to change star color on click
document.querySelectorAll('input[name="rating"]').forEach((input) => {
    input.addEventListener("change", () => {
        const rating = input.value;
        document
            .querySelectorAll('label[for^="star"]')
            .forEach((label, index) => {
                if (index < rating) {
                    label.classList.add("text-yellow-500");
                    label.classList.remove("text-gray-300");
                } else {
                    label.classList.add("text-gray-300");
                    label.classList.remove("text-yellow-500");
                }
            });
    });
});
