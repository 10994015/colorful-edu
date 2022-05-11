const uploadImgBtn = document.getElementById('uploadImgBtn');
const uplaodImgBox = document.getElementById('uplaodImgBox');
const uploadImgClose = document.getElementById('uploadImgClose');

// const selectImgBtn = document.getElementById('selectImgBtn');
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

const file = document.getElementById('file');
const fileSubmit = document.getElementById('fileSubmit');

const fileimgBtn = document.getElementById('fileimgBtn');

const selectSmallImgBox = document.getElementById('selectSmallImgBox');
const smallimglist = document.getElementsByClassName('smallimglist');
const selectSmallImgClose = document.getElementById('selectSmallImgClose');
const chkSelectsmallBtn = document.getElementById('chkSelectsmallBtn');
let smallImgArr = [];
const selectSmallImgBtn = document.getElementById('selectSmallImgBtn');
const beforesmallImg = document.getElementById('beforesmallImg');
const smallImgData = document.getElementById('smallImgData');
selectSmallImgClose.addEventListener('click',()=>{
    selectSmallImgBox.style.display = "none";
})
selectSmallImgBtn.addEventListener('click',()=>{
    selectSmallImgBox.style.display = "flex";
})
fileSubmit.disabled = true;
file.addEventListener('change',()=>{
    if(file.value != ''){
        fileSubmit.disabled = false;
    }else{
        fileSubmit.disabled = true;
    }
})
if(show.checked){
    show.value=1;
}else{
    show.value=0;
}
// console.log(show.value);

show.addEventListener('change',()=>{
    if(show.checked){
        show.value=1;
    }else{
        show.value=0;
    }
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

// selectImgBtn.addEventListener('click',()=>{
//     selectImgBox.style.display = "flex";
// })
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

// for(let i=0;i<imglist.length;i++){
//     imglist[i].addEventListener('click', chkimg);
// }
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
title.addEventListener('keyup',chageColmun);
content.addEventListener('keyup',chageColmun);
fileimgBtn.addEventListener('change',chageColmun);


function chageColmun(){
    
    if(fileimgBtn.value !='' && title.value!='' && content.value!=''){
        createSubmit.disabled = false;
    }else{
        createSubmit.disabled = true;
    }
}


const smallImgclickFn = (e)=>{
    e.target.classList.toggle('click');
}
for(let i=0;i<smallimglist.length;i++){
    smallimglist[i].addEventListener('click',smallImgclickFn);
}

chkSelectsmallBtn.addEventListener('click',()=>{
    for(let i=0;i<smallimglist.length;i++){
        if(smallimglist[i].classList[1] == 'click'){
            smallImgArr.push(smallimglist[i].src)
        }
    }

    if(smallImgArr.length == 0){
        alert('請選擇圖片!');
        return;
    }
    let smallimghtml = '';
    for(let u=0;u<smallImgArr.length;u++){
        // smallimghtml += `<img src='${smallImgArr[u]}' class='smallImg'>`;
        smallimghtml += "<img src='"+ smallImgArr[u] +"' class='smallImg' >";
    }
    beforesmallImg.innerHTML = smallimghtml;
    smallImgData.value=smallimghtml;
    console.log(smallImgData.value);
    

    alert('選擇成功!');
    selectSmallImgBox.style.display = "none";
})