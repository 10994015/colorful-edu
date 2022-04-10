const uploadImgBtn = document.getElementById('uploadImgBtn');
const uplaodImgBox = document.getElementById('uplaodImgBox');
const uploadImgClose = document.getElementById('uploadImgClose');

const selectImgBtn = document.getElementById('selectImgBtn');
const selectImgBox = document.getElementById('selectImgBox');
const selectImgClose = document.getElementById('selectImgClose');

const imglist = document.getElementsByClassName('imglist');

const chkSelectBtn = document.getElementById('chkSelectBtn');

uploadImgBtn.addEventListener('click',()=>{
    uplaodImgBox.style.display = "flex";
})
uploadImgClose.addEventListener('click',()=>{
    uplaodImgBox.style.display = "none";
})

selectImgBtn.addEventListener('click',()=>{
    selectImgBox.style.display = "flex";
})
selectImgClose.addEventListener('click',()=>{
    selectImgBox.style.display = "none";
})

const clearBorder = ()=>{
    for(let i=0;i<imglist.length;i++){
        imglist[i].style.border = "none";
    }
}

const chkimg = (e)=>{
    clearBorder();
    e.target.style.border = "3px #333 solid";
}

for(let i=0;i<imglist.length;i++){
    imglist[i].addEventListener('click', chkimg);
}

chkSelectBtn.addEventListener('click',()=>{
    
})