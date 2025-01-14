
<div class="container p-4 pt-10  bg-[url('https://www.transparenttextures.com/patterns/diamond-upholstery.png')]" id="partenaires-section ">
  <h2 class="text-[#643869] text-center text-3xl font-bold py-6">Nos Partenaires</h2>
  <div class="carousel relative overflow-hidden">
      <div class="carousel-inner flex transition-transform duration-500 ">
          <?php foreach ($partenairesData as $partenaire): ?>
              <div class="carousel-item flex-shrink-0 w-48 mx-4 transform hover:scale-150 transition-transform duration-300">
                <img src="/elmuntada/assets/images/logo.png" alt="<?= htmlspecialchars($partenaire['nom_etabisement']) ?>" class="mx-auto w-24 h-24 object-contain">              </div>
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
