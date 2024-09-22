const express = require('express');
const path = require('path');
const app = express();
const port = 3000;

// Servir archivos estáticos desde las carpetas 'css' y 'javascript'
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/javascript', express.static(path.join(__dirname, 'javascript')));
app.use('/img', express.static(path.join(__dirname, 'img')));

// Servir el archivo HTML desde la carpeta 'html'
app.use('/', express.static(path.join(__dirname, 'html')));
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'html', 'inicioTKD.html'));
});

app.listen(port, () => {
  console.log(`Servidor corriendo en http://localhost:${port}`);
});
