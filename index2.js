const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler= document.querySelector(".theme-toggler") 



//show slider
menuBtn.addEventListener('click', ()=>{
    sideMenu.style.display='block';
})

//close slider
closeBtn.addEventListener('click', ()=>{
    sideMenu.style.display='none';
})

//change theme
themeToggler.addEventListener('click', ()=>{
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})





let modal = document.querySelector("#add-product");

modal.addEventListener("click", myFunction);

function myFunction() {
    document.querySelector(".popup").classList.add("active1");
}

document.querySelector(".popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active1");
});


document.querySelector(".popup .close-btn").addEventListener("click", function(){
    document.querySelector(".popup").classList.remove("active1");
});