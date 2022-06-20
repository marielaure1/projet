// Vérifier que le document est bien chargé
$(document).ready(function(){
    // recuperer selecteur et event click
    $(".filtre-nom").click(function(){
        // this = récuperer l'élément, attr = récupérer un attribut de l'élément
        page=($(this).attr("href"));
        // requete ajax
        $.ajax({
            url: page,
            cache: false,
            success: function(html){
                window.history.pushState("object or string", "Title", page);
                $('.produits-categorie').load(page + ".grid-produits")
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