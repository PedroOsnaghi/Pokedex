        <footer class="bg-dark mt-5 opacity-75 w-100 pb-5">
            <div class="container-lg p-3 h-100">
                <h5 class="fs-6 text-center text-light">Pokedex - 2022 - Programación Web 2</h5>
                <p class="text-center text-light" style="font-size:12px">GRUPO 8: DOMINGUEZ ELIAN - HERDEIRO AGOSTINA JACQUELINE - PERSICO CAMILA BELEN - QUIROZ MARTIN ANDRÉS - OSNAGHI PEDRO RAMON</p>
            </div>
            
        </footer>


    </body>
    <script src="<?php echo DIR_ROOT ?>public/js/bootstrap.bundle.js"></script>
    <script src="<?php echo DIR_ROOT ?>public/js/preview.js"></script>


    <!-- SCRIPT PARA HREF DE MODAL -->
    <script>
        var conf = document.getElementById('btn-confirm');
        
        document.querySelectorAll("a[app_tag='btn-delete']").forEach(function(a){
            a.addEventListener('click', function(){
            console.log(a.href);
            conf.href = a.href;
            });
        });
            
        
        
        
    
    </script>
</html>
