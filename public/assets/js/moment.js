import moment from 'moment';

// Calculate the start and end dates for the next 7 days
const startDate = moment().startOf('day');
const endDate = moment(startDate).add(6, 'days');

// Display the next 7 days
displayDates(startDate, endDate);

function displayDates(startDate, endDate) {
  const container = document.getElementById('date-picker-container');
  container.innerHTML = '';

  let currentDate = moment(startDate);

  while (currentDate <= endDate) {
    // Add the HTML for the current date to the container
    container.innerHTML += `
      <div class="col-md-12">
        <div class="day-picker">
          <div class="day-column">
            <span class="day-name">${currentDate.format('dddd')}</span>
            <span class="day-date">${currentDate.format('D')}</span>
            <span class="day-month">${currentDate.format('MMMM')}</span>
          </div>
        </div>
      </div>
    `;

    // Move to the next day
    currentDate = moment(currentDate).add(1, 'days');
  }
}
//
// Get the previous and next buttons
const prevButton = document.getElementById('prev-date-btn');
const nextButton = document.getElementById('next-date-btn');

// Add click event listeners to the buttons
prevButton.addEventListener('click', handlePrevButtonClick);
nextButton.addEventListener('click', handleNextButtonClick);

function handlePrevButtonClick() {
  // Get the current start and end dates
  const startDate = moment(document.querySelector('.day-date').innerHTML, 'D').subtract(7, 'days').startOf('day');
  const endDate = moment(startDate).add(6, 'days');

  // Display the previous 7 days
  displayDates(startDate, endDate);
}

function handleNextButtonClick() {
  // Get the current start and end dates
  const startDate = moment(document.querySelector('.day-date').innerHTML, 'D').add(1, 'days').startOf('day');
  const endDate = moment(startDate).add(6, 'days');

  // Display the next 7 days
  displayDates(startDate, endDate);
}
//
// get all the day elements
const days = document.querySelectorAll('.day-column');

// loop through each day element and add an event listener
days.forEach(day => {
  day.addEventListener('click', () => {
    // get the hour-picker element
    const hourPicker = day.parentNode.querySelector('.hour-picker');
    
    // toggle the 'unavailable' class on the hour-picker element
    hourPicker.classList.toggle('unavailable');
  });
});