const searchInput = document.querySelector('#search');
const tableRows = document.querySelector('#customerTable').querySelectorAll('tr');

searchInput.addEventListener('input', (e) => {
  const searchInputValue = e.target.value.toLowerCase();
  tableRows.forEach(row => {
    const doesRowMatch = row.textContent.toLowerCase().includes(searchInputValue);
    if (doesRowMatch) {
      row.style.display = 'table-row';
    } else {
      row.style.display = 'none';
    }
  })
})