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
        var quantity = document.getElementsByClassName("quantity");
        var prices = document.getElementsByClassName("Price");
        for (let i = 0; i < prices.length; i++) {
            var counter = quantity[i].value;
            var available = parseInt(document.getElementsByClassName("Availability")[i].innerHTML);
            quantity[i].max = available;
            while (counter >= 1){
                console.log(counter);
                var element = prices[i].innerHTML;
                var price = parseInt(element);
                sum += price;
                counter --;
            }
        }
        const total = document.getElementsByClassName('total');
        total[0].innerHTML = sum + "LE";
        total[1].value = sum;
    }
}

function submit(){
    var form = document.getElementById('quant-form');
    form.submit();
}
window.onload = (event) => {
    calcTotal();
};

window.onchange = (event) => {
    calcTotal();
};