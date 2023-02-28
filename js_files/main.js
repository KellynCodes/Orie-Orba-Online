//preloader
const preloader = document.querySelector('.preloader_container');
window.addEventListener('load', () => {
  preloader.style.display = "none";
})


// ADVERTERSING BANNER CAROUSELS

const bannerCarousel = document.querySelector('.banner img');

//END OF WINDOW CAROUSEL

const account = document.getElementById('account_container');
const accountBtn = document.querySelector('#account');
const navToggle = document.querySelector('.navbar_toggle');
const navBtn = document.querySelector('.bar');
const navLinks = document.querySelector(".navigation_links");
const helpList = document.querySelector('.help_center ul');
const HelpCenter = document.querySelector('.help_center');
const HelpCenterBtn = document.querySelector('.help');

//CODES TO TOGGLE NAV LINKS 
navToggle.addEventListener("click", () => {
  navToggle.classList.toggle('open');
  navLinks.classList.toggle('open');
account.classList.remove("active");
  
})

//CODE TO TOGGLE ACCOUNT BUTTONS
accountBtn.addEventListener("click", () => {
  if(account.classList.contains('active')){
    account.classList.remove('active');
    HelpCenter.classList.remove('act');
  }else{
    account.classList.add('active');
    HelpCenter.classList.add('act');
  }
});

//CODE TO TOGGLE HELP CENTER 
  HelpCenterBtn.addEventListener('click', () => {
    if(helpList.classList.contains('active')){
      helpList.classList.remove('active');
      HelpCenter.classList.remove('acitve');
    }else{
      helpList.classList.add('active');
      HelpCenter.classList.add('active');
    }
  });

  HelpCenter.addEventListener('click', () => {
    if(helpList.classList.contains('active') || account.classList.contains('active')){
      helpList.classList.remove('active');
      account.classList.remove('active');
      HelpCenter.classList.remove('act')
    }
  })

// TOOGLE SEARCH BAR ON SCROLL WHEN WINDOW.SCROLLY IS GREATER 50 AND DEVICE WITH IS LESS 600;
const searchBar = document.querySelector('.center_bar');
window.addEventListener('scroll', () => {
    searchBar.classList.toggle('search_active', window.scrollY > 50);
}); 

//SEARCHING PRODUCTS BY SEARCH BAR
const search = document.querySelector('.search_nav');
const items = document.querySelectorAll('.items');
console.log(items)
const productName = document.querySelectorAll('.items h5');
const searchBtn = document.querySelector('.search_btn');

//STARTING ARROW FUNCTION FOR SEARCH BAR
const searchProducts = () => {
  const searchValue = search.value.toLowerCase();
  
//SEARCHING PRODUCTS BY THERE NAMES
productName.forEach(products => {
   let theirNames = products.innerText.toLowerCase();
   if(theirNames.includes(searchValue)){
    products.style.display = "flex";
      }else{
        products.style.display = "none";
          }

        });
        //DISPLAYING ONLY SEARCHED PRODUCTS
        productClass = document.querySelector('.items');
        const theirClass = productClass.toLowerCase();
        productClass.forEach(item => {
          if(theirClass.includes(searchValue)){
            item.style.display = "flex";
          }else{
            item.style.display = 'none';
          }
        })
     
 }
//END OF ARROW FUNCTION FOR SEARCH BAR

const alertInfo = () => {
  //TOGGLE NOTIFICATION IF PRODUCT IS NOT FOUND
  const productNotFound = document.querySelector('.product_not_found');
   productNotFound.classList.add('not_found');
    setTimeout(() => {
     productNotFound.classList.remove('not_found');
   }, 3000);
  }


//SEARCHING PRODUCTS ON CLICK OF THIS BUTTON
searchBtn.addEventListener('click', searchProducts);

//SEARCHING PRODUCTS ON INPUT OF SEARCH VALUE ON SEARCH INPUT
// search.addEventListener('input', searchProducts);

//PRODUCT CATEGORIES SIDE BAR TOGGLER CODES ON SMALL SCREEN DEVICES
const navBarHover = document.querySelector('.navbar_hover');
const categories = document.querySelector('.categories_list_items');

navBarHover.addEventListener('click', () =>{
    categories.classList.toggle('hovered');
});


//==================================LOGIN IN CODES====================================//
//HIDING PASSWORD AND VIEWING PASSWORD
const hidePassword = document.querySelector('.form-group .eye');
hidePassword.addEventListener('click', () =>{
  var password = document.getElementById("myInput");
  var openEye = document.getElementById("hide1");
  var closeEye = document.getElementById("hide2");

  if(password.type === 'password'){
      password.type = "text";
      openEye.style.display = "block";
      closeEye.style.display = "none";
  }
  else{
      password.type = "password";
      openEye.style.display = "none";
      closeEye.style.display = "block";
  }
});