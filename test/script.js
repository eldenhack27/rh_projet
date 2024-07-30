document.addEventListener('DOMContentLoaded', function() {
    // Code existant pour le menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const menuContent = document.querySelector('.menu-content');

    menuToggle.addEventListener('click', function() {
        menuContent.classList.toggle('show');
    });

    // Gestion des liens actifs
    const menuLinks = document.querySelectorAll('.sidebar ul li a');
    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            menuLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Gestion du modal
    const modal = document.getElementById('formModal');
    const btn = document.getElementById('openModalBtn');
    const span = document.getElementsByClassName('close')[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Gestion du formulaire
    const form = document.getElementById('myForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        // Ici, vous pouvez ajouter le code pour traiter les données du formulaire
        console.log('Formulaire soumis !');
        modal.style.display = "none";
    });


    // Gestion de la recherche
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const table = document.querySelector('.dashboard-table');

    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const rows = table.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
                highlightText(row, searchTerm);
            } else {
                row.style.display = 'none';
            }
        });
    }

    function highlightText(row, searchTerm) {
        row.querySelectorAll('td').forEach(cell => {
            const originalText = cell.textContent;
            const lowerText = originalText.toLowerCase();
            const index = lowerText.indexOf(searchTerm);
            if (index >= 0) {
                const beforeText = originalText.substring(0, index);
                const matchedText = originalText.substring(index, index + searchTerm.length);
                const afterText = originalText.substring(index + searchTerm.length);
                cell.innerHTML = `${beforeText}<span class="highlight">${matchedText}</span>${afterText}`;
            }
        });
    }

    searchBtn.addEventListener('click', performSearch);
    searchInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            performSearch();
        }
    });

    // Création du diagramme
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
            datasets: [{
                label: 'Ventes mensuelles',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});