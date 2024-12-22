fetch('admin.php')
    .then(response => response.json())
    .then(data => {
        const recordsDiv = document.getElementById('records');
        let html = '<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Unique ID</th><th>Clock In</th><th>Clock Out</th><th>Action</th></tr>';
        data.forEach(record => {
            html += `<tr>
                <td>${record.id}</td>
                <td>${record.name}</td>
                <td>${record.email}</td>
                <td>${record.unique_id}</td>
                <td>${record.clock_in}</td>
                <td>${record.clock_out}</td>
                <td><button onclick="deleteRecord(${record.id})">Delete</button></td>
            </tr>`;
        });
        html += '</table>';
        recordsDiv.innerHTML = html;
    })
    .catch(error => {
        console.error('Error:', error);
    });

