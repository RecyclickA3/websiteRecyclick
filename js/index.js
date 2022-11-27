var kategori = document.querySelector('.kategori');
var images = [kategori2.png, kategori2.png, kategori2.png];

var i=0;
function prev(){
    if(i <= 0) i = images.length;
    i--;
    return setImg();
}
