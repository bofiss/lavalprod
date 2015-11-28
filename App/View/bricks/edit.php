<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>BRICKS</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">
                <div class="panel panel-default">
                    <div class="panel-body containerEditForm">

                        <?php 
                               if(isset($this->currentBrick)){
                                   echo "<h1>Edit Brick</h1>"; 
                                   echo '<form class="form-horizontal" data-toggle="validator" method="post" action="/brick/UpdateBrick/'.$this->currentBrick["id"].'">';
                                }
                                else {
                                    echo "<h1>Add Brick</h1>";
                                    echo '<form class="form-horizontal" data-toggle="validator" method="post" action="/brick/CreateBrick" enctype="multipart/form-data">';
                                }
                        ?>

                       
                       
                            <fieldset>
                                <!-- Text input-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="brick[name]" name="brick[name]" type="text"
                                               placeholder="Brick name" value="<?php if (isset($this->currentBrick)) {
                                                   echo $this->currentBrick['title'];
                                               } ?>"
                                               class="floating-label form-control input-md" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="select" class="col-sm-2 control-label">Type</label>

                                        <div class="col-sm-10">

                                            <select class="form-control" id="brickTypeSelector" name="brick[type]">
                                                <option value="WAVE">Stimuli auditif enregistré</option>
                                                <option value="TTS">Stimuli auditif généré</option>
                                                <option value="TEXT">Stimuli visuel textuel</option>
                                                <option value="IMG">Stimuli visuel imagé</option>
                                                <option value="RESP">Record user's voice</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="dynamicForm">
                                    <div class="rows col-lg-6">
                                        <div class="form-group"><input id="brick[media]" name="brick[media]" type="text"
                                                                       readonly="" class="form-control floating-label"
                                                                       placeholder="<?php if (isset($this->currentBrick)) {
                                                   echo $this->currentBrick['data'];
                                               } else echo "Upload File..."?>" value="<?php if (isset($this->currentBrick)) {
                                                   echo $this->currentBrick['data'];
                                               }?>"> <input type="file" id="inputFile"  required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" id="brick[save]" name="brick[save]"
                                            class="btn btn-primary">Save
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <h1>Bricks list</h1>
                <table id="brickTable" class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Media</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->bricks as $brick) :?>
                             <tr>
                                <td><?php echo $brick['id']; ?></td>
                                <td><?php echo $brick['title']; ?></td>
                                <td><?php echo $brick['type']; ?></td>
                                <td><?php echo $brick['data']; ?></td>
                                <td>
                                    <a href="/brick/edit/<?php echo $brick['id']; ?>"><button type="button" class="btn btn-flat btn-info btn-sm btn-td">edit</button></a>
                                    <a href="/brick/delete/<?php echo $brick['id']; ?>"><button type="button" class="btn btn-flat btn-warning btn-sm btn-td">delete</button></a>
                                </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>

                </table>
                <div class="pagingBrick"></div>
            </div>
        </div>
    </div>
</div>