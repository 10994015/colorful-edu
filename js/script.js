const list = document.getElementById('list');
const menu = document.getElementById('menu');

menu.addEventListener('click',()=>{
    list.classList.toggle('open');
    if(menu.className === "fas fa-bars"){
        menu.className = "fas fa-times";
        menu.style.color = "#fff";
        return;
    }
    menu.className = "fas fa-bars";
    menu.style.color = "#1484c4";
})