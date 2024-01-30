
		function scrollToSection(sectionId) {
		   var targetSection = document.getElementById(sectionId);
		   if (targetSection) {
			  window.scrollTo({
				 top: targetSection.offsetTop,
				 behavior: 'smooth'
			  });
		   }
		}
		$(document).ready(function () {
			$(".owl-carousel").owlCarousel({
				center: true,
				items: 4, // Nombre d'articles à afficher
				loop: true,
				margin: 20,
				nav: false,
				
				responsive: {
					0: {
						items: 1,
						// Ajustement automatique de la largeur pour les petits écrans
					},
					600: {
						items: 4
					},
					1000: {
						items: 4
					}
				}
			});
		});
	
		function initMap() {
			// Replace the coordinates with your actual office location
			var officeLocation = { lat: 37.7749, lng: -122.4194 };
	
			var map = new google.maps.Map(document.getElementById('google-map'), {
				zoom: 15,
				center: officeLocation
			});
	
			var marker = new google.maps.Marker({
				position: officeLocation,
				map: map,
				title: 'Our Office Location'
			});
		}
	


	

		
		
		
		
		
	