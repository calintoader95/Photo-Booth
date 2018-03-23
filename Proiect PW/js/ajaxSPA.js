const asyncButtons = $("a[data-type=async]").toArray();

asyncButtons.forEach(button => {
    button.addEventListener("click", function(e) {
        e.preventDefault();
        let path = this.getAttribute("href");

        $.ajax({
            url: `/${path}`,
            method: "GET",
            success: data => {
                document.getElementById("page-content").innerHTML = data;
            }
        });
    });
});