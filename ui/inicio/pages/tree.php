
<div class="card-header mx-auto border-dark">
    <h1>Arbol Genealógico</h1>
</div>
<div class="card-body">    
    <div class="tree">
        <ul>
            <li>
                <div class="parent">
                    <a href="#">
                        <img src="img/Profesores/Kyong-Duk-Lee-Gran-Maestro-de-Taekwondo.jpg" alt="Kyong Duk Lee">
                        <br>Kyong Duk Lee
                    </a>
                </div>
                <ul>
                    <li>
                        <div class="parent">
                            <a href="#">
                                <img src="https://via.placeholder.com/100" alt="Mauricio">
                                <br>Maestro Mauricio
                            </a>
                        </div>
                        <ul>
                            <li>
                                <div class="parent">
                                    <a href="#">
                                        <img src="https://via.placeholder.com/100" alt="Pablo Martinez">
                                        <br>Pablo Martinez
                                    </a>
                                    <a href="#">
                                        <img src="https://via.placeholder.com/100" alt="Nicolas">
                                        <br>Nicolas
                                    </a>
                                </div>
                                
                                <ul>
                                    <li>
                                        <div class="parent">
                                            <a href="#">
                                                <img src="img/Profesores/angela-morales.jpg" alt="Angela Morales">
                                                <br>Angela Morales
                                            </a>
                                        </div>
                                        
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/profe-andres.jpg" alt="Andres Hernandez">
                                                    <br>Andres Hernandez
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="https://via.placeholder.com/100" alt="Andres Gomez">
                                                    <br>Andres Gomez
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/sonia-gomez.jpg" alt="Sonia Gomez">
                                                    <br>Sonia Gomez
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/carlitos.jpg" alt="Carlos ruiz">
                                                    <br>Carlos Ruiz
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/diego-valderrama.jpg" alt="Diego Valderrama">
                                                    <br>Diego Valderrama
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/maria-angelica.jpg" alt="Maria Angelica">
                                                    <br>Maria Angelica
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/ziro.jpg" alt="Ziro">
                                                    <br>Argemiro Pardo
                                                </a>
                                            </li>
                                            <li>
                                                <div class="parent">
                                                    <a href="#">
                                                        <img src="img/Profesores/jhon avila.png" alt="Jhon Avila">
                                                        <br>Jhon Avila
                                                    </a>
                                                    <a href="#">
                                                        <img src="img/Profesores/marcela gonzalez.jpg" alt="Marcela Gonzalez">
                                                        <br>Marcela Gonzalez
                                                    </a>
                                                </div>
                                                <ul class="children">
                                                    <li>
                                                        <a href="#">
                                                            <img src="img/Profesores/brayan-campos.jpg" alt="Brayan Campos">
                                                            <br>Brayan Campos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="img/Profesores/cristian-salamanca.png" alt="Cristian Salamanca">
                                                            <br>Cristian Salamanca
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="https://via.placeholder.com/100" alt="Santiago Vargas">
                                                            <br>Santiago Vargas
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <img src="https://via.placeholder.com/100" alt="David Guerrero">
                                                            <br>David Guerrero
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/memo.jpg" alt="Memo">
                                                    <br>Estiven Romero
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="img/Profesores/jerson-cardenas.jpg" alt="jerson-cardenas">
                                                    <br>Jerson Cardenas
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    
    <script>
        window.onload = function() {
            const treeElement = document.querySelector('.tree');
            const treeHeight = treeElement.offsetHeight;
            window.scrollTo({
                top: treeHeight / 2 - window.innerHeight / 2,
                behavior: 'smooth'
            });
        };
    </script>                   
</div>