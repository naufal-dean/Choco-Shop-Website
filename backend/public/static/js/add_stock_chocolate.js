function callAddStock(e) {
    e.preventDefault()
    var amount = document.getElementById("amount").value
    var xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            // if (this.status == 200) {
            //     console.log('succeed')
            //     location.href = "."
            // } else {
            //     console.log('failed')
            //     location.href = "."
            // }
        }
    }
    xhr.open("PUT", "/api/chocolates/1/add")
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
    location.href = "."
}
