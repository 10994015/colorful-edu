const leaseModule = document.getElementById('leaseModule');
const leaseBtn = document.getElementById('leaseBtn');
const leaseClose = document.getElementById('leaseClose');

const leftbtn = document.getElementById('leftbtn');
const rightbtn = document.getElementById('rightbtn');
const imgList = document.getElementsByClassName('imgList');
let x = 0;
const lightBox = document.getElementById('lightBox');
const back = document.getElementById('back');
const imgClose = document.getElementById('imgClose');
leaseBtn.addEventListener('click',()=>{
    leaseModule.style.display = "flex";
})

leaseClose.addEventListener('click',()=>{
    leaseModule.style.display = "none";
})

rightbtn.addEventListener('click',()=>{
    x++;
    if(x > imgList.length - 1){
        x = 0;
    }
    for(let i=0;i<imgList.length;i++){
        imgList[i].style.transform = `translateX(-${x}00%)`;
    }
})


leftbtn.addEventListener('click',()=>{
    x--;
    if(x < 0){
        x = imgList.length - 1;
    }
    for(let i=0;i<imgList.length;i++){
        imgList[i].style.transform = `translateX(-${x}0%)`;
    }
})
const openImg = (e)=>{
    lightBox.style.display = "flex";
    imgsrc.src = e.target.src;
}
const closeImg = ()=>{
    lightBox.style.display = "none";
    imgsrc.src = "";
}
for(let i=0;i<imgList.length;i++){
    imgList[i].addEventListener('click',openImg)
}
imgClose.addEventListener('click',closeImg);
back.addEventListener('click',closeImg);