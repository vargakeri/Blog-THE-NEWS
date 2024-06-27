@if (session('message'))
    <div style="margin: 0px" id="popSuccess" class="pop" x-data="{ isOpen: true }" x-init="setTimeout(() => { isOpen = false; }, 3000)" >
        <div class="successPopup"  role="alert" x-show="isOpen" class="popup">
            {{ session('message') }} 
            
      <span  onclick="hidePopup()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                  </svg>
      </span>
         
        </div>
    </div>
@elseif (session('denied'))
    <div style="margin: 0px" id="popDenied" class="pop" x-data="{ isOpen: true }" x-init="setTimeout(() => { isOpen = false; }, 3000)" >
        <div class="deniedPopup"  role="alert" x-show="isOpen" class="popup">
            {{ session('denied') }} 
          
           <span  onclick="hidePopupDenied()">
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                  </svg>
           </span>
          
           
        </div>
    </div>
@endif

<script>
    function hidePopup() {
        document.getElementById('popSuccess').style.display = 'none';
    }
    function hidePopupDenied() {
        document.getElementById('popDenied').style.display = 'none';
    }
</script>