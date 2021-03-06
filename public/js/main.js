const users = document.querySelector(".user")
const iconUser = document.querySelector(".icon-user")
const menuAccount = document.querySelector(".menu-account")
const nav = document.querySelector("nav")
const btnShop = document.querySelector(".btn-shop")
const navCategories = document.querySelector(".nav-categories")
const barSearch = document.querySelector(".bar-search")

const logoNav = document.querySelector(".logo-nav")
const logoHome = document.querySelector(".logo-home")
const iconSearch = document.querySelector(".icon-search")
const iconLike = document.querySelector(".icon-like")
const iconBasket = document.querySelector(".icon-basket")

const tools = document.querySelectorAll(".point")
const descriptions = document.querySelectorAll(".infos")
const headers = document.querySelectorAll("header")

headers.forEach((header)=>{
    if(header.classList.contains("header-home")){
        nav.classList.add("black");
        logoHome.src = "../public/images/logo-white.svg"
        iconSearch.src = "../public/icon/icon-search-white.svg"
        iconLike.src = "../public/icon/icon-like-white.svg"
        iconBasket.src = "../public/icon/icon-basket-white.svg"
        iconUser.src = "../public/icon/icon-user-white.svg"
    }
})

function navFix(){
    // if(window.scrollY > nav.offsetHeight + 300){
    //     nav.classList.add("nav-fixed")
    //     logoNav.src = "../public/images/logo-black.svg"
    //     iconSearch.src = "../public/icon/icon-search-black.svg"
    //     iconLike.src = "../public/icon/icon-like.svg"
    //     iconBasket.src = "../public/icon/icon-basket-black.svg"
    //     iconUser.src = "../public/icon/icon-user.svg"

    // } else {
    //     nav.classList.remove("nav-fixed")
    //     logoNav.src = "../public/images/logo-white.svg"
    //     iconSearch.src = "../public/icon/icon-search-white.svg"
    //     iconLike.src = "../public/icon/icon-like-white.svg"
    //     iconBasket.src = "../public/icon/icon-basket-white.svg"
    //     iconUser.src = "../public/icon/icon-user-white.svg"
    // }
}

function menuAccountDisplay(){
    menuAccount.classList.toggle("actived")
    iconUser.classList.toggle("actived")
    navHeight = nav.offsetHeight
    userWidth = users.offsetWidth
    // menuAccount.style.top = `${navHeight}px`
    // menuAccount.style.width = `${userWidth}px`

}

// function menuAccountNoDisplay(){
//     menuAccount.classList.remove("actived")
//     iconUser.classList.remove("actived")
// }

function sousMenu(){
    navCategories.classList.toggle("actived")
    menuAccount.classList.remove("actived")
}

iconUser.addEventListener("click", menuAccountDisplay)
// menuAccount.addEventListener("mouseout", menuAccountNoDisplay)
btnShop.addEventListener("click", sousMenu)

window.addEventListener("scroll", navFix)

function searchBarDisplay(){
    barSearch.classList.toggle("actived")
}

iconSearch.addEventListener("click", searchBarDisplay)

function point(){
    tools.forEach((tool, i) => {
        tool.addEventListener("click", () => {
            descriptions.forEach((description)=>{
                description.classList.remove("active")
            })
            descriptions[i].classList.add("active")
        })
    });
}

point()


const iconFav = document.querySelectorAll(".icon-fav")

iconFav.forEach((icon) => {
    icon.addEventListener("click", ()=>{
        // icon.classList.toggle("active")
    
        if(icon.classList.contains("active")){
            icon.src = "../public/icon/icon-favoris-on.svg"
            icon.style.animation = "favoris 1s ease"
        } else {
            icon.src = "../public/icon/icon-favoris-off.svg"
        }
    })
})

