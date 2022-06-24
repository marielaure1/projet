<main class="inspirations">
    <section class="banner">
        <div class="img  background-images"></div>
        <h2>BESOIN D’INSPIRATIONS ?</h2>
    </section>
    <section class="nos-selections">
        <h2 class="title-rubrique">NOS SÉLECTIONS</h2>
        <div class="slider-inspirations">
            <div class="img-carousel active">
                <img src="../public/images/inspirations/inspiration-1.png" alt="img1">
                <div class="over">
                    <div class="point point1"></div>
                    <div class="point point2"></div>
                    <div class="point point3"></div>
                    <div class="point point4"></div>
                    <div class="point point5"></div>
                    <div class="infos info1 active">
                        <div class="img-produit background-images" style="background-image: url('../public/images/salon/rangements/inspiration1-desserte1.jpg')"></div>
                        <div class="text">
                            <h2><a href="">Molly</a></h2>
                            <h3>Desserte, noir</h3>
                            <p>15,99 €</p>
                        </div>
                    </div>
                    <div class="infos info2">
                        <div class="img-produit background-images" style="background-image: url('../public/images/salon/fauteuils/inspiration1-meridienne1.jpg')"></div>
                        <div class="text">
                            <h2><a href="">Iona</a></h2>
                            <h3>Méridienne, blanc</h3>
                            <p>200 €</p>
                        </div>
                    </div>
                    <div class="infos info3">
                        <div class="img-produit background-images" style="background-image: url('../public/images/salon/tables-basses/inspiration-1-tablebasse1.jpg')"></div>
                        <div class="text">
                            <h2><a href="">Carol</a></h2>
                            <h3>Tables basses lot de 2, noir</h3>
                            <p>35 €</p>
                        </div>
                    </div>
                    <div class="infos info4">
                        <div class="img-produit background-images" style="background-image: url('../public/images/luminaires/lampadaires/inspiration1-lampadaire1.jpg')"></div>
                        <div class="text">
                            <h2><a href="">Diego</a></h2>
                            <h3>Lampadaire en bambou</h3>
                            <p>29 €</p>
                        </div>
                    </div>
                    <div class="infos info5">
                        <div class="img-produit background-images" style="background-image: url('../public/images/salon/canapes/inspiration1-canape2.jpg')"></div>
                        <div class="text">
                            <h2><a href="">Iona</a></h2>
                            <h3>Canapé d'angle 6 places, blanc</h3>
                            <p>759 €</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <img class="img-carousel" src="../public/images/inspirations/inspiration-2.jpg" alt="img2">
            <img class="img-carousel" src="../public/images/inspirations/inspiration-3.jpg" alt="img3">
            <img class="img-carousel" src="../public/images/inspirations/inspiration-4.jpg" alt="img4">
            <img class="img-carousel" src="../public/images/inspirations/inspiration-4.jpg" alt="img4">
            <img class="img-carousel" src="../public/images/inspirations/inspiration-4.jpg" alt="img4">
            <div class="controller-slider">
                <div class="radios-sliders active"></div>
                <div class="radios-sliders"></div>
                <div class="radios-sliders"></div>
                <div class="radios-sliders"></div>
                <div class="radios-sliders"></div>
                <div class="radios-sliders"></div>
            </div>
            <div class="controller-nom">
                <p class="nom-slider active">IONA</p>
                <p class="nom-slider">IONA2</p>
                <p class="nom-slider">IONA3</p>
                <p class="nom-slider">IONA4</p>
                <p class="nom-slider">IONA4</p>
                <p class="nom-slider">IONA4</p>
            </div>
        </div>
    </section>
    <section class="nos-idees-deco">
        <h2 class="title-rubrique">NOS IDÉES DÉCOS</h2>
        <div id="les-inspi" class="container-inspi">
            <div class="grid-idee-deco active">
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
            </div>
            <div class="grid-idee-deco">
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
            </div>
            <div class="grid-idee-deco">
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
                <div class="background-images inspi"></div>
            </div>
        </div>

        <a href="index.php?p=posts.inspirations" id="inspi-btn">Voir plus</a>
    </section>
</main>

<script>
    $(document).ready(function(){
        let counter = 0
        $("#inspi-btn").click(()=>{
            counter++
            page=  window.location.href

            $.ajax({
                url: page,
                cache: false,
                success: function(html){
                    $(".grid-idee-deco").each(function(index){
                        if(counter == index){
                            $(this).addClass("active")
                            console.log(counter)
                        } else if(counter == ($(".grid-idee-deco").length - 1) ){
                            $("#inspi-btn").text("Voir moins")
                        } else if(counter >= $(".grid-idee-deco").length ){
                            counter = 0
                            $(".grid-idee-deco:not(:first)").removeClass("active")
                            $("#inspi-btn").text("Voir plus")
                        }
                    })
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    alert(textStatus)
                }
            })
            // empecher l'exécuton du lien
            return false;
        })
    })
</script>