<?php include('_cabecalho.php'); ?>
    <div class="container">
     <div class="row">
      <?php Messages::display(); ?>
     	<?php require($view); ?>
     </div>
    </div><!-- /.container -->
</body>

</html>
