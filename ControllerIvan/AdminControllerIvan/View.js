var SupportArrayRestaurent = {};
var SupportArrayHotel = {};

function ChangeRestaurent(){
    $('#text_site_restaurent').text(SupportArrayRestaurent[$('#SelectRestaurent').val()]);
    $('#link_site_restaurent').attr('href', SupportArrayRestaurent[$('#SelectRestaurent').val()]);
}

function ChangeHotel(){
    $('#text_site_hotel').text(SupportArrayHotel[$('#SelectHotel').val()]);
    $('#link_site_hotel').attr('href', SupportArrayHotel[$('#SelectHotel').val()]);
}

function InitialSiteSelectRestaurent(arr_list_restaurent) {
    SupportArrayRestaurent = {};
    for (var restaurent of arr_list_restaurent){
        SupportArrayRestaurent[restaurent.idRestaurent] = restaurent.site;
    }
}

function InitialSiteSelectHotel(arr_list_hotel) {
    SupportArrayHotel = {};
    for (var hotel of arr_list_hotel){
        SupportArrayHotel[hotel.idHotel] = hotel.site;
    }
}

var Vue=function(reponse){

    switch(reponse.action){
        case "addcircuit" :
            AddCircuit_View(reponse);
            break;
        case "btn_register_circuit" :
            alert("Circuit a été ajouté...");
            location.reload();
            break;
        case "btn_register_etape" :
            alert("Étape a été ajouté...");
            DetailCircuit(reponse.idCircuit);
            break;
        case "register_theme" :
            EnregistreTheme_View(reponse);
            break;
        case "register_statut" :
            EnregistreStatut_View(reponse);
            break;
        case "list_circuit" :
            ListerCircuit_View(reponse);
            break;
        case "detail_circuit" :
            DetailCircuit_View(reponse);
            break;
        case "modcircuit" :
            ModCircuit_View(reponse);
            break;
        case "addetape" :
            AddEtape_View(reponse);
            break;
        case "register_rabais" :
            RegisterRabais_View(reponse);
            break;
        case "register_pays" :
            EnregisterPays_View(reponse);
            break;
        case "register_restaurent" :
            InitialSiteSelectRestaurent(reponse.list_restaurent);
            EnregisterRestaurent_View(reponse);
            break;
        case "register_hotel" :
            InitialSiteSelectHotel(reponse.list_hotel);
            EnregisterHotel_View(reponse);
            break;
        case "del_rabais" :
            DelRabais_View();
            break;
        case "btn_add_jour" :
            AddJour_View(reponse);
            break;
        case "btn_add_restaurent" :
            InitialSiteSelectRestaurent(reponse.arr_list_restaurent);
            AddRestaurent_View(reponse);
            break;
        case "btn_add_hotel" :
            InitialSiteSelectHotel(reponse.arr_list_hotel);
            AddHotel_View(reponse);
            break;
        case "btn_add_activity" :
            AddActivity_View(reponse);
            break;
        case "register_ville" :
            EnregisterVille_View(reponse);
            break;
        case "register_jour" :
            EnregisterJour_View(reponse);
            break;
        case "register_restaurent_jour" :
            EnregisterRestaurentJour_View(reponse);
            break;
        case "register_hotel_jour" :
            EnregisterHotelJour_View(reponse);
            break;
        case "register_activity_jour" :
            EnregisterActivityJour_View(reponse);
            break;
        case "detail_jour_change" :
            //alert("Jour a été changé...");
            $("#detail_jour_" + reponse.idJourSelectChange).html(reponse.detail_jour);
            break;
        case "table_circuit" :
            ShowFullTableCircuit(reponse);
            break;
    }
};

//TODO Enregistrer
function EnregisterJour_View(reponse){
    alert("Jour a été ajouté...");
    $('#modal_add_jour').modal('hide');
    $("#ajouter_jour_" + reponse.idEtape).html(reponse.ajouter_jour);
    //DetailCircuit(reponse.idCircuit);
}
function EnregisterRestaurent_View(reponse){
    alert("Restaurent a été ajouté...");
    $("#ViewNewRestaurent").css("display", "none");
    $("#SelectRestaurent").html(reponse.arr_list_restaurent);
    ChangeRestaurent();
}
function EnregisterHotel_View(reponse){
    alert("Hotel a été ajouté...");
    $("#ViewNewHotel").css("display", "none");
    $("#SelectHotel").html(reponse.arr_list_hotel);
    ChangeHotel();
}
function EnregisterVille_View(reponse){
    alert("Ville a été ajouté...");
    $("#ViewNewVille").css("display", "none");
    $("#SelectVille").html(reponse.list_ville);
}
function EnregistreTheme_View(reponse){
    alert("Thème a été ajouté...");
    $("#ViewNewTheme").css("display", "none");
    $("#SelectTheme").html(reponse.list_theme);
}
function EnregistreStatut_View(reponse){
    alert("Statut a été ajouté...");
    $("#ViewNewStatut").css("display", "none");
    $("#SelectStatus").html(reponse.list_statut);
}
function EnregisterPays_View(reponse) {
    alert("Pays a été ajouté...");
    $("#ViewNewPays").css("display", "none");
    $("#SelectPays").html(reponse.list_pays);
}
function EnregisterRestaurentJour_View(reponse){
    alert("Restaurent a été ajouté pour le jour.");
    $('#modal_add_restaurent').modal('hide');
    $("#detail_restaurant_jour_" + reponse.idJour).html(reponse.detail_restaurant);
}
function EnregisterActivityJour_View(reponse){
    alert("Activité a été ajouté pour le jour.");
    $('#modal_add_activity').modal('hide');
    $("#detail_activity_jour_" + reponse.idJour).html(reponse.detail_activity);
}
function EnregisterHotelJour_View(reponse){
    alert("Hotel a été ajouté pour le jour.");
    $('#modal_add_hotel').modal('hide');
    $("#detail_hotel_jour_" + reponse.idJour).html(reponse.detail_hotel);
}
function RegisterRabais_View() {
    location.reload();
}

//TODO Show modal
function AddRestaurent_View(reponse) {
    $("#div_modal_add_restaurent").html(reponse.modal_add_restaurent);
    $('#modal_add_restaurent').modal('show');
    $('.modal-backdrop').css('position', 'static');
    /*$('#ViewNewVille').css('display', 'none');*/
}
function AddActivity_View(reponse) {
    $("#div_modal_add_activity").html(reponse.modal_add_activity);
    $('#modal_add_activity').modal('show');
    $('.modal-backdrop').css('position', 'static');
    /*$('#ViewNewVille').css('display', 'none');*/
}
function AddHotel_View(reponse) {
    $("#div_modal_add_hotel").html(reponse.modal_add_hotel);
    $('#modal_add_hotel').modal('show');
    $('.modal-backdrop').css('position', 'static');
    /*$('#ViewNewVille').css('display', 'none');*/
}
function AddJour_View(reponse) {
    $("#div_modal_add_jour").html(reponse.modal_add_jour);
    $('#modal_add_jour').modal('show');
    $('.modal-backdrop').css('position', 'static');
    $('#ViewNewVille').css('display', 'none');
}
function DelRabais_View() {
    location.reload();
}

//TODO load form
function AddCircuit_View(reponse){
    document.documentElement.scrollTop = 0;
    $("#list-circuit").html(reponse.form_add_circuit);
    $("#ajouter-circuit").html("");
    $("#ajouter-etape").html("");
}
function AddEtape_View(reponse){
    document.documentElement.scrollTop = 0;
    $("#list-circuit").html(reponse.form_add_etape);
    $("#ajouter-circuit").html("");
    $("#ajouter-etape").html("");
}
function ListerCircuit_View(reponse){
    $("#list-circuit").html(reponse.list_circuit);
}
function DetailCircuit_View(reponse) {
    document.documentElement.scrollTop = 0;
    $("#list-circuit").html("");
    $("#ajouter-circuit").html(reponse.detail_circuit);
    $("#ajouter-etape").html(reponse.detail_etape);
}
function ShowFullTableCircuit(reponse) {
    $("#table_circuit").html(reponse.table_circuit);
}


function ModCircuit_View(reponse) {
    $("#form-circuit").html(reponse.form_edit_circuit);
}

