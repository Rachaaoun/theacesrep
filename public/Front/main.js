const navBar = document.getElementById('navBar')
const closeIcon = document.getElementById('closeIcon')
const toggleIcon = document.getElementById('toggleIcon')
const navLinks = document.querySelectorAll('.navLink')
const addTocartButtons = document.querySelectorAll('#itemToCart')
const htmlCartItem = document.getElementById('itemsInCart') 


addTocartButtons.forEach(addButton =>{
addButton.addEventListener('click', addItemToCart)
} )

function addItemToCart(e){
  e.preventDefault()
  let btn = e.target;
  
  // let deleteItemBtn = btn.parentElement.parentElement.children[0].children[0].src;

  let cartImage = btn.parentElement.parentElement.children[0].children[0].src;
 
  let imageName = btn.parentElement.parentElement.children[1].children[0].innerText;
  
  let itemPrice = btn.parentElement.parentElement.children[1].children[2].innerText;
  

  let newItem = document.createElement('div')
  newItem.classList.add('item')
  newItem.innerHTML = `<div id="deleteCartItem">
                        <i class="uil uil-times icon"></i>
                      </div>
                      <div class="cartImg">
                          <img src="${cartImage}" alt="Cart Image">
                      </div>
                      <div class="ImageName">
                          <span>${imageName}</span>
                          <p>PRICE: $${itemPrice}</p>
                      </div>
                      <div class="itemControl">
                        <i class="uil uil-plus-circle icon"></i>
                        <span>x1</span>
                        <i class="uil uil-minus-circle icon"></i>
                      </div>`

  htmlCartItem.appendChild(newItem)  
  const cartTitle = document.querySelector('.cartTitle') 
  cartTitle.innerHTML = `<h2>Your Cart Details </h2>` 

}



// Function to add Menu
toggleIcon.addEventListener('click', ()=>{
navBar.classList.add('showNavBar')
})
closeIcon.addEventListener('click', ()=>{
navBar.classList.remove('showNavBar')
})

// Show Cart Screen ====================================>
const cartPage = document.getElementById('cartDiv')
const cartIcon = document.getElementById('cartIcon')
const closeCartIcon = document.getElementById('closeCartIcon')

cartIcon.onclick = ()=>{
 cartPage.style.top = '110px'
}
closeCartIcon.onclick = ()=>{
  cartPage.style.top = '-150%'
}


// Remove navBar by each navLink
navLinks.forEach(navLink =>{
    navLink.addEventListener('click', ()=>{
        navBar.classList.remove('showNavBar')
    })
})

// adding shadow to the header=======================

function addShadow(){
    const header = document.querySelector('.header')
    if(this.scrollY >= 100){
      header.classList.add('headerShadow')
    }else{
      header.classList.remove('headerShadow')

    }
  }
  window.addEventListener('scroll', addShadow)


// Change Theme Function===================================
  const themeIcon = document.getElementById('themeIconDiv')
  themeIcon.onclick = ()=>{
    document.body.classList.toggle('lightTheme')

    if(document.body.classList.contains('lightTheme')){
      themeIcon.innerHTML = `<i class="uil uil-moon icon"></i>`
    }else{
      themeIcon.innerHTML = `<i class="uil uil-sun icon"></i>`
    }
  }


// Home Section swiper function ========================>
let newSwiper = new Swiper(".bannerOne", {
    cssMode: true,
    loop: true,
    autoplay: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    mousewheel: true,
    keyboard: true,
    mausehold: true,

  });

 //Featured Section Function =======================>
let featuredSwiper = new Swiper(".sectionBody", {
    cssMode: true,
    loop: true,
    autoplay: true,
    centeredSlide: true,
    spaceBetween: 20,
    slidePerView: 'auto',

    breakpoints: {
      480: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 40,
        autoplay: false,
      },
    },
    mousewheel: true,
    keyboard: true,
    mausehold: true,
  
  });

  
  