<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Contactez-nous</h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                    <div class="bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="p-6 text-center">
                            <p>Choisissez une méthode pour nous contacter :</p>
                            <ul class=" space-x-4 mt-4 flex justify-center">
                                <li>
                                    <a href="mailto:contact@votre-cabinet.com" class="flex items-center justify-center text-black hover:bg-yellow-500 hover:text-white p-2 rounded transition-all duration-200"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="https://wa.me/1234567890" target="_blank" class="flex items-center justify-center text-black hover:bg-yellow-500 hover:text-white p-2 rounded transition-all duration-200"><i class="fab fa-whatsapp fa-3x"></i></a>
                                </li>
                                <li>
                                    <a href="tel:+1234567890" class="flex items-center justify-center text-black hover:bg-yellow-500 hover:text-white p-2 rounded transition-all duration-200"><i class="fa fa-phone fa-3x" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
              <!-- Modal footer -->
              <div class="flex justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                  <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-black focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gold">Decline</button>
              </div>
          </div>
      </div>
  </div>