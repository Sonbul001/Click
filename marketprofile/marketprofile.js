function showpass() {
    var elem = document.getElementById("pwd");
    var btn = document.getElementById("show-btn");
    if (elem.type === "password") {
        elem.type = "text";
    }
    else {
        elem.type = "password";
    }
}

function allowEdit() {
    if (document.getElementById("email").disabled == true) {
        document.getElementById("username").disabled = false;
        document.getElementById("img").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("pwd").disabled = false;
        document.getElementById("address").disabled = false;
        document.getElementById("phone").disabled = false;
        document.getElementById("location").disabled = false;
        const submitbtn = document.createElement("button");
        submitbtn.type = "submit";
        submitbtn.id = "submit-btn";
        submitbtn.innerText = "Save";
        const form = document.getElementById("edit-btn");
        form.appendChild(submitbtn);
        const cancelbtn = document.createElement("button");
        cancelbtn.type = "button";
        cancelbtn.id = "cancel-btn";
        cancelbtn.addEventListener("click", cancelEdit);
        cancelbtn.addEventListener("click", unSave);
        cancelbtn.innerText = "Cancel";
        form.appendChild(cancelbtn);
    }
}

function cancelEdit() {
    if (document.getElementById("email").disabled == false) {
        document.getElementById("username").disabled = true;
        document.getElementById("img").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("pwd").disabled = true;
        document.getElementById("address").disabled = true;
        document.getElementById("phone").disabled = true;
        document.getElementById("location").disabled = true;
        document.getElementById("submit-btn").remove();
        document.getElementById("cancel-btn").remove();
    }
}

function unSave(){
    document.getElementById("username").value = document.getElementById("username").defaultValue;
    document.getElementById("email").value = document.getElementById("email").defaultValue;
    document.getElementById("pwd").value = document.getElementById("pwd").defaultValue;
    document.getElementById("address").value = document.getElementById("address").defaultValue;
    document.getElementById("phone").value = document.getElementById("phone").defaultValue;
    document.getElementById("location").value = document.getElementById("location").defaultValue;
}