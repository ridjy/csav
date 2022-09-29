<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Web service API REST">
    <meta name="author" content="Rija">
    <link rel="icon" href="<?php echo img_url('icone.png'); ?>">

    <title>Formulaire CSAV</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo css_url('bootstrap.min') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo css_url('form-validation') ?>" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="row">
        <div class="col-md-8 order-md-1">
          <h2>Formulaire de SAV</h2>
          <p class="lead">Il convient de créer des dossiers de REWORK à la volée dans le SI CSAV au moment de l’appel poussé.</p>
        </div>
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Réponse du serveur</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">OK 200</h6>
                <small>Success</small>
              </div>
              <span class="text-success"></span>
            </li>
          </ul>

        </div>
    </div>    

      <div class="row">
        
        <div class="col-md-5 order-md-1">
          <h4 class="mb-3">Informations à envoyer</h4>
          <form class="needs-validation" novalidate method="POST" action="<?php echo site_url('formulaire/envoi') ?>">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="extDossierNo">Numéro de dossier</label>
                <input type="text" class="form-control" id="extDossierNo" name="extDossierNo" placeholder="" value="" required>
                <input type="hidden" class="form-control" id="invoiceNo" value="" >
                <div class="invalid-feedback">
                  Veuiller remplir ce champ
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="purchaseDate">Date</label>
                <input type="text" class="form-control" id="purchaseDate" value="<?php echo date('d/m/Y'); ?>" >
                <div class="invalid-feedback">
                  Date requis
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="distributeurCode">Distributeur Code</label>
              <div class="input-group">
                <input type="text" class="form-control" id="distributeurCode" value="ARISTON_REWORK" readonly>
              </div>
            </div>

            <div class="mb-3">
              <label for="code">Code <span class="text-muted">(fourni par ARISTON et créé dans le SI CSAV)</span></label>
              <input type="text" class="form-control" id="code" name="code" placeholder="code EAN (Code produit)">
              <input type="hidden" class="form-control" id="Sn01" name="Sn01" placeholder="">
              <div class="invalid-feedback">
                Veuiller entrer un code valide
              </div>
            </div>

            <div class="mb-3">
              <label for="Sous-objet data">Sous-objet data</label>
              <input type="text" class="form-control" id="Sous-objet data" placeholder="" >
            </div>

            
        </div>
        
        <!--2m rangée-->
        <div class="col-md-7 order-md-2">
          <div class="row">
              <div class="col-md-3 mb-3">
                <label for="titleCode">Titre</label>
                <select class="custom-select d-block w-100" id="titleCode" name='titleCode' required>
                  <option value="1">Monsieur</option>
                  <option value="2">Madame</option>
                  <option value="3">Mademoiselle</option>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label for="firstName">Prénom</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" >
              </div>
              <div class="col-md-5 mb-3">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                <div class="invalid-feedback">
                  Nom requis.
                </div>
              </div>
            </div>
            
            <!--<hr class="mb-4">
  
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            
            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            !-->

            <div class="row">
              <div class="col-md-7 mb-3">
                <label for="address01">Adresse</label>
                <input type="text" class="form-control" id="address01" name="address01" placeholder="" required>
                <input type="hidden" class="form-control" id="address02" name="address02" required>
                <input type="hidden" class="form-control" id="address03" name="address03" required>
                <div class="invalid-feedback">
                  Adresse requis
                </div>
              </div>
              <div class="col-md-5 mb-3">
                <label for="postalCode">Code postal</label>
                <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="" required>
                <div class="invalid-feedback">
                  Code postal
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-2">
                <label for="city">Ville</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="">
              </div> 
              <div class="col-md-4 mb-2">
                <label for="email">Mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="">
              </div>  
              <div class="col-md-4 mb-2">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="">
              </div>  
            </div>

            <div class="row">
               <div class="col-md-4 mb-2">
                <label for="internalObservation">Commentaire</label>
                <textarea name="internalObservation">
                </textarea>  
              </div> 
            </div>  

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Envoyer</button>
            <button class="btn btn-primary btn-lg btn-block" type="reset">Réinitialiser les champs</button>
          </form>

        </div>  

      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; <?php echo date('Y'); ?> BPO Océan Indien</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="http://www.bpooceanindien.com/" target="_blank">Site web</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo js_url('jquery-3.2.1.slim.min') ?>"></script>
    <script src="<?php echo js_url('popper.min') ?>"></script>
    <script src="<?php echo js_url('bootstrap.min') ?>"></script>
    <script src="<?php echo js_url('holder.min') ?>"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
