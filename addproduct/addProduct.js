function previewImage(event)
{
   let imageFiles = event.target.files;
   let imageSrc = URL.createObjectURL(imageFiles[0]);
   let imagePreviewElement = document.getElementById("picId");
   imagePreviewElement.src = imageSrc;
   imagePreviewElement.style.display="block";
}