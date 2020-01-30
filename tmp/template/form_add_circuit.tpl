<div style="padding: 20px">
<a href="../pages/admin.php">Liste des circuit</a>
<h1>{$voc["lb_h1_add_circuit"]}</h1>

{*<button id="verification-NicEdit">Verification Editor</button>*}
<form class="animated zoomInRight" id="AddFormCircuit">
    <div class="form-group animated zoomInRight">
        <label>{$voc['lb_status']}:</label>
        <select class="form-control"  id="SelectStatus" name="SelectStatut" style="width:25%;display: inline;">
            {include file="select_statutcircuit.tpl" arr_list_statutcircuit=$arr_list_statutcircuit}
        </select>
        <input type="button" value="{$voc["btn_add_status"]}" class="btn btn-primary" style="display: inline" onclick="BtnViewNewStatut()">
    </div>
    <div class="form-group animated zoomInRight" id="ViewNewStatut" style="width: 30%;margin-left: 20%;display: none;">
        <label>ID:</label>
        <input type="number" style="width: 100px;" class="form-control" id="NewIdStatut">
        <label>{$voc['lb_status']}:</label>
        <input type="text" class="form-control" id="NewNameStatut">
        <br>
        <input type="button" value="{$voc["btn_submit"]}" id="btn_add_hotel" class="btn btn-success" onclick="BtnAddStatus()">
        <input type="button" value="{$voc["btn_cancel"]}" id="btn_not_hotel" class="btn btn-secondary" onclick="BtnNotStatut()">
    </div>
    <div class="form-group animated zoomInRight">
        <label>{$voc["lb_title"]}</label>
        <input type="text" class="form-control" id="input_title" name="input_title">
    </div>
    <div class="form-group animated zoomInRight">
        <label>{$voc["lb_price"]}:</label>
        <input type="text" class="form-control" id="prix" name="prix" style="width: 100px" value="0">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">{$voc["lb_date_depart"]}:</label>
        <div class="col-10">
            <input class="form-control" style="width: 250px" type="datetime-local" id="input_date" name="input_date">
        </div>
    </div>
    <div>
        <label for="exampleInputEmail1" id="label_description_circuit">Description:</label>
        <textarea id="NicEdit" cols="70" rows="5" style="width: 60%" >Some Sample Text</textarea>
    </div>
    <div class="form-group">
        <label style="display: block">{$voc["lb_theme"]}</label>
        <select class="form-control"  id="SelectTheme" name="SelectTheme" style="width:30%;display: inline;">
            {include file="select_themes.tpl" arr_theme_circuit=$arr_theme_circuit}
        </select>
        <input type="button" value="{$btn_add_theme}" class="btn btn-primary" style="display: inline" onclick="BtnViewNewTheme()">
    </div>
    <div class="form-group animated zoomInRight" id="ViewNewTheme" style="width: 30%;margin-left: 10%;display: none;">
        <label>{$voc["lb_add_new_theme"]}</label>
        <input type="text" class="form-control" id="NewTheme">
        <br>
        <input type="button" value="{$voc["btn_submit"]}" id="btn_add_theme" class="btn btn-success" onclick="BtnAddTheme()">
        <input type="button" value="{$voc["btn_cancel"]}" id="btn_not_theme" class="btn btn-secondary" onclick="BtnNotTheme()">
    </div>
    <div class="form-group animated zoomInRight" style="width: 35%">
        <label>{$voc["date_depart"]}</label>
        <input type="text" class="form-control" id="input_ville_depart" name="input_ville_depart">
    </div>
    <input type="button" id="btn_add_circuit" class="btn btn-success" value="{$voc["btn_submit"]}" onclick="BtnAddCircuit()">
    <input type="button" value="{$voc["btn_cancel"]}" id="btn_not_theme" class="btn btn-secondary" onclick="location.href='admin.php'">
</form>
<script src="../libs/nicEdit-latest.js"></script>
<script src="../js/ivan-js.js"></script>
</div>