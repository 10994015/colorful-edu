const leaseModule = document.getElementById('leaseModule');
const leaseBtn = document.getElementById('leaseBtn');
const leaseClose = document.getElementById('leaseClose');

const leftbtn = document.getElementsByClassName('leftbtn');
const rightbtn = document.getElementsByClassName('rightbtn');
// const imgList = document.getElementsByClassName('imgList');
let x = 0;
let imgList = null;
const imgopenclick = document.getElementsByClassName('imgopenclick');
const lightBox = document.getElementById('lightBox');
const back = document.getElementById('back');
const imgClose = document.getElementById('imgClose');
leaseBtn.addEventListener('click',()=>{
    leaseModule.style.display = "flex";
})

leaseClose.addEventListener('click',()=>{
    leaseModule.style.display = "none";
})

const rightBtnFn = (e)=>{
    imgList = e.target.parentNode.getElementsByClassName('imgbox')[0].getElementsByClassName('imgList');
    
    x++;
    if(x > imgList.length - 1){
        x = 0;
    }
    for(let i=0;i<imgList.length;i++){
        imgList[i].style.transform = `translateX(-${x}00%)`;
    }
}
const leftbtnFn = (e)=>{
    imgList = e.target.parentNode.getElementsByClassName('imgbox')[0].getElementsByClassName('imgList');
    x--;
    if(x < 0){
        x = imgList.length - 1;
    }
    for(let i=0;i<imgList.length;i++){
        imgList[i].style.transform = `translateX(-${x}00%)`;
    }
}
for(let i=0;i<rightbtn.length;i++){
    rightbtn[i].addEventListener('click',rightBtnFn)
}
for(let i=0;i<leftbtn.length;i++){
    leftbtn[i].addEventListener('click',leftbtnFn)
}
// rightbtn.addEventListener('click',()=>{
  
// })


// leftbtn.addEventListener('click',()=>{
   
// })
const openImg = (e)=>{
    lightBox.style.display = "flex";
    imgsrc.src = e.target.src;
}
const closeImg = ()=>{
    lightBox.style.display = "none";
    imgsrc.src = "";
}
for(let i=0;i<imgopenclick.length;i++){
    imgopenclick[i].addEventListener('click',openImg)
}
imgClose.addEventListener('click',closeImg);
back.addEventListener('click',closeImg);