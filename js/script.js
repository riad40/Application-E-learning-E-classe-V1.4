// button toggle
const element = document.getElementById("page");
const toggleButton = document.getElementById("menu-toggle");
toggleButton.onclick = function() {
  element.classList.toggle("toggled");
}

// delete confirmation

// const remove = document.getElementById('rmvForJs')

// remove.addEventListener('submit', (e) => {
//   alert('yas')
//   return checkDelete()
// })

// function checkDelete() {
//   return confirm('are u sure u want to delete this record')
// }