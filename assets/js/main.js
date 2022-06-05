forcePageReloadOnSelectChange();

function forcePageReloadOnSelectChange() {
    const selects = document.querySelectorAll("select.posts-per-page");
    for (const select of selects) {
        select.addEventListener("change", function () {
            location.href = this.value;
        });
    }
}
