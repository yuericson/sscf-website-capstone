// Inventory List
let inventory = [];

// Handle form submission to add a new entry
document.getElementById('inventoryForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get form data
    const date = document.getElementById('date').value;
    const description = document.getElementById('description').value;
    const amount = document.getElementById('amount').value;
    const careOf = document.getElementById('careOf').value;

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
    document.getElementById('inventoryForm').reset();

    // Update inventory table
    renderInventoryTable();
});

// Function to render inventory table
function renderInventoryTable() {
    const inventoryBody = document.getElementById('inventoryBody');
    inventoryBody.innerHTML = '';

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
        
        inventoryBody.appendChild(row);
    });
}

// Function to delete an entry
function deleteEntry(index) {
    inventory.splice(index, 1);
    renderInventoryTable();
}

// Function to edit an entry
function editEntry(index) {
    const entry = inventory[index];

    // Populate form with existing entry data
    document.getElementById('date').value = entry.date;
    document.getElementById('description').value = entry.description;
    document.getElementById('amount').value = entry.amount;
    document.getElementById('careOf').value = entry.careOf;

    // Remove old entry
    inventory.splice(index, 1);

    // Update table
    renderInventoryTable();
}
