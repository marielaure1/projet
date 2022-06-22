// Vérifier que le document est bien chargé
$(document).ready(function(){
    // recuperer selecteur et event click
    $(".filtre-nom").click(function(){
        // this = récuperer l'élément, attr = récupérer un attribut de l'élément
        page=($(this).attr("href"));
        // requete ajax
        $.ajax({
            url: page,
            cache: true,
            success: function(html){
                window.history.pushState("object or string", "Title", page);
                $(html).load(".produits-categorie");
                // console.log(html)
                // afficher(html)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus)
            }
        })
        // empecher l'exécuton du lien
        return false;
    })
})

// function afficher(data){
//     $(".produits-categorie").empty();
//     $(".produits-categorie").append(data);

// }

// function ajoutFavoris(user, id) {
//     var link = window.location.protocol+ "//" + window.location.host + "/cours-php/projet/public/index.php?p=users.favorisApplication&id="+id+"&user="+user;
//     var theResponse = null;
//     console.log(link)
//     $.ajax({
//         url: link,
//         method: 'POST',
//         async: false,
//         success: function(data){
//             myFavoris = data;
//         },
//         error: function() {
//             alert('Une erreur a eu lieu');
//         }
//     })
//     return myFavoris;
// }

// $(document).ready(function(){
//     $(".filtre-nom").click(function(){
        
//     })
// })