<div {{$attributes}}>
    <div class="fixed z-10 inset-0 overflow-y-auto">
        
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0" >
    
          <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="xlmodal=false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
      
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
          <div style="    top: 50%; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); left: 50%;"
          class="inline-block absolute align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full md:w-2/3" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 py-5">
              {{$slot}}
            </div>
          </div>
        </div>
    
      </div>
      
    </div>