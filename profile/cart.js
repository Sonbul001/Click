function calcTotal() {
    let sum = 0;
    var prices = document.getElementsByClassName("Price");
    for (let i = 0; i < prices.length; i++) {
        var element = prices[i].innerHTML;
        var price = parseInt(element);
        sum += price;

    }
    const total = document.getElementById('total');
    total.innerHTML = sum + "LE";
}

window.onload = (event) => {
    calcTotal();
};