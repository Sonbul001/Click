function calcTotal() {
    if (document.getElementById("prdct").children.length == 0 ) {
        const text = document.createElement("h1");
        text.innerText = "Cart is empty";
        text.style = "font-size: 20px; padding:10px";
        const box = document.getElementById('prdct');
        box.appendChild(text);
    }
    else {
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
}

window.onload = (event) => {
    calcTotal();
};