const imgList = document.getElementsByClassName('imgList');
const imgClose = document.getElementById('imgClose');
const imgsrc = document.getElementById('imgsrc');
const lightBox = document.getElementById('lightBox');
const back = document.getElementById('back');
const openImg = (e)=>{
    lightBox.style.display = "flex";
    imgsrc.src = e.target.src;
}

for(let i=0;i<imgList.length;i++){
    imgList[i].addEventListener('click', openImg);
}
const closeImg = ()=>{
    lightBox.style.display = "none";
    imgsrc.src = "";
}
imgClose.addEventListener('click',closeImg);
back.addEventListener('click', closeImg);