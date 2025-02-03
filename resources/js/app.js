import './bootstrap';


const sortButton = document.getElementById('sort');
const modal = document.getElementById('modal');

// Toggle the modal on Sort button click
sortButton.addEventListener('click', (event) => {
// Prevent the click event from propagating to the document
  event.stopPropagation(); 
  modal.classList.toggle('hidden');
});

// Close the modal when clicking outside of it
document.addEventListener('click', () => {
  modal.classList.add('hidden'); 
});

// Prevent modal close when clicking inside the modal
modal.addEventListener('click', (event) => {
  event.stopPropagation();
});

// Close the modal when an option is clicked
modal.querySelectorAll('button').forEach((button) => {
  button.addEventListener('click', () => {
    modal.classList.add('hidden'); 
  });
});

// Adding query params
const sortExpenses = (criteria) => {
    const currentUrl = new URL(window.location.href);

    // Set the sort_by parameter
    currentUrl.searchParams.set('sort_by', criteria);

    // Redirect to the updated URL
    window.location.href = currentUrl.toString();
};

const sortByDate = document.getElementById('sort_by_date');
const sortByPriceAsc = document.getElementById('sort_by_price_asc');
const sortByPriceDesc = document.getElementById('sort_by_price_desc');
  
// Pass "date" or "amount" to query object, so you can retrieve it in the backend and sort the lists in create function
  sortByDate.addEventListener('click', () => {
    sortExpenses('date');
  });
  
  sortByPriceAsc.addEventListener('click', () => {
    sortExpenses('asc_amount');
  });

  sortByPriceDesc.addEventListener('click', () => {
    sortExpenses('desc_amount');
  });