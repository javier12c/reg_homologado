import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
import Swal from "sweetalert2";
window.Swal = Swal;

import Flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";
document.addEventListener("DOMContentLoaded", function () {
    const flatpickrInputs = document.querySelectorAll(".datepicker");
    flatpickrInputs.forEach(function (element) {
        new Flatpickr(element);
    });
});
