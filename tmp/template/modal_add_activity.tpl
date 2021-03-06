<div class="modal fade" id="modal_add_activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{$voc["lb_h1_add_activity"]}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormAddActivity">
                    <div class="row">
                        <div class="col">
                            <label>{$voc["lb_pays"]}</label>
                            <select readonly="true" class="form-control"  id="SelectPaysActivity" name="SelectPaysActivity" >
                                <option value="{$idPaysEtape}">{$NomPaysEtape}</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>{$voc["lb_ville"]}</label>
                            <select class="form-control" readonly="true" id="SelectVilleActivity" name="SelectVilleActivity" >
                                <option value="{$idVilleJour}">{$NomVilleJour}</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label id="label_title_activity">{$voc["lb_title"]}</label><br>
                        <input type="text" id="title_activity" name="title_activity" style="width:80%" ></input>
                    </div>
                    <div class="form-group">
                        <label id="label_description_activity">{$voc["lb_description"] }</label><br>
                        <textarea id="NicEdit" name="NicEdit" cols="70" rows="5" style="width: 60%" ></textarea>
                    </div>
                    <br>
                    <br>
                    <div class="form-group" style="display: inline;">
                        <label style="display: inline;">ID_Pays_Etape:</label>
                        <input type="text" value="{$idPaysEtape}" class="form-control" id="input_id_pays" name="input_id_pays" style="width: 60px;display: inline;" readonly>
                    </div>

                    <div class="form-group" style="display: inline;margin-left: 10px;">
                        <label style="display: inline;">ID_Jour:</label>
                        <input type="text" value="{$idJour}" class="form-control" id="input_id_jour" name="input_id_jour" style="width: 60px;display: inline;" readonly>
                    </div>
                    <div class="form-group" style="display: inline;margin-left: 10px;">
                        <label style="display: inline;">ID_VilleJour:</label>
                        <input type="text" value="{$idVilleJour}" class="form-control" id="input_id_ville_jour" name="input_id_ville_jour" style="width: 60px;display: inline;" readonly>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="register_jour" class="btn btn-success" onclick="BtnAddActivityForJour()">{$voc["btn_submit"]}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{$voc["btn_cancel"]}</button>
            </div>
        </div>
    </div>
</div>