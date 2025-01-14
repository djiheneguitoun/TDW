 // Modal functionality
 const modal = document.getElementById("myModal");
 const closeBtn = document.querySelector(".close");

 function showReceipt(abonnement_id) {
     const xhr = new XMLHttpRequest();
     xhr.open('GET', '/elmuntada/get-receipt-path?abonnement_id=' + abonnement_id, true);
     xhr.onreadystatechange = function () {
         if (xhr.readyState === 4 && xhr.status === 200) {
             document.getElementById('receiptEmbed').src = xhr.responseText;
             modal.classList.remove('hidden');
             document.body.style.overflow = 'hidden';
         }
     };
     xhr.send();
 }

 closeBtn.onclick = function() {
     modal.classList.add('hidden');
     document.body.style.overflow = 'auto';
 }

 window.onclick = function(event) {
     if (event.target === modal) {
         modal.classList.add('hidden');
         document.body.style.overflow = 'auto';
     }
 }

 // Add hover effect to buttons
 const buttons = document.querySelectorAll('button');
 buttons.forEach(button => {
     if (button.style.backgroundColor === '#FF7C50') {
         button.addEventListener('mouseenter', function() {
             this.style.backgroundColor = '#ff6937';
         });
         button.addEventListener('mouseleave', function() {
             this.style.backgroundColor = '#FF7C50';
         });
     }
 });

 // Add hover effect to table rows
 const tableRows = document.querySelectorAll('tbody tr');
 tableRows.forEach(row => {
     row.addEventListener('mouseenter', function() {
         this.style.backgroundColor = '#f9fafb';
     });
     row.addEventListener('mouseleave', function() {
         this.style.backgroundColor = '';
     });
 });