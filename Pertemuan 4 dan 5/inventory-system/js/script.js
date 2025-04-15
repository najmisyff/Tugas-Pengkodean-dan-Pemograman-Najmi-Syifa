function searchEmployees() {
    const input = document.getElementById('employeeSearch').value.toLowerCase();
    const rows = document.querySelectorAll('#employeeTable tbody tr');
    
    rows.forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        if (name.includes(input)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}
