document.addEventListener('DOMContentLoaded', function(event){
    const tables = document.querySelectorAll('.table-with-modal');

    tables.forEach(function(table, i){
        table.addEventListener('click', function(event) {
          let target = event.target,
              modalName = target.getAttribute('data-modal') || false,
              route = target.getAttribute('data-route') || false;

          if( target.classList.contains('open-modal') ) {
              fetch(route)
                  .then(response => {
                      if (!response.ok) {
                          throw new Error('Erreur réseau : ' + response.status);
                      }
                      return response.json(); // ou response.text(), selon ce que tu attends
                  })
                  .then(data => {
                      // Everything is OK
                      const modalEl = document.querySelector(modalName);

                      modalEl.querySelector('.modal-body').innerHTML = data.dom;
                      const modal = KTModal.getInstance(modalEl);

                      modal.show();
                  })
                  .catch(error => {
                      console.error('Erreur lors de la requête :', error);
                  });

          }
        });
    });
});
