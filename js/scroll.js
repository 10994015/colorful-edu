
const nurture = document.getElementById('nurture');
const cardbox = document.getElementsByClassName('cardbox')[0];
const partners = document.getElementsByClassName('partners')[0];
const course_content = document.getElementById('course').getElementsByClassName('content')[0]
window.addEventListener('scroll',()=>{
    
    if(this.scrollY>200){
        course_content.classList.add('fadeout');
    }
    if(this.scrollY>800){
        nurture.classList.add('fadeout');
    }
    if(this.scrollY>1100){
        cardbox.classList.add('fadeout');
    }
    if(this.scrollY>1700){
        store.classList.add('fadeout');
    }
    if(this.scrollY>2500){
        partners.classList.add('fadeout');
    }
});