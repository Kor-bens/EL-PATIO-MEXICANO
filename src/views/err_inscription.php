<?php

require_once 'src/controllers/Message.php';
// On est censé recevoir une URL du type /connexion-inscription?error=type-error

// On vérifie qu'on reçoit une URL avec des paramètres
if (count(explode('?', $_SERVER['REQUEST_URI'])) > 1) {

    // On isole "error=type-error", et on sépare "error" et "type-error"
    $error = explode('=', explode('?', $_SERVER['REQUEST_URI'])[1]);

    // On vérifie que les paramètres commencent bien par "?error="
    if($error[0] === "error") {

        // On stocke "type-error" dans une variable
        $error_type = htmlspecialchars(strtoupper($error[1]));

        // S'il n'y aucune erreur, le message affiché sera vert, sinon il sera rouge
        if($error_type === "NONE") {
            $color = "success";
        } else {
            $color = "danger";
        }

        // On veut que "type-error" se transforme en "INSCR_ERR_TYPE_ERROR" pour appeler
        // le message correspondant de la classe "Message"
        $error_type = str_replace("-", "_", $error_type);
        $error_type = "INSCR_ERR_" . $error_type;

        // Puis on stocke le message correspondant dans une variable
        $message = constant("Message::$error_type");

            // On affiche le message d'erreur avec une classe Bootstrap
            ?><div class="alert alert-<?php echo $color ?> w-50 mx-auto mt-5" role="alert">
                <?php echo $message; ?>
            </div><?php        
    }
};

?>