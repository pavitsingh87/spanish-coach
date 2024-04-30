const pronouns = ['I','He', 'She', 'They','You','We'];

let activities = [
  'has/have to work',
  'want(s) a glass of water',
  'is/am/are tired today',
  'go/goes to school',
  'want(s) a hamburger',
  'live(s) in Canada',
  `run(s) ${numberToWords(Math.floor(Math.random() * 20) + 1)} miles`,
  `am/is/are ${['ten','twenty','thirty','forty','fifty','sixty','seventy'][Math.floor(Math.random() * 7)]} years old`,
  `like(s) ${['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'][Math.floor(Math.random() * 5)]}`
];

/*let activities = [
  'has/have to work',
  'want(s) a glass of water',
  'is/am/are tired today',
  'go/goes to school',
  'want(s) a hamburger',
  'live(s) in Canada',
  `run(s) ${Math.floor(Math.random() * 6)} miles`,
  `like(s) ${['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'][Math.floor(Math.random() * 5)]}`
];
*/
// Function to convert numbers to words
function numberToWords(num) {
  const units = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
  const teens = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
  const tens = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];

  if (num === 0) return 'zero';
  if (num < 10) return units[num];
  if (num < 20) return teens[num - 10];
  const digit1 = num % 10;
  const digit2 = Math.floor(num / 10);
  return tens[digit2] + (digit1 ? ' ' + units[digit1] : '');
}
// Function to create dropdown options
function createDropdownOptions(array, selectElement) {
  array.forEach(item => {
    const option = document.createElement('option');
    option.textContent = item;
    selectElement.appendChild(option);
  });
}

// Get the select elements
const pronounSelect = document.getElementById('pronoun-select');
const activitySelect = document.getElementById('activity-select');
const spinSound = document.getElementById('spin-sound');

// Create dropdown options for pronouns and activities
createDropdownOptions(pronouns, pronounSelect);
createDropdownOptions(activities, activitySelect);
const sentenceTextbox = document.getElementById('sentence');
const translateButton = document.getElementById('translate-button');
const translateButton1 = document.getElementById('translate-button1');
const spinButton = document.getElementById('spin-button');

spinButton.addEventListener('click', () => {
  sentenceTextbox.value = "";
  document.getElementById("sentencetranslated").value="";
  const randomPronounIndex = Math.floor(Math.random() * pronouns.length);
  const randomActivityIndex = Math.floor(Math.random() * activities.length);

  spin(pronounSelect, randomPronounIndex);
  spin(activitySelect, randomActivityIndex);
  spinSound.play();
  resetActivitiesDropdown();
  setTimeout(() => {
    const selectedPronoun = pronounSelect.options[randomPronounIndex].text;
    const selectedActivity = activitySelect.options[randomActivityIndex].text;
    sentenceTextbox.value = `${selectedPronoun} ${selectedActivity}`;



  }, 2000); // Adjust the time according to the animation duration
});
// Function to reset and recreate dropdown options for activities
function resetActivitiesDropdown() {
  // Clear existing options
  activitySelect.innerHTML = '';
  activities = [
    'has/have to work',
    'want(s) a glass of water',
    'is/am/are tired today',
    'go/goes to school',
    'want(s) a hamburger',
    'live(s) in Canada',
    `has/have a ${['mother', 'father', 'sister', 'brother', 'uncle', 'aunt'][Math.floor(Math.random() * 6)]}`,
    `run(s) ${numberToWords(Math.floor(Math.random() * 20) + 1)} miles`,
    `am/is/are ${['ten','twenty','thirty','forty','fifty','sixty','seventy'][Math.floor(Math.random() * 7)]} years old`,
    `like(s) ${['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'][Math.floor(Math.random() * 5)]}`
  ];
  
  /*let activities = [
    'has/have to work',
    'want(s) a glass of water',
    'is/am/are tired today',
    'go/goes to school',
    'want(s) a hamburger',
    'live(s) in Canada',
    `run(s) ${Math.floor(Math.random() * 6)} miles`,
    `like(s) ${['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'][Math.floor(Math.random() * 5)]}`
  ];*/
  // Create dropdown options for activities
  createDropdownOptions(activities, activitySelect);
}
function spin(select, targetIndex) {
  const currentIndex = select.selectedIndex;
  const spinCount = 10; // Number of spins
  const duration = 2000; // Duration of the animation in milliseconds
  const interval = duration / spinCount;

  let counter = 0;
  let currentIndexOffset = currentIndex;

  const spinInterval = setInterval(() => {
    if (counter === spinCount) {
      clearInterval(spinInterval);
      return;
    }

    currentIndexOffset = (currentIndexOffset + 1) % select.options.length;
    select.selectedIndex = currentIndexOffset;

    counter++;
  }, interval);

  // Set the final selected index after the animation
  setTimeout(() => {
    select.selectedIndex = targetIndex;
  }, duration);
}


translateButton.addEventListener("click", () => {
   const textToTranslate = document.getElementById("sentence").value;
    const targetLanguage = 'es'; // Spanish

    // Define the data to be sent in the POST request
    const data = {
        text: textToTranslate,
        targetLanguage: targetLanguage
    };
    const apiUrl = 'http://15.156.98.252:3001/api/translate'; // Replace with your EC2 instance's IP address and port

    // Make a POST request to the translation API endpoint
    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Extract the translated text from the response
        const translatedText = data.translation;
        document.getElementById("sentencetranslated").value = translatedText;
        // Show the translated text in an alert
        
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
});
translateButton1.addEventListener("click", () => {
  const textToTranslate = document.getElementById("sentence").value;
   const targetLanguage = 'es'; // Spanish

   // Define the data to be sent in the POST request
   const data = {
       text: textToTranslate,
       targetLanguage: targetLanguage
   };
   const apiUrl = 'http://15.156.98.252:3001/api/translate'; // Replace with your EC2 instance's IP address and port

   // Make a POST request to the translation API endpoint
   fetch(apiUrl, {
       method: 'POST',
       headers: {
           'Content-Type': 'application/json'
       },
       body: JSON.stringify(data)
   })
   .then(response => {
       if (!response.ok) {
           throw new Error('Network response was not ok');
       }
       return response.json();
   })
   .then(data => {
       // Extract the translated text from the response
       const translatedText = data.translation;
       document.getElementById("sentencetranslated").value = translatedText;
       // Show the translated text in an alert
       
   })
   .catch(error => {
       console.error('There was a problem with the fetch operation:', error);
   });
});
// Function to update the sentence
function updateSentence() {
  const selectedPronoun = pronounSelect.options[pronounSelect.selectedIndex].text;
  const selectedActivity = activitySelect.options[activitySelect.selectedIndex].text;
  sentenceTextbox.value = `${selectedPronoun} ${selectedActivity}`;
  /*resetActivitiesDropdown();*/
}

// Event listeners for select elements
pronounSelect.addEventListener('change', updateSentence);
activitySelect.addEventListener('change', updateSentence);


// Burger menus
document.addEventListener('DOMContentLoaded', function() {
  // open
  const burger = document.querySelectorAll('.navbar-burger');
  const menu = document.querySelectorAll('.navbar-menu');

  if (burger.length && menu.length) {
      for (var i = 0; i < burger.length; i++) {
          burger[i].addEventListener('click', function() {
              for (var j = 0; j < menu.length; j++) {
                  menu[j].classList.toggle('hidden');
              }
          });
      }
  }

  // close
  const close = document.querySelectorAll('.navbar-close');
  const backdrop = document.querySelectorAll('.navbar-backdrop');

  if (close.length) {
      for (var i = 0; i < close.length; i++) {
          close[i].addEventListener('click', function() {
              for (var j = 0; j < menu.length; j++) {
                  menu[j].classList.toggle('hidden');
              }
          });
      }
  }

  if (backdrop.length) {
      for (var i = 0; i < backdrop.length; i++) {
          backdrop[i].addEventListener('click', function() {
              for (var j = 0; j < menu.length; j++) {
                  menu[j].classList.toggle('hidden');
              }
          });
      }
  }
});
