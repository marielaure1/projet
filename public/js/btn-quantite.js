let nb = document.querySelector("#nb")
let prix = document.querySelector("#prix")
let prixTotal = document.querySelector(".prixTotal")

$(document).ready(function(){
    $("#plus").click(()=>{
        page=  window.location.href
        $.ajax({
            url: page,
            cache: false,
            success: function(){
                if(nb.value >= 20){
                    nb.value = 20
                } else {
                    nb.value = parseInt(nb.value) + 1;
                }

                total(nb.value, prix.value)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus)
            }
        })
        // empecher l'exécuton du lien
        return false;
    })
    $("#moins").click(()=>{
        page=  window.location.href
        $.ajax({
            url: page,
            cache: false,
            success: function(){
                if(nb.value <= 1){
                    nb.value = 1
                } else {
                    nb.value = parseInt(nb.value) - 1;
                }
                total(nb.value, prix.value)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus)
            }
        })
        // empecher l'exécuton du lien
        return false;
    })
})


function total(nb, prix){
    prixTotal.textContent = parseInt(nb) * parseInt(prix)
}