
var inputFile = document.querySelector("#file_upload")

function chooseFile(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image').attr('src', e.target.result)
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

// var inputFile = document.querySelector('.img');
// const fileUpload = document.getElementById('file-upload');
// fileUpload.addEventListener('change', (event) => {
//     const files = event.target.files;
//     var str = '';
//     for (var i = 0; i < files.length; i++) {
//         var file = files[i];
//         var url = URL.createObjectURL(file);
//         str += "<span><img class = 'img' src='" + url + "' width='80' class='img m-1 img-rounded mt-2' </span>"
//     }
//     var blockImages = document.getElementById('images');
//     blockImages.innerHTML = str;
//     // console.log(str)


// });