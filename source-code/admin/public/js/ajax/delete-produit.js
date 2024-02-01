
function confirmProduitDelete(id) {
    // Show a confirmation dialog
    if (confirm("Are you sure you want to delete this Produit?")) {
        // User confirmed, proceed with deletion
        deleteProduit(id);
    }
}

function deleteProduit(id) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/ajax/DeleteProduit.php", true); 
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                
                if (response) {
                    location.reload(true);
                   
                } else {
                    alert("Error deleting produit: " + response);
                }
            }
        }
    };
    xhr.send("produitId=" + id);
}

