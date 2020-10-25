function callAddStock(e) {
    e.preventDefault()
    var amount = document.getElementById("amount").value
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                console.log('succeed')
                // location.href = "."
            } else {
                console.log('failed')
                // location.href = "."
            }
        }
    }
    // /detail_chocolate/([1-9]*)/add/
    xhr.open("PUT", "/api/chocolates/" + getUrlPartAtPos(1) + "/add")
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.send(`amount=${amount}`)
}

function decAmount() {
    var amount = parseInt(document.getElementById("amount").value)
    amount = isNaN(amount) ? 0 : amount
    document.getElementById("amount").value = amount > 0 ? --amount : 0
}

function incAmount() {
    var amount = parseInt(document.getElementById("amount").value)
    amount = isNaN(amount) ? 0 : amount
    document.getElementById("amount").value = ++amount
}

function goBack() {
    // /detail_chocolate/([1-9]*)/add/
    location.href = "/detail_chocolate/" + getUrlPartAtPos(1)
}
