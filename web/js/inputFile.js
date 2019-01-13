
var formatFiles = [
    'image/jpeg',
    'image/png'
];

function validateFormatImg(file){
    for(var i = 0; i < formatFiles.length; i++){
        if(file.type === formatFiles[i])
            return true;
    }
    return false;
}

function validateImgPlatillo(event){
    var file = event.target.files[0];
    if(validateFormatImg(file))
        var imgPlatillo = document.getElementById('platilloThumb');
        imgPlatillo.src = window.URL.createObjectURL(file);
}
