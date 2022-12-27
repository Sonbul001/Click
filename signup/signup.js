let togglePassword = document.getElementById("togglePassword");
let password = document.getElementById("id_password");

function showpass() {
   var elem = document.getElementById("id_password");
   var btn = document.getElementById("togglePassword");
   if (elem.type === "password") {
      elem.type = "text";
   }
   else {
      elem.type = "password";
   }
}
function previewImage(event) {
   let imageFiles = event.target.files;
   let imageSrc = URL.createObjectURL(imageFiles[0]);
   let imagePreviewElement = document.getElementById("picId");
   imagePreviewElement.src = imageSrc;
   imagePreviewElement.style.display = "block";
}