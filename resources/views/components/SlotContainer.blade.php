<!-- resources/views/components/SlotContainer.blade.php -->

<div class="slot-container py-8 mx-20">
    <audio id="spin-sound" style="display:hidden;">
      <source src="audio/free-spin.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
    <!-- First row: Select boxes and Spin button -->
    <div class="flex flex-col md:flex-row items-center justify-center mb-2">
      <!-- Select boxes -->
      <div class="slot mb-2 md:mb-0 md:mr-2 w-full">
        <select id="pronoun-select" class="w-full py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 ">
         
        </select>
      </div>
      <div class="slot mb-2 md:mb-0 md:mr-2 w-full">
        <select id="activity-select" class="w-full py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 w-full">
          
        </select>
      </div>
        <!--<button id="spin-button" class="w-full py-2 px-4 bg-yellow-500 text-white rounded-md shadow-md hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition-colors">Spin</button>
        --> <button id="spin-button" class="w-full md:w-auto py-2 px-4 bg-yellow-500 text-white rounded-md shadow-md hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 transition-colors">Spin</button>

      <!--<button id="translate-button" class="sm:w-full sm:mt-3 md:mt-0 md:w-1/6 py-2 px-4 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:bg-green-600 transition-colors">Translate</button>
      --><button id="translate-button" class="hidden md:inline-block w-full sm:mx-2 md:w-auto mt-3 md:mt-0 py-2 px-4 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:bg-green-600 transition-colors">Translate</button>
  
    
    </div>
    <!-- Spin button (placed separately on mobile) -->
    
    <!-- Second row: Input box for sentence -->
    <div class="flex flex-col items-center justify-center mb-0">
      <textarea id="sentence" class="w-full h-20 px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 mb-0" placeholder="Your sentence will appear here"></textarea>
    </div>
    <!-- Third row: Copy and Translate buttons -->
    <!-- Third row: Copy and Translate buttons -->
    <!--<div class="flex md:flex-row items-center justify-center mb-8">-->
      <!-- Copy button -->
      <!--<button id="copy-button" class="w-1/2 mr-2 py-2 px-4 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors mb-4 md:mb-0">Copy</button>
      --><!-- Translate button -->
    <!--</div>-->
    <div class="flex md:flex-row items-center justify-center mb-2">
      <button id="translate-button1" class="block md:hidden w-full md:w-auto mt-3 md:mt-0 py-2 px-4 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:bg-green-600 transition-colors">Translate</button>
    </div>
    <div class="flex flex-col items-center justify-center">
      <textarea id="sentencetranslated" class="w-full h-20 px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500" placeholder="Your translated sentence will appear here"></textarea>
    </div>
  </div>