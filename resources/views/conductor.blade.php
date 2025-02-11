<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Conductores</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .conductor { margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .conductor h3 { margin: 0; }
        .conductor p { margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Gestión de Conductores</h1>
    <div id="conductores">
        <!-- Los conductores se cargarán aquí -->
    </div>

    <h2>Agregar Nuevo Conductor</h2>
    <form id="conductorForm">
        <input type="text" id="nia" placeholder="NIA" required>
        <input type="text" id="dni" placeholder="DNI" required>
        <input type="text" id="name" placeholder="Nombre" required>
        <input type="text" id="phone" placeholder="Teléfono" required>
        <input type="text" id="location" placeholder="Ubicación" required>
        <input type="email" id="email" placeholder="Correo Electrónico" required>
        <button type="submit">Agregar Conductor</button>
    </form>

    <script>
        // Cargar conductores al cargar la página
        fetch('/api/conductores')
            .then(response => response.json())
            .then(data => {
                const conductoresContainer = document.getElementById('conductores');
                data.forEach(conductor => {
                    conductoresContainer.innerHTML += `
                        <div class="conductor" data-id="${conductor.id}">
                            <h3>${conductor.name} (NIA: ${conductor.nia})</h3>
                            <p>DNI: ${conductor.dni}</p>
                            <p>Teléfono: ${conductor.phone}</p>
                            <p>Ubicación: ${conductor.location}</p>
                            <p>Correo Electrónico: ${conductor.email}</p>
                            <button onclick="editConductor(${conductor.id})">Editar</button>
                            <button onclick="deleteConductor(${conductor.id})">Eliminar</button>
                        </div>
                    `;
                });
            });

        // Agregar nuevo conductor
        document.getElementById('conductorForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const nia = document.getElementById('nia').value;
            const dni = document.getElementById('dni').value;
            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const location = document.getElementById('location').value;
            const email = document.getElementById('email').value;

            fetch('/api/conductores', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nia, dni, name, phone, location, email })
            })
            .then(response => response.json())
            .then(conductor => {
                const conductoresContainer = document.getElementById('conductores');
                conductoresContainer.innerHTML += `
                    <div class="conductor" data-id="${conductor.id}">
                        <h3>${conductor.name} (NIA: ${conductor.nia})</h3>
                        <p>DNI: ${conductor.dni}</p>
                        <p>Teléfono: ${conductor.phone}</p>
                        <p>Ubicación: ${conductor.location}</p>
                        <p>Correo Electrónico: ${conductor.email}</p>
                        <button onclick="editConductor(${conductor.id})">Editar</button>
                        <button onclick="deleteConductor(${conductor.id})">Eliminar</button>
                    </div>
                `;
                document.getElementById('conductorForm').reset();
            });
        });

        // Eliminar conductor
        function deleteConductor(id) {
            fetch(`/api/conductores/${id}`, { method: 'DELETE' })
                .then(() => {
                    document.querySelector(`.conductor[data-id="${id}"]`).remove();
                });
        }

        // Función para editar conductor (puedes implementarla según tus necesidades)
        function editConductor(id) {
            // Lógica para editar el conductor
        }
    </script>
</body>
</html>

