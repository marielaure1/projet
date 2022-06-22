<main class="inspirations">
    <section class="banner">
        <div class="img  background-images"></div>
        <h2>BESOIN D’INSPIRATIONS ?</h2>
    </section>
    <section class="nos-selections">
        <h2 class="title-rubrique">NOS SÉLECTIONS</h2>
        <div class="slider-inspirations">
            <img class="img-carousel active" src="../public/images/inspirations/inspiration-1.png" alt="img1">
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