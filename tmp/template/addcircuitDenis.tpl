<a href="pages/list_circuit.php" target="_blank">Liste des circuit</a>
<button id="verification-NicEdit">Verification Editor</button>
<form class="animated zoomInRight" id="AddFormCircuit">
    <div class="form-group animated zoomInRight">
        <label>{$title}</label>
        <input type="text" class="form-control" id="input_title" name="input_title">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Date de départ:</label>
        <div class="col-10">
            <input class="form-control" style="width: 250px" type="datetime-local" data-date-format="DD MMMM YYYY" id="input_date" name="input_date">
        </div>
    </div>
    <div>
        <label for="exampleInputEmail1" id="label_description_circuit">Description:</label>
        <textarea id="NicEdit" cols="70" rows="5" style="width: 60%" >Some Sample Text</textarea>
    </div>
    <div class="form-group">
        <label style="display: block">{$theme}</label>
        <select class="form-control"  id="SelectTheme" name="SelectTheme" style="width:30%;display: inline;">
            {foreach from=$arr_theme_circuit key=k item=v}
                <option value="{$k}">{$v}</option>
            {/foreach}
        </select>
        <input type="button" value="{$btn_add_theme}" class="btn btn-primary" style="display: inline" onclick="BtnViewNewTheme()">
    </div>
    <div class="form-group animated zoomInRight" id="ViewNewTheme" style="width: 30%;margin-left: 10%;display: none;">
        <label for="exampleInputEmail1">Nouveau thème</label>
        <input type="text" class="form-control" id="NewTheme">
        <br>
        <input type="button" value="{$btn_submit}" id="btn_add_theme" class="btn btn-success" onclick="BtnAddTheme()">
        <input type="button" value="Annuler" id="btn_not_theme" class="btn btn-secondary" onclick="BtnNotTheme()">
    </div>
    <div class="form-group animated zoomInRight" style="width: 35%">
        <label>{$ville_depart}</label>
        <input type="text" class="form-control" id="input_ville_depart" name="input_ville_depart">
    </div>

    <input type="button" id="btn_add_circuit" class="btn btn-primary" value="{$btn_submit}" onclick="BtnAddCircuit()">
</form>

<script src="../libs/nicEdit-latest.js"></script>
<script src="../js/ivan-js.js"></script>
