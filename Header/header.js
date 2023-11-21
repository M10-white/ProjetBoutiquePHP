function filterProducts() {
    var input = document.getElementById('searchInput').value.toUpperCase();

    // Appel AJAX pour récupérer les produits depuis le serveur
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var products = JSON.parse(xhr.responseText);
        displayProducts(products);
      }
    };
    xhr.open('GET', 'get_products.php?search=' + input, true);
    xhr.send();
  }

  function displayProducts(products) {
    var productList = document.getElementById('productList');
    productList.innerHTML = ''; // Effacer la liste actuelle

    // Parcourir la liste des produits et afficher/masquer en fonction de la recherche
    for (var i = 0; i < products.length; i++) {
      var itemName = products[i].nom.toUpperCase();
      var listItem = document.createElement('li');
      listItem.textContent = products[i].nom;
      productList.appendChild(listItem);
    }
  }