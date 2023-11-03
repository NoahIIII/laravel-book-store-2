const salesSec=document.querySelector(".sales");document.addEventListener("scroll",(()=>{scrollY>114?(salesSec.classList.add("sales--dark"),salesSec.classList.add("fixed-top")):(salesSec.classList.remove("sales--dark"),salesSec.classList.remove("fixed-top"))}));const accountCont=document.querySelector(".account"),accountLoginTab=document.querySelectorAll(".account__tab--login"),accountRegisterTab=document.querySelectorAll(".account__tab--register"),forgetPassbtns=document.querySelectorAll(".login__forget-btn");accountLoginTab.forEach((e=>{e.addEventListener("click",(()=>{const t=e.closest(".account");t.classList.remove("account--register"),t.classList.remove("account--forget"),t.classList.add("account--login")}))})),accountRegisterTab.forEach((e=>{e.addEventListener("click",(()=>{const t=e.closest(".account");t.classList.remove("account--login"),t.classList.remove("account--forget"),t.classList.add("account--register")}))})),forgetPassbtns.forEach((e=>{e.addEventListener("click",(t=>{t.preventDefault();const s=e.closest(".account");s.classList.remove("account--login"),s.classList.add("account--forget"),s.classList.remove("account--register")}))}));const adressEditBtn=document.querySelector(".address__edit-btn"),addressDetails=document.querySelector(".address__details"),addressFormCont=document.querySelector(".address__form-cont");function activeProductColor(e){const t=e.closest(".products__item"),s=t.querySelectorAll(".product__img"),c=t.querySelectorAll(".product__color"),o=e.dataset.target;c.forEach((e=>{e.dataset.target===o?e.classList.add("active"):e.classList.remove("active")})),s.forEach((e=>{e.dataset.id===o?e.classList.remove("d-none"):e.classList.add("d-none")}))}adressEditBtn?.addEventListener("click",(e=>{e.preventDefault(),addressDetails.classList.add("d-none"),addressFormCont.classList.remove("d-none")})),document.addEventListener("click",(e=>{e.target.closest(".product__color")&&!e.target.closest(".single-product__details")&&activeProductColor(e.target.closest(".product__color"))}));
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
