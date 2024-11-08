document.addEventListener('DOMContentLoaded', function() {
    // Inventory List for inflows and outflows
    let inventory = [];
    let outflows = [];
    let imgUrl; // Variable to store image URL for download

    // Handle form submission to add a new inflow entry
    document.getElementById('inventoryForm').addEventListener('submit', function(event) {
        event.preventDefault();
        addInflow();
    });

    // Handle form submission to add a new outflow entry
    document.getElementById('outflowForm').addEventListener('submit', function(event) {
        event.preventDefault();
        addOutflow();
    });

    // Function to add a new inflow entry
    function addInflow() {
        const date = document.getElementById('date').value;
        const description = document.getElementById('description').value;
        const amount = parseFloat(document.getElementById('amount').value);
        const careOf = document.getElementById('careOf').value;

        if (validateEntry(date, description, amount, careOf)) {
            const entry = { date, description, amount, careOf };
            inventory.push(entry);
            document.getElementById('inventoryForm').reset();
            renderInventoryTable();
            alert('Cash inflow added successfully!');
        }
    }

    // Function to add a new outflow entry
    function addOutflow() {
        const date = document.getElementById('outflowDate').value;
        const description = document.getElementById('outflowDescription').value;
        const amount = parseFloat(document.getElementById('outflowAmount').value);
        const careOf = document.getElementById('outflowCareOf').value;

        if (validateEntry(date, description, amount, careOf)) {
            const outflowEntry = { date, description, amount, careOf };
            outflows.push(outflowEntry);
            document.getElementById('outflowForm').reset();
            renderOutflowTable();
            alert('Cash outflow added successfully!');
        }
    }

    // Function to validate form entry
    function validateEntry(date, description, amount, careOf) {
        if (!date || !description || isNaN(amount) || amount <= 0 || !careOf) {
            alert('Please fill out all fields correctly.');
            return false;
        }
        return true;
    }

    // Function to render inventory (inflows) table
    function renderInventoryTable() {
        const inventoryBody = document.getElementById('inventoryBody');
        inventoryBody.innerHTML = '';

        inventory.forEach((entry, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${entry.date}</td>
                <td>${entry.description}</td>
                <td>${entry.amount.toFixed(2)}</td> <!-- Format amount to 2 decimal places -->
                <td>${entry.careOf}</td>
                <td class="actions">
                    <button class="edit-btn" onclick="editEntry(${index})">Edit</button>
                    <button class="delete-btn" onclick="deleteEntry(${index})">Delete</button>
                </td>
            `;
            inventoryBody.appendChild(row);
        });
    }

    // Function to delete an entry
    window.deleteEntry = function(index) {
        inventory.splice(index, 1);
        renderInventoryTable();
    };

    // Function to edit an entry
    window.editEntry = function(index) {
        const entry = inventory[index];
        document.getElementById('date').value = entry.date;
        document.getElementById('description').value = entry.description;
        document.getElementById('amount').value = entry.amount;
        document.getElementById('careOf').value = entry.careOf;
        inventory.splice(index, 1); // Remove old entry
        renderInventoryTable();
    };

    // Function to render outflow table
    function renderOutflowTable() {
        const outflowBody = document.getElementById('outflowBody');
        outflowBody.innerHTML = '';

        outflows.forEach((entry, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${entry.date}</td>
                <td>${entry.description}</td>
                <td>${entry.amount.toFixed(2)}</td> <!-- Format amount to 2 decimal places -->
                <td>${entry.careOf}</td>
                <td class="actions">
                    <button class="edit-btn" onclick="editOutflow(${index})">Edit</button>
                    <button class="delete-btn" onclick="deleteOutflow(${index})">Delete</button>
                </td>
            `;
            outflowBody.appendChild(row);
        });
    }

    // Function to delete an outflow entry
    window.deleteOutflow = function(index) {
        outflows.splice(index, 1);
        renderOutflowTable();
    };

    // Function to edit an outflow entry
    window.editOutflow = function(index) {
        const entry = outflows[index];
        document.getElementById('outflowDate').value = entry.date;
        document.getElementById('outflowDescription').value = entry.description;
        document.getElementById('outflowAmount').value = entry.amount;
        document.getElementById('outflowCareOf').value = entry.careOf;
        outflows.splice(index, 1);
        renderOutflowTable();
    };

    // Function to convert HTML to image for cash inflows
    function htmlToImg() {
        const inflowNode = document.getElementById('inventoryBody');
        domtoimage.toPng(inflowNode)
            .then(function(dataUrl) {
                document.getElementById("showImg").src = dataUrl;
                document.getElementById("showImg").style.display = 'block';
                imgUrl = dataUrl; // Store the image URL for downloading
            })
            .catch(function(error) {
                console.error('Oops, something went wrong!', error);
            });
    }

    // Function to convert HTML to image for cash outflows
    function htmlToImgCashOut() {
        const outflowNode = document.getElementById('outflowBody');
        domtoimage.toPng(outflowNode)
            .then(function(dataUrl) {
                document.getElementById("showImgCashOut").src = dataUrl;
                document.getElementById("showImgCashOut").style.display = 'block';
                imgUrl = dataUrl; // Store the image URL for downloading
            })
            .catch(function(error) {
                console.error('Oops, something went wrong!', error);
            });
    }

    // Download image function
    function imgDown() {
        if (!imgUrl) {
            alert('No image available for download.');
            return;
        }
        const a = document.createElement('a');
        a.href = imgUrl;
        a.download = "htmlToImg.png";
        a.click();
    }
});
// End of script
// cashflow chart
// Sample data for cash flow chart
const monthlyData = {
    inflow: [5000, 4500, 4800, 5200, 4700, 4900, 5300, 5400, 5500, 5600, 5700, 5800],
    outflow: [3000, 3200, 3100, 3500, 3400, 3300, 3200, 3100, 3000, 2900, 2800, 2700]
  };
  
  // Update the summary data dynamically
  function updateDashboardData() {
    const inflowTotal = monthlyData.inflow.reduce((a, b) => a + b, 0);
    const outflowTotal = monthlyData.outflow.reduce((a, b) => a + b, 0);
  
    document.getElementById('totalInflow').textContent = `Total: $${inflowTotal}`;
    document.getElementById('lastMonthInflow').textContent = `Last Month: $${monthlyData.inflow[monthlyData.inflow.length - 1]}`;
    document.getElementById('ytdInflow').textContent = `Year-to-Date: $${inflowTotal}`;
  
    document.getElementById('totalOutflow').textContent = `Total: $${outflowTotal}`;
    document.getElementById('lastMonthOutflow').textContent = `Last Month: $${monthlyData.outflow[monthlyData.outflow.length - 1]}`;
    document.getElementById('ytdOutflow').textContent = `Year-to-Date: $${outflowTotal}`;
  }
  
  // Create the cash flow chart
  function createCashFlowChart() {
    const ctx = document.getElementById('cashFlowChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
          {
            label: 'Cash Inflow',
            data: monthlyData.inflow,
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          },
          {
            label: 'Cash Outflow',
            data: monthlyData.outflow,
            backgroundColor: 'rgba(255, 99, 132, 0.6)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
  
  // Initialize the dashboard with initial data and create chart
  function initializeDashboard() {
    updateDashboardData();
    createCashFlowChart();
  
    // Simulate real-time updates every 5 seconds
    setInterval(updateDashboardData, 1000);
  }
  
  // Run the dashboard initialization
  document.addEventListener('DOMContentLoaded', function() {
    initializeDashboard();
});

// Folder creation functionality
document.getElementById('new-folder-button').addEventListener('click', function() {
    const directoryContainer = document.getElementById('directory-container');
    const lastDirectory = directoryContainer.lastElementChild;
    let startYear, endYear;

    // Check if there is an existing directory to determine the next school year
    if (lastDirectory) {
        const lastFolderName = lastDirectory.querySelector('.folder-name').textContent;
        const lastYear = parseInt(lastFolderName.match(/\d{4}/)[0]); // Extract the starting year from the last folder name
        startYear = lastYear + 1;
        endYear = startYear + 1;
    } else {
        // If no directories, start from the current school year, e.g., 2024-2025
        startYear = new Date().getFullYear();
        endYear = startYear + 1;
    }

    // Create new directory element
    const directoryDiv = document.createElement('div');
    directoryDiv.className = 'directory';
    directoryDiv.innerHTML = `
        <div class="add-folder-icon">📁</div>
        <div class="folder-name" onclick="redirectToDirectory(${startYear})">S.Y. ${startYear}-${endYear}</div>
    `;

    directoryContainer.appendChild(directoryDiv);
});


// Function to redirect to a new page
window.redirectToDirectory = function(directoryNumber) {
    window.location.href = `directory${directoryNumber}.html`; // Change this to your desired URL
}
