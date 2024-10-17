// Inventory List
let inventory = [];
let cashOutflow = [];

// Handle form submission to add a new entry
document.getElementById('cashOutflowForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get form data
    const date = document.getElementById('cashOutflowDate').value; // Updated ID
    const description = document.getElementById('cashOutflowDescription').value; // Updated ID
    const amount = document.getElementById('cashOutflowAmount').value; // Updated ID
    const careOf = document.getElementById('cashOutflowCareOf').value; // Updated ID

    // Create new inventory entry object
    const entry = {
        date,
        description,
        amount,
        careOf
    };

    // Add entry to the inventory list
    inventory.push(entry);

    // Clear form inputs
    document.getElementById('cashOutflowForm').reset();

    // Update inventory table
    rendercashOutflowTable();
});

// Function to render cashOutflowTable
function rendercashOutflowTable() {
    const cashOutflowBody = document.getElementById('cashOutflowBody');
    cashOutflowBody.innerHTML = '';

    inventory.forEach((entry, index) => {
        const row = document.createElement('tr');
        
        row.innerHTML = `
            <td>${entry.date}</td>
            <td>${entry.description}</td>
            <td>${entry.amount}</td>
            <td>${entry.careOf}</td>
            <td class="actions">
                <button class="edit-btn" onclick="editEntry(${index})">Edit</button>
                <button class="delete-btn" onclick="deleteEntry(${index})">Delete</button>
            </td>
        `;
        
        cashOutflowBody.appendChild(row);
    });
}

// Function to delete an entry
function deleteEntry(index) {
    inventory.splice(index, 1);
    rendercashOutflowTable();
}

// Function to edit an entry
function editEntry(index) {
    const entry = inventory[index];

    // Populate form with existing entry data
    document.getElementById('cashOutflowDate').value = entry.date; // Updated ID
    document.getElementById('cashOutflowDescription').value = entry.description; // Updated ID
    document.getElementById('cashOutflowAmount').value = entry.amount; // Updated ID
    document.getElementById('cashOutflowCareOf').value = entry.careOf; // Updated ID

    // Remove the old entry from inventory
    inventory.splice(index, 1);

    // Update the table
    rendercashOutflowTable();
}
