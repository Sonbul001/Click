function searchBar() {
    var input, filter, items, a, i, txtValue;
    input = document.getElementById('search-bar');
    filter = input.value.toUpperCase();
    items = document.getElementsByClassName('item');

    for (i = 0; i < items.length; i++) {
        a = items[i].getElementsByTagName('h2')[0];
        txtValue = a.innerText;
        if (txtValue.toUpperCase().includes(filter)) {
            items[i].style.display = "";
        } else {
            items[i].style.display = "none";
        }
    }
}