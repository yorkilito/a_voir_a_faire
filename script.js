const comment_box = document.querySelectorAll(".comment_section");

comment_box.forEach((comment) => {
    comment.addEventListener("click", () => comment.classList.toggle("active"));
});
