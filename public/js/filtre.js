const filtreNom = document.querySelectorAll(".filtre-nom")
const sousCategories = document.querySelector(".sous-categories")

sousCategories.style.gridTemplateColumns = "repeat("+ filtreNom.length + ", 1fr)"

