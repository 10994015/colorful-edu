const selectBannerBoxBtn = document.getElementById('selectBannerBoxBtn');
const banner = document.getElementById('banner');
const selectBannerBox = document.getElementById('selectBannerBox');
const closeBtn = document.getElementById('closeBtn')
const selectBtn = document.getElementById('selectBtn');
const createImgBox = document.getElementById('createImgBox');
const imglist = document.getElementsByClassName('imglist');
let imgsrc = "";
let imghtml = "";

selectBannerBoxBtn.addEventListener('click',()=>{
    selectBannerBox.style.display = "flex";
})
closeBtn.addEventListener('click',()=>{
    selectBannerBox.style.display = "none";
})
for(let i=0;i<imglist.length;i++){
    imglist[i].addEventListener('click',clickImgFn);
}

selectBtn.addEventListener('click',()=>{
    for(let i=0;i<imglist.length;i++){
        if(imglist[i].classList[1]=="click"){
            // console.log(imglist[i].src);
            imghtml = `<div><img src='${imglist[i].src}'></div>`;
            imgsrc = imglist[i].src;
        }
    }
    banner.value = imgsrc;
    // console.log(imghtml);
    createImgBox.innerHTML = imghtml;
    selectBannerBox.style.display = "none";
})
function clearBoder(){
    for(let i=0;i<imglist.length;i++){
        imglist[i].classList.remove('click');
    }
}
function clickImgFn(){
    clearBoder();
    this.classList.add('click');
}

