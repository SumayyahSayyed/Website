
(function () {
  "use strict";

  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  const on = (type, el, listener, all = false) => {
    if (all) {
      select(el, all).forEach(e => e.addEventListener(type, listener))
    } else {
      select(el, all).addEventListener(type, listener)
    }
  }

  if (select('.toggle-sidebar-btn')) {
    on('click', '.toggle-sidebar-btn', function (e) {
      select('body').classList.toggle('toggle-sidebar')
    })
  }

  if (select('.search-bar-toggle')) {
    on('click', '.search-bar-toggle', function (e) {
      select('.search-bar').classList.toggle('search-bar-show')
    })
  }

})();

function deleteWord(wordId, trashIcon) {
  // Define the request parameters
  const params = {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'id=' + wordId
  };

  // Send the request using fetch
  fetch('http://localhost/Website/php/delete.php', params)
    .then(response => {
      if (response.ok) {
        // Remove the HTML for the word entry
        trashIcon.closest('.col-xxl-3').remove();
      } else {
        throw new Error('Error deleting word');
      }
    })
    .catch(error => alert(error.message));
}