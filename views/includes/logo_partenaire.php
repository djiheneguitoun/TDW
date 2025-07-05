
<div class="container p-4 pt-10" id="partenaires-section">
  <div class="text-[#643869] text-center text-3xl font-bold py-6">
    <a href="elmuntada/catalogue">Nos Partenaires</a>
  </div>
  <div class="carousel relative overflow-hidden">
      <div class="carousel-inner flex transition-transform duration-500 ">
          <?php foreach ($partenairesData as $partenaire): ?>
              <div class="carousel-item flex-shrink-0 w-48 mx-4 transform hover:scale-150 transition-transform duration-300">
                <img src="uploads/<?php echo htmlspecialchars($partenaire['logo']); ?>" alt="<?= htmlspecialchars($partenaire['nom_etabisement']) ?>" class="mx-auto w-40 h-40 object-contain">              </div>
          <?php endforeach; ?>
      </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel-inner');
    const items = document.querySelectorAll('.carousel-item');
    const itemWidth = items[0].offsetWidth + 32; 
    const totalItems = items.length / 2;
    
    let position = 0;
    
    function moveCarousel() {
        position -= 1; 
        carousel.style.transform = `translateX(${position}px)`;
        
        if (Math.abs(position) >= totalItems * itemWidth) {
            position = 0;
        }
        
        requestAnimationFrame(moveCarousel);
    }
    
    moveCarousel();
});
</script>
