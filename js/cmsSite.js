const selectBtn = document.getElementById('selectBtn');
const siteHtml = document.getElementById('siteHtml');
const imgList = document.getElementById('imgList');
const selectImgBox = document.getElementById('selectImgBox');
const closeSelectImgBox = document.getElementById('closeSelectImgBox');
const imgChkBtn = document.getElementById('imgChkBtn');
const selectImglist = document.getElementsByClassName('selectImglist');
let imgListHtml = '';
selectBtn.addEventListener('click',()=>{
    selectImgBox.style.display = "flex";
})
closeSelectImgBox.addEventListener('click',()=>{
    selectImgBox.style.display = "none";
})
const clickImgFn = (e)=>{
    e.target.classList.toggle('click');
}
for(let i=0;i<selectImglist.length;i++){
    selectImglist[i].addEventListener('click',clickImgFn);
}

imgChkBtn.addEventListener('click',()=>{
    for(let i=0;i<selectImglist.length;i++){
        console.log(selectImglist[i]);
        
        if(selectImglist[i].classList[1] == "click"){
            imgListHtml += `<img src='${selectImglist[i].src}'>`;
        }
    }
    imgList.innerHTML = imgListHtml;
    selectImgBox.style.display = "none";
})