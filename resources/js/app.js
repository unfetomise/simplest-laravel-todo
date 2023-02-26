import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const wrapper = document.getElementById('todos');

wrapper.addEventListener('click', (event) => {
  const isButton = event.target.nodeName === 'BUTTON';
  if (!isButton) {
    return;
  }

  confirm("Подтвердить удаление?") ? event.target.parentNode.submit() : console.log(false)

  ;
})
