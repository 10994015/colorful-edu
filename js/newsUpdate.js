const updateImgBtn = document.getElementById('updateImgBtn');
const imgsrc = document.getElementById('imgsrc');
const updateImgBox = document.getElementById('updateImgBox');
const closeBox = document.getElementById('closeBox');
const imglist = document.getElementsByClassName('imglist');
const selectImg = document.getElementById('selectImg');
const smallimg = document.getElementById('smallimg');
let src = '';

const show = document.getElementById('show');
if(show.value==1){
    show.checked = true;
}else{
    show.checked = false;
}
show.addEventListener('change',()=>{
    if(show.checked){
        show.value=1;
    }else{
        show.value=0;
    }
})
updateImgBtn.addEventListener('click',()=>{
    updateImgBox.style.display = 'flex';
})
const clearClick = ()=>{
    for(let i=0;i<imglist.length;i++){
        imglist[i].classList.remove('click');
    }
}
const closeBoxFn = ()=>{
    updateImgBox.style.display = "none";
}
const clickimg = (e)=>{
    clearClick();
    src = e.target.src;
    console.log(src);
    
    e.target.classList.add('click');
}
closeBox.addEventListener('click',closeBoxFn);

for(let i=0;i<imglist.length;i++){
    imglist[i].addEventListener('click',clickimg);
}

selectImg.addEventListener('click',()=>{
    if(src==''){
        alert('尚未選擇圖片!');
        return;
    }
    imgsrc.value = src;
    smallimg.src = src;
    alert('選擇成功!');
    closeBoxFn();
})