function callBuy(e) {
    e.preventDefault()
    let amount = document.getElementById("amount").value
    let address = document.getElementById("address").value
    let xhr = new XMLHttpRequest()
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                console.log(this.responseText)
                // location.href = "."
            } else {
                console.log('failed')
                // location.href = "."
            }
        }
    }
    // /detail_chocolate/([1-9]*)/buy/
    xhr.open("PUT", "/api/chocolates/" + getUrlPartAtPos(1) + "/buy")
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.send(`amount=${amount}&address=${address}`)
}

function decAmount() {
    let amount = parseInt(document.getElementById("amount").value)
    amount = isNaN(amount) ? 0 : amount
    document.getElementById("amount").value = amount > 0 ? --amount : 0
    updateTotalPrice()
}

function incAmount() {
    let amount = parseInt(document.getElementById("amount").value)
    amount = isNaN(amount) ? 0 : amount
    document.getElementById("amount").value = ++amount
    updateTotalPrice()
}

function goBack() {
    location.href = "."
}

function updateTotalPrice() {
    let price = parseInt(document.getElementById("price").innerHTML)
    price = isNaN(price) ? 0 : price
    let amount = parseInt(document.getElementById("amount").value)
    amount = isNaN(amount) ? 0 : amount
    document.getElementById("total-price").innerHTML = (price * amount).toString()
}