<?php
//Config Ivan
require_once __DIR__.'/../../config_ivan/conf-ivan.php';
//Initialize vocabulary
require_once __DIR__.'/../../voc/lb_fr.php';

$reponse = array();

switch($_POST['action']){
    case "addcircuit" :
        FormAddCircuit($smarty,$voc, $db);
        break;
    case 'btn_register_statut':
        EnregistrerNewStatut($smarty,$db);
        break;
    case 'btn_register_theme':
        EnregistrerTheme($smarty,$db);
        break;
    case 'btn_register_circuit':
        EnregistrerCircuit($smarty,$db);
        break;
    case 'list_circuit':
        ListerCircuit($smarty,$db);
        break;
    case 'detail_circuit':
        DetailCircuit($smarty,$db,$voc);
        break;
    case 'modcircuit':
        FormEditCircuit($smarty,$db, $voc);
        break;
    case 'addetape':
        FormAddEtape($smarty, $voc);
        break;
    case 'btn_register_rabais':
        EnregestrerRabais($db);
        break;
    case 'btn_register_pays':
        EnregistrerPays($smarty,$db);
        break;
    case 'btn_register_etape':
        EnregistrerEtape($smarty,$db);
        break;
    case 'btn_del_rabais':
        BtnDelRabais($db);
        break;
    case 'btn_add_jour':
        ModalAddJour($smarty, $db);
        break;
    case 'btn_add_restaurent':
        ModalAddRestaurent($smarty, $db);
        break;
    case 'btn_add_hotel':
        ModalAddHotel($smarty, $db);
        break;
    case 'btn_add_activity':
        ModalAddActivity($smarty, $db);
        break;
    case 'btn_register_jour':
        EnregistrerJour($smarty,$db);
        break;
    case 'btn_register_ville':
        EnregistrerVille($smarty,$db);
        break;
    case 'btn_register_restaurent':
        EnregistrerNewRestaurent($smarty,$db);
        break;
    case 'btn_register_restaurent_jour':
        EnregistrerRestaurentJour($smarty,$db);
        break;
    case 'btn_register_hotel_jour':
        EnregistrerHotelJour($smarty,$db);
        break;
    case 'btn_register_activity_jour':
        EnregistrerActivityJour($smarty,$db);
        break;
    case 'btn_register_hotel':
        EnregistrerNewHotel($smarty,$db);
        break;
    case 'detail_jour_change':
        DetailJourChange($smarty,$db);
        break;
}

//TODO Load modal
//Modal Add un Restaurent for Jour
function ModalAddRestaurent($smarty, $db){
    global $reponse;
    $reponse['action'] = "btn_add_restaurent";
    $arr_list_restaurent = GetAllRestaurentFromVille($_POST["idVilleJour"], $db);

    $smarty->assign('idPaysEtape', $_POST["idPaysEtape"]);
    $smarty->assign('idVilleJour', $_POST["idVilleJour"]);
    $smarty->assign('idJour', $_POST["idJour"]);
    $smarty->assign('NomPaysEtape', GetNomPaysById($_POST["idPaysEtape"], $db));
    $smarty->assign('NomVilleJour', GetNomVilleById($_POST["idVilleJour"], $db));
    $smarty->assign('arr_list_restaurent', $arr_list_restaurent);

    //Transfer data to *.tpl
    $smarty->fetch("modal_add_restaurent.tpl");
    $reponse['modal_add_restaurent'] = $smarty->fetch("modal_add_restaurent.tpl");
    $reponse['arr_list_restaurent'] = $arr_list_restaurent;
}
//Modal Add une Activity for Jour
function ModalAddActivity($smarty, $db){
    global $reponse;
    $reponse['action'] = "btn_add_activity";

    $smarty->assign('idPaysEtape', $_POST["idPaysEtape"]);
    $smarty->assign('idVilleJour', $_POST["idVilleJour"]);
    $smarty->assign('idJour', $_POST["idJour"]);
    $smarty->assign('NomPaysEtape', GetNomPaysById($_POST["idPaysEtape"], $db));
    $smarty->assign('NomVilleJour', GetNomVilleById($_POST["idVilleJour"], $db));

    //Transfer data to *.tpl
    $smarty->fetch("modal_add_activity.tpl");
    $reponse['modal_add_activity'] = $smarty->fetch("modal_add_activity.tpl");
}
//Modal Add un Hotel for Jour
function ModalAddHotel($smarty, $db){
    global $reponse;
    $reponse['action'] = "btn_add_hotel";
    $arr_list_hotel = GetAllHotelFromVille($_POST["idVilleJour"], $db);

    $smarty->assign('idPaysEtape', $_POST["idPaysEtape"]);
    $smarty->assign('idVilleJour', $_POST["idVilleJour"]);
    $smarty->assign('idJour', $_POST["idJour"]);
    $smarty->assign('NomPaysEtape', GetNomPaysById($_POST["idPaysEtape"], $db));
    $smarty->assign('NomVilleJour', GetNomVilleById($_POST["idVilleJour"], $db));
    $smarty->assign('arr_list_hotel', $arr_list_hotel);

    //Transfer data to *.tpl
    $smarty->fetch("modal_add_hotel.tpl");
    $reponse['modal_add_hotel'] = $smarty->fetch("modal_add_hotel.tpl");
    $reponse['arr_list_hotel'] = $arr_list_hotel;
}
//Modal Add un jour for Etape
function ModalAddJour($smarty, $db){
    global $reponse;
    $reponse['action'] = "btn_add_jour";
    $smarty->assign('idPays', $_POST["idPays"]);
    $smarty->assign('idEtape', $_POST["idEtape"]);
    $smarty->assign('NomPays', GetNomPaysById($_POST["idPays"], $db));
    $smarty->assign('arr_list_ville', GetAllVilleFromPays($_POST["idPays"], $db));

    //Transfer data to *.tpl
    $smarty->fetch("modal_add_jour.tpl");
    $reponse['modal_add_jour'] = $smarty->fetch("modal_add_jour.tpl");
}

//TODO Supprimer
//Supprimer un rabais
function BtnDelRabais($db){
    global $reponse;
    $reponse['action'] = "del_rabais";
    $sql = "DELETE FROM rabais WHERE idCircuit = " . $_POST['idCircuit'];
    $db->execute($sql);
}

//TODO Load form
//Form for Add un circuit
function FormAddCircuit($smarty, $voc, $db){
    global $reponse;
    $reponse['action'] = 'addcircuit';
    $smarty->assign('arr_list_statutcircuit', GetAllStatutCircuit($db));
    //Initialization vocabulaire
    $smarty = AddEditCircuitSmarty($smarty, $voc);
    //Transfer data to *.tpl
    $reponse['form_add_circuit'] = $smarty->fetch("form_add_circuit.tpl");
}
//Form for Edit un circuit
function FormEditCircuit($smarty, $db, $voc){
    global $reponse;
    $reponse['action'] = 'modcircuit';

    if ($_POST['idCircuit'] != "null"){
        /* Array */
        $arr_theme_circuit = $voc["arr_theme_circuit"];
        $smarty->assign('arr_theme_circuit', $arr_theme_circuit);
        $arr_status_circuit = $voc["arr_status_circuit"];
        $smarty->assign('arr_status_circuit', $arr_status_circuit);
        /* ---- */

        $smarty->assign('title', $voc["label_titre_circuit"]);
        $smarty->assign('theme', $voc["label_theme_circuit"]);
        $smarty->assign('btn_submit', $voc["btn_submit"]);
        $smarty->assign('h1_circuit', "Modifier un circuit:");
        $smarty->assign('btn_add_theme', $voc["btn_add_theme"]);
        $smarty->assign('ville_depart', $voc["label_ville_depart"]);

        //Get circuit by idCircuit
        $rs1 = GetCircuitById($_POST['idCircuit'], $db);

        $smarty->assign('db_idCircuit', $rs1[0]['idCircuit']);
        $smarty->assign('db_titre', $rs1[0]['titre']);
        $smarty->assign('db_description', $rs1[0]['description']);
        $smarty->assign('db_duree', $rs1[0]['duree']);
        $smarty->assign('db_pointDepart', $rs1[0]['pointDepart']);
        $smarty->assign('db_prix', $rs1[0]['prix']);
        $smarty->assign('db_idTheme', $rs1[0]['idTheme']);
        $smarty->assign('db_NomTheme', $rs1[0]['NomTheme']);
        $db_dateDepart = DateDBtoInputDate($rs1[0]['dateDepart']);
        $dateFin = DateDBtoInputDate($rs1[0]['dateFin']);
        $smarty->assign('db_dateDepart', $db_dateDepart);
        $smarty->assign('db_dateFin', $dateFin);
        $smarty->assign('db_idStatutCircuit', $rs1[0]['idStatutCircuit']);

        //Transfer form tpl to edit circuit
        $reponse['form_edit_circuit'] = $smarty->fetch("form_edit_circuit.tpl");

    } else {
        exit();
    }

}
//Form for Add un etape
function FormAddEtape($smarty, $voc){
    global $reponse;
    $reponse['action'] = 'addetape';
    //Initialization vocabulaire
    $smarty = AddEditEtapeSmarty($smarty,$voc);
    //Transfer data to *.tpl
    $reponse['form_add_etape'] = $smarty->fetch("form_add_etape.tpl");
}
//Detail un circuit
function DetailCircuit($smarty,$db,$voc){
    global $reponse;
    $reponse['action'] = "detail_circuit";
    $idCircuit = $_POST["idCircuit"];
    $arr_image_circuit = GetImageByidCircuit($_POST["idCircuit"], $db);
    $smarty->assign('arr_image_circuit', $arr_image_circuit);
    $rs1 = GetCircuitById($idCircuit, $db);
    $smarty->assign('idCircuit', $rs1[0]['idCircuit']);
    $smarty->assign('titre', $rs1[0]['titre']);
    $smarty->assign('description', $rs1[0]['description']);
    $smarty->assign('duree', $rs1[0]['duree']);
    $smarty->assign('pointDepart', $rs1[0]['pointDepart']);
    $smarty->assign('prix', $rs1[0]['prix']);
    $smarty->assign('idTheme', $rs1[0]['idTheme']);
    $smarty->assign('NomTheme', $rs1[0]['NomTheme']);
    $smarty->assign('dateDepart', $rs1[0]['dateDepart']);
    $smarty->assign('dateFin', $rs1[0]['dateFin']);
    $smarty->assign('idStatutCircuit', $rs1[0]['idStatutCircuit']);

    $arr_etape = GetAllEtapeFromCircuit($idCircuit, $db);

    //Initialization arr_jour/arr_activity/arr_hotel for arr_etape
    for ($i = 0; $i <= sizeof($arr_etape)-1; $i++) {
        $arr_etape[$i]['arr_jour'] = GetAllJourForEtape($arr_etape[$i]['idEtape'], $db);
        for ($j = 0; $j <= sizeof($arr_etape[$i]['arr_jour'])-1; $j++){
            $arr_etape[$i]['arr_jour'][$j]['NomVille'] =  GetNomVilleById($arr_etape[$i]['arr_jour'][$j]['idVille'],$db);
            //Get list restaurent from jour
            $arr_etape[$i]['arr_jour'][$j]['Restaurent'] = GetAllRestaurentFromJour($arr_etape[$i]['arr_jour'][$j]['idJour'], $db);
            $arr_etape[$i]['arr_jour'][$j]['count_restaurent'] = sizeof($arr_etape[$i]['arr_jour'][$j]['Restaurent']);
            //Get list activity from jour
            $arr_etape[$i]['arr_jour'][$j]['Activity'] = GetAllActivityFromJour($arr_etape[$i]['arr_jour'][$j]['idJour'], $db);
            $arr_etape[$i]['arr_jour'][$j]['count_activity'] = sizeof($arr_etape[$i]['arr_jour'][$j]['Activity']);
            //Get list hotel from jour
            $arr_etape[$i]['arr_jour'][$j]['Hotel'] = GetAllHotelFromJour($arr_etape[$i]['arr_jour'][$j]['idJour'], $db);
            $arr_etape[$i]['arr_jour'][$j]['count_hotel'] = sizeof($arr_etape[$i]['arr_jour'][$j]['Activity']);
        }
        $arr_etape[$i]['NomPays'] = GetNomPaysById($arr_etape[$i]['idPays'], $db);
        $arr_etape[$i]['count_jour'] = sizeof($arr_etape[$i]['arr_jour']);
    }

    $tt = 0;

    $smarty->assign('arr_etape', $arr_etape);
    $smarty->assign('count_etape', sizeof($arr_etape));

    //Transfer data to *.tpl
    $smarty->fetch("modal_del_circuit.tpl");
    $reponse['detail_circuit'] = $smarty->fetch("detail_circuit.tpl");
    $reponse['detail_etape'] = $smarty->fetch("detail_etape.tpl");
}
//Detail jour changes
function DetailJourChange($smarty,$db){
    global $reponse;
    $reponse['action'] = "detail_jour_change";
    $reponse['idJourSelectChange'] = $_POST['idJourSelectChange'];
    $detail_jour = GetJourByidJour($_POST['idJour'],$db);
    $lst_detail_restaurent = GetAllRestaurentFromJour($_POST['idJour'],$db);
    $lst_detail_activity = GetAllActivityFromJour($_POST['idJour'],$db);
    $lst_detail_hotel = GetAllHotelFromJour($_POST['idJour'],$db);

    $smarty->assign('prixJour', $detail_jour[0]['prix']);
    $smarty->assign('idPaysEtape', $_POST['idPaysEtape']);
    $smarty->assign('NomPaysEtape', GetNomPaysById($_POST['idPaysEtape'], $db));
    $smarty->assign('idVilleJour', $_POST['idVilleJour']);
    $smarty->assign('NomVilleJour', GetNomVilleById($_POST['idVilleJour'], $db));
    $smarty->assign('idJour', $_POST['idJour']);
    $smarty->assign('NameJour', $_POST['NameJour']);
    $smarty->assign('DescriptionJour', $detail_jour[0]['description']);
    $smarty->assign('arr_restaurent', $lst_detail_restaurent);
    $smarty->assign('CountRestaurentJour', sizeof($lst_detail_restaurent));
    $smarty->assign('arr_activity', $lst_detail_activity);
    $smarty->assign('CountActivityJour', sizeof($lst_detail_activity));
    $smarty->assign('arr_hotel', $lst_detail_hotel);
    $smarty->assign('CountHotelJour', sizeof($lst_detail_hotel));
    $reponse['detail_jour'] = $smarty->fetch("detail_jour.tpl");
}

//TODO Enregistrer
//Enregistrer nouveau status
function EnregistrerNewStatut($smarty, $db){
    global $reponse;
    $reponse['action'] = "register_statut";

    $table = 'statutcircuit';
    $record['idStatutCircuit'] = $_POST['NewIdStatut'];
    $record['statut'] = $_POST['NewNameStatut'];
    $db->autoExecute($table, $record, 'INSERT');

    $reponse['list_statut'] = GetAllStatutCircuit($db);
    $smarty->assign('arr_list_statutcircuit', $reponse['list_statut']);
    $reponse['list_statut'] = $smarty->fetch("select_statutcircuit.tpl");
}
//Enregistrer un circuit
function EnregistrerCircuit($smarty,$db){
    global $reponse;
    $reponse['action'] = 'btn_register_circuit';

    $table = 'circuit';
    /*$record['idCircuit'] =*/
    $record['titre'] = $_POST['input_title'];
    $record['description'] = $_POST['description'];
    $record['duree'] = 0;
    $record['pointDepart'] = $_POST['input_ville_depart'];
    $record['prix'] = $_POST['prix'];
    $record['idTheme'] = (int)$_POST['SelectTheme'];
    $record['dateDepart'] = '2020-12-12 15:15:15';
    $record['dateFin'] = '2020-12-12 15:15:15';
    $record['idStatutCircuit'] = $_POST['SelectStatut'];

    $db->autoExecute($table, $record, 'INSERT');
}
//Enregistrer un etape
function EnregistrerEtape($smarty,$db){

    global $reponse;
    $reponse['action'] = 'btn_register_etape';
    $reponse['idCircuit'] = $_POST['idCircuit'];

    $table = 'etape';
    $record['numeroEtap'] = 0;
    $record['titre'] = $_POST['input_title'];
    $record['description'] = $_POST['description'];
    $record['duree'] = 0;
    $record['prix'] = 0;
    $record['idPays'] = (int)$_POST['SelectPays'];
    $record['dateDebut'] = $_POST['input_date'];
    $record['dateFin'] = $_POST['input_date'];
    $record['idCircuit'] = $_POST['idCircuit'];

    $db->autoExecute($table, $record, 'INSERT');
}
//Enregistrer nouvelle ville
function EnregistrerVille($smarty,$db){
    global $reponse;
    $reponse['action'] = "register_ville";

    $table = 'villes';
    $record['nom'] = $_POST['new_ville'];
    $record['idPays'] = $_POST['idPays'];
    $db->autoExecute($table, $record, 'INSERT');

    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM villes WHERE idPays = ' . $_POST['idPays'] . ' ORDER BY  nom';
    $rs = $db->getAssoc($SQL);
    $smarty->assign('arr_list_ville', $rs);
    $reponse['list_ville'] = $smarty->fetch("select_villes.tpl");
}
//Enregistrer un jour
function EnregistrerJour($smarty,$db){
    global $reponse;
    $reponse['action'] = 'register_jour';
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM etape ' . 'WHERE idEtape = ' . $_POST['input_id_etape'];
    $rs = $db->getAll($SQL);
    $reponse['idCircuit'] = $rs[0]['idCircuit'];

    $table = 'jour';
    $record['numeroJour'] = $_POST['num_jour'];
    $record['description'] = $_POST['NicEdit'];
    $record['prix'] = 0;
    $record['idVille'] = $_POST['SelectVille'];
    $record['idEtape'] = $_POST['input_id_etape'];
    $db->autoExecute($table, $record, 'INSERT');

    $arr_etape[0]['arr_jour'] = GetAllJourForEtape($_POST['idEtape'], $db);
    for ($j = 0; $j <= sizeof($arr_etape[0]['arr_jour'])-1; $j++){
        $arr_etape[0]['arr_jour'][$j]['NomVille'] =  GetNomVilleById($arr_etape[0]['arr_jour'][$j]['idVille'],$db);
        //Get list restaurent from jour
        $arr_etape[0]['arr_jour'][$j]['Restaurent'] = GetAllRestaurentFromJour($arr_etape[0]['arr_jour'][$j]['idJour'], $db);
        $arr_etape[0]['arr_jour'][$j]['count_restaurent'] = sizeof($arr_etape[0]['arr_jour'][$j]['Restaurent']);
        //Get list activity from jour
        $arr_etape[0]['arr_jour'][$j]['Activity'] = GetAllActivityFromJour($arr_etape[0]['arr_jour'][$j]['idJour'], $db);
        $arr_etape[0]['arr_jour'][$j]['count_activity'] = sizeof($arr_etape[0]['arr_jour'][$j]['Activity']);
        //Get list hotel from jour
        $arr_etape[0]['arr_jour'][$j]['Hotel'] = GetAllHotelFromJour($arr_etape[0]['arr_jour'][$j]['idJour'], $db);
        $arr_etape[0]['arr_jour'][$j]['count_hotel'] = sizeof($arr_etape[0]['arr_jour'][$j]['Activity']);
    }
    $arr_etape[0]['idPays'] = $_POST['SelectPays'];
    $arr_etape[0]['NomPays'] = GetNomPaysById($_POST['SelectPays'], $db);
    $arr_etape[0]['count_jour'] = sizeof($arr_etape[0]['arr_jour']);

    $reponse['idEtape'] = $_POST['input_id_etape'];
    $smarty->assign('etape', $arr_etape[0]);
    $reponse['ajouter_jour'] = $smarty->fetch("ajouter_jour.tpl");

    $k=0;
}
//Enregistrer un rabais pour circuit
function EnregestrerRabais($db){
    global $reponse;
    $reponse['action'] = 'register_rabais';
    $table = 'rabais';
    $record['pourcentage'] = $_POST['pourcentage'];
    $record['datedebut'] = $_POST['dateDebut'];
    $record['datefin'] = $_POST['dateFin'];
    $record['idCircuit'] = $_POST['idCircuit'];
    $db->autoExecute($table, $record, 'INSERT');
}
//Enregistrer nouveau theme
function EnregistrerTheme($smarty,$db){
    global $reponse;
    $reponse['action'] = "register_theme";
    $table = 'typecircuit';
    $record['theme'] = $_POST['new_theme'];
    $db->autoExecute($table, $record, 'INSERT');
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $rs = $db->getAssoc('SELECT * FROM typecircuit');
    $smarty->assign('arr_list_theme', $rs);
    $reponse['list_theme'] = $smarty->fetch("select_themes.tpl");
}
//Enregistrer nouveau pays
function EnregistrerPays($smarty,$db){
    global $reponse;
    $reponse['action'] = "register_pays";
    $table = 'pays';
    $record['nom'] = $_POST['new_pays'];
    $db->autoExecute($table, $record, 'INSERT');
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $rs = $db->getAssoc('SELECT * FROM pays');
    $smarty->assign('arr_list_pays', $rs);
    $reponse['list_pays'] = $smarty->fetch("select_pays.tpl");
}
//Enregistrer nouveau restaurent
function EnregistrerNewRestaurent($smarty, $db){
    global $reponse;
    $reponse['action'] = "register_restaurent";

    $table = 'restaurent';
    $record['titre'] = $_POST['NewNameRestaurent'];
    $record['idVille'] = $_POST['idVille'];
    $record['site'] = $_POST['NewSiteRestaurent'];
    $db->autoExecute($table, $record, 'INSERT');

    $reponse['list_restaurent'] = GetAllRestaurentFromVille($_POST['idVille'], $db);
    $smarty->assign('arr_list_restaurent', $reponse['list_restaurent']);
    $reponse['arr_list_restaurent'] = $smarty->fetch("select_restaurent.tpl");
}
//Enregistrer restaurent for jour
function EnregistrerRestaurentJour($smarty,$db){
    global $reponse;
    $reponse['action'] = "register_restaurent_jour";
    $reponse['idJour'] = $_POST['input_id_jour'];

    $table = 'restaurentsjour';
    $record['idRestaurent'] = $_POST['SelectRestaurent'];
    $record['idJour'] = $_POST['input_id_jour'];
    $record['numeroEtap'] = 0;
    $record['numeroJour'] = 0;
    $db->autoExecute($table, $record, 'INSERT');

    $list_restaurent = GetAllRestaurentFromJour($reponse['idJour'], $db);
    $smarty->assign('CountRestaurentJour', sizeof($list_restaurent));
    $smarty->assign('idPaysEtape', $_POST['SelectPaysRestaurent']);
    $smarty->assign('idJour', $_POST['input_id_jour']);
    $smarty->assign('idVilleJour', $_POST['input_id_ville_jour']);
    $smarty->assign('arr_restaurent', $list_restaurent);

    $reponse['detail_restaurant'] = $smarty->fetch("detail_restaurant.tpl");
}
//Enregistrer activity for jour
function EnregistrerActivityJour($smarty,$db){
    global $reponse;
    $reponse['action'] = "register_activity_jour";
    $reponse['idJour'] = $_POST['input_id_jour'];

    $table = 'activity';
    $record['titre'] = $_POST['title_activity'];
    $record['description'] = $_POST['NicEdit'];
    $record['prix'] = 0;
    $record['idJour'] = $_POST['input_id_jour'];
    $db->autoExecute($table, $record, 'INSERT');

    $list_activity = GetAllActivityFromJour($reponse['idJour'], $db);

    $smarty->assign('idPaysEtape', $_POST['SelectPaysActivity']);
    $smarty->assign('idVilleJour', $_POST['input_id_ville_jour']);
    $smarty->assign('idJour', $_POST['input_id_jour']);
    $smarty->assign('arr_activity', $list_activity);
    $smarty->assign('CountActivityJour', sizeof($list_activity));

    $reponse['detail_activity'] = $smarty->fetch("detail_activity.tpl");
}
//Enregistrer nouveau hotel
function EnregistrerNewHotel($smarty, $db){
    global $reponse;
    $reponse['action'] = "register_hotel";

    $table = 'hotel';
    $record['titre'] = $_POST['NewNameHotel'];
    $record['idVille'] = $_POST['idVille'];
    $record['site'] = $_POST['NewSiteHotel'];
    $db->autoExecute($table, $record, 'INSERT');

    $reponse['list_hotel'] = GetAllHotelFromVille($_POST['idVille'], $db);
    $smarty->assign('arr_list_hotel', $reponse['list_hotel']);
    $reponse['arr_list_hotel'] = $smarty->fetch("select_hotel.tpl");
}
//Enregistrer hotel for jour
function EnregistrerHotelJour($smarty,$db){
    global $reponse;
    $reponse['action'] = "register_hotel_jour";
    $reponse['idJour'] = $_POST['input_id_jour'];

    $table = 'hotelsjour';
    $record['idHotel'] = $_POST['SelectHotel'];
    $record['idJour'] = $_POST['input_id_jour'];
    $record['numeroEtap'] = 0;
    $record['numeroJour'] = 0;
    $db->autoExecute($table, $record, 'INSERT');

    $list_hotel = GetAllHotelFromJour($reponse['idJour'], $db);
    $smarty->assign('CountHotelJour', sizeof($list_hotel));
    $smarty->assign('idPaysEtape', $_POST['SelectPaysHotel']);
    $smarty->assign('idJour', $_POST['input_id_jour']);
    $smarty->assign('idVilleJour', $_POST['input_id_ville_jour']);
    $smarty->assign('arr_hotel', $list_hotel);

    $reponse['detail_hotel'] = $smarty->fetch("detail_hotel.tpl");
}

//TODO Lister
//Lister des circuit
function ListerCircuit($smarty,$db){
    global $reponse;
    $reponse['action'] = "list_circuit";
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $rs = $db->getAll('SELECT * FROM circuit');

    //TODO Get Nom Theme et Nom Status for un circuit
    foreach( $rs as $key=>$value){
        $db->setFetchMode(ADODB_FETCH_ASSOC);
        $SQL1 = 'SELECT * FROM typecircuit WHERE id ='. $rs[$key]['idTheme'];
        $supres = $db->getAll($SQL1);
        $rs[$key]['NomTheme'] = $supres[0]['theme'];
        $SQL2 = 'SELECT * FROM statutcircuit WHERE idStatutCircuit ='. $rs[$key]['idStatutCircuit'];
        $supres = $db->getAll($SQL2);
        $rs[$key]['NomStatutCircuit'] = $supres[0]['statut'];
        $SQL3 = 'SELECT * FROM rabais WHERE idCircuit ='. $rs[$key]['idCircuit'];
        $supres = $db->getAll($SQL3);
        if ($supres == false){
            $rs[$key]['Rabais'] = -1;
        } else {
            $rs[$key]['Rabais'] = $supres[0]['pourcentage'];
            $rs[$key]['DateDebut'] = $supres[0]['datedebut'];
            $rs[$key]['DateFin'] = $supres[0]['datefin'];
        }
    }

    $smarty->assign('arr_list_circuit', $rs);
    $reponse['list_circuit'] = $smarty->fetch("list_circuit.tpl");

}

//TODO Transfer voc data to tpl smarty
function AddEditEtapeSmarty($smarty, $voc){
    $idCircuit = $_POST["idCircuit"];
    $smarty->assign('idCircuit', $idCircuit);
    $smarty->assign('h1_add_etape', $voc["lb_h1_add_etape"]);
    $smarty->assign('title', $voc["lb_titre_etape"]);
    $smarty->assign('pays', $voc["lb_pays_etape"]);
    $smarty->assign('add_new_pays', $voc["lb_add_new_pays"]);
    $smarty->assign('btn_add_pays', $voc["btn_add_pays"]);
    $smarty->assign('btn_submit', $voc["btn_submit"]);
    $smarty->assign('btn_cancel', $voc["btn_cancel"]);
    $smarty->assign('date_debut', $voc["lb_date_debut_etape"]);
    $smarty->assign('description', $voc["lb_description_etape"]);
    //Array
    $smarty->assign('arr_pays', $voc["arr_pays"]);
    return $smarty;
}
function AddEditCircuitSmarty($smarty, $voc){
    $smarty->assign('h1_circuit', $voc["lb_h1_add_circuit"]);
    $smarty->assign('title', $voc["lb_titre_circuit"]);
    $smarty->assign('theme', $voc["lb_theme_circuit"]);
    $smarty->assign('btn_submit', $voc["btn_submit"]);
    $smarty->assign('btn_cancel', $voc["btn_cancel"]);
    $smarty->assign('btn_add_theme', $voc["btn_add_theme"]);
    $smarty->assign('add_new_theme', $voc["lb_add_new_theme"]);
    $smarty->assign('ville_depart', $voc["lb_ville_depart"]);
    //Array
    $smarty->assign('arr_theme_circuit', $voc["arr_theme_circuit"]);
    return $smarty;
}

//TODO Function Get/Convert
//Get all StatutCircuit
function GetAllStatutCircuit($db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM statutcircuit';
    return $db->getAll($SQL);
}
//Get Circuits with all info from DB
function GetCircuitById($idCircuit, $db){

    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM circuit WHERE idCircuit = '.$idCircuit;
    $rs = $db->getAll($SQL);

    foreach($rs as $key=>$value){
        $db->setFetchMode(ADODB_FETCH_ASSOC);
        $SQL1 = 'SELECT * FROM typecircuit WHERE id ='. $rs[$key]['idTheme'];
        $supres = $db->getAssoc($SQL1);
        $rs[$key]['NomTheme'] = $supres[$rs[$key]['idTheme']];
        $SQL2 = 'SELECT * FROM statutcircuit WHERE idStatutCircuit ='. $rs[$key]['idStatutCircuit'];
        $supres = $db->getAssoc($SQL2);
        $rs[$key]['NomStatutCircuit'] = $supres[$rs[$key]['idStatutCircuit']];
    }

    return $rs;
}
//Convert datetime DB to date input form
function DateDBtoInputDate($DateDB){
    $date_html = explode(" ", $DateDB);
    $DateDB = $date_html[0]."T".explode(":", $date_html[1])[0].":".explode(":", $date_html[1])[1];
    return $DateDB;
}
//Get Etape with all info from DB
function GetAllEtapeFromCircuit($idCircuit, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM etape WHERE idCircuit = '.$idCircuit;
    $rs = $db->getAll($SQL);

    foreach($rs as $key=>$value){
        $db->setFetchMode(ADODB_FETCH_ASSOC);
        $SQL1 = 'SELECT * FROM pays WHERE idPays ='. $rs[$key]['idPays'];
        $supres = $db->getAssoc($SQL1);
        $rs[$key]['NomPays'] = $supres[$rs[$key]['idPays']];
    }
    return $rs;
}
//Get Jour with all info from DB ORDER BY numeroJour DESC
function GetAllJourForEtape($idEtape, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM jour WHERE idEtape = '.$idEtape . ' ORDER BY  numeroJour DESC';
    $rs = $db->getAll($SQL);
    return $rs;
}
//Get Jour with all info from DB by idJour
function GetJourByidJour($idJour , $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM jour WHERE idJour = '.$idJour;
    $rs = $db->getAll($SQL);
    return $rs;
}
//Get Name of Pays by idPays
function GetNomPaysById($idPays, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM pays WHERE idPays = '.$idPays;
    $rs = $db->getAll($SQL);
    return $rs[0]['nom'];
}

function GetImageByidCircuit($idCircuit, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = "SELECT * FROM photo as ph
            INNER JOIN photocircuit p on ph.idPhoto = p.idPhoto
            WHERE p.idCircuit = ".$idCircuit;
    return $db->getAll($SQL);
}

function GetAllVilleFromPays($idPays, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM villes WHERE idPays = '.$idPays;
    return $db->getAll($SQL);
}

function GetAllRestaurentFromVille($idVille, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM restaurent WHERE idVille = '.$idVille  . ' ORDER BY  titre';
    return $db->getAll($SQL);
}

function GetAllHotelFromVille($idVille, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM hotel WHERE idVille = '.$idVille  . ' ORDER BY  titre';
    return $db->getAll($SQL);
}
//Get Nome de ville from ville by idVille
function GetNomVilleById($idVille, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM villes WHERE idVille = '.$idVille;
    $rs = $db->getAll($SQL);
    return $rs[0]['nom'];
}
//Get all Restaurent from Jour by idJour
function GetAllRestaurentFromJour($idJour, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);

    $SQL = 'SELECT r.*, v.nom as \'VilleRestaurent\', e.idEtape, j.idJour FROM restaurent as r
            INNER JOIN restaurentsjour rj on r.idRestaurent = rj.idRestaurent
            INNER JOIN jour j on rj.idJour = j.idJour
            INNER JOIN villes v on r.idVille = v.idVille
            INNER JOIN etape e on j.idEtape = e.idEtape
            WHERE rj.idJour = '. $idJour;
    $rs = $db->getAll($SQL);
    return $rs;
}
//Get all Activity from Jour by idJour
function GetAllActivityFromJour($idJour, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);
    $SQL = 'SELECT * FROM activity WHERE idJour = '.$idJour;
    return $db->getAll($SQL);
}
//Get all Hotel from Jour by idJour
function GetAllHotelFromJour($idJour, $db){
    $db->setFetchMode(ADODB_FETCH_ASSOC);

    $SQL = 'SELECT h.*, v.nom as \'VilleHotel\', e.idEtape, j.idJour FROM hotel as h
                INNER JOIN hotelsjour hj on h.idHotel = hj.idHotel
                INNER JOIN jour j on hj.idJour = j.idJour
                INNER JOIN villes v on h.idVille = v.idVille
                INNER JOIN etape e on j.idEtape = e.idEtape
                WHERE hj.idJour = '. $idJour;
    $rs = $db->getAll($SQL);
    return $rs;
}



echo json_encode($reponse);

?>
