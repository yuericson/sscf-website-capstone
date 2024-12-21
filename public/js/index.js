


// JS FOR PRESIDENT'S MESSAGE
  document.addEventListener("DOMContentLoaded", function () {
      let currentIndex = 0;
      const images = document.querySelectorAll('.president-carousel img');
      const totalImages = images.length;

      // Function to show the next image
      function showNextImage() {
          // Fade out the current image
          images[currentIndex].style.transition = 'opacity 1s ease'; // Transition for opacity
          images[currentIndex].style.opacity = 0; // Start fading out

          // Wait for the fade-out to complete before changing the image
          setTimeout(() => {
              // Hide the current image
              images[currentIndex].style.display = 'none';

              // Move to the next index
              currentIndex = (currentIndex + 1) % totalImages;

              // Show the next image and fade it in
              images[currentIndex].style.display = 'block'; // Show next image
              images[currentIndex].style.opacity = 0; // Start with opacity 0

              // Trigger reflow to ensure the opacity transition works
              void images[currentIndex].offsetWidth; // Trigger reflow

              // Fade in the next image
              images[currentIndex].style.transition = 'opacity 1s ease'; // Transition for opacity
              images[currentIndex].style.opacity = 1; // Fade in

          }, 1000); // Match this timeout with the fade duration (1000ms = 1 second)
      }

      // Initially set all images to be hidden except the first
      images.forEach((img, index) => {
          img.style.display = (index === 0) ? 'block' : 'none'; // Show the first image
          img.style.opacity = (index === 0) ? 1 : 0; // Set initial opacity
      });

      // Change image every 3 seconds
      setInterval(showNextImage, 4000);
  });






// JS FOR RECENT NEWS 

document.addEventListener('DOMContentLoaded', function () {
    const newsData = [
        { title: 'Community Service Initiative Launch', date: 'September 15, 2024', img: '../images/Volunteer.png' },
        { title: 'New Health and Wellness Program', date: 'September 16, 2024', img: '../images/Volunteer.png' },
        { title: 'Annual Fundraising Event Success', date: 'September 17, 2024', img: '../images/Volunteer.png' },
        { title: 'Volunteer Opportunities Open', date: 'September 18, 2024', img: '../images/Volunteer.png' },
        { title: 'New Scholarship Opportunities', date: 'September 19, 2024', img: '../images/Volunteer.png' },
        { title: 'Sustainability Workshop Series', date: 'September 20, 2024', img: '../images/Volunteer.png' },
        { title: 'News Title 7', date: 'July 7, 2024', img: '../images/Volunteer.png' },
        { title: 'News Title 8', date: 'July 8, 2024', img: '../images/Volunteer.png' },
        { title: 'News Title 9', date: 'July 9, 2024', img: '../images/Volunteer.png' }
        
    ];

    const itemsPerPage = 2;
    const totalPages = Math.ceil(newsData.length / itemsPerPage);
    let currentPage = 1;

    const newsContainer = document.getElementById('news-container');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const pageNumbersContainer = document.querySelector('.page-numbers');

    function displayNews(page) {
        newsContainer.classList.add('fade-out');

        setTimeout(() => {
            newsContainer.innerHTML = '';
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedNews = newsData.slice(start, end);

            paginatedNews.forEach(news => {
                const newsBox = document.createElement('div');
                newsBox.classList.add('col-md-3', 'news-box');
                newsBox.innerHTML = `
                    <img src="${news.img}" alt="${news.title}">
                    <div class="news-title">${news.title}</div>
                    <div class="news-date">Date: ${news.date}</div>
                    <div class="news-read-more-box">
                        <a href="latest-news.html?news=${encodeURIComponent(news.title)}#${encodeURIComponent(news.title)}" class="news-read-more">Read more</a>
                    </div>
                `;
                newsContainer.appendChild(newsBox);
            });

            newsContainer.classList.remove('fade-out');
            newsContainer.classList.add('fade-in');

            setTimeout(() => {
                newsContainer.classList.remove('fade-in');
            }, 500);
        }, 500);
    }

    function updatePaginationButtons() {
        prevButton.style.visibility = currentPage === 1 ? 'hidden' : 'visible';
        nextButton.style.visibility = currentPage === totalPages ? 'hidden' : 'visible';

        pageNumbersContainer.innerHTML = '';
        const maxVisiblePages = 5; // Maximum number of page numbers to display
        let startPage, endPage;

        if (totalPages <= maxVisiblePages) {
            // If total pages are less than or equal to maxVisiblePages
            startPage = 1;
            endPage = totalPages;
        } else {
            // Calculate start and end page
            if (currentPage <= Math.ceil(maxVisiblePages / 2)) {
                startPage = 1;
                endPage = maxVisiblePages;
            } else if (currentPage + Math.floor(maxVisiblePages / 2) >= totalPages) {
                startPage = totalPages - maxVisiblePages + 1;
                endPage = totalPages;
            } else {
                startPage = currentPage - Math.floor(maxVisiblePages / 2);
                endPage = currentPage + Math.floor(maxVisiblePages / 2);
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageNumber = document.createElement('span');
            pageNumber.classList.add('page-number');
            pageNumber.textContent = i;
            pageNumber.dataset.page = i;
            if (i === currentPage) pageNumber.classList.add('active');
            pageNumber.addEventListener('click', function () {
                currentPage = i;
                displayNews(currentPage);
                updatePaginationButtons();
            });
            pageNumbersContainer.appendChild(pageNumber);
        }
    }

    prevButton.addEventListener('click', function (e) {
        e.preventDefault();
        if (currentPage > 1) {
            currentPage--;
            displayNews(currentPage);
            updatePaginationButtons();
        }
    });

    nextButton.addEventListener('click', function (e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            displayNews(currentPage);
            updatePaginationButtons();
        }
    });

    displayNews(currentPage);
    updatePaginationButtons();
});




// JS FOR UPCOMING EVENTS 


  let currentSlide = 0;

  function showSlide(index) {
      const slides = document.querySelectorAll('.slider img');
      if (index >= slides.length) {
          currentSlide = 0;
      } else if (index < 0) {
          currentSlide = slides.length - 1;
      } else {
          currentSlide = index;
      }
      const slider = document.querySelector('.slider');
      slider.style.transform = `translateX(${-currentSlide * 100}%)`; // Move slider
  }

  function moveSlide(direction) {
      showSlide(currentSlide + direction); // Move to next/previous slide
  }

  // Initialize slider to show the first slide
  showSlide(currentSlide);

  // Set interval for automatic slide movement
  setInterval(() => {
      moveSlide(1); // Move to the next slide every 3 seconds
  }, 3000); // Change 3000 to adjust the timing (in milliseconds)



