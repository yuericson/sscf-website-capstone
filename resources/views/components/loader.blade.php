<!-- Loading screen -->
<div id="loading">
  <img src="../images/Logo.png" alt="Loading...">
  <div class="logo-dots">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</div>

<style>
  /* Style for the loading screen */
#loading {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(215, 255, 255, 0.9); /* Background color */
    z-index: 9999;
    text-align: center;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

#loading img {
    width: 200px;
    height: 200px;
    margin-bottom: 20px;
    border-radius: 50%;
    object-fit: cover;
}

.logo-dots {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.dot {
    width: 15px;
    height: 15px;
    margin: 0 8px;
    background-color: #185F43;
    border-radius: 50%;
    animation: loadingAnimation 0.6s infinite alternate;
}

@keyframes loadingAnimation {
    0% {
        opacity: 0.5;
        transform: translateY(0);
    }
    100% {
        opacity: 1;
        transform: translateY(-15px);
    }
}

.dot:nth-child(1) {
    animation-delay: 0s;
}
.dot:nth-child(2) {
    animation-delay: 0.2s;
}
.dot:nth-child(3) {
    animation-delay: 0.4s;
}
.dot:nth-child(4) {
    animation-delay: 0.6s;
}

</style>


  <!-- Scripts -->
  <script>
    const loadingScreen = document.getElementById('loading'); // Reference loader element

    // Function to show the loader
    function showLoader() {
      loadingScreen.style.display = 'flex';
    }

    // Attach click event listeners to all navigation links
    document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('.sidebar .nav-link');

      navLinks.forEach(link => {
        link.addEventListener('click', (event) => {
          event.preventDefault(); // Prevent default navigation
          showLoader(); // Show the loader

          // Simulate a short delay before navigation
          setTimeout(() => {
            window.location.href = link.href; // Navigate to the link
          }, 1000); // Adjust the delay as needed
        });
      });
    });
  </script>








  <!-- Scripts -->
  <script>
      const toggleBtn = document.getElementById('toggleBtn');
      const sidebar = document.getElementById('sidebar');
      const header = document.getElementById('header');
      const mainContent = document.getElementById('mainContent');

      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        header.classList.toggle('collapsed');
        mainContent.classList.toggle('collapsed');
      });
    </script>

    <!-- Active Link Script -->
    <script>
      // Function to set the active link
      function setActiveLink() {
        // Get the current pathname (e.g., '/super-admin-dashboard')
        const currentPath = window.location.pathname;

        // Select all navigation links within the sidebar
        const navLinks = document.querySelectorAll('.sidebar .nav-link');

        navLinks.forEach(link => {
          // Create a URL object for each link's href
          const linkURL = new URL(link.href, window.location.origin);

          // Compare the link's pathname with the current pathname
          if (linkURL.pathname === currentPath) {
            // Add the 'active' class to the matching link
            link.classList.add('active');
          } else {
            // Remove the 'active' class from non-matching links
            link.classList.remove('active');
          }
        });
      }

      // Call the function when the DOM is fully loaded
      document.addEventListener('DOMContentLoaded', setActiveLink);
    </script>