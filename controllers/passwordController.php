<?php

require ('./models/User.php');
require_once 'models/Category.php';

$categories = getCategories();

if (isset($_GET['action'])){
    switch ($_GET['action']):
        case 'send':
            $_SESSION['messages'] = null;
            if (!empty($_POST['email'])){
                $mailExist = userExist($_POST);
                if ($mailExist){
                    $recup_code = "";
                    for($i=0; $i < 8; $i++) {
                        $recup_code .= mt_rand(0,9);
                    }
                    insertCode($recup_code,$_POST);
                    $name = $mailExist['first_name'];
                    $header="MIME-Version: 1.0\r\n";
                    $header.='From:"InGen.com"<InGen@gmail.com>'."\n";
                    $header.='Content-Type:text/html; charset="utf-8"'."\n";
                    $header.='Content-Transfer-Encoding: 8bit';
                    $message = '<html>
                                 <head>
                                   <title>Récupération de mot de passe - RealSkin.com</title>
                                   <meta charset="utf-8" />
                                 </head>
                                 <body>
                                   <div color="#303030";>
                                     <div align="center">
                                       <table width="600px">
                                         <tr>
                                           <td>
                                             
                                             <div align="center">Bonjour <b>'.$name.'</b>,</div>
                                             <div><a href="http://localhost/ecommerce/index.php?p=password&action=code">Modifier le mot de passe</a></div>
                                             Voici votre code de récupération: <b>'.$recup_code.'</b>
                                             A bientôt sur <a href="http://localhost/ecommerce/index.php">InGen.com</a> !
                                             
                                           </td>
                                         </tr>
                                         <tr>
                                           <td align="center">
                                             <div size="2">
                                               Ceci est un email automatique, merci de ne pas y répondre
                                             </div>
                                           </td>
                                         </tr>
                                       </table>
                                     </div>
                                   </div>
                                 </body>
                                 </html>';
                    $test = mail($_POST['email'], "Récupération de mot de passe - InGen.com", $message, $header);
                    header("Location:index.php?p=password&action=code");
                    $_SESSION['messages'][] = 'Un mail a etait envoyé';
                }
                else{
                    $_SESSION['messages'][] = 'Le mail n\'existe pas';
                }

            }
            else{
                $_SESSION['messages'][] = 'Le champ mail est obligatoire';
            }
            include './views/password.php';

            break;
        case 'code':
            include './views/changePassword.php';
            break;
        case 'change':
            $_SESSION['messages'] = null;
            if(!empty($_POST['email']) || !empty($_POST['code']) || !empty($_POST['password']) || !empty($_POST['confirmPassword'])){
                if ($_POST['password']==$_POST['confirmPassword']){
                    $emailExist = userExist($_POST);
                    if ($emailExist){
                        if ($emailExist['forgot_password']==$_POST['code']){
                            updatePassword($emailExist['email'],$_POST);
                            $_SESSION['messages'][] = 'Le mot de passe a etait modifié';
                            include './views/loginRegister.php';
                        }
                        else{
                            $_SESSION['messages'][] = 'Le code n\'est pas valide';
                        }

                    }
                    else{
                        $_SESSION['messages'][] = 'Le mail dois exister';
                    }
                }
                else{
                    $_SESSION['messages'][] = 'Les deux mots de passe doivent correspondre';
                }
            }
            else{
                $_SESSION['messages'][] = 'Tout les champs sont obligatoire';
            }

            header('Location:index.php?p=password&action=code');
            exit;
        break;
        default:
            include './views/password.php';
            break;

    endswitch;
}
else{
    include './views/password.php';
}


