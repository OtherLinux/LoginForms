document.addEventListener("DOMContentLoaded", function () {
    let curr = "P"
    let label = document.getElementById("labelpasswordrepeat");
    let password = document.getElementById("password")
    let password_repeat = document.getElementById("passwordrepeat")
    let show_hide = document.getElementById("ShowButton")


    if (password.value !== "") {
        label.classList.remove("HiddenPass");
        password_repeat.classList.remove("HiddenPass");
    } else if (password.value === "") {
        label.classList.add("HiddenPass");
        password_repeat.classList.add("HiddenPass");
    }



    show_hide.addEventListener('click', function () {
        if (curr === "P") {
            password.setAttribute("type", "text")
            password_repeat.setAttribute("type", "text")
            show_hide.textContent = "Hide Passwords"
            curr = "T"
        }
        else if (curr === "T") {
            password.setAttribute("type", "password")
            password_repeat.setAttribute("type", "password")
            show_hide.textContent = "Show Passwords"
            curr = "P"
        }
    })


    password.addEventListener('input', (e) => {
        if (password.value !== "") {
            label.classList.remove("HiddenPass");
            password_repeat.classList.remove("HiddenPass");
        } else if (password.value === "") {
            label.classList.add("HiddenPass");
            password_repeat.classList.add("HiddenPass");
            password_repeat.value = ""
        }
    })

    document.getElementById("LogInText").addEventListener("click", (e) => {
        alert("Sorry but this feature was not a part of the assignment");
    })

})