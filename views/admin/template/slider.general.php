<div id="wrapper">
        <!-- INICIO SIDEBAR LEFT -->
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 toggled">
            <div class="container-fluid d-flex flex-column p-0">
                <!-- INICIO LOGO -->
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="admin.view.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        <span>HORACIO</span>
                    </div>
                </a>
                <!--  -->

                <!-- INICIO SECCIONES SIDEBAR -->
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <?php require_once 'sidebaroptions.php'; ?>
                       
                </ul>
                <!-- -->

                <!-- INICIO OCULTAR SIDEBAR -->
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
                <!-- -->
                <div class="container-fluid" id="content-dinamics">
                    
                </div>
            </div>
        </nav>
        <!-- FIN SIDEBAR LEFT -->
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        //Crearemos una función que obtenga la URL(vista)
        function getURL(){
            //1. Obtener la URL
            const url = new URL(window.location.href);
            //2. Obtener el valor enviado por la URL
            const vista = url.searchParams.get("view");
            //3. Crear un objeto que referencia contenedor
            const contenedor = document.querySelector("#content-dinamics");
            
            //Cuando el usuario elige una opción...
            if (vista != null){
                fetch(vista)
                    .then(respuesta => respuesta.text())
                    .then(datos => {
                        contenedor.innerHTML = datos;

                        //Necesitamos recorrer todas las etiquetas <script> y "reactivarlas"
                        const scriptsTag = contenedor.getElementsByTagName("script");
                        for (i = 0; i < scriptsTag.length; i++){
                            eval(scriptsTag[i].innerText);
                        }
                    });
            }
        }

        getURL();

    });
</script>