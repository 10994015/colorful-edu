// const smallImg = document.getElementsByClassName('smallImg');
// const moudelImg = document.getElementById('moudelImg');
// const moudel = document.getElementById('moudel');
// const closeMoudel = document.getElementById('closeMoudel');

// const openImg = (e)=>{
//     moudel.style.display = "flex";
//     moudelImg.src = e.target.src;
// }

// for(let i=0;i<smallImg.length;i++){
//     smallImg[i].addEventListener('click', openImg);
// }
// closeMoudel.addEventListener('click',()=>{
//     moudel.style.display = "none";
// })

const text = document.getElementById('text');
const moudel = document.getElementById('moudel');
const moudelImg = document.getElementById('moudelImg');
const p = text.querySelectorAll('p')
const closeMoudel = document.getElementById('closeMoudel');

const openImg = (e)=>{
    moudel.style.display = "flex";
    moudelImg.src = e.target.src;
    
}
let img = text.getElementsByTagName('img');
for(let i=0;i<img.length;i++){
    img[i].addEventListener('click',openImg)
}
closeMoudel.addEventListener('click',()=>{
    moudel.style.display = "none";
})