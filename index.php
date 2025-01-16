<?php
session_start();

require_once 'controllers/AdminController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/AnnonceController.php';
require_once 'controllers/CatalogueController.php';
require_once 'controllers/InscriptionController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/LogoutController.php';
require_once 'controllers/MembreController.php'; // Add this line
require_once 'controllers/CarteController.php';  // Add this line
require_once 'controllers/DonController.php';    // Add this line
require_once 'controllers/AbonnementController.php';    // Add this line
require_once 'controllers\AvantagesController.php';    // Add this line
require_once 'controllers/EvenementController.php';    // Add this line
require_once 'controllers/DemandeAideController.php';    // Add this line
require_once 'controllers/QrCodeController.php';    // Add this line
require_once 'controllers/PartenaireController.php';    // Add this line
require_once 'controllers/StatistiquesController.php';    // Add this line


$request = $_SERVER['REQUEST_URI'];
$request = strtok($request, '?');

$basePath = '/elmuntada';
$request = str_replace($basePath, '', $request);

switch ($request) {
    case '':
    case '/':
        header('Location: ' . $basePath . '/home');
        break;

    case '/home':
        $controller = new HomeController();
        $controller->index();
        break;

    case '/annonces':
        $controller = new AnnonceController();
        $controller->showAll();
        break;

    case '/catalogue':
        $controller = new CatalogueController();
        $controller->index();
        break;

    case '/catalogue/filter':
        $controller = new CatalogueController();
        $controller->filterByVille();
        break;

    case '/inscription':
        $controller = new InscriptionController();
        $controller->showForm();
        break;

    case '/inscription-success':
        include 'views/inscription_success.php';
        break;

    case '/inscription-handle':
        $controller = new InscriptionController();
        $controller->handleUserInscription();
        break;

    case '/membership-application':
        $controller = new MembreController();
        $controller->showMembershipApplicationForm();
        break;

    case '/membership-application-handle':
        $controller = new InscriptionController();
        $controller->handleMembershipApplication();
        break;

    case '/login':
        include 'views/login.php';
        break;

    case '/login-handle':
        $controller = new LoginController();
        $controller->handleLogin();
        break;

    case '/admin-dashboard':
        include 'views/admin_dashboard.php';
        break;

    case '/partenaire-dashboard':
        include 'views/partenaire_dashboard.php';
        break;

    case '/membre-dashboard':
        include 'views/membre_dashboard.php';
        break;

    case '/logout':
        $controller = new LogoutController();
        $controller->handleLogout();
        break;


    case '/validate-membres':
        $controller = new MembreController();
        $controller->showValidateMembres();
        break;

    case '/validate-membre':
        $controller = new MembreController();
        $controller->validateMembre();
        break;

    case '/membre-details':
        $controller = new MembreController();
        $controller->showMembreDetails($_GET['id']);
        break;


    case '/membre-dashboard/update':
        $controller = new MembreController();
        $controller->showUpdateForm();
        break;

    case '/user-dashboard':
        include 'views/user_dashboard.php';
        break;

    case '/membre-dashboard/update-handle':
        $controller = new MembreController();
        $controller->handleUpdate();
        break;
case '/avantages_membre':
        $controller = new AvantagesController();
        $controller->showAvantages();
        break;
case '/remise_speciale':
        $controller = new AvantagesController();
        $controller->remiseSpeciale();
        break;
    case '/carte':
        $controller = new CarteController();
        $controller->showCarte($_SESSION['membre_id']);
        break;

    case '/renew-abonnement':
        $controller = new CarteController();
        $controller->handleRenewal();
        break;

    case '/details':
        $controller = new CatalogueController();
        $controller->showDetails($_GET['id']);
        break;

    case '/make-donation':
        $controller = new DonController();
        $controller->makeDonation();
        break;

 
     case '/pending-abonnements':
            $controller = new CarteController();
            $controller->handlePendingAbonnements();
            break;
    case '/get-receipt-path':
    $controller = new AbonnementController();
    $controller->getReceiptPath($_GET['abonnement_id']);
    break;
    case '/history-membre':
    $controller = new AbonnementController();
    $controller->showMemberAbonnements($_SESSION['membre_id']);
    break;
    case '/all_abonnements':
        $controller = new AbonnementController();
        $controller->showAllAbonnements();
        break;
        case '/validated_membres':
            $controller = new MembreController();
            $controller->showValidatedMembres();
            break;
            case '/don_membre':
                $donController = new DonController();
                $donController->viewDonsByMembre($_SESSION['utilisateur_id']);       
                break; 

  case '/list-upcoming-events':
        $controller = new EvenementController();
        $controller->listUpcomingEvents();
        break;

    case '/register-for-event':
        $controller = new EvenementController();
        $controller->registerForEvent();
        break;
        case '/demande-aide':
$controller = new DemandeAideController();
$controller->handleFormSubmission();
                
            break;
            case '/show-demande-aide':
                $controller = new DemandeAideController();
                $controller->showaide();
                                
                            break;

case '/scan-qr-code':
        $controller = new QrCodeController();
        $controller->scanQrCode();
        break;

case '/get-membre-info':
        $controller = new QrCodeController();
        $controller->getMembreInfo();
        break;
case '/partenaire-info':
        $controller = new PartenaireController();
        $controller->showPartenaireInfo();
        break;
case '/partenaire-admin':
        $controller = new PartenaireController();
        $controller->showPartenaires();
        break;
case '/addPartenaire':
        $controller = new PartenaireController();
        $controller->addPartenaire();
        break;
        case '/getPartenaire':
            $controller = new PartenaireController();
            $controller->getPartenaire();
            break;
    
        case '/updatePartenaire':
            $controller = new PartenaireController();
            $controller->updatePartenaire();
            break;
    
        case '/deletePartenaire':
            $controller = new PartenaireController();
            $controller->deletePartenaire();
      case '/partenaire-gestion':
        $controller = new PartenaireController();
        $controller->showPartenaires2();
        break;      break;
        case '/updateRemise':
            $controller = new AvantagesController();
            $controller->updateRemise();
            break;
 case '/avantage_admin':
            $controller = new AvantagesController();
            $controller->showAllAvantages();
            break;
 case '/all_remise':
            $controller = new AvantagesController();
            $controller->showSpecialRemisesForAllMembers();
            break;
case '/addRemise':
    $controller = new AvantagesController();
    $controller->addRemise();
    break;
 case '/view-all-dons':
        $controller = new DonController();
        $controller->viewAllDons();
        break;

    case '/validate-don':
        $controller = new DonController();
        $controller->validateDon($_GET['don_id']);
        break;

    case '/stat':
        $controller = new StatistiquesController();
        $controller->index();
        break;
         case '/list_benevolats':
            $controller = new EvenementController();
            $controller->listBenevolats();
        break;
   case '/all_annonces_membre':
    $controller = new AnnonceController();
    $controller->showAll2();
        break;
    default:
        http_response_code(404);
        require 'views/404.php';
        break;
}
