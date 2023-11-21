// Récupérer les éléments HTML pertinents
const articles = document.querySelectorAll('.promotions .article');
const firstArticles = [articles[0], articles[1]];
const lastArticles = [articles[2], articles[3]];

// Cacher les deux derniers articles
lastArticles.forEach(article => article.style.display = 'none');

// Afficher les deux premiers articles pendant 5 secondes, puis les cacher et afficher les deux derniers
setInterval(() => {
  // Cacher les deux premiers articles
  firstArticles.forEach(article => article.style.display = 'none');

  // Afficher les deux derniers articles
  lastArticles.forEach(article => article.style.display = 'block');

  // Attendre 5 secondes
  setTimeout(() => {
    // Cacher les deux derniers articles
    lastArticles.forEach(article => article.style.display = 'none');

    // Afficher les deux premiers articles
    firstArticles.forEach(article => article.style.display = 'block');
  }, 5000);
}, 10000);


