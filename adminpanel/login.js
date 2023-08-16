const toggleBtn = document.querySelector('#togglebtn');
const divlist = document.querySelector('.underline1');

toggleBtn.addEventListener('click',()=>{
    if(divlist.style.display == 'none'){
        divlist.style.display == 'block';
        toggleBtn.innerHTML='Hide List';
    }else{
        divlist.style.display = 'none';
        toggleBtn.innerHTML = 'Hide List';
    }
})