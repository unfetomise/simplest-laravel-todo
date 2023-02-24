import './bootstrap';
import '../css/app.css';

const wrapper = document.getElementById('todos');

wrapper.addEventListener('click', (event) => {
  const isButton = event.target.nodeName === 'BUTTON';
  if (!isButton) {
    return;
  }

  confirm("Вы уверены?") ? event.target.parentNode.submit() : console.log(false)

  ;
})
