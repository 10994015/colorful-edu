const courseImg = document.getElementsByClassName('courseImg');
const courseImgModule = document.getElementById('courseImgModule');
const moduleClose = document.getElementById('moduleClose');
const moduleBack = document.getElementById('moduleBack');
const moduleImg = document.getElementById('moduleImg');

const openModule = (e)=>{
    courseImgModule.style.display = "block";
    moduleImg.src = e.target.src;
}
const closeModule = ()=>{
    courseImgModule.style.display = "none";
    moduleImg.src = "";
}
for(let i=0;i<courseImg.length;i++){
    courseImg[i].addEventListener('click',openModule);
}
moduleClose.addEventListener('click',closeModule);
moduleBack.addEventListener('click',closeModule);

