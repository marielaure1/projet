const moins = document.querySelector(".moins");
const plus = document.querySelector(".plus");
const nombre = document.querySelector(".nombre");

let counterQuantite = 1
console.log(counterQuantite)


moins.addEventListener("click", ()=>{
    if( counterQuantite > 1){
        counterQuantite--
    }
    nombre.innerHTML = counterQuantite
})

plus.addEventListener("click", ()=>{
    if(counterQuantite < 20){
        counterQuantite++
    }
    nombre.innerHTML = counterQuantite
})
