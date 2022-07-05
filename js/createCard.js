const iconBoxContent = document.getElementsByClassName('iconBoxContent')[0];
const icon = iconBoxContent.getElementsByTagName('i');
const closeIconBox = document.getElementById('closeIconBox');
const iconBox = document.getElementById('iconBox');
const createIcon = document.getElementById('createIcon');
const checkicon = document.getElementById('checkicon');
const hiddenIcon = document.getElementById('hiddenIcon');
const chosenIcon = document.getElementById('chosenIcon');
let bordericon = "";
const clearBorder = ()=>{
    for(let i=0;i<icon.length;i++){
        icon[i].classList.remove('check');
    }
}

const checkIcon = (e)=>{
    clearBorder();
    e.target.classList.add('check');
}

for(let i=0;i<icon.length;i++){
    icon[i].addEventListener("click",checkIcon)
}
closeIconBox.addEventListener('click',()=>{
    iconBox.style.display = "none";
})
createIcon.addEventListener('click',()=>{
    iconBox.style.display = "block"
})
checkicon.addEventListener('click',()=>{
    for(let i=0;i<icon.length;i++){
        if(icon[i].classList[2]==="check"){
            bordericon = icon[i].className;
        }
    }
    hiddenIcon.value = bordericon;
    chosenIcon.className = bordericon;
    iconBox.style.display = "none";
})