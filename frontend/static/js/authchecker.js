var xhr = new XMLHttpRequest()
xhr.onreadystatechange = function() {
    if (this.readyState == 4) {
        if (this.status == 403) {
            location.href = "login.html"
        }
    }
}

xhr.open("GET", "http://localhost:5000/users/auth_check/")
xhr.send()
