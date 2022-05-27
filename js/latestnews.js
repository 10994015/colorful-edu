const searchBox = document.getElementById('searchBox');
const searchBtn = document.getElementById('searchBtn');

const postItem = document.getElementsByClassName('post-item');
const title = document.getElementsByClassName('title');

searchBtn.addEventListener('click',()=>{
    let keyword = searchBox.value;
    window.location.href = `?page=latestnews&search=${keyword}`;
})
searchBox.addEventListener('keyup',(e)=>{
    if(e.keyCode != 13) return;
    let keyword = searchBox.value;
    window.location.href = `?page=latestnews&search=${keyword}`;
})
// const cleraList = ()=>{
//     for(let i=0;i<postItem.length;i++){
//         postItem[i].style.display = "none";
//     }
// }
// const searchFn = ()=>{
//         cleraList();
//         for(let i=0;i<postItem.length;i++){
//             if(postItem[i].querySelector('.title').innerText.toLowerCase().includes(searchBox.value.toLowerCase())){
//                 postItem[i].style.display = "flex";
//             }
//         }
// }


// searchBtn.addEventListener('click',searchFn);
// searchBox.addEventListener('keyup',(e)=>{
//     if(e.keyCode != 13) return;
//     cleraList();
//     for(let i=0;i<postItem.length;i++){
//         if(postItem[i].querySelector('.title').innerText.toLowerCase().includes(searchBox.value.toLowerCase())){
//             postItem[i].style.display = "flex";
//         }
//     }
// });