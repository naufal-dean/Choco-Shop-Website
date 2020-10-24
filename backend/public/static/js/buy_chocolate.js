function callBuy(e) {
    e.preventDefault()
    var amount = document.getElementById("amount").value
    var address = document.getElementById("address").value
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                // location.href = "."
            } else {
                // location.href = "."
            }
        }
    }
    xhr.open("PUT", "/api/chocolates/1/buy")
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.send(`amount=${amount}&address=${address}`)
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
    location.href = "."
}
