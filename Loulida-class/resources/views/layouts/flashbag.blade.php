<div id="flashMessages">
    @if (session('success'))
    <div class="flash-message bg-green-100 m-2 md:w-[30vw] mx-auto border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    @if (session('error'))
    <div class="flash-message bg-red-100 m-2 md:w-[30vw] mx-auto border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif
</div>

<script>
    // Function to hide flash messages after a specified duration
    function hideFlashMessages() {
        // Select all flash messages
        const flashMessages = document.querySelectorAll('.flash-message');

        // Loop through each flash message
        flashMessages.forEach(message => {
            // Set a timeout to hide the flash message after 5 seconds (5000 milliseconds)
            setTimeout(() => {
                message.style.display = 'none'; // Hide the flash message
            }, 5000); // Adjust the duration as needed (5 seconds in this example)
        });
    }

    // Call the function to hide flash messages when the page is loaded
    window.addEventListener('load', hideFlashMessages);
</script>
