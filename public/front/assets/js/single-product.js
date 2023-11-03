$(".comments__slider").owlCarousel({
  rtl: !0,
  items: 1,
  loop: !0,
  dots: !0,
  margin: 20,
  responsive: {
    0: { items: 1, nav: !1 },
    768: { items: 2 },
    1020: { items: 4, nav: !0 },
  },
});
const increaseBtn = document.querySelector(".single-product__increase"),
  decreaseBtn = document.querySelector(".single-product__decrease"),
  quantityInput = document.querySelector(".single-product__input");
increaseBtn.addEventListener("click", () => {
  quantityInput.value
    ? (quantityInput.value = +quantityInput.value + 1)
    : (quantityInput.value = 1);
}),
  decreaseBtn.addEventListener("click", () => {
    quantityInput.value
      ? 1 != quantityInput.value &&
        (quantityInput.value = +quantityInput.value - 1)
      : (quantityInput.value = 1);
  });
