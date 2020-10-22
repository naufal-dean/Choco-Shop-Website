var xhr = new XMLHttpRequest()
xhr.onreadystatechange = function() {
    if (this.readyState == 4) {
        if (this.status == 403) {
            location.href = "/login"
        }
    }
}

xhr.open("GET", "/api/users/auth_check/")
xhr.send()
