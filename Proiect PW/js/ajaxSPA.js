const asyncButtons = $("a[data-type=async]").toArray();

asyncButtons.forEach(button => {
    button.addEventListener("click", function(e) {
        e.preventDefault();
        let path = this.getAttribute("href");

        $.ajax({
            url: `/${path}`,
            method: "GET",
            success: data => {
                if (path === "/") {
                    document.getElementById("page-content").innerHTML = "";
                } else {
                    document.getElementById("page-content").innerHTML = data;
                }
            }
        });
    });
});

asyncButtons[0].click();