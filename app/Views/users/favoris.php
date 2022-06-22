<main id="favoris">
    <div class="liste-favoris">
        <h1 class="title-user">Favoris</h1>
        <div class="grid-favoris">
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            <div class="block-favoris">
                <img class="img-favoris" src="../public/images/iona-meridienne2.jpg" alt="">
                <div class="text-favoris active">
                    <h2>Iona</h2>
                    <h3>Lorem ipsum</h3>
                    <p>20 €</p>
                    <img src="../public/icon/icon-basket-plus-white.svg" alt="">
                    <img src="../public/icon/icon-cross-white.svg" alt="">
                </div>
            </div>
            
        </div>
    </div>
</main>
<script>
    const imgFavoris = document.querySelectorAll(".img-favoris")
    const textFavoris = document.querySelectorAll(".text-favoris")

    imgFavoris.forEach((img, i)=>{
        img.addEventListener("click", () => {
            textFavoris.forEach((text)=>text.classList.remove("active"))
            textFavoris[i].style.animation = "favorisText 2s ease"
            textFavoris[i].classList.add("active")
            
        })
    })
</script>