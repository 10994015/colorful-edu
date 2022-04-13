const uploadImgBtn = document.getElementById('uploadImgBtn');
const uplaodImgBox = document.getElementById('uplaodImgBox');
const uploadImgClose = document.getElementById('uploadImgClose');

const selectImgBtn = document.getElementById('selectImgBtn');
const selectImgBox = document.getElementById('selectImgBox');
const selectImgClose = document.getElementById('selectImgClose');

const imglist = document.getElementsByClassName('imglist');

const chkSelectBtn = document.getElementById('chkSelectBtn');
const beforeImg = document.getElementById('beforeImg');
const imgsrc = document.getElementById('imgsrc');
const content = document.getElementById('content');
const title = document.getElementById('title');
const createSubmit = document.getElementById('createSubmit');
const show = document.getElementById('show');

if(show.checked){
    show.value=1;
}else{
    show.value=0;
}
console.log(show.value);

show.addEventListener('change',()=>{
    if(show.checked){
        show.value=1;
    }else{
        show.value=0;
    }
    console.log(show.value);
    
})

function deleteImgFn(e){
    console.log(e);
    chkthis = confirm('確定要刪除嗎?');
    if(chkthis){
        window.location.href = `./deleteNewsImg.php?id=${e}`;
        return;
    }
}
let simgsrc = null;
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
    simgsrc = e.target.src;
    chkSelectBtn.classList.remove('disabled');
    chkSelectBtn.addEventListener('click',chkSelectFn)

}

for(let i=0;i<imglist.length;i++){
    imglist[i].addEventListener('click', chkimg);
}
const chkSelectFn = ()=>{
    beforeImg.src = simgsrc;
    imgsrc.value = simgsrc;
    alert('選擇成功!');
    chageColmun();
    selectImgBox.style.display = "none";
}

let url = location.href;
if(url.split('?')[1] != undefined){
    let queryString = url.split('?')[1].split('=')[0];
    let queryStringData = url.split('?')[1].split('=')[1];
    if(queryString==='upload' && queryStringData==='ok'){
        selectImgBox.style.display = "flex";
    }
}
title.addEventListener('change',chageColmun);
content.addEventListener('change',chageColmun);


function chageColmun(){
    if(title.value !='' && imgsrc.value !='' && content.value !=''){
        createSubmit.disabled = false;
    }else{
        createSubmit.disabled = true;
    }
}