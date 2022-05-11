const newsUpdate = document.getElementById('newsUpdate');
// const updateImgBtn = document.getElementById('updateImgBtn');
const imgsrc = document.getElementById('imgsrc');
const updateImgBox = document.getElementById('updateImgBox');
const closeBox = document.getElementById('closeBox');
const imglist = document.getElementsByClassName('imglist');
const selectImg = document.getElementById('selectImg');
const smallimg = document.getElementById('smallimg');
let src = '';

 if(imgsrc.value==""){
        console.log(true);
    }
console.log(imgsrc.value);
imgsrc.addEventListener('change',()=>{
    console.log(imgsrc.value);
   
    
})

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
// updateImgBtn.addEventListener('click',()=>{
//     updateImgBox.style.display = 'flex';
// })
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

// window.onload = ()=>{
    const smallimglist = document.getElementById('smallimglist');
    const smallImg = smallimglist.getElementsByClassName('smallImg');
    let smallImgArr = [];
    let idx = null;
    let smallhtml = '';
    const smallImgData = document.getElementById('smallImgData');
    const createSmallImgBox = document.getElementById('createSmallImgBox');
    const closeSmallImgBtn = document.getElementById('closeSmallImgBtn');
    const simglist = createSmallImgBox.querySelectorAll('.smallImg');
    const createSmallImgBtn = document.getElementById('createSmallImgBtn');
    const createSmallBtnChk = document.getElementById('createSmallBtnChk');
    
    createSmallImgBtn.addEventListener('click',()=>{
        createSmallImgBox.style.display = "flex";
    })
    closeSmallImgBtn.addEventListener('click',()=>{
        createSmallImgBox.style.display = "none";
    })
    for(let s=0;s<smallImg.length;s++){
        smallImgArr.push(smallImg[s]);
    }
    // console.log(smallImgArr);
   

    for(let i=0;i<smallImg.length;i++){
        smallImg[i].addEventListener('click',deleteSmallImgFn);
    }

    const clickSmallImgFn = (e)=>{
        e.target.classList.toggle('click');
        
    }
    for(let i=0;i<simglist.length;i++){
        simglist[i].addEventListener('click',clickSmallImgFn)
    }
    createSmallBtnChk.addEventListener('click',createSmallImgFn)
    function createSmallImgFn(){
        for(let s=0;s<simglist.length;s++){
            // console.log(simglist[s].classList[1]);
            // console.log(smallimglist.innerHTML);
            if(simglist[s].classList[1] == 'click'){
                // console.log(simglist[s].outerHTML);
                simglist[s].classList.remove('click');
                // console.log(simglist[s].outerHTML);
                
                 smallImgArr.push(simglist[s])
                // smallimglist.innerHTML += simglist[s].outerHTML;
            }
            
        }
        smallImgData.value = '';
        for(let i=0;i<smallImgArr.length;i++){
            smallImgData.value += smallImgArr[i].outerHTML;
        }

        smallimglist.innerHTML = smallImgData.value;
        alert('新增成功!');
        for(let r=0;r<smallImg.length;r++){
            smallImg[r].removeEventListener('click',deleteSmallImgFn);
        }
        for(let i=0;i<smallImg.length;i++){
            smallImg[i].addEventListener('click',deleteSmallImgFn);
        }
        createSmallImgBox.style.display = "none";
        // console.log(smallImgData.value);
        
        
        // console.log(smallImgArr);
    }
    function deleteSmallImgFn(){
        let chk = confirm('確定要刪除嗎?');
        if(!chk) return;
        for(let i=0;i<smallImgArr.length;i++){
            if(smallImgArr[i].outerHTML.includes(this.src)){
                // console.log(i);
                idx = i;
            }
        }
        // console.log(smallImgArr[idx]); 
        smallImgArr.splice(idx, 1)
        console.log(smallImgArr);
        // console.log(smallImgArr.join(''));
        smallhtml ='';
        for(let q=0;q<smallImgArr.length;q++){
            smallhtml += smallImgArr[q].outerHTML;
        }
        console.log(smallhtml);
        smallimglist.innerHTML = smallhtml;
        smallImgData.value = smallhtml;
        alert('刪除成功!');
        for(let r=0;r<smallImg.length;r++){
            smallImg[r].removeEventListener('click',deleteSmallImgFn);
        }
        for(let i=0;i<smallImg.length;i++){
            smallImg[i].addEventListener('click',deleteSmallImgFn);
        }
    }
// }

