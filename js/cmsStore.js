const storeimg = document.getElementsByClassName('storeimg');
console.log(storeimg);

for(let i=0;i<storeimg.length;i++){
    storeimg[i].addEventListener('click',storeFn);
}

function storeFn(e){
    let chk = confirm('確定要刪除嗎?');
    if(chk===false){
        return;
    }
    var params = new URLSearchParams()
    var id = e.target.alt;
    params.append('id',id )
    axios.post('./deleteStore.php',params).then(res=>{
        alert('刪除成功!');
        window.location.reload();
    })
}