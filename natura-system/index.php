<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Generador de Códigos Secuenciales Natura</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <!-- Pantalla de Login -->
    <div id="loginScreen" class="login-container">
        <div class="text-center mb-4">
            <img src="assets/img/logo-natura.png" alt="Logo Natura" width="150" />
            <h2 class="mt-3">Inicio de Sesión</h2>
        </div>
        <form id="loginForm">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" required />
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-natura">Ingresar</button>
            </div>
        </form>
    </div>

    <!-- Aplicación Principal -->
    <div id="appContent" class="hidden">
        <div class="header">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="assets/img/logo-natura.png" class="me-3" alt="Logo Natura" width="150" />
                        <h1>Generador de Códigos Secuenciales Natura <span id="userBadge" class="admin-badge hidden">ADMIN</span></h1>
                    </div>
                    <button id="logoutButton" class="btn btn-outline-light">
                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                    </button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="main-container">
                <h2 class="section-title">Generación de Código</h2>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="yearSelect" class="form-label">Año de Fabricación:</label>
                            <select class="form-select" id="yearSelect"></select>
                            <div class="current-selection">Selección actual: <span id="currentYearDisplay"></span></div>
                        </div>
                        <div class="mb-3">
                            <label for="monthSelect" class="form-label">Mes de Fabricación:</label>
                            <select class="form-select" id="monthSelect">
                                <option value="1">Enero (1)</option>
                                <option value="2">Febrero (2)</option>
                                <option value="3">Marzo (3)</option>
                                <option value="4">Abril (4)</option>
                                <option value="5">Mayo (5)</option>
                                <option value="6">Junio (6)</option>
                                <option value="7">Julio (7)</option>
                                <option value="8">Agosto (8)</option>
                                <option value="9">Septiembre (9)</option>
                                <option value="A">Octubre (A)</option>
                                <option value="B">Noviembre (B)</option>
                                <option value="C">Diciembre (C)</option>
                            </select>
                            <div class="current-selection">Selección actual: <span id="currentMonthDisplay"></span></div>
                        </div>
                        <div class="mb-3">
                            <label for="productCode" class="form-label">Código de Producto:</label>
                            <input type="text" class="form-control" id="productCode" placeholder="Ingrese el código del producto" />
                            <div class="invalid-feedback">El código de producto no existe</div>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Descripción del Producto:</label>
                            <input type="text" class="form-control" id="productDescription" readonly />
                        </div>
                        <div class="mb-3">
                            <label for="productionLine" class="form-label">Línea de Producción:</label>
                            <select class="form-select" id="productionLine">
                                <option value="MRM 3">MRM 3</option>
                                <option value="MRM 4">MRM 4</option>
                                <option value="MRM 5">MRM 5</option>
                                <!-- Más opciones... -->
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sequentialCode" class="form-label">Código Secuencial Generado:</label>
                            <div id="sequentialCode" class="result-box text-center">
                                <span class="sequential-code-display">Ingrese los datos y genere un código</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Opciones:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" id="optionChangeOrder" value="cambioOrden" />
                                <label class="form-check-label" for="optionChangeOrder">Cambio de Orden</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" id="optionGenerate" value="generarSecuencial" checked />
                                <label class="form-check-label" for="optionGenerate">Generar Secuencial</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="options" id="optionChangeBatch" value="cambioBatch" checked />
                                <label class="form-check-label" for="optionChangeBatch">Cambio de batch</label>
                            </div>
                        </div>
                        <div class="button-group">
                            <button id="clearButton" class="btn btn-warning btn-lg">
                                <i class="fas fa-eraser me-2"></i>Limpiar
                            </button>
                            <button id="generateButton" class="btn btn-natura btn-lg">
                                <i class="fas fa-barcode me-2"></i>Generar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="section-title mb-0">Registro de Actividad</h3>
                </div>
                <div class="search-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" id="searchProductCode" class="form-control auto-filter" placeholder="Buscar por código de producto" readonly />
                                <button class="btn btn-secondary" type="button" id="clearSearchButton">
                                    <i class="fas fa-times"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="activityTable">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Código Producto</th>
                                <th>Línea</th>
                                <th>Opción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Configuración
        const productDatabase = {
            'P001': { name: 'Crema Hidratante Ekos', description: 'Crema hidratante con ingredientes naturales' },
            'P002': { name: 'Perfume Kaiak', description: 'Perfume masculino de la línea Kaiak' }
        };

        // Variables globales
        let currentUser = null;
        let isOnline = true;
        let yearLetter = "A";
        let currentMonth = "";
        let currentProduct = "";
        let currentYear = "";

        // Elementos del DOM
        const loginScreen = document.getElementById("loginScreen");
        const appContent = document.getElementById("appContent");
        const loginForm = document.getElementById("loginForm");
        const logoutButtonElem = document.getElementById("logoutButton");
        const yearSelectElem = document.getElementById("yearSelect");
        const monthSelectElem = document.getElementById("monthSelect");
        const productCodeElem = document.getElementById("productCode");
        const productDescriptionElem = document.getElementById("productDescription");
        const sequentialCodeElem = document.getElementById("sequentialCode");
        const generateButtonElem = document.getElementById("generateButton");
        const clearButtonElem = document.getElementById("clearButton");
        const activityTableElem = document.getElementById("activityTable").getElementsByTagName("tbody")[0];
        const searchProductCodeElem = document.getElementById("searchProductCode");
        const clearSearchButtonElem = document.getElementById("clearSearchButton");
        const userBadgeElem = document.getElementById("userBadge");

        // Funciones principales
        function setupYearSelect() {
            const today = new Date();
            const currentYearNum = today.getFullYear();
            yearSelectElem.innerHTML = `
                <option value="Z">${currentYearNum - 1} (Z)</option>
                <option value="A" selected>${currentYearNum} (A)</option>
            `;
            yearLetter = "A";
            currentYear = currentYearNum.toString();
        }

        function setupCurrentMonth() {
            const today = new Date();
            const month = today.getMonth() + 1;
            const monthMap = {
                1: '1', 2: '2', 3: '3', 4: '4', 5: '5', 6: '6',
                7: '7', 8: '8', 9: '9', 10: 'A', 11: 'B', 12: 'C'
            };
            currentMonth = monthMap[month];
            monthSelectElem.value = currentMonth;
        }

        function validateProductCode(code) {
            const isValid = !!productDatabase[code];
            productCodeElem.classList.toggle("is-invalid", !isValid);
            return isValid;
        }

        async function generateSequentialCode() {
            if (!currentProduct || !validateProductCode(currentProduct)) {
                alert("Ingrese un código de producto válido");
                return;
            }

            const product = productDatabase[currentProduct];
            const code = `L.${yearLetter}${currentMonth}XM01`;
            
            sequentialCodeElem.querySelector(".sequential-code-display").textContent = code;
            
            // Simular guardado
            const activity = {
                date: new Date().toLocaleDateString(),
                time: new Date().toLocaleTimeString(),
                code: code,
                product: product.name,
                productCode: currentProduct,
                productionLine: document.getElementById("productionLine").value,
                option: document.querySelector('input[name="options"]:checked').value
            };
            
            await saveActivity(activity);
            updateActivityTable();
        }

        async function saveActivity(activity) {
            // En una implementación real, aquí se enviaría al servidor
            console.log("Registro guardado:", activity);
            return activity;
        }

        async function updateActivityTable() {
            // Simular carga de datos
            activityTableElem.innerHTML = `
                <tr>
                    <td>${new Date().toLocaleDateString()}</td>
                    <td>${new Date().toLocaleTimeString()}</td>
                    <td>L.A1XM01</td>
                    <td>Crema Hidratante Ekos</td>
                    <td>P001</td>
                    <td>MRM 3</td>
                    <td>Generar Secuencial</td>
                    <td></td>
                </tr>
            `;
        }

        function clearFields() {
            productCodeElem.value = "";
            productDescriptionElem.value = "";
            sequentialCodeElem.querySelector(".sequential-code-display").textContent = "Ingrese los datos y genere un código";
            productCodeElem.classList.remove("is-invalid");
        }

        function logout() {
            currentUser = null;
            loginScreen.classList.remove("hidden");
            appContent.classList.add("hidden");
            document.getElementById("username").value = "";
            document.getElementById("password").value = "";
        }

        // Event listeners
        productCodeElem.addEventListener("input", function() {
            const code = this.value.trim().toUpperCase();
            const isValid = validateProductCode(code);
            const product = productDatabase[code];
            
            if (product && isValid) {
                productDescriptionElem.value = `${product.name} - ${product.description}`;
                currentProduct = code;
            } else {
                productDescriptionElem.value = "";
                currentProduct = "";
            }
        });

        generateButtonElem.addEventListener("click", generateSequentialCode);
        clearButtonElem.addEventListener("click", clearFields);
        logoutButtonElem.addEventListener("click", logout);

        // Inicialización
        document.addEventListener("DOMContentLoaded", function() {
            setupYearSelect();
            setupCurrentMonth();
            
            // Simular login para demo
            currentUser = { username: "demo", role: "user" };
            loginScreen.classList.add("hidden");
            appContent.classList.remove("hidden");
        });
    </script>
</body>
</html>