document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const cards = document.querySelectorAll('.card');
    const indicators = document.querySelectorAll('.indicator');
    let currentIndex = 0;

    function showCard(index) {
        carousel.style.transform = `translateY(-${index * 400}px)`;
        updateIndicators(index);
    }

    function showNextCard() {
        currentIndex = (currentIndex + 1) % cards.length;
        showCard(currentIndex);
    }

    function showPrevCard() {
        currentIndex = (currentIndex - 1 + cards.length) % cards.length;
        showCard(currentIndex);
    }

    function updateIndicators(index) {
        indicators.forEach((indicator, i) => {
            if (i === index) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    } 

    // Défilement automatique
    let intervalId = setInterval(showNextCard, 3000);

    // Gestion des indicateurs
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            clearInterval(intervalId); // Arrête le défilement automatique
            currentIndex = index;
            showCard(currentIndex);
            intervalId = setInterval(showNextCard, 5000); // Redémarre le défilement automatique
        });
    });

    // Gestion du clic sur le bouton "Postuler"
    document.querySelectorAll('.postuler-btn').forEach(button => {
        button.addEventListener('click', function() {
            const posteId = this.getAttribute('data-poste-id');
            // Ici, vous pouvez ajouter le code pour gérer la postulation
            // Par exemple, rediriger vers un formulaire de candidature ou ouvrir une modal
            alert(`Vous avez cliqué pour postuler au poste avec l'ID : ${posteId}`);
        });
    });

    

    // Initialisation
    updateIndicators(currentIndex);
});