

$(document).ready(function(){
    let counterQuantite = 1
    let nb = $(".nb").val()
    
    $(".plus").click(()=>{
        if(counterQuantite < 20){
            counterQuantite++
        }

        

       

        page=  window.location.href

        $.ajax({
            url: page,
            cache: false,
            success: function(){
                console.log(counterQuantite)
                
                console.log(nb)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus)
            }
        })
        // empecher l'exécuton du lien
        return false;
    })
})


// $(".moins").click(()=>{
//     if( counterQuantite > 1){
//         counterQuantite--
//     }
//     nombre.value = counterQuantite
// })

// $(".nombre").value = counterQuantite