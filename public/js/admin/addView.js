const addView = () => {
  let views =  document.getElementById('views');
  let counter = parseInt(views.lastElementChild.id.split('_')[1]);
  let newView = document.createElement('div');
  newView.id = `view_${counter + 1}`;
  newView.innerHTML = views.lastElementChild.innerHTML
  .replace(`<span class="badge badge-success">Вид ${counter + 1}</span>`, `<span class="badge badge-success">Вид ${counter + 2}</span>`)
  .replace(`view[${counter}][description]`, `view[${counter + 1}][description]`)
  .replace(`view[${counter}][jpg]`, `view[${counter + 1}][jpg]`)
  .replace(`view[${counter}][url]`, `view[${counter + 1}][url]`);
  views.appendChild(newView);
}

const removeView = () => {
  let lastchild = document.getElementById('views').lastElementChild;
  if(lastchild.id !== 'view_0')
    lastchild.remove();
}

document.getElementById('addView').addEventListener('click', addView);
document.getElementById('removeView').addEventListener('click', removeView);






