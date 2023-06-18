var upload = document.getElementById("upload");
var modal = document.querySelector(".modal");
var closeModal = document.querySelector('.cancel');
var body = document.getElementsByTagName('body')[0];

upload.addEventListener('click', function () {
    modal.classList.add("show");
    body.style.overflow = 'hidden';
    // console.log("click");
})

closeModal.addEventListener('click', function () {
    modal.classList.remove("show");
})